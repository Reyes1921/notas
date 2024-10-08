[Volver al Menú](../root.md)

# `TypeScript Functions`

Functions are a core building block in TypeScript. Functions allow you to wrap a piece of code and reuse it multiple times. Functions in TypeScript can be either declared using function declaration syntax or function expression syntax.

---

# `Typing Functions`

## `Function Type Expressions`

The simplest way to describe a function is with a function type expression. These types are syntactically similar to arrow functions:

```bash
function greeter(fn: (a: string) => void) {
  fn("Hello, World");
}

function printToConsole(s: string) {
  console.log(s);
}

greeter(printToConsole);
```

The syntax (a: string) => void means “a function with one parameter, named a, of type string, that doesn’t have a return value”. Just like with function declarations, if a parameter type isn’t specified, it’s implicitly any.

Of course, we can use a type alias to name a function type:

```bash
type GreetFunction = (a: string) => void;
function greeter(fn: GreetFunction) {
  // ...
}
```

## `Construct Signatures`

JavaScript functions can also be invoked with the new operator. TypeScript refers to these as constructors because they usually create a new object. You can write a construct signature by adding the new keyword in front of a call signature:

```bash
type SomeConstructor = {
  new (s: string): SomeObject;
};
function fn(ctor: SomeConstructor) {
  return new ctor("hello");
}
```

## `Generic Functions`

It’s common to write a function where the types of the input relate to the type of the output, or where the types of two inputs are related in some way. Let’s consider for a moment a function that returns the first element of an array:

```bash
function firstElement(arr: any[]) {
  return arr[0];
}
```

This function does its job, but unfortunately has the return type any. It’d be better if the function returned the type of the array element.

In TypeScript, generics are used when we want to describe a correspondence between two values. We do this by declaring a type parameter in the function signature:

```bash
function firstElement<Type>(arr: Type[]): Type | undefined {
  return arr[0];
}
```

## `Specifying Type Arguments`

TypeScript can usually infer the intended type arguments in a generic call, but not always. For example, let’s say you wrote a function to combine two arrays:

```bash
function combine<Type>(arr1: Type[], arr2: Type[]): Type[] {
  return arr1.concat(arr2);
}
```

Normally it would be an error to call this function with mismatched arrays:

```bash
const arr = combine([1, 2, 3], ["hello"]);
Type 'string' is not assignable to type 'number'.
```

If you intended to do this, however, you could manually specify Type:

```bash
const arr = combine<string | number>([1, 2, 3], ["hello"]);
```

## `Optional Parameters`

Functions in JavaScript often take a variable number of arguments. For example, the toFixed method of number takes an optional digit count:

```bash
function f(n: number) {
  console.log(n.toFixed()); // 0 arguments
  console.log(n.toFixed(3)); // 1 argument
}
```

We can model this in TypeScript by marking the parameter as optional with ?:

```bash
function f(x?: number) {
  // ...
}
f(); // OK
f(10); // OK
```

## `Function declaration with types`

```bash
function add(a: number, b: number): number {
  return a + b;
}
```

## `Arrow function with types`

```bash
const multiply = (a: number, b: number): number => {
  return a * b;
};
```

## `Function type`

```bash
let divide: (a: number, b: number) => number;

divide = (a, b) => {
  return a / b;
};
```

---

# `Function Overloading`

Function Overloading in TypeScript allows multiple functions with the same name but with different parameters to be defined. The correct function to call is determined based on the number, type, and order of the arguments passed to the function at runtime.

```bash
function add(a: number, b: number): number;
function add(a: string, b: string): string;

function add(a: any, b: any): any {
  return a + b;
}

console.log(add(1, 2)); // 3
console.log(add('Hello', ' World')); // "Hello World"
```

[TOP](#typescript-functions)
