[Volver al Menú](../root.md)

# `Type Compatibility`

TypeScript uses structural typing to determine type compatibility. This means that two types are considered compatible if they have the same structure, regardless of their names.

```bash
interface Point {
  x: number;
  y: number;
}

let p1: Point = { x: 10, y: 20 };
let p2: { x: number; y: number } = p1;

console.log(p2.x); // Output: 10
```

In this example, p1 has the type Point, while p2 has the type { x: number; y: number }. Despite the fact that the two types have different names, they are considered compatible because they have the same structure. This means that you can assign a value of type Point to a variable of type { x: number; y: number }, as we do with p1 and p2 in this example.

```bash
interface Pet {
  name: string;
}
class Dog {
  name: string;
}
let pet: Pet;
// OK, because of structural typing
pet = new Dog();
```

In nominally-typed languages like C# or Java, the equivalent code would be an error because the Dog class does not explicitly describe itself as being an implementer of the Pet interface.

TypeScript’s structural type system was designed based on how JavaScript code is typically written. Because JavaScript widely uses anonymous objects like function expressions and object literals, it’s much more natural to represent the kinds of relationships found in JavaScript libraries with a structural type system instead of a nominal one.
