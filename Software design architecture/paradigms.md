[Volver al Menú](root.md)

# `Programming Paradigms`

A programming paradigm is a fundamental style or approach to solving problems using a programming language. Different programming paradigms provide different ways of organizing and structuring code, and have different strengths and weaknesses. Some of the most common programming paradigms include:

- Imperative programming
- Functional programming
- Object-oriented programming
- Logic programming
- Declarative programming

# `Structured Programming`

Structured programming is a programming paradigm that emphasizes the use of structured control flow constructs, such as loops and conditional statements, to organize code into logical, easy-to-understand blocks. It is a way of writing computer programs that emphasizes the use of procedures and functions, as well as data structures, to organize code and make it easier to understand, debug, and maintain. The main idea behind structured programming is to break down a program into smaller, manageable pieces that can be easily understood, tested, and modified. This approach is opposed to the use of “goto” statements, which are considered to be unstructured and can lead to difficult-to-read and difficult-to-maintain code.

Structured programming is a programming paradigm aimed at improving the clarity, quality, and development time of a computer program by making extensive use of the structured control flow constructs of selection (if/then/else) and repetition (while and for), block structures, and subroutines in contrast to using simple tests and jumps such as the go to statement, which can lead to “spaghetti code” that is potentially difficult to follow and maintain

# `Functional Programming`

Functional programming is a programming paradigm that emphasizes the use of pure functions and immutable data. It is a way of writing computer programs that emphasizes the use of functions and mathematical concepts, such as recursion, rather than using objects and classes like in object-oriented programming. In functional programming, functions are first-class citizens, which means they can be passed as arguments to other functions and returned as values.

Functional programming encourages immutability, which means that once a variable is assigned a value, it cannot be changed. This can simplify code, as it eliminates the need for state management and the bugs that can come with it.

## `The 7 Core Functional Programming Concepts`

- `Pure Functions`
- `First-Class Functions`
- `Higher-Order Functions`
- `Immutability`
- `Recursion`
- `Function Composition`
- `Referential Transparency`

# `Object Oriented Programming`

Object-oriented programming (OOP) is a programming paradigm that is based on the concept of “objects”, which are instances of classes. OOP is a way of organizing and structuring code that is based on the principles of encapsulation, inheritance, and polymorphism.

Encapsulation refers to the idea that an object’s internal state should be hidden and accessible only through its methods. This allows the object to control how its data is used and prevents external code from making invalid changes to the object’s state.

# `Imperative programming`

Imperative programming is the oldest and most basic programming approach. Within the imperative paradigm, code describes a step-by-step process for a program’s execution. Because of this, beginners often find it easier to reason with imperative code by following along with the steps in the process.

The step-by-step process contains individual statements, instructions, or function calls. In the programming world, this process is called the control flow.

In other words, you’re interested in how the program runs, and you give it explicit instructions. Let’s illustrate this with a pseudocode example.

Examples of imperative programming languages include:

- `Java`
- `C`
- `Pascal`
- `Python`
- `Ruby`
- `Fortran`
- `PHP`

```
let longPasswords = [];
for (let i = 0; i < passwords.length; i++) {
   const password = passwords[i];
   if (password.length >= 9) {
      longPasswords.push(password);
   }
}

console.log(longPasswords); // logs ["freecodecamp", "mypassword123"];
```

# `Declarative programming`

In contrast with imperative programming, declarative programming describes what you want the program to achieve rather than how it should run.

In other words, within the declarative paradigm, you define the results you want a program to accomplish without describing its control flow. Ultimately, it’s up to the programming language’s implementation and the compiler to determine how to achieve the results. This places emphasis not on the execution process, but on the results and their ties to your overall goal. In other words, writing declarative code forces you to ask first what you want out of your program. Defining this helps you develop more expressive and explicit code.

Examples of declarative programming languages include:

- `SQL`
- `Miranda`
- `Prolog`
- `Lisp`
- `Many markup languages (e.g., HTML)`

```
const longPasswords = passwords.filter(password => password.length >= 9);

console.log(longPasswords); // logs ["freecodecamp", "mypassword123"];
```

[TOP](#programming-paradigms)
