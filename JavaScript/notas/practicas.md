[Volver al Menú](../root.md)

# `Notas de Ejercicios `

## `Acostumbrarme a usar map con filter seguido o cualquier otro por ejemplo`

```bash
return [
    ...new Set([...a1, ...a2, ...a3])]
      .filter(gift =>
        a1.includes(gift) +
        a2.includes(gift) +
        a3.includes(gift)
        === 1
    )
```

## `Palindrome`

```bash
function(param){ //typeof param == string
    return param == param.split('').reverse().join('');
}
```

```bash
const palindrome = (str) => {
  let left = 0;
  let right = str.length - 1;

  while (left < right) {
    if (str[left] != str[right]) {
          return false;
    }
      left++;
      right--;
  }
  return true;
}
```

## `Los strings son inmutables`

Los strings no pueden ser modificados en JavaScript. Es imposible modificar un carácter.

## `Ordenar Array de numeros con sort();`

```bash
let arr = [ 100, 2, 15 ];

arr.sort((a,b)=>a-b); // b-a es de mayor a menor

alert(arr);  // 2, 15, 100
```

## `Determinar cual de los 3 numeros es distinto, hay 2 seguros siempre que son iguales`

```bash
function solution(a, b, c) {
    return (a^b)^c
}
```

Se usa Operadores Bitwise `(^)`

## `Se pueden juntar varias veces los operadores logicos` `||` y `&&`

```bash
function solution(score1, score2) {
    let max = Math.max(score1,score2);
    let min = Math.min(score1,score2);
    if(max == 6 && min <=4 || max == 7 && min ==5 || max == 7 && min ==6) return true;
    return false;
}
```

## `Binario a decimal`

```bash
parseInt(111110100,2); //500
```

## `Decimal a binario`

```bash
500..toString(2); //111110100
```

## `Sumar los numeros uno por uno hasta llegar al n dado (usando recursividad)`

```bash
function sumTo(n) {
   return n==1 ? 1 : n + sumTo(n-1);
 }

alert( sumTo(100) ); // 5050
```

### `Lo mismo pero con la formula matematica`

```bash
function sumTo(n) {
  return n * (n + 1) / 2;
}

alert( sumTo(100) );
```

## `Factorial de un numero (usando recursividad)`

```bash
function factorial(n) {
   return n==1 ? 1 : n * factorial(n-1);
 }

alert( factorial(5) ); //120
```

## `Fibonacci (usando recursividad) `

```bash
const fibonacci = (n) =>{
  if (n === 0) return 0
  if (n === 1) return 1
  return fibonacci(n-1) + fibonacci(n-2)
}
```

## `Fibonacci (sin recursividad) `

```bash
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

## `Ver si un objeto tiene una propiedad y de paso es thrusty`

```bash
if (typeof a[b] === 'undefined') return false;
```

## `Pasar objeto set a array con rest muy facil`

```bash
function myFunction(set) {
  return [...set];
}
```

## `Ver si en un array todos los elementos son iguales`

```bash
function myFunction( arr ) {
  return new Set(arr).size === 1
}
```

## `Usar for of para iterar arrays y objetos set`

```bash
function sumAll(...args) { // args es el nombre del array
  let sum = 0;

  for (let arg of args) sum += arg;

  return sum;
}
```

## `Contar numero de ocurrencias de un item dentro de un array y crear un objeto con el item como key y el value con el numero de ocurrencia`

```bash
var array = [4,1,2,1,1,3,45,13,42,52,45,25,13,40,13,2];

var repetidos = {};

array.forEach(function(numero){
  repetidos[numero] = (repetidos[numero] || 0) + 1;
});
```

## `Por favor tener en cuenta que sort, reverse y splice modifican el propio array`

## `La formula de las torres de hanoi es (2**n )- 1`

## `Comparar fechas con getTime()`

## `Copiar un objeto con spread operator, tambien se puede con object.assign() y object.create()`

```bash
let obj = { a: 1, b: 2, c: 3 };

let objCopy = { ...obj };
```

## `Caulcular timepos si son menor a 7 horas sobra si no falta`

```bash
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

## `Roman to integer`

```bash
var romanToInt = function(s) {
    let result = 0;
    const roman = {
        'I': 1,
        'V': 5,
        'X': 10,
        'L': 50,
        'C': 100,
        'D': 500,
        'M': 1000
    }
    for (let i = 0; i < s.length; i++) {
        let item1 = roman[s[i]], item2 = roman[s[i + 1]];
        if (item1 < item2) {
            result += item2 - item1;
            i++;
        } else {
            result += item1;
        }
    }
    return result;
};
```

## `Two Pointers`

[Problem](https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/description/)

```bash
var twoSum = function(nums, target) {
    let l = 0;
  for (let r = nums.length - 1; l < r; r--) {
    while (l < r) {
      if ((nums[l] + nums[r]) === target) {
        return [l, r];
      }
      l++;
    }
    l = 0;
  }
};

twoSum([-1,-2,-3,-4,-5], -8)
twoSum([3,2,4], 6)
twoSum([2, 7, 11, 15], 9)
```

## `Fast and Slow Pointers`

[Problem](https://leetcode.com/problems/middle-of-the-linked-list/)

```bash
var middleNode = function(head) {
    let fastPointer = head, slowPointer = head;
    while(fastPointer !== null && fastPointer.next !== null){
        fastPointer = fastPointer.next.next;
        slowPointer = slowPointer.next;
    }
    return slowPointer;
};
```

## `Sliding Window`

[Problem](https://leetcode.com/problems/maximum-average-subarray-i/)

```bash
var findMaxAverage = function(nums, k) {
  let temp = 0;
  for (let i = 0; i < k; i++) {
    temp += nums[i];
  }

  let result = temp;

  for (let i = k; i < nums.length; i++) {
    temp = temp - nums[i - k] + nums[i];
    result = Math.max(result, temp);
  }
  return result / k;
};
```

## `LinkedList In-place Reversal`

[Problem](https://leetcode.com/problems/swap-nodes-in-pairs/description/)

```bash
var swapPairs = function(head) {
    let curr = head, dummy = new ListNode(0, head), prev = dummy;

    while(curr !== null && curr.next !== null){
        let longNext = curr.next.next;
        let next = curr.next;

        next.next = curr;
        curr.next = longNext;
        prev.next = next;

        prev = curr;
        curr = longNext;
    }

    return dummy.next;
};
```

## `Monotonic Stack`

[Problem](https://leetcode.com/problems/daily-temperatures/)

```bash
var dailyTemperatures = function(temperatures) {
    const stack = [];
    const result = new Array(temperatures.length).fill(0);

    for (let i = 0; i < temperatures.length; i++) {
        while (stack.length > 0 && temperatures[i] > temperatures[stack[stack.length - 1]]) {
            const idx = stack.pop();
            result[idx] = i - idx;
        }
        stack.push(i);
    }

    return result;
};
```

## `Overlapping Intervals`

[Problem](https://leetcode.com/problems/merge-intervals/description/)

```bash
var merge = function(intervals) {

    intervals.sort((a, b) => a[0] - b[0]);
    const merged = [];
    let prev = intervals[0];

    for (let i = 1; i < intervals.length; i++) {
        let interval = intervals[i];
        if (interval[0] <= prev[1]) {
            prev[1] = Math.max(prev[1], interval[1]);
        } else {
            merged.push(prev);
            prev = interval;
        }
    }

    merged.push(prev);
    return merged;
};
```

## `Modified Binary Search`

[Problem](https://leetcode.com/problems/search-in-rotated-sorted-array/description/)

```bash
var search = function(nums, target) {
    let left = 0;
    let right = nums.length - 1;

    while (left <= right) {
        let mid = Math.floor((left + right) / 2);

        if (nums[mid] === target) {
            return mid;
        } else if (nums[mid] >= nums[left]) {
            if (nums[left] <= target && target <= nums[mid]) {
                right = mid - 1;
            } else {
                left = mid + 1;
            }
        } else {
            if (nums[mid] <= target && target <= nums[right]) {
                left = mid + 1;
            } else {
                right = mid - 1;
            }
        }
    }

    return -1;
};
```

# `PreOrder Tree`

[Problem](https://leetcode.com/problems/binary-tree-paths/)

```bash
var binaryTreePaths = function(root) {
  let result = [];

  const preOrderTraversal = (root, temp) => {
    if(!root) return;
    temp += `${root.val}`;

    if(!root.left && !root.rigth) result.push(temp);

    preOrderTraversal(root.left, temp+'->');
    preOrderTraversal(root.rigth, temp+'->');

    return;
  }

  preOrderTraversal(root, '')
  return result;
};
```

# `Pendientes`

- reverseInParentheses
- almostIncreasingSequence

[TOP](#notas-de-ejercicios)
