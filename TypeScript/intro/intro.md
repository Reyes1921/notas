[Volver al Menú](../root.md)

# `TypeScript`

TypeScript is a statically-typed programming language that is a superset of JavaScript. It was developed and is maintained by Microsoft. TypeScript was created to address the challenges of building large-scale JavaScript applications and adds optional type annotations, classes, interfaces, and other features to the language.

The main benefits of using TypeScript include:

- Type Safety
- Improved Tooling
- Improved Maintainability
- Backwards Compatibility

ES TIPADO FUERTE Y ESTATICO

TYPESCRIPT NUNCA LLEGA AL CLIENTE, AL MOMENTO DE COMPILAR DESAPARECE Y SOLO QUEDA JAVASCRIPT

NO TIENE SENTIDO VALIDAR UN FORMULARIO CON TYPESCRIPT POR QUE ES UN LENGUAJE CONPILADO Y NO FUNCIONA EN TIEMPO DE EJECUCION

---

# `TypeScript vs JavaScript`

TypeScript is a superset of JavaScript that adds optional type annotations and other features such as interfaces, classes, and namespaces. JavaScript is a dynamically-typed language that is primarily used for client-side web development and can also be used for server-side development.

Here are a few key differences between TypeScript and JavaScript:

- `Types`: TypeScript has optional type annotations while JavaScript is dynamically-typed. This means that in TypeScript, you can specify the data type of variables, parameters, and return values, which can help catch type-related errors at compile-time.

- `Syntax`: TypeScript extends JavaScript syntax with features like interfaces, classes, and namespaces. This provides a more robust and organized structure for large-scale projects.

- `Tooling`: TypeScript has better tooling support, such as better editor integration, type checking, and code refactoring.

- `Backwards Compatibility`: TypeScript is fully compatible with existing JavaScript code, which means you can use TypeScript in any JavaScript environment.

---

# `TS/JS Interoperability`

TypeScript and JavaScript have full interoperability, meaning you can use TypeScript code in JavaScript projects and vice versa. TypeScript is a superset of JavaScript, which means that any valid JavaScript code is also valid TypeScript code.

You can use JavaScript libraries in TypeScript projects by either including the JavaScript files directly or using type definitions for the library. Type definitions provide type information for JavaScript libraries, making it easier to use them in TypeScript.

## `Runtime Behavior`

TypeScript is also a programming language that preserves the runtime behavior of JavaScript. For example, dividing by zero in JavaScript produces Infinity instead of throwing a runtime exception. As a principle, TypeScript never changes the runtime behavior of JavaScript code.

This means that if you move code from JavaScript to TypeScript, it is guaranteed to run the same way, even if TypeScript thinks that the code has type errors.

Keeping the same runtime behavior as JavaScript is a foundational promise of TypeScript because it means you can easily transition between the two languages without worrying about subtle differences that might make your program stop working.

---

# `Install and Configure`

Initialize npm in your project directory by running the following command:

```bash
npm init
```

Install TypeScript as a project dependency by running the following command:

```bash
npm install --save-dev typescript
```

Create a `tsconfig.json` file in your project directory to specify the compiler options for building your project. For example:

```bash
{
  "compilerOptions": {
    "target": "es5",
    "module": "commonjs",
    "strict": true,
    "outDir": "./dist",
    "rootDir": "./src"
  },
  "exclude": ["node_modules"]
}
```

Compile your TypeScript code using the following command:

```bash
tsc
```

Note: You can also compile individual TypeScript files by specifying the file name after the tsc command.For example:

```bash
tsc index.ts
```

## `tsconfig.json`

tsconfig.json is a configuration file in TypeScript that specifies the compiler options for building your project. It helps the TypeScript compiler understand the structure of your project and how it should be compiled to JavaScript. Some common options include:

- `target`: the version of JavaScript to compile to.
- `module`: the module system to use.
- `strict`: enables/disables strict type checking.
- `outDir`: the directory to output the compiled JavaScript files.
- `rootDir`: the root directory of the TypeScript files.
- `include`: an array of file/directory patterns to include in the compilation.
- `exclude`: an array of file/directory patterns to exclude from the compilation.

## `Using  tsconfig.json or  jsconfig.json`

- By invoking tsc with no input files, in which case the compiler searches for the tsconfig.json file starting in the current directory and continuing up the parent directory chain.

- By invoking tsc with no input files and a --project (or just -p) command line option that specifies the path of a directory containing a tsconfig.json file, or a path to a valid .json file containing the configurations.
  When input files are specified on the command line, tsconfig.json files are ignored.

## `Compiler Options`

TypeScript compiler accepts a number of command line options that allow you to customize the compilation process. These options can be passed to the compiler using the -- prefix, for example:

```bash
tsc --target ES5 --module commonjs
```

---

# `Running TypeScript`

To run TypeScript code, you’ll need to have a TypeScript compiler installed. Here’s a general process to run TypeScript code:

- Write TypeScript code in a .ts file (e.g. app.ts)
- Compile the TypeScript code into JavaScript using the TypeScript compiler:

```bash
tsc app.ts
```

## `tsc`

`tsc` is the command line tool for the TypeScript compiler. It compiles TypeScript code into JavaScript code, making it compatible with the browser or any JavaScript runtime environment.

You can use the `tsc` command to compile your TypeScript code by running the following command in your terminal or command prompt:

```bash
tsc
```

This command will compile all TypeScript files in your project that are specified in your `tsc`onfig.json file. If you want to compile a specific TypeScript file, you can specify the file name after the `tsc` command, like this:

## `ts-node`

ts-node is a TypeScript execution and REPL for node.js, with source map and native ESM support. Learn more from the following links

[TOP](#typescript)
