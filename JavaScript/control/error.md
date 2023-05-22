[Volver al Menú](../root.md)

[Volver a control flow](./flow.md)

# `Exception Handling`

In JavaScript, all exceptions are simply objects. While the majority of exceptions are implementations of the global Error class, any old object can be thrown. With this in mind, there are two ways to throw an exception: directly via an Error object, and through a custom object. (excerpt from Rollbar).

## `Try, Catch, Finally`

La construcción `try...catch` tiene dos bloques principales: try, y luego catch:
```
try {

  // código...

} catch (err) {

  // manipulación de error

}
```

Funciona así:

- Primero, se ejecuta el código en try {...}.
- Si no hubo errores, se ignora catch (err): la ejecución llega al final de try y continúa, omitiendo catch.
- Si se produce un error, la ejecución de try se detiene y el control fluye al comienzo de catch (err). La variable err (podemos usar cualquier nombre para ella) contendrá un objeto de error con detalles sobre lo que sucedió.

Entonces, un error dentro del bloque try {...} no mata el script; tenemos la oportunidad de manejarlo en catch.

<p style="color: red"> `try...catch` solo funciona para errores de tiempo de ejecución </p>

<p style="color: red">`try...catch` trabaja sincrónicamente</p>

### `Objeto Error`
Cuando se produce un error, JavaScript genera un objeto que contiene los detalles al respecto. El objeto se pasa como argumento para catch:
```
try {
  // ...
} catch(err) { // <-- el "objeto error", podría usar otra palabra en lugar de err
  // ...
}
```

Para todos los errores integrados, el objeto error tiene dos propiedades principales:

`name`
Nombre de error. Por ejemplo, para una variable indefinida que es "ReferenceError".

`message`
Mensaje de texto sobre detalles del error.
Hay otras propiedades no estándar disponibles en la mayoría de los entornos. Uno de los más utilizados y compatibles es:

`stack`
Pila de llamadas actual: una cadena con información sobre la secuencia de llamadas anidadas que condujeron al error. Utilizado para fines de depuración.

### `Una adición reciente`

Esta es una adición reciente al lenguaje. Los navegadores antiguos pueden necesitar polyfills.
Si no necesitamos detalles del error, catch puede omitirlo:
```
try {
  // ...
} catch { // <-- sin (err)
  // ...
}
```

### `finally`

La construcción `try...catch` puede tener una cláusula de código más: `finally`.

Si existe, se ejecuta en todos los casos:

- después de try, si no hubo errores,
- después de catch, si hubo errores.

La sintaxis extendida se ve así:
```
try {
   ... intenta ejecutar el código ...
} catch (err) {
   ... manejar errores ...
} finally {
   ... ejecutar siempre ...
}
```
## `Throw Statement`

El operador throw genera un error.

La sintaxis es:
```
throw <error object>
```

Técnicamente, podemos usar cualquier cosa como un objeto error. Eso puede ser incluso un primitivo, como un número o una cadena, pero es mejor usar objetos, preferiblemente con propiedades name y message (para mantenerse algo compatible con los errores incorporados).

JavaScript tiene muchos constructores integrados para manejar errores estándar: Error, SyntaxError, ReferenceError, TypeError y otros. Podemos usarlos para crear objetos de error también.

Su sintaxis es:
```
let error = new Error(message);
// or
let error = new SyntaxError(message);
let error = new ReferenceError(message);
// ...
```
Ejemplo:
```
let json = '{ "age": 30 }'; // dato incompleto

try {

  let user = JSON.parse(json); // <-- sin errores

  if (!user.name) {
    throw new SyntaxError("dato incompleto: sin nombre"); // (*)
  }

  alert( user.name );

} catch (err) {
  alert( "Error en JSON: " + e.message ); // Error en JSON: dato incompleto: sin nombre
}
```

### `Relanzando (rethrowing)`

## `Errores personalizados, extendiendo Error`

JavaScript permite usar throw con cualquier argumento, por lo que técnicamente nuestras clases de error personalizadas no necesitan heredarse de Error. Pero si heredamos, entonces es posible usar obj instanceof Error para identificar objetos error. Entonces es mejor heredar de él.

### `Extendiendo Error`

Nuestra clase ValidationError debería heredar de la clase incorporada Error.

Esa clase está incorporada, pero aquí está su código aproximado para que podamos entender lo que estamos extendiendo:
``` 
// El "pseudocódigo" para la clase Error incorporada definida por el propio JavaScript
class Error {
  constructor(message) {
    this.message = message;
    this.name = "Error"; // (diferentes nombres para diferentes clases error incorporadas)
    this.stack = <call stack>; // no estándar, pero la mayoría de los entornos lo admiten
  }
}
```
Ahora heredemos ValidationError y probémoslo en acción:
```
class ValidationError extends Error {
  constructor(message) {
    super(message); // (1)
    this.name = "ValidationError"; // (2)
  }
}

function test() {
  throw new ValidationError("Vaya!");
}

try {
  test();
} catch(err) {
  alert(err.message); // Vaya!
  alert(err.name); // ValidationError
  alert(err.stack); // una lista de llamadas anidadas con números de línea para cada una
}
```

### `Herencia adicional`

<h2 style='color: green'>Resumen</h2>

- Podemos heredar de Error y otras clases de error incorporadas normalmente. Solo necesitamos cuidar la propiedad name y no olvidemos llamar super.
- Podemos usar instanceof para verificar errores particulares. También funciona con herencia. Pero a veces tenemos un objeto error que proviene de una biblioteca de terceros y no hay una manera fácil de obtener su clase. Entonces la propiedad name puede usarse para tales controles.
- Empacado de excepciones es una técnica generalizada: una función maneja excepciones de bajo nivel y crea errores de alto nivel en lugar de varios errores de bajo nivel. Las excepciones de bajo nivel a veces se convierten en propiedades de ese objeto como err.cause en los ejemplos anteriores, pero eso no es estrictamente necesario.

## `Utilizing error objects`

When a runtime error occurs, a new Error object is created and thrown. With this Error object, we can determine the type of the Error and handle it according to its type.

Types of Errors:
Besides error constructors, Javascript also has other core Error constructors.

Example:
```
try {
  willGiveErrorSometime();
} catch (error) {
  if (error instanceof RangeError) {
    rangeErrorHandler(error);
  } else if (error instanceof ReferenceError) {
    referenceErrorHandle(error);
  } else {
    errorHandler(error);
  }
}
```

- `AggregateError`

The AggregateError object represents an error when several errors need to be wrapped in a single error. It is thrown when multiple errors need to be reported by an operation, for example by `Promise.any()`, when all promises passed to it reject.

- `EvalError`

The EvalError object indicates an error regarding the global eval() function. This exception is not thrown by JavaScript anymore, however the EvalError object remains for compatibility.

- `InternalError`

The InternalError object indicates an error that occurred internally in the JavaScript engine.

Example cases are mostly when something is too large, e.g.:

    - "too many switch cases",
    - "too many parentheses in regular expression",
    - "array initializer too large",
    - "too much recursion".

- `RangeError`

The RangeError object indicates an error when a value is not in the set or range of allowed values.

This can be encountered when:

    - passing a value that is not one of the allowed string values to String.prototype.normalize(), or
    - when attempting to create an array of an illegal length with the Array constructor, or
    - when passing bad values to the numeric methods Number.prototype.toExponential(), Number.prototype.toFixed() or Number.prototype.toPrecision().

- `ReferenceError`

The ReferenceError object represents an error when a variable that doesn't exist (or hasn't yet been initialized) in the current scope is referenced.

- `SyntaxError`

The SyntaxError object represents an error when trying to interpret syntactically invalid code. It is thrown when the JavaScript engine encounters tokens or token order that does not conform to the syntax of the language when parsing code.

[TOP](#exception-handling)