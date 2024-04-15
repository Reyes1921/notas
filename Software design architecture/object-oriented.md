[Volver al Menú](root.md)

# `Object Oriented Programming`

Object-oriented programming (OOP) is a programming paradigm that is based on the concept of “objects,” which are instances of a class. In OOP, a class is a blueprint for creating objects, which have both data (attributes) and behavior (methods). The main idea behind OOP is to model real-world objects and their interactions, making it well-suited for creating complex and large-scale software systems.

# `Primary Principles`

There are several primary principles that are considered fundamental to object-oriented programming (OOP). These principles include:

- `Encapsulation`: The practice of wrapping an object’s internal data and behavior within a defined interface, and hiding the implementation details from the outside world.

Encapsulation is achieved by using access modifiers (such as “public,” “private,” and “protected”) to control the visibility and accessibility of an object’s data and methods. For example, data members of a class can be declared as private, which means they can only be accessed by methods within the class, while methods can be declared as public, which means they can be called by any code that has a reference to the object.

- `Inheritance`: The ability of a new class to inherit the properties and methods of an existing class, enabling code reuse and allowing for a hierarchical organization of classes.

Inheritance is a fundamental concept in object-oriented programming (OOP) that allows a new class to inherit the properties and methods of an existing class. The class that is inherited from is called the parent or super class, while the class that inherits is called the child or sub class. Inheritance enables code reuse and allows for a hierarchical organization of classes, where a child class can inherit the properties and methods of its parent class and potentially add or override them.

- `Polymorphism`: The ability of objects of different classes to be treated as objects of a common parent class, allowing code to be written in a more general and flexible way.

This is achieved by defining a common interface for all classes that need to be treated polymorphically. The word polymorphism is derived from Greek, “poly” means many and “morph” means form.

- `Abstraction`: The process of hiding the implementation details of an object and exposing only its essential features, reducing complexity and improving the modularity of the code.

`There are two types of abstraction:`

    - `Data abstraction`: refers to hiding the internal representation of data and providing a simplified view of the data through a set of well-defined interfaces.
    - `Behavioral abstraction`: refers to hiding the internal behavior of an object and providing a simplified view of its capabilities through a set of well-defined interfaces.

- `Classes`: The blueprint for creating objects, which have both data (attributes) and behavior (methods).
- `Objects`: Instances of a class, which have their own unique state and behavior.

# `Model Driven Design`

Model-driven design (MDD) is a software development methodology in which the design of a system is represented by a set of models, and the models are used to drive the development of the system. MDD is based on the idea that the design of a system can be represented by a set of models, and that these models can be used to generate the code for the system.

The main advantage of using MDD is that it allows for a clear separation of concerns between the design and implementation of a system. The models represent the design of the system, and the code is generated from the models, which makes it easier to maintain and evolve the system. Additionally, MDD can also improve the quality of the code, as the models can be used to check for design errors and inconsistencies before the code is generated.

## `Domain Models`

A domain model is a representation of a specific area of knowledge or business that is used to model the objects and concepts within that domain, and to capture the relationships and constraints between them. In object-oriented programming (OOP), a domain model is typically represented by a set of classes and interfaces, with each class or interface representing a specific concept or object within the domain.

## `Anemic Models`

An Anemic model, also known as an anemic domain model, is a type of domain model in which the domain objects only contain data (attributes) and lack behavior. An anemic model often results in the use of data-transfer objects (DTOs) and service layer to handle the behavior.

## `Layered Architectures`

A layered architecture is a software design pattern in which the functionality of a system is divided into a set of layers, with each layer having a specific responsibility and interacting with the layers above and below it. The main idea behind a layered architecture is to separate the concerns of the system into distinct and independent layers, making the code more modular, easier to understand, test, and modify.

## `Domain Language`

A domain language is a specific vocabulary and set of concepts used to describe and communicate about a specific area of knowledge or business. In software development, a domain language is used to model the objects and concepts within a specific domain, and to capture the relationships and constraints between them.

A domain language is used to provide a common understanding of the problem domain among all stakeholders, including developers, business analysts, and domain experts. It is also used to ensure that the software system accurately reflects the real-world problem it is intended to solve.

## `Class Invariants`

A class invariant is a set of conditions that must be true for any object of a class, at any point in time. In object-oriented programming (OOP), class invariants are used to define the valid states of an object and to ensure that the object always remains in a valid state.

Class invariants are typically defined in the constructor of a class and are enforced through the use of private methods and data members that are used to validate the state of the object. They are also checked in the class’s methods before and after any operation that can change the state of the object.

# `Paradigm Features`

Object-oriented programming (OOP) is a programming paradigm that is based on the concept of “objects,” which are instances of a class. OOP has several key features that distinguish it from other programming paradigm

## `Abstract Classes`

An abstract class is a class in object-oriented programming (OOP) that cannot be instantiated. Instead, it serves as a template or blueprint for other classes to inherit from. An abstract class can contain both abstract and non-abstract methods (abstract methods are methods that do not have any implementation, they just have a signature).

Abstract classes are used to provide a common interface and implementation for a group of related classes. They are also used to define common behavior that must be implemented by all subclasses. A subclass that inherits from an abstract class is called a concrete class, and it must provide an implementation for all the abstract methods declared in the parent class.

## `Concrete Classes`

A concrete class is a class in object-oriented programming (OOP) that can be instantiated, meaning objects can be created from it. A concrete class is a class that provides an implementation for all of the abstract methods declared in its parent class, if it inherits from an abstract class. A concrete class can also be a class that does not inherit from an abstract class, in that case it can have implementation for all of its methods.

Concrete classes are used to provide specific implementation details for a group of related classes that inherit from a common abstract class. They are also used to define unique behavior for a specific class. A concrete class can have its own methods and variables, and can also override the methods of its parent class.

## `Scope Visibility`

Scope visibility refers to the accessibility or visibility of variables, functions, and other elements in a program, depending on the context in which they are defined. In object-oriented programming (OOP), scope visibility is controlled through the use of access modifiers, such as “public,” “private,” and “protected.”

- `Public`: A public element can be accessed from anywhere in the program, both within the class and outside of it.
- `Private`: A private element can only be accessed within the class in which it is defined. It is not accessible to other classes, even if they inherit from the class.
- `Protected`: A protected element can only be accessed within the class and its subclasses.

## `Interfaces`

In object-oriented programming (OOP), an interface is a contract or a set of methods that a class must implement. It defines a common set of methods that a class must provide, but it does not provide any implementation details. An interface can include both method signatures and constants.

Interfaces are used to define a common behavior for a group of related classes, and to provide a way for objects of different classes to be treated polymorphically. A class that implements an interface must provide an implementation for all of the methods declared in the interface. A class can implement multiple interfaces, but can only inherit from one base class.

[TOP](#object-oriented-programming)
