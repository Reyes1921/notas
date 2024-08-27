[Volver al Menú](root.md)

# `Zod`

`Zod` is a TypeScript-first schema declaration and validation library. I’m using the term “schema” to broadly refer to any data type, from a simple string to a complex nested object.

`Zod` is designed to be as developer-friendly as possible. The goal is to eliminate duplicate type declarations. With `Zod`, you declare a validator once and `Zod` will automatically infer the static TypeScript type. It’s easy to compose simpler types into complex data structures.

- Zero dependencies
- Works in Node.js and all modern browsers
- Tiny: 8kb minified + zipped
- Immutable: methods (e.g. .optional()) return a new instance
- Concise, chainable interface
- Functional approach: parse, don't validate
- Works with plain JavaScript too! You don't need to use TypeScript.

# `Installation`

You must enable strict mode in your tsconfig.json. This is a best practice for all TypeScript projects.

`npm install zod `

# `Basic usage`

Creating a simple string schema

```
import { z } from "zod";

// creating a schema for strings
const mySchema = z.string();

// parsing
mySchema.parse("tuna"); // => "tuna"
mySchema.parse(12); // => throws ZodError

// "safe" parsing (doesn't throw error if validation fails)
mySchema.safeParse("tuna"); // => { success: true; data: "tuna" }
mySchema.safeParse(12); // => { success: false; error: ZodError }
```

Creating an object schema

```
import { z } from "zod";

const User = z.object({
  username: z.string(),
});

User.parse({ username: "Ludwig" });

// extract the inferred type
type User = z.infer<typeof User>;
// { username: string }
```

# `Primitives`

```
import { z } from "zod";

// primitive values
z.string();
z.number();
z.bigint();
z.boolean();
z.date();
z.symbol();

// empty types
z.undefined();
z.null();
z.void(); // accepts undefined

// catch-all types
// allows any value
z.any();
z.unknown();

// never type
// allows no values
z.never();
```

# `Coercion for primitives`

Zod now provides a more convenient way to coerce primitive values.

```
const schema = z.coerce.string();
schema.parse("tuna"); // => "tuna"
schema.parse(12); // => "12"
```

# `Literals`

```
const tuna = z.literal("tuna");
const twelve = z.literal(12);
const twobig = z.literal(2n); // bigint literal
const tru = z.literal(true);
```

# `Strings`

```
// validations
z.string().max(5);
z.string().min(5);
z.string().length(5);
z.string().email();
z.string().url();
z.string().emoji();
z.string().uuid();
z.string().nanoid();
z.string().cuid();
z.string().cuid2();
z.string().ulid();
z.string().regex(regex);
z.string().includes(string);
z.string().startsWith(string);
z.string().endsWith(string);
z.string().datetime(); // ISO 8601; by default only `Z` timezone allowed
z.string().ip(); // defaults to allow both IPv4 and IPv6

// transforms
z.string().trim(); // trim whitespace
z.string().toLowerCase(); // toLowerCase
z.string().toUpperCase(); // toUpperCase

// added in Zod 3.23
z.string().date(); // ISO date format (YYYY-MM-DD)
z.string().time(); // ISO time format (HH:mm:ss[.SSSSSS])
z.string().duration(); // ISO 8601 duration
z.string().base64();
```

# `Datetimes`

As you may have noticed, Zod string includes a few date/time related validations. These validations are regular expression based, so they are not as strict as a full date/time library. However, they are very convenient for validating user input.

```
const datetime = z.string().datetime();

datetime.parse("2020-01-01T00:00:00Z"); // pass
datetime.parse("2020-01-01T00:00:00.123Z"); // pass
datetime.parse("2020-01-01T00:00:00.123456Z"); // pass (arbitrary precision)
datetime.parse("2020-01-01T00:00:00+02:00"); // fail (no offsets allowed)
```

# `Numbers`

Zod includes a handful of number-specific validations.

```
z.number().gt(5);
z.number().gte(5); // alias .min(5)
z.number().lt(5);
z.number().lte(5); // alias .max(5)

z.number().int(); // value must be an integer

z.number().positive(); //     > 0
z.number().nonnegative(); //  >= 0
z.number().negative(); //     < 0
z.number().nonpositive(); //  <= 0

z.number().multipleOf(5); // Evenly divisible by 5. Alias .step(5)

z.number().finite(); // value must be finite, not Infinity or -Infinity
z.number().safe(); // value must be between Number.MIN_SAFE_INTEGER and Number.M
```

# `BigInts`

```
z.bigint().gt(5n);
z.bigint().gte(5n); // alias `.min(5n)`
z.bigint().lt(5n);
z.bigint().lte(5n); // alias `.max(5n)`

z.bigint().positive(); // > 0n
z.bigint().nonnegative(); // >= 0n
z.bigint().negative(); // < 0n
z.bigint().nonpositive(); // <= 0n

z.bigint().multipleOf(5n); // Evenly divisible by 5n.
```

# `NaNs`

```
const isNaN = z.nan({
  required_error: "isNaN is required",
  invalid_type_error: "isNaN must be 'not a number'",
});
```

# `Booleans`

```
const isActive = z.boolean({
  required_error: "isActive is required",
  invalid_type_error: "isActive must be a boolean",
});
```

# `Dates`

Use z.date() to validate Date instances.

```
z.date().safeParse(new Date()); // success: true
z.date().safeParse("2022-01-12T00:00:00.000Z"); // success: false
```

# `Zod enums`

```
const FishEnum = z.enum(["Salmon", "Tuna", "Trout"]);
type FishEnum = z.infer<typeof FishEnum>;
// 'Salmon' | 'Tuna' | 'Trout'
```

# `Optionals`

You can make any schema optional with z.optional(). This wraps the schema in a ZodOptional instance and returns the result.

```
const schema = z.optional(z.string());

schema.parse(undefined); // => returns undefined
type A = z.infer<typeof schema>; // string | undefined
```

# `Nullables`

Similarly, you can create nullable types with z.nullable().

```
const nullableString = z.nullable(z.string());
nullableString.parse("asdf"); // => "asdf"
nullableString.parse(null); // => null
```

# `Objects`

```
// all properties are required by default
const Dog = z.object({
  name: z.string(),
  age: z.number(),
});

// extract the inferred type like this
type Dog = z.infer<typeof Dog>;

// equivalent to:
type Dog = {
  name: string;
  age: number;
};
```

# `Arrays`

```
const stringArray = z.array(z.string());

// equivalent
const stringArray = z.string().array();
```

# `Tuples`

Unlike arrays, tuples have a fixed number of elements and each element can have a different type.

```
const athleteSchema = z.tuple([
  z.string(), // name
  z.number(), // jersey number
  z.object({
    pointsScored: z.number(),
  }), // statistics
]);

type Athlete = z.infer<typeof athleteSchema>;
// type Athlete = [string, number, { pointsScored: number }]
```

# `Unions`

Zod includes a built-in z.union method for composing "OR" types.

```
const stringOrNumber = z.union([z.string(), z.number()]);

stringOrNumber.parse("foo"); // passes
stringOrNumber.parse(14); // passes
```

# `Records`

Record schemas are used to validate types such as Record<string, number>. This is particularly useful for storing or caching items by ID.

```
const User = z.object({ name: z.string() });

const UserStore = z.record(z.string(), User);
type UserStore = z.infer<typeof UserStore>;
// => Record<string, { name: string }>
```

# `Maps`

```
const stringNumberMap = z.map(z.string(), z.number());

type StringNumberMap = z.infer<typeof stringNumberMap>;
// type StringNumberMap = Map<string, number>
```

# `Sets`

```
const numberSet = z.set(z.number());
type NumberSet = z.infer<typeof numberSet>;
// type NumberSet = Set<number>
```

# `Intersections`

Intersections are useful for creating "logical AND" types. This is useful for intersecting two object types.

```
const Person = z.object({
  name: z.string(),
});

const Employee = z.object({
  role: z.string(),
});

const EmployedPerson = z.intersection(Person, Employee);

// equivalent to:
const EmployedPerson = Person.and(Employee);
```

# `Promises`

`const numberPromise = z.promise(z.number());`

```
numberPromise.parse("tuna");
// ZodError: Non-Promise type: string

numberPromise.parse(Promise.resolve("tuna"));
// => Promise<number>

const test = async () => {
  await numberPromise.parse(Promise.resolve("tuna"));
  // ZodError: Non-number type: string

  await numberPromise.parse(Promise.resolve(3.14));
  // => 3.14
};
```

# `Instanceof`

You can use z.instanceof to check that the input is an instance of a class. This is useful to validate inputs against classes that are exported from third-party libraries.

```
class Test {
  name: string;
}

const TestSchema = z.instanceof(Test);

const blob: any = "whatever";
TestSchema.parse(new Test()); // passes
TestSchema.parse(blob); // throws
```

# `Functions`

Zod also lets you define "function schemas". This makes it easy to validate the inputs and outputs of a function without intermixing your validation code and "business logic".

```
const myFunction = z.function();

type myFunction = z.infer<typeof myFunction>;
// => ()=>unknown
```

[Mas Información](https://zod.dev/?id=table-of-contents)

[TOP](#zod)
