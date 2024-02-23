[Volver al Menú](../root.md)

# `TypeScript Interfaces`

Interfaces in TypeScript provide a way to define a contract for a type, which includes a set of properties, methods, and events. It’s used to enforce a structure for an object, class, or function argument. Interfaces are not transpiled to JavaScript and are only used by TypeScript at compile-time for type-checking purposes.

```
interface User {
  name: string;
  age: number;
}

const user: User = {
  name: 'John Doe',
  age: 30,
};
```

In this example, the `User` interface defines the structure of the `user` object with two properties, `name` and `age`. The object is then typed as User using a type-assertion: `User`.

# `Types vs Interfaces`

Type aliases and interfaces are very similar, and in many cases you can choose between them freely. Almost all features of an interface are available in type, the key distinction is that a type cannot be re-opened to add new properties vs an interface which is always extendable.

Extending a type via intersections
```
type Person = {
  name: string;
  age: number;
};

const person: Person = {
  name: 'John Doe',
  age: 30,
};
```

A type cannot be changed after being created
```
type Window = {
  title: string;
}

type Window = {
  ts: TypeScriptAPI;
}

 // Error: Duplicate identifier 'Window'.
```


Extending an interface
```
interface Person {
  name: string;
  age: number;
}

const person: Person = {
  name: 'John Doe',
  age: 30,
};
```

Adding new fields to an existing interface

```
interface Window {
  title: string;
}

interface Window {
  ts: TypeScriptAPI;
}

const src = 'const a = "Hello World"';
window.ts.transpileModule(src, {});
```

# `Extending Interfaces`

In TypeScript, you can extend an interface by creating a new interface that inherits from the original interface using the `“extends”` keyword. The new interface can include additional properties, methods, or redefine the members of the original interface.

```
interface Shape {
  width: number;
  height: number;
}

interface Square extends Shape {
  sideLength: number;
}

let square: Square = {
  width: 10,
  height: 10,
  sideLength: 10,
};
```

In this example, the `Square` interface extends the `Shape` interface and adds an additional property `sideLength`. A variable of type `Square` must have all the properties defined in both `Shape` and `Square` interfaces.

# `Interface Declaration`

An interface in TypeScript is a blueprint for creating objects with specific structure. An interface defines a set of properties, methods, and events that a class or object must implement. The interface is a contract between objects and classes and can be used to enforce a specific structure for objects in your code.

```
interface Person {
  firstName: string;
  lastName: string;
  age?: number;

  getFullName(): string;
}
```

In this example, the Person interface defines four properties: `firstName`, `lastName`, `age`, and a method `getFullName()`. The age property is optional, indicated by the `?` symbol. Any class or object that implements the `Person` interface must have these properties and method.

# `Hybrid Types`

In TypeScript, a hybrid type is a type that combines multiple types into a single type. The resulting type is considered a union of those types. This allows you to specify that a value can have multiple types, rather than just one.

```
type StringOrNumber = string | number;
```

You can also use hybrid types to create more complex types that can represent a combination of several different types of values. For example:

```
type Education = {
  degree: string;
  school: string;
  year: number;
};

type User = {
  name: string;
  age: number;
  email: string;
  education: Education;
};
```


[TOP](#typescript-interfaces)