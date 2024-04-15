[Volver al Menú](root.md)

# `Design Patterns`

Design patterns are general solutions to common problems that arise in software development. They provide a way to describe and communicate proven solutions to common design problems and they provide a common vocabulary for design. They are not specific to any particular programming language or technology, but rather describe the problem and the solution in a way that can be applied to many different contexts.

There are several different types of design patterns, including:

- `Creational patterns`
- `Structural patterns`
- `Behavioral patterns`
- `Architectural patterns`

# `GoF Design Patterns`

The Gang of Four (GoF) design patterns are a set of design patterns for object-oriented software development that were first described in the book “Design Patterns: Elements of Reusable Object-Oriented Software” by Erich Gamma, Richard Helm, Ralph Johnson, and John Vlissides (also known as the Gang of Four).

The GoF design patterns are divided into three categories: Creational, Structural and Behavioral.

- `Creational Patterns`
- `Structural Patterns`
- `Behavioral Patterns`

## `Creational`

The design patterns that deal with the creation of an object.

<table>
<thead>
<tr>
<th>Pattern Name</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><a >Singleton</a></td>
<td>The singleton pattern restricts the initialization of a class to ensure that only one instance of the class can be created.</td>
</tr>
<tr>
<td><a>Factory</a></td>
<td>The factory pattern takes out the responsibility of instantiating a object from the class to a Factory class.</td>
</tr>
<tr>
<td><a>Abstract Factory</a></td>
<td>Allows us to create a Factory for factory classes.</td>
</tr>
<tr>
<td><a>Builder</a></td>
<td>Creating an object step by step and a method to finally get the object instance.</td>
</tr>
<tr>
<td>Prototype</a></td>
<td>Creating a new object instance from another similar instance and then modify according to our requirements.</td>
</tr>
</tbody>
</table>

## `Structural`

The design patterns in this category deals with the class structure such as Inheritance and Composition.

<table>
<thead>
<tr>
<th>Pattern Name</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><a >Adapter</a></td>
<td>Provides an interface between two unrelated entities so that they can work together.</td>
</tr>
<tr>
<td><a >Composite</a></td>
<td>Used when we have to implement a part-whole hierarchy. For example, a diagram made of other pieces such as circle, square, triangle, etc.</td>
</tr>
<tr>
<td><a >Proxy</a></td>
<td>Provide a surrogate or placeholder for another object to control access to it.</td>
</tr>
<tr>
<td><a >Flyweight</a></td>
<td>Caching and reusing object instances, used with immutable objects. For example, string pool.</td>
</tr>
<tr>
<td><a >Facade</a></td>
<td>Creating a wrapper interfaces on top of existing interfaces to help client applications.</td>
</tr>
<tr>
<td><a>Bridge</a></td>
<td>The bridge design pattern is used to decouple the interfaces from implementation and hiding the implementation details from the client program.</td>
</tr>
<tr>
<td><a">Decorator</a></td>
<td>The decorator design pattern is used to modify the functionality of an object at runtime.</td>
</tr>
</tbody>
</table>

## `Behavioral`

This type of design patterns provide solution for the better interaction between objects, how to provide lose coupling, and flexibility to extend easily in future.

<table>
<thead>
<tr>
<th>Pattern Name</th>
<th>Description</th>
</tr>
</thead>
<tbody>
<tr>
<td><a >Template Method</a></td>
<td>used to create a template method stub and defer some of the steps of implementation to the subclasses.</td>
</tr>
<tr>
<td><a >Mediator</a></td>
<td>used to provide a centralized communication medium between different objects in a system.</td>
</tr>
<tr>
<td><a >Chain of Responsibility</a></td>
<td>used to achieve loose coupling in software design where a request from the client is passed to a chain of objects to process them.</td>
</tr>
<tr>
<td><a >Observer</a></td>
<td>useful when you are interested in the state of an object and want to get notified whenever there is any change.</td>
</tr>
<tr>
<td><a >Strategy</a></td>
<td>Strategy pattern is used when we have multiple algorithm for a specific task and client decides the actual implementation to be used at runtime.</td>
</tr>
<tr>
<td><a >Command</a></td>
<td>Command Pattern is used to implement lose coupling in a request-response model.</td>
</tr>
<tr>
<td><a >State</a></td>
<td>State design pattern is used when an Object change it’s behavior based on it’s internal state.</td>
</tr>
<tr>
<td><a >Visitor</a></td>
<td>Visitor pattern is used when we have to perform an operation on a group of similar kind of Objects.</td>
</tr>
<tr>
<td><a >Interpreter</a></td>
<td>defines a grammatical representation for a language and provides an interpreter to deal with this grammar.</td>
</tr>
<tr>
<td><a >Iterator</a></td>
<td>used to provide a standard way to traverse through a group of Objects.</td>
</tr>
<tr>
<td><a >Memento</a></td>
<td>The memento design pattern is used when we want to save the state of an object so that we can restore later on.</td>
</tr>
</tbody>
</table>

# `POSA Patterns`

POSA (Patterns of Scalable and Adaptable Software Architecture) is a set of design patterns for developing software systems that can scale and adapt to changing requirements. These patterns were first described in the book “Patterns of Scalable, Reliable Services” by Kevin Hoffman.

POSA patterns are divided into four categories:

- `Partitioning Patterns`
- `Placement Patterns`
- `Routing Patterns`
- `Federation Patterns`

[TOP](#design-patterns)
