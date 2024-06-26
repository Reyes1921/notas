[Volver al Menú](../root.md)

# `Notas de Ejercicios `

## - `Acostumbrarme a usar map con filter seguido o cualquier otro por ejemplo`

```
return [
    ...new Set([...a1, ...a2, ...a3])]
      .filter(gift =>
        a1.includes(gift) +
        a2.includes(gift) +
        a3.includes(gift)
        === 1
    )
```

## - `Palindrome`

```
function(param){ //typeof param == string
    return param == param.split('').reverse().join('');
}
```

## - `Math.max(...arr)`

## - `Los strings son inmutables`

Los strings no pueden ser modificados en JavaScript. Es imposible modificar un carácter.

## - `Ordenar Array de numeros con sort();`

```
let arr = [ 100, 2, 15 ];

arr.sort((a,b)=>a-b); // b-a es de mayor a menor

alert(arr);  // 2, 15, 100
```

## - `Determinar cual de los 3 numeros es distinto, hay 2 seguros siempre que son iguales`

```
function solution(a, b, c) {
    return (a^b)^c
}
```

Se usa Operadores Bitwise `(^)`

## `Se pueden juntar varias veces los operadores logicos` `||` y `&&`

```
function solution(score1, score2) {
    let max = Math.max(score1,score2);
    let min = Math.min(score1,score2);
    if(max == 6 && min <=4 || max == 7 && min ==5 || max == 7 && min ==6) return true;
    return false;
}
```

## `Binario a decimal`

```
parseInt(111110100,2); //500
```

## `Decimal a binario`

```
500..toString(2); //111110100
```

## - `Sumar los numeros uno por uno hasta llegar al n dado (usando recursividad)`

```
function sumTo(n) {
   return n==1 ? 1 : n + sumTo(n-1);
 }

alert( sumTo(100) ); // 5050
```

### `Lo mismo pero con la formula matematica`

```
function sumTo(n) {
  return n * (n + 1) / 2;
}

alert( sumTo(100) );
```

## - `Factorial de un numero (usando recursividad)`

```
function factorial(n) {
   return n==1 ? 1 : n * factorial(n-1);
 }

alert( factorial(5) ); //120
```

## `Fibonacci (usando recursividad) `

```
const fibonacci = (n) =>{
  if (n === 0) return 0
  if (n === 1) return 1
  return fibonacci(n-1) + fibonacci(n-2)
}
```

## `Fibonacci (sin recursividad) `

```
const fibonacci = (n) =>{
  let x = 1, y = 0, aux

  while(n >= 0){
    aux = x
    x = x + y
    y = aux
    n--
  }

  return y
}
```

## - `Ver si un objeto tiene una propiedad y de paso es thrusty`

```
if (typeof a[b] === 'undefined') return false;
```

## - `Pasar objeto set a array con rest muy facil`

```
function myFunction(set) {
  return [...set];
}
```

## - `Ver si en un array todos los elementos son iguales`

```
function myFunction( arr ) {
  return new Set(arr).size === 1
}
```

## - `Usar for of para iterar arrays y objetos set`

```
function sumAll(...args) { // args es el nombre del array
  let sum = 0;

  for (let arg of args) sum += arg;

  return sum;
}
```

## - `Contar numero de ocurrencias de un item dentro de un array y crear un objeto con el item como key y el value con el numero de ocurrencia`

```
var array = [4,1,2,1,1,3,45,13,42,52,45,25,13,40,13,2];

var repetidos = {};

array.forEach(function(numero){
  repetidos[numero] = (repetidos[numero] || 0) + 1;
});
```

## - `Por favor tener en cuenta que sort, reverse y splice modifican el propio array`

## - `La formula de las torres de hanoi es (2**n )- 1`

## - `Comparar fechas con getTime()`

## - `Copiar un objeto con spread operator, tambien se puede con object.assign() y object.create()`

```
let obj = { a: 1, b: 2, c: 3 };

let objCopy = { ...obj };
```

## - `Caulcular timepos si son menor a 7 horas sobra si no falta`

```
function calculateTime(deliveries) {
  const signo = {true:'-', false:''}
  let time = 7*3600

  for(const delivery of deliveries){
    const [hours,minutes,seconds] = delivery.split(':')
    time += - hours*3600 - minutes*60 - seconds
  }
  const bool = time > 0
  time = Math.abs(time)

  const seconds = time%60
  const minutes = Math.trunc(time/60)%60
  const hours = (Math.trunc(time/60)-minutes)/60


  const formated_time = `${hours}`.padStart(2,'0') + ':'
                        +`${minutes}`.padStart(2,'0')+ ':'
                        +`${seconds}`.padStart(2,'0')

  return  signo[bool] + formated_time
}
```

- ## `Hora en formato hh:mm:ss cuando se tienen los segundos`

```
const telLTime = (segundos) =>{
  let seconds = segundos % 60,
      minutes = Math.trunc(time/60)%60
      hours = (Math.trunc(time/60)-minutes)/60


      // minutes = Math.floor((segundos % 3600) / 60)
      // hours = Math.floor(segundos / 3600)
  return `${hours}`.padStart(2,'0') + ':' + `${minutes}`.padStart(2,'0') + ':' + `${seconds}`.padStart(2,'0')
}
```

# - `Pendientes`

- reverseInParentheses
- almostIncreasingSequence

[TOP](#notas-de-ejercicios)
