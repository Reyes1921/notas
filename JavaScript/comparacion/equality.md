[Volver al Menú](../root.md)

# Equality Comparisons

# `==`

In javascript, the `==` operator does the type conversion of the operands before comparison

# ``===``

Strict equality compares two values for equality. Neither value is implicitly converted to some other value before being compared. If the values have different types, the values are considered unequal. If the values have the same type, are not numbers, and have the same value, they're considered equal. Finally, if both values are numbers, they're considered equal if they're both not NaN and are the same value, or if one is +0 and one is -0.

# `ES RECOMENDABLE SIEMPRE USAR ===`

# ``Object.is()``

The `Object.is()` method determines whether two values are the same value: ``` Object.is(value1, value2)```

`Object.is()` is not equivalent to the == operator. The == operator applies various coercions to both sides (if they are not the same type) before testing for equality (resulting in such behavior as "" == false being true), but `Object.is()` doesn't coerce either value.

`Object.is() `is also not equivalent to the === operator. The only difference between `Object.is()` and === is in their treatment of signed zeros and NaN values. The === operator (and the == operator) treats the number values -0 and +0 as equal but treats NaN as not equal to each

# `Curiosidades`

``` 
[] == [] // false
[] == ![] // true

{} == {} // false
{} == !{} // false

[] == ![] // true
[] == false // true

{} == !{} // false
{} == false // false

[] == false // true
```

# `Equality algorithms`

Equality algorithms are used to perform equality comparisons of values or variables in JavaScript. Each equality algorithm works slightly differently, and the one you use depends on the type of comparison you want to make.

## `isLooselyEqual`

The equality operators (== and !=) provide the `IsLooselyEqual` semantic. This can be roughly summarized as follows:


- Si los operandos ambos son objetos, devuelve true solo si ambos operandos hacen referencia al mismo objeto.

- Si un operando es null y el otro undefined, devuelve verdadero(true).

- Si los operandos son de diferente tipos, intenta convertirlos al mismo tipo antes de comparar:

Al comparar un número con una cadena, convierte la cadena en un valor numérico.

Si uno de los operandos es booleano, convierte el operando booleano en 1 si es verdadero y en 0 en el caso de falso.

Si uno de los operandos es un objeto y el otro es un número o una cadena, convierte el objeto en una primitiva utilizando los métodos valueOf() y toString() del objeto.

- Si los operandos tienen el mismo tipo, se comparan de la siguiente manera:

`String`: devuelve verdadero solo si ambos operandos tienen los mismos caracteres y en el mismo orden.

`Number`: devuelve verdadero solo si ambos operandos tienen el mismo valor. +0 y -0 se tratan como el mismo valor. Si alguno de los operandos es NaN, devuelve falso.

`Boolean`: retorna verdadero solo si ambos operandos son verdaderos o falsos.

La diferencia más notable entre este operador y el operador de igualdad estricta (===) es que el operador de igualdad estricta no realiza la conversión de tipos.

## `isStrictlyEqual`

The strict equality operators (=== and !==) provide the `IsStrictlyEqual` semantic.

- Si los operandos son de diferente tipo de valor, produce false.
- Si ambos operandos son objetos, produce true solo si se refiere al mismo objeto.
- Si ambos operandos son de tipo null o ambos operandos son undefined, produce true.
- Si cualquier operando es de tipo NaN, produce false.
- En otros casos, compara los valores de ambos operandos:


Los números deben tener el mismo valor numérico, aunque +0 y -0 son considerados como del mismo valor.

Los strings deben tener los mismos caracteres en el mismo orden.

Los booleanos deben ambos ser true o ambos ser false.

La diferencia más notable entre este operador y el operador de igualdad regular (==) es que si los operandos son de distinto tipo de valor, el operador == intenta convertir los valores a un mismo tipo de dato antes de compararlos.

## `Same value`

`SameValue` equality determines whether two values are functionally identical in all contexts. It performs the following steps when called:

1. If Type(x) is different from Type(y), return false.

2. If x is a Number, then

a. Return Number::sameValue(x, y).

3. Return SameValueNonNumber(x, y).

## `Same-value-zero equality`

Similar to `same-value equality`, but +0 and -0 are considered equal.

`Same-value-zero` equality is not exposed as a JavaScript API, but can be implemented with custom code:
```
function sameValueZero(x, y) {
  if (typeof x === "number" && typeof y === "number") {
    // x and y are equal (may be -0 and 0) or they are both NaN
    return x === y || (x !== x && y !== y);
  }
  return x === y;
}
```

`Same-value-zero` only differs from strict equality by treating NaN as equivalent, and only differs from `same-value equality` by treating -0 as equivalent to 0. This makes it usually have the most sensible behavior during searching, especially when working with NaN. It's used by Array.prototype.includes(), TypedArray.prototype.includes(), as well as Map and Set methods for comparing key equality.

[TOP](#equality-comparisons)