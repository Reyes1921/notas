[Volver al Menú](../root.md)

# `Linters formatters`

A linter is a tool used to analyze code and discover bugs, syntax errors, stylistic inconsistencies, and suspicious constructs. Popular linters for JavaScript include ESLint, JSLint, and JSHint.

What is a linter? In short, a linter is a tool to help you improve your code. The concept of linter isn’t exclusive to JavaScript. Still, I’d say that the majority of people trying to learn about linters are interested in the ones that target JavaScript (or, more generally, dynamically-typed languages.)

The term linter comes from a tool originally called “lint” that analyzed C source code. The computer scientist Stephen C. Johnson developed this utility in 1978 when he worked at Bell Labs.

Both the original lint tool, as well as earlier similar utilities, had the goal of analyzing source code to come up with compiler optimizations. Over time, lint-like tools started adding many other types of checks and verification.

# `Prettier`

`Prettier` is an opinionated code formatter with support for JavaScript, HTML, CSS, YAML, Markdown, GraphQL Schemas. By far the biggest reason for adopting `Prettier` is to stop all the on-going debates over styles.

`Prettier` is a code formatting tool that can be used to automatically format JavaScript code and other popular programming languages. It enforces a consistent code format by parsing the code and reprinting it with its own rules. `Prettier` provides a set of default formatting options, but these can be customized by using a configuration file. It can be integrated into popular code editors such as Visual Studio Code and WebStorm, and can also be used as a command line tool through its CLI.

# `ESLint`

With ESLint you can impose the coding standard using a certain set of standalone rules.

## `What is ESLint?`

ESLint is an open-source Javascript linting utility originally created by Nicholas C. Zakas in June 2013. It is frequently used to find problematic patterns or code that doesn’t adhere to certain style guidelines. ESLint is written using Node.js to provide a fast runtime environment and easy installation via npm.
With ESLint you can impose the coding standard using a certain set of standalone rules. Yes, you can turn those rules on and off. These rules are completely pluggable.

## `Why use ESLint?`

JavaScript, being a dynamic and loosely-typed language, is especially prone to developer error. ESLint lets you put guidelines over coding standard and helps you to minimize those errors. The main reason for imposing those guide is because every developer has her style of writing (like naming conventions/tabs/single or double quotes for a string). And, with different styling techniques, your codebase may look weird, more error-prone and vulnerable. Especially when you’re dealing with Javascript this could cause pitfalls you’d never want to deal with.

## `Install it`

Prerequisites: Node.js (^10.12.0, or >=12.0.0)
You can install ESLint using npm or yarn:

```
$ npm install eslint --save-dev
# or
$ yarn add eslint --dev
```

## `Initialize it`

After installing it, initialize it with the following command:

```
$ npx eslint --init
# or
$ yarn run eslint --init
```

## `Configure it`

The moment you’re done with the installation and initialization you’ll have a .eslintrc.{js,yml,json} file in your directory. In it, you’ll see some rules configured like this:

```
{
    "rules": {
        "semi": ["error", "always"],
        "quotes": ["error", "double"]
    }
}
```

## `Use it`

If you’re here that means you’ve successfully configured the ESLint. Here’s how you can use it:

```
$ npx elinst <your file>.js
# or 
$ npx eslint <folder containing js files>
```

You can also add lint in yourpackage.json file (if not already added)

```
"scripts": {
  ...
  "lint": "eslint .",
  ...
}
```

# `Prettier vs. Linters`

## `Linters have two categories of rules:`

- `Formatting rules: eg: max-len, no-mixed-spaces-and-tabs, keyword-spacing, comma-style…`

    Prettier alleviates the need for this whole category of rules! Prettier is going to reprint the entire program from scratch in a consistent way, so it’s not possible for the programmer to make a mistake there anymore 

- `Code-quality rules: eg no-unused-vars, no-extra-bind, no-implicit-globals, prefer-promise-reject-errors…`

    Prettier does nothing to help with those kind of rules. They are also the most important ones provided by linters as they are likely to catch real bugs with your code!

`In other words, use Prettier for formatting and linters for catching bugs!`

[TOP](#linters-formatters)