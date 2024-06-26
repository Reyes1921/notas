[Volver al Menú](root.md)

# `Architectural Principles`

Architectural principles refer to a set of guidelines or rules that are used to guide the design and development of a software architecture. These principles are intended to ensure that the resulting architecture is maintainable, scalable, and easy to understand and modify. Some common architectural principles include the separation of concerns, modularity, loose coupling, and high cohesion. Additionally, architectural principles are often used in conjunction with design patterns, which are reusable solutions to common software design problems.

# `Component Principles`

Component principles in software architecture refer to guidelines for designing and implementing software components that are modular, reusable, and easy to understand, test, and maintain. Some of the key component principles in software architecture include:

- `High cohesion`
- `Low coupling`
- `Separation of concerns`

A guiding principle when developing is Separation of Concerns. This principle asserts that software should be separated based on the kinds of work it performs. For instance, consider an application that includes logic for identifying noteworthy items to display to the user, and which formats such items in a particular way to make them more noticeable. The behavior responsible for choosing which items to format should be kept separate from the behavior responsible for formatting the items, since these behaviors are separate concerns that are only coincidentally related to one another.

- `Interface-based design`
- `Reusability`

Components are usually designed to be reused in different situations in different applications. However, some components may be designed for a specific task.

- `Testability`
- `Modularity`
- `Interoperability`

By following these component principles, software can be developed in a way that is easy to understand, maintain, and extend, and that is less prone to bugs. It also enables better code reuse, and makes it easier to test and change the code, and also enables better code reuse, as components can be reused in different contexts.

# `Policy vs Detail`

In software architecture, the distinction between policy and detail refers to the separation of high-level decisions and low-level implementation details.

Policy refers to the high-level decisions that define the overall behavior and structure of the system. These decisions include things like the overall architecture, the system’s interface, and the major components and their interactions. Policy decisions are often made by architects and designers, and they set the overall direction for the system.

Detail refers to the low-level implementation details that are required to implement the policy decisions. These include things like the specific algorithms, data structures, and code that make up the system’s components. Details are often implemented by developers and are responsible for the actual functioning of the system.

# `Coupling and Cohesion`

Coupling and cohesion are two principles in software architecture that are used to measure the degree of interdependence between components in a system.

`Coupling` refers to the degree to which one component depends on another component. High coupling means that a change in one component will likely affect other components, making the system more difficult to understand, test, and maintain. Low coupling, on the other hand, means that changes to one component have minimal impact on other components, making the system more modular and easier to understand, test, and maintain.

`Cohesion`, on the other hand, refers to the degree to which the responsibilities of a component are related to each other. High cohesion means that a component has a single, well-defined purpose and that all its functionality and data is related to that purpose. Low cohesion, on the other hand, means that a component has multiple, unrelated responsibilities, making it more difficult to understand, test, and maintain.

# `Boundaries`

In software architecture, boundaries refer to the interfaces or the points of separation between different components or systems. These boundaries can be physical, such as between different microservices in a distributed system, or logical, such as between different layers in an application.

Boundaries are important because they define the points of interaction between different components or systems, and they dictate how those components or systems will communicate with each other. By defining clear boundaries, it makes it easier to understand, test, and maintain the system, as the interactions between components or systems are well-defined and easy to reason about.

[TOP](#architectural-principles)
