[Volver al Menú](../root.md)

# `Type Guards / Narrowing (Embudo)`

Type guards are a way to narrow down the type of a variable. This is useful when you want to do something different depending on the type of a variable.

- `string`
- `number`
- `bigint`
- `boolean`
- `symbol`
- `undefined`
- `object`
- `function`

# `typeof `

The `typeof` operator is used to check the type of a variable. It returns a string value representing the type of the variable.

```
let value: string | number = 'hello';

if (typeof value === 'string') {
  console.log('value is a string');
} else {
  console.log('value is a number');
}
```

# `instanceof `

The `instanceof` operator is a way to narrow down the type of a variable. It is used to check if an object is an instance of a class.

```
class Bird {
  fly() {
    console.log('flying...');
  }
  layEggs() {
    console.log('laying eggs...');
  }
}

const pet = new Bird();

// instanceof
if (pet instanceof Bird) {
  pet.fly();
} else {
  console.log('pet is not a bird');
}
```

# `Equality`

TypeScript also uses switch statements and equality checks like `===`, `!==`, `==`, and `!=` to narrow types.

```
function example(x: string | number, y: string | boolean) {
  if (x === y) {
    // We can now call any 'string' method on 'x' or 'y'.
    x.toUpperCase();
    y.toLowerCase();
  } else {
    console.log(x);
    console.log(y);
  }
}
```

When we checked that `x` and `y` are both equal in the above example, TypeScript knew their types also had to be equal. Since string is the only common type that both `x` and `y` could take on, TypeScript knows that `x` and `y` must be a string in the first branch.

# `Truthiness`

Truthiness might not be a word you’ll find in the dictionary, but it’s very much something you’ll hear about in JavaScript.

In JavaScript, we can use any expression in conditionals, `&&`s, `||`s, if statements, Boolean negations (!), and more. As an example, if statements don’t expect their condition to always have the type boolean.

# `Type Predicates`

Type predicates are functions that return a boolean value. They are used to narrow the type of a variable. Type predicates are used in type guards.

```
function isString(value: unknown): value is string {
  return typeof value === 'string';
}

function example(x: unknown) {
  if (isString(x)) {
    // We can now call any 'string' method on 'x'.
    x.toUpperCase();
  } else {
    console.log(x);
  }
}
```

[TOP](#type-guards--narrowing-embudo)