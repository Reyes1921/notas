[Volver al Menú](../root.md)

# `Typescript Types`


TypeScript has several built-in types, including:

- `number`
- `string`
- `boolean`
- `any`
- `void`
- `null and undefined`
- `never`
- `object`
- `symbol`
- `Enumerated types (enum)`
- `Tuple types`
- `Array types`
- `Union types`
- `Intersection types`
- `Type aliases`
- `Type assertions`

---

# `Primitive Types`

## `boolean`

```
let isTrue: boolean = true;
let isFalse: boolean = false;
```

## `number`

```
let intValue: number = 42;
let floatValue: number = 3.14;
```

## `string`

```
let name: string = 'John Doe';
```

## `void`

`void` represents the return value of functions which don’t return a value. It’s the inferred type any time a function doesn’t have any return statements, or doesn’t return any explicit value from those return statements:

```
// The inferred return type is void
function noop() {
  return;
}
```


In JavaScript, a function that doesn’t return any value will implicitly return the value `undefined`. However, `void` and `undefined` are not the same thing in TypeScript.

`void is not the same as undefined.`

## `null and undefined`

JavaScript has two primitive values used to signal absent or uninitialized value: `null` (absent) and `undefined` (unintialized).

TypeScript has two corresponding types by the same names. How these types behave depends on whether you have the `strictNullChecks` option on.

With `strictNullChecks` off, values that might be `null` or undefined can still be accessed normally, and the values `null` and undefined can be assigned to a property of any type. This is similar to how languages without `null` checks (e.g. C#, Java) behave. The lack of checking for these values tends to be a major source of bugs; TypeScript always recommend people turn `strictNullChecks` on if it’s practical to do so in the codebase.

With `strictNullChecks` on, when a value is `null` or undefined, you will need to test for those values before using methods or properties on that value. Just like checking for undefined before using an optional property, we can use narrowing to check for values that might be `null`:

```
function doSomething(x: string | null) {
  if (x === null) {
    // do nothing
  } else {
    console.log('Hello, ' + x.toUpperCase());
  }
}
```

---

# `Object Types`


## `Interface`

TypeScript allows you to specifically type an object using an interface that can be reused by multiple objects.

```
interface Person {
  name: string;
  age: number;
}

function greet(person: Person) {
  return 'Hello ' + person.name;
}
```

## `Class`

In TypeScript, a class is a blueprint for creating objects with specific properties and methods. Classes are a fundamental concept in object-oriented programming. Here is an example of a simple class in TypeScript:

```
class Car {
  make: string;
  model: string;
  year: number;

  constructor(make: string, model: string, year: number) {
    this.make = make;
    this.model = model;
    this.year = year;
  }

  drive() {
    console.log(`Driving my ${this.year} ${this.make} ${this.model}`);
  }
}
```

## `Enum`

Enums is not a type-level extension of JavaScript. It allows a developer to define a set of named constants. Using enums can make it easier to document intent, or create a set of distinct cases. TypeScript provides both numeric and string-based enums.


### `Numeric enums`

```
enum Direction {
  Up = 1,
  Down,
  Left,
  Right,
}
```

Above, we have a numeric enum where Up is initialized with 1. All of the following members are auto-incremented from that point on. In other words, Direction.Up has the value 1, Down has 2, Left has 3, and Right has 4.

If we left off the initializer for Up, it would have the value 0 and the rest of the members would be auto-incremented from there.

### `String enums`

String enums are a similar concept, but have some subtle runtime differences as documented below. In a string enum, each member has to be constant-initialized with a string literal, or with another string enum member.

```
enum Direction {
  Up = "UP",
  Down = "DOWN",
  Left = "LEFT",
  Right = "RIGHT",
}
```

### `Heterogeneous enums`

Technically enums can be mixed with string and numeric members, but it’s not clear why you would ever want to do so:

```
enum BooleanLikeHeterogeneousEnum {
  No = 0,
  Yes = "YES",
}
```

## `Array`

To specify the type of an array like `[1, 2, 3]`, you can use the syntax number[]; this syntax works for any type (e.g.` string[]` is an array of strings, and so on). You may also see this written as `Array<number>`, which means the same thing.

```
const numbers: number[] = [1, 2, 3];

let animalesAarray: string[] = ['perro', 'gato','pato', 'vaca'];

type mixto = string | number | boolean | string[];

let datosMixtos: mixto[] = [1,2,3,4,'Hola','Chao',false];
```

## `Tuple`

A tuple type is another sort of Array type that knows exactly how many elements it contains, and exactly which types it contains at specific positions.

```
type StringNumberPair = [string, number];

const pair: StringNumberPair = ['hello', 42];

const first = pair[0];
const second = pair[1];

// Error: Index out of bounds
const third = pair[2];
```

---

# `Other Types`

## `Any (Ignora el tipado de TypeScript)`

TypeScript has a special type, any, that you can use whenever you don’t want a particular value to cause typechecking errors.

When a value is of type any, you can access any properties of it (which will in turn be of type any), call it like a function, assign it to (or from) a value of any type, or pretty much anything else that’s syntactically legal:

```
let obj: any = { x: 0 };
// None of the following lines of code will throw compiler errors.
// Using `any` disables all further type checking, and it is assumed
// you know the environment better than TypeScript.
obj.foo();
obj();
obj.bar = 100;
obj = 'hello';
const n: number = obj;
```

## `Object`

To define an `object` type, we simply list its properties and their types.

For example, here’s a function that takes a point-like object:

```
// The parameter's type annotation is an object type
function printCoord(pt: { x: number; y: number }) {
  console.log("The coordinate's x value is " + pt.x);
  console.log("The coordinate's y value is " + pt.y);
}

printCoord({ x: 3, y: 7 });
```

## `Unknown`

`unknown` is the type-safe counterpart of any. Anything is assignable to `unknown`, but `unknown` isn’t assignable to anything but itself and any without a type assertion or a control flow based narrowing. Likewise, no operations are permitted on an unknown without first asserting or narrowing to a more specific type.

```
function f1(a: any) {
  a.b(); // OK
}

function f2(a: unknown) {
  // Error: Property 'b' does not exist on type 'unknown'.
  a.b();
}
```

Here's an example of how unknown works:

```
let myVar: unknown = 0;
myVar = '1';
myVar = false;
```

In this example, you can assign any value to an unknown type variable. However, if you want to perform operations on myVar, you would need to do a type check or assertion first.

## `Never`

The `never` type represents the type of values that never occur. For instance, `never` is the return type for a function expression or an arrow function expression that always throws an exception or one that never returns. Variables also acquire the type never when narrowed by any type guards that can never be `true`.

The never type is a subtype of, and assignable to, every type; however, no type is a subtype of, or assignable to, `never` (except `never` itself). Even any isn’t assignable to `never`.

```
// Function returning never must not have a reachable end point
function error(message: string): never {
  throw new Error(message);
}

// Inferred return type is never
function fail() {
  return error('Something failed');
}

// Function returning never must not have a reachable end point
function infiniteLoop(): never {
  while (true) {}
}
```

---

# `Assertions`

Type assertions in TypeScript are a way to tell the compiler to treat a value as a specific type, regardless of its inferred type.

- The “angle-bracket” syntax: `<T>value`
- The “as” syntax: value as T

```
let num = 42;

// using angle-bracket syntax
let str = <string>num;

// using as syntax
let str2 = num as string;
```

## `As Const`

`as const` is a type assertion in TypeScript that allows you to assert that an expression has a specific type, and that its value should be treated as a read-only value.

```
const colors = ['red', 'green', 'blue'] as const;

// colors is now of type readonly ['red', 'green', 'blue']
```

Using as const allows TypeScript to infer more accurate types for constants, which can lead to improved type checking and better type inference in your code.

- no literal types in that expression should be widened (e.g. no going from "hello" to string)
- object literals get readonly properties
- array literals become readonly tuples

## `As Type`

In TypeScript, the as keyword is used for type assertions, allowing you to explicitly inform the compiler about the type of a value when it cannot be inferred automatically. Type assertions are a way to override the default static type-checking behavior and tell the compiler that you know more about the type of a particular expression than it does.

```
let someValue: any = "Hello, TypeScript!";
let strLength: number = (someValue as string).length;

console.log(strLength); // Outputs: 20
```

n this example, someValue is initially of type any, and we use the as operator to assert that it is of type string before accessing its length property. It’s important to note that type assertions do not change the underlying runtime representation; they are a compile-time construct used for static type checking in TypeScript.

## `As Any`

`any` is a special type in TypeScript that represents a value of any type. When a value is declared with the any type, the compiler will not perform any type checks or type inference on that value.

```
let anyValue: any = 42;

// we can assign any value to anyValue, regardless of its type
anyValue = 'Hello, world!';
anyValue = true;
```

## `Non Null Assertion`

The non-null assertion operator (!) is a type assertion in TypeScript that allows you to tell the compiler that a value will never be null or undefined.

```
let name: string | null = null;

// we use the non-null assertion operator to tell the compiler that name will never be null
let nameLength = name!.length;
```

The non-null assertion operator is used to assert that a value is not null or undefined, and to tell the compiler to treat the value as non-nullable. However, it’s important to be careful when using the non-null assertion operator, as it can lead to runtime errors if the value is actually `null` or `undefined`.

## `satisfies Keyword`

TypeScript developers are often faced with a dilemma: we want to ensure that some expression matches some type, but also want to keep the most specific type of that expression for inference purposes.

```
// Each property can be a string or an RGB tuple.
const palette = {
  red: [255, 0, 0],
  green: '#00ff00',
  bleu: [0, 0, 255],
  //  ^^^^ sacrebleu - we've made a typo!
};

// We want to be able to use array methods on 'red'...
const redComponent = palette.red.at(0);

// or string methods on 'green'...
const greenNormalized = palette.green.toUpperCase();
```

`Notice` that we’ve written bleu, whereas we probably should have written blue. We could try to catch that bleu typo by using a type annotation on palette, but we’d lose the information about each property.

```
type Colors = 'red' | 'green' | 'blue';
type RGB = [red: number, green: number, blue: number];

const palette: Record<Colors, string | RGB> = {
  red: [255, 0, 0],
  green: '#00ff00',
  bleu: [0, 0, 255],
  //  ~~~~ The typo is now correctly detected
};
// But we now have an undesirable error here - 'palette.red' "could" be a string.
const redComponent = palette.red.at(0);
```

The `satisfies` operator lets us validate that the type of an expression matches some type, without changing the resulting type of that expression. As an example, we could use `satisfies` to validate that all the properties of palette are compatible with `string | number[]`:

```
type Colors = 'red' | 'green' | 'blue';
type RGB = [red: number, green: number, blue: number];

const palette = {
  red: [255, 0, 0],
  green: '#00ff00',
  bleu: [0, 0, 255],
  //  ~~~~ The typo is now caught!
} satisfies Record<Colors, string | RGB>;

// Both of these methods are still accessible!
const redComponent = palette.red.at(0);
const greenNormalized = palette.green.toUpperCase();
```

[TOP](#typescript-types)
