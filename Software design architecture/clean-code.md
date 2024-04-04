[Volver al Menú](root.md)

# `Clean Code Principles`

Clean code is code that is easy to read, understand, and maintain. It follows a set of principles that are designed to make the code more readable, testable, and less error-prone.

## `Be Consistent`

Being consistent refers to maintaining a consistent pattern. This can include using consistent naming conventions, data structures, and interfaces throughout the system, as well as adhering to established design principles and best practices.

## `Meaningful Names`

You should follow the practice of giving clear and descriptive names to different components of a system, such as variables, functions, and classes. This can help to make the system more understandable and maintainable by clearly communicating the purpose of each component and its intended usage.

## `Indentation and Code Style`

Indentation is the practice of using whitespace to visually group related lines of code together, making it easier to read and understand the structure of the code. Code style refers to the conventions and guidelines used to format and structure code, such as naming conventions, commenting, and use of whitespace.

## `Keep it Small`

You should design and implement small, focused components that serve a specific purpose, rather than large, monolithic components that try to do everything. This can help to improve the maintainability and scalability of the system by making it easier to understand, test, and modify individual components.

## `Pure Functions`

A pure function is a specific type of function that meets the following criteria:

- It takes some input, known as arguments, and returns a value or output.
- It does not cause any observable side effects, such as modifying the state of the system or interacting with external resources.
- Given the same input, it will always return the same output.
- It does not depend on any state or variables that are outside of its scope.

## `Minimize Cyclomatic Complexity`

Cyclomatic complexity is a measure of the structural complexity of a program, which is determined by the number of linearly independent paths through a program’s control flow. High cyclomatic complexity can make a program difficult to understand, test, and maintain, so it’s often desirable to minimize it in system architecture.

## `Avoid Passing Nulls Booleans`

Passing nulls or Booleans can lead to unexpected behavior and difficult-to-debug errors in a program. Here are some ways to avoid passing nulls or Booleans in system architecture.

## `Keep Framework Code Distant`

Keeping framework code distant refers to separating the application’s code from the framework’s code. By doing so, it makes it easier to maintain, test, and upgrade the application’s codebase and the framework independently.

## `Use Correct Constructs`

In the context of clean code principles, “using correct constructs” refers to using appropriate programming constructs, such as loops, conditionals, and functions, in a way that makes the code easy to understand, maintain, and modify.

When using correct constructs, the code should be organized in a logical and intuitive way, making use of appropriate control flow statements and data structures to accomplish the task at hand. This also means that the code should avoid using unnecessary or overly complex constructs that make the code harder to understand or reason about.

## `Keep Tests Independent`

Keeping tests independent helps ensures that the tests are reliable, repeatable, and easy to maintain. When tests are independent, a change in one test will not affect the results of other tests.

## `Code by Actor`

”Code by Actor” is a software development technique that encourages developers to organize their code around the actors or entities that interact with it. Actors can be users, systems, or processes that perform a specific role or function within the application. This approach helps to create a clear separation of concerns, making the code more modular, reusable, and easier to understand.

## `Command Query Separation`

Command-Query Separation (CQS) is a software design principle that separates the responsibilities of a method or function into two categories: commands and queries. Commands are methods that change the state of the system, while queries are methods that return information but do not change the state of the system.

## `Avoid Hasty Abstractions`

Creating abstractions is an important part of software development, but creating too many abstractions or creating them too early can lead to unnecessary complexity and make the code harder to understand and maintain.

[TOP](#clean-code-principles)
