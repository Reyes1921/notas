[Volver al Menú](../root.md)

# `Combining Types`

In TypeScript, you can combine types using type union and type intersection.

# `Type Union`

Union Types in TypeScript allow you to specify multiple possible types for a single variable or parameter. A union type is written as a vertical bar `|` separated list of types.

```
function combine(input1: string | number, input2: string | number) {
  return input1 + input2;
}
```

# `Intersection Types`

An intersection type creates a new type by combining multiple existing types. The new type has all features of the existing types.

```
type typeAB = typeA & typeB;
```

The `typeAB` will have all properties from both typeA and `typeB`.

Note that the union type uses the `|` operator that defines a variable which can hold a value of either `typeA` or `typeB`

# `Type Aliases`

A Type Alias in TypeScript allows you to create a new name for a type.

```
type Name = string;
type Age = number;
type User = { name: Name; age: Age };

const user: User = { name: 'John', age: 30 };
```

# `keyof Operator`

The `keyof` operator in TypeScript is used to get the union of keys from an object type. Here’s an example of how it can be used:

```
interface User {
  name: string;
  age: number;
  location: string;
}

type UserKeys = keyof User; // "name" | "age" | "location"
const key: UserKeys = 'name';
```

The keyof operator takes an object type and produces a string or numeric literal union of its keys. The following type P is the same type as type P = "x" | "y":

```
type Point = { x: number; y: number };
type P = keyof Point;
```

[TOP](#combining-types)
