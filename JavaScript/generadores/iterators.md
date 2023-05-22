[Volver al Menú](../root.md)

# `Iterables`

## `Symbol.iterator`

Podemos comprender fácilmente el concepto de iterables construyendo uno.

Por ejemplo: tenemos un objeto que no es un array, pero parece adecuado para for..of.

Como un objeto range que representa un intervalo de números:

```
let range = {
  from: 1,
  to: 5
};

// Queremos que el for..of funcione de la siguiente manera:
// for(let num of range) ... num=1,2,3,4,5
```

Para hacer que el objeto range sea iterable (y así permitir que for..of funcione) necesitamos agregarle un método llamado Symbol.iterator (un símbolo incorporado especial usado solo para realizar esa función).

1. Cuando se inicia for..of, éste llama al método Symbol.iterator una vez (o genera un error si no lo encuentra). El método debe devolver un iterador : un objeto con el método next().
2. En adelante, for..of trabaja solamente con ese objeto devuelto.
3. Cuando for..of quiere el siguiente valor, llama a next() en ese objeto.
   El resultado de next() debe tener la forma {done: Boolean, value: any}, donde done=true significa que el bucle ha finalizado; de lo contrario, el nuevo valor es value.

   Aquí está la implementación completa de range:

```

let range = {
  from: 1,
  to: 5
};

// 1. Una llamada a for..of inicializa una llamada a esto:
range[Symbol.iterator] = function() {

  // ... devuelve el objeto iterador:
  // 2. En adelante, for..of trabaja solo con el objeto iterador debajo, pidiéndole los siguientes valores
  return {
    current: this.from,
    last: this.to,

    // 3. next() es llamado en cada iteración por el bucle for..of
    next() {
      // 4. debe devolver el valor como un objeto {done:.., value :...}
      if (this.current <= this.last) {
        return { done: false, value: this.current++ };
      } else {
        return { done: true };
      }
    }
  };
};

// ¡Ahora funciona!
for (let num of range) {
  alert(num); // 1, luego 2, 3, 4, 5
}

```

## `String es iterable`

Las matrices y cadenas son los iterables integrados más utilizados.

En una cadena o string, el bucle for..of recorre sus caracteres:

## `Iterables y simil-array (array-like)`

Los dos son términos oficiales que se parecen, pero son muy diferentes. Asegúrese de comprenderlos bien para evitar confusiones.

- Iterables son objetos que implementan el método Symbol.iterator, como se describió anteriormente.
- simil-array son objetos que tienen índices y longitud o length, por lo que se “ven” como arrays.

Cuando usamos JavaScript para tareas prácticas en el navegador u otros entornos, podemos encontrar objetos que son iterables o array-like, o ambos.

Por ejemplo, las cadenas son iterables (for..of funciona en ellas) y array-like (tienen índices numéricos y length).

Pero un iterable puede que no sea array-like. Y viceversa, un array-like puede no ser iterable.

Por ejemplo, range en el ejemplo anterior es iterable, pero no es array-like porque no tiene propiedades indexadas ni length.

Y aquí el objeto tiene forma de matriz, pero no es iterable:

```
let arrayLike = { // tiene índices y longitud => array-like
  0: "Hola",
  1: "Mundo",
  length: 2
};

// Error (sin Symbol.iterator)
for (let item of arrayLike) {}
```

Tanto los iterables como los array-like generalmente no son arrays, no tienen “push”, “pop”, etc. Eso es bastante inconveniente si tenemos un objeto de este tipo y queremos trabajar con él como con una matriz. P.ej. nos gustaría trabajar con range utilizando métodos de matriz. ¿Cómo lograr eso?

<h2 style='color: green'>Resumen</h2>

Los objetos que se pueden usar en for..of se denominan iterables.

Técnicamente, los iterables deben implementar el método llamado Symbol.iterator.
El resultado de `obj[Symbol.iterator]()` se llama iterador. Maneja el proceso de iteración adicional.

Un iterador debe tener el método llamado next() que devuelve un objeto {done: Boolean, value: any}, donde done: true marca el fin de la iteración; de lo contrario, value es el siguiente valor.

El método Symbol.iterator se llama automáticamente por for..of, pero también podemos llamarlo directamente.

Los iterables integrados, como cadenas o matrices, también implementan Symbol.iterator.

El iterador de cadena es capaz de manejar los pares sustitutos.

Los objetos que tienen propiedades indexadas y longitud o length se llaman array-like. Dichos objetos también pueden tener otras propiedades y métodos, pero carecen de los métodos integrados de las matrices.

Si miramos dentro de la especificación, veremos que la mayoría de los métodos incorporados suponen que funcionan con iterables o array-likes en lugar de matrices “reales”, porque eso es más abstracto.

Array.from (obj[, mapFn, thisArg]) crea un verdadero Array de un obj iterable o array-like, y luego podemos usar métodos de matriz en él. Los argumentos opcionales mapFn y thisArg nos permiten aplicar una función a cada elemento.

# `Generadores`

Las funciones regulares devuelven solo un valor único (o nada).

Los generadores pueden producir (“`yield`”) múltiples valores, uno tras otro, a pedido. Funcionan muy bien con los iterables, permitiendo crear flujos de datos con facilidad.

# `Funciones Generadoras`

Para crear un generador, necesitamos una construcción de sintaxis especial: function\*, la llamada “función generadora”.

Se parece a esto:

```
function* generateSequence() {
  yield 1;
  yield 2;
  return 3;
}
```

Las funciones generadoras se comportan de manera diferente a las normales. Cuando se llama a dicha función, no ejecuta su código. En su lugar, devuelve un objeto especial, llamado “objeto generador”, para gestionar la ejecución.

El método principal de un generador es `next()`. Cuando se llama, se ejecuta hasta la declaración `yield` `<value>` más cercana (se puede omitir value, entonces será undefined). Luego, la ejecución de la función se detiene y el value obtenido se devuelve al código externo.

El resultado de `next()` es siempre un objeto con dos propiedades:

- `value`: el valor de `yield`.

- `done`: true si el código de la función ha terminado, de lo contrario false.

Por ejemplo, aquí creamos el generador y obtenemos su primer valor yield:

```
function* generateSequence() {
  yield 1;
  yield 2;
  return 3;
}

let generator = generateSequence();

let one = generator.next();

alert(JSON.stringify(one)); // {value: 1, done: false}
```

<h2 style='color: red'>Nota</h2>

`¿function* f(…) o function *f(…)?`
Ambas sintaxis son correctas.

Pero generalmente se prefiere la primera sintaxis, ya que la estrella `*` denota que es una función generadora, describe el tipo, no el nombre, por lo que debería seguir a la palabra clave function.

# `Los Generadores son iterables`

Como probablemente ya adivinó mirando el método next(), los generadores son iterables.

Podemos recorrer sus valores usando for..of:

```
function* generateSequence() {
  yield 1;
  yield 2;
  return 3;
}

let generator = generateSequence();

for(let value of generator) {
  alert(value); // 1, then 2
}
```

Parece mucho mejor que llamar a .next().value, ¿verdad?

… Pero tenga en cuenta: el ejemplo anterior muestra 1, luego2, y eso es todo. ¡No muestra 3!

Es porque la iteración for..of ignora el último value, cuando done: true. Entonces, si queremos que todos los resultados se muestren con for..of, debemos devolverlos con yield.

# `Usando generadores para iterables`

Hace algún tiempo, en el capítulo Iterables creamos un objeto iterable range que devuelve valores from..to.

Recordemos el código aquí:

```
let range = {
  from: 1,
  to: 5,

  // for..of range llama a este método una vez al principio
  [Symbol.iterator]() {
    // ...devuelve el objeto iterador:
    // en adelante, for..of funciona solo con ese objeto, solicitándole los siguientes valores
    return {
      current: this.from,
      last: this.to,

      // next() es llamado en cada iteración por el bucle for..of
      next() {
        // debería devolver el valor como un objeto {done:.., value :...}
        if (this.current <= this.last) {
          return { done: false, value: this.current++ };
        } else {
          return { done: true };
        }
      }
    };
  }
};

// iteración sobre range devuelve números desde range.from  a range.to
alert([...range]); // 1,2,3,4,5
```

Podemos utilizar una función generadora para la iteración proporcionándola como Symbol.iterator.

Este es el mismo range, pero mucho más compacto:

```
let range = {
  from: 1,
  to: 5,

  *[Symbol.iterator]() { // una taquigrafía para [Symbol.iterator]: function*()
    for(let value = this.from; value <= this.to; value++) {
      yield value;
    }
  }
};

alert( [...range] ); // 1,2,3,4,5
```

Eso funciona, porque range`[Symbol.iterator]()` ahora devuelve un generador, y los métodos de generador son exactamente lo que espera for..of:

- tiene un método .next()

- que devuelve valores en la forma {value: ..., done: true/false}

<h2 style='color: red'>Nota</h2>

## `Los generadores pueden generar valores para siempre`

En los ejemplos anteriores, generamos secuencias finitas, pero también podemos hacer un generador que produzca valores para siempre. Por ejemplo, una secuencia interminable de números pseudoaleatorios.

Eso seguramente requeriría un break (o return) en for..of sobre dicho generador. De lo contrario, el bucle se repetiría para siempre y se colgaría.

# `Composición del generador`

La composición del generador es una característica especial de los generadores que permite “incrustar” generadores entre sí de forma transparente.

Por ejemplo, tenemos una función que genera una secuencia de números:

```
function* generateSequence(start, end) {
  for (let i = start; i <= end; i++) yield i;
}
```

Ahora nos gustaría reutilizarlo para generar una secuencia más compleja:

- primero, dígitos 0..9 (con códigos de caracteres 48…57),

- seguido de letras mayúsculas del alfabeto A..Z (códigos de caracteres 65…90)

- seguido de letras del alfabeto en minúscula a..z (códigos de carácter 97…122)

Podemos usar esta secuencia, p. Ej. para crear contraseñas seleccionando caracteres de él (también podría agregar caracteres de sintaxis), pero vamos a generarlo primero.

En una función regular, para combinar los resultados de muchas otras funciones, las llamamos, almacenamos los resultados y luego nos unimos al final.

[Mas Informacion](https://es.javascript.info/generators)

<h2 style='color: green'>Resumen</h2>

- Los generadores son creados por funciones generadoras function\* f(…) {…}.

- Dentro de los generadores (solo) existe un operador yield.

- El código externo y el generador pueden intercambiar resultados a través de llamadas next/yield.

En JavaScript moderno, los generadores rara vez se utilizan. Pero a veces son útiles, porque la capacidad de una función para intercambiar datos con el código de llamada durante la ejecución es bastante única. Y, seguramente, son geniales para hacer objetos iterables.

Además, en el próximo capítulo aprenderemos los generadores asíncronos, que se utilizan para leer flujos de datos generados asincrónicamente (por ejemplo, recuperaciones paginadas a través de una red) en bucles for await ... of.

En la programación web, a menudo trabajamos con datos transmitidos, por lo que ese es otro caso de uso muy importante.

# `Iteradores y generadores asíncronos`

Los iteradores asíncronos nos permiten iterar sobre los datos que vienen de forma asíncrona, en una petición. Como, por ejemplo, cuando descargamos algo por partes a través de una red. Y los generadores asíncronos lo hacen aún más conveniente.

Veamos primero un ejemplo simple, para comprender la sintaxis y luego revisar un caso de uso de la vida real.

# `Repaso de iterables`

Repasemos el tópico acerca de iterables.

La idea es que tenemos un objeto, tal como range aquí:

```
let range = {
  from: 1,
  to: 5
};
```

…Y queremos usar un bucle for..of en él, tal como for(value of range), para obtener valores desde 1 hasta 5.

En otras palabras, queremos agregar la habilidad de iteración al objeto.

Eso puede ser implementado usando un método especial con el nombre Symbol.iterator:

- Este método es llamado por la construcción for..of cuando comienza el bucle, y debe devolver un objeto con el método next.

- Para cada iteración, el método next() es invocado para el siguiente valor.

- El next() debe devolver un valor en el formato {done: true/false, value:`   `}, donde done:true significa el fin del bucle.

# `Iteradores asíncronos`

La iteración asincrónica es necesaria cuando los valores vienen asincrónicamente: después de setTimeout u otra clase de retraso.

El caso más común es un objeto que necesita hacer un pedido sobre la red para enviar el siguiente valor, veremos un ejemplo de la vida real algo más adelante.

Para hacer un objeto iterable asincrónicamente:

- Use Symbol.asyncIterator en lugar de Symbol.iterator.

- El método next() debe devolver una promesa (a ser cumplida con el siguiente valor).

  La palabra clave async lo maneja, nosotros simplemente hacemos async next().

- Para iterar sobre tal objeto, debemos usar un bucle for await (let item of iterable).

  Note la palabra await.

Como ejemplo inicial, hagamos iterable un objeto range object, similar al anterior, pero ahora devolverá valores asincrónicamente, uno por segundo.

Todo lo que necesitamos hacer es algunos reemplazos en el código de abajo:

```
let range = {
  from: 1,
  to: 5,

  [Symbol.asyncIterator]() { // (1)
    return {
      current: this.from,
      last: this.to,

      async next() { // (2)

        // nota: podemos usar "await" dentro de el async next:
        await new Promise(resolve => setTimeout(resolve, 1000)); // (3)

        if (this.current <= this.last) {
          return { done: false, value: this.current++ };
        } else {
          return { done: true };
        }
      }
    };
  }
};

(async () => {

  for await (let value of range) { // (4)
    alert(value); // 1,2,3,4,5
  }

})()
```

Como podemos ver, la estructura es similar a un iterador normal:

- Para hacer que un objeto sea asincrónicamente iterable, debe tener un método Symbol.asyncIterator (1).

- Este método debe devolver el objeto con el método next() retornando una promesa (2).

- El método next() no tiene que ser async, puede ser un método normal que devuelva una promesa, pero async nos permite usar await, entonces, es más conveniente. Aquí solo nos demoramos un segundo. (3).

- Para iterar, nosotros usamos for await(let value of range) (4), es decir, agregar “await” y después “for”. Llama range[Symbol.asyncIterator]() una vez, y luego next() para los valores.

# `Repaso de generators`

Ahora repasemos generators, que permiten una iteración mucho más corta. La mayoría de las veces, cuando queramos hacer un iterable, usaremos generators.

Para simplicidad, omitiendo cosas importantes, son “funciones que generan (yield) valores”. Son explicados en detalle en el capítulo Generadores.

Los generators son etiquetados con function\* (nota el asterisco) y usa yield para generar un valor, entonces podemos usar el bucle for..of en ellos.

Este ejemplo genera una secuencia de valores desde start hasta end:

```
function* generateSequence(start, end) {
  for (let i = start; i <= end; i++) {
    yield i;
  }
}

for(let value of generateSequence(1, 5)) {
  alert(value); // 1, luego 2, luego 3, luego 4, luego 5
}
```

# `Generadores asíncronos (finalmente)`

Para aplicaciones más prácticas, cuando queremos hacer un objeto que genere una secuencia de valores asincrónicamente, podemos usar un generador asincrónico.

La sintaxis es simple: anteponga async a function\*. Esto hace al generador asincrónico.

Entonce usamos for await (...) para iterarlo, como esto:

```
async function* generateSequence(start, end) {

  for (let i = start; i <= end; i++) {

    // si, ¡puede usar await!
    await new Promise(resolve => setTimeout(resolve, 1000));

    yield i;
  }

}

(async () => {

  let generator = generateSequence(1, 5);
  for await (let value of generator) {
    alert(value); // 1, luego 2, luego 3, luego 4, luego 5 (con retraso entre ellos)
  }

})();

```

# `Range asincrónico iterable`

Generadores regulares pueden ser usados como Symbol.iterator para hacer la iteración más corta.

Similarmente los generadores async pueden ser usados como `Symbol.asyncIterator` para implementar iteración asincrónica.

Por ejemplo, podemos hacer que el objeto range genere valores asincrónicamente, una vez por segundo, reemplazando el Symbol.iterator sincrónico con el asincrónico `Symbol.asyncIterator`:

```
let range = {
  from: 1,
  to: 5,

  // esta línea es la misma que [Symbol.asyncIterator]: async function*() {
  async *[Symbol.asyncIterator]() {
    for(let value = this.from; value <= this.to; value++) {

      // hacer una pausa entre valores, esperar algo
      await new Promise(resolve => setTimeout(resolve, 1000));

      yield value;
    }
  }
};

(async () => {

  for await (let value of range) {
    alert(value); // 1, luego 2, luego 3, luego 4, luego 5
  }

})();
```

[Mas Informacion](https://es.javascript.info/async-iterators-generators#ejemplo-de-la-vida-real-datos-paginados)

<h2 style="color: green">Resumen</h2>

Los iteradores y generadores normales funcionan bien con los datos que no llevan tiempo para ser generados.

Cuando esperamos que los datos lleguen de forma asíncrona, con demoras, se pueden usar sus contrapartes asíncronas, y `for await..of` en lugar de ` `.

Diferencias sintácticas entre iteradores asíncronos y normales:
