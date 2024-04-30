[Volver al Menú](root.md)

# `Architectural Styles`

Architectural styles in software refer to the overall design and organization of a software system, and the principles and patterns that are used to guide the design. These styles provide a general framework for the design of a system, and can be used to ensure that the system is well-structured, maintainable, and scalable.

# `Messaging`

Messaging is a key concept in several architectural styles, including event-driven architecture (EDA), microservices, and message-driven architecture (MDA).

- `Event-driven architecture (EDA)`
- `Microservices`
- `Message-driven architecture (MDA)`

In general, messaging is a powerful concept that allows for the decoupling and scalability of systems and it’s used in different architectural styles to improve the flexibility and scalability of the system by allowing for loose coupling between components and making it easier to add new features or modify existing ones.

At the conceptual level, a message is an exchange of information between a sender and one or many receivers. Message exchange has been an important part of computer programming and architectural design since the early days of mainframe computers.

## `Event Driven`

Event-driven architecture (EDA) is a software design pattern in which the system reacts to specific events that occur, rather than being continuously polled for changes. In EDA, events are messages that are sent asynchronously between components, and the components react to the events they are interested in.

The main advantage of using EDA is that it allows for a clear separation of concerns between the components, and it can improve the scalability and fault-tolerance of the system. Additionally, it allows for loose coupling between components, meaning that the components are not aware of each other’s existence, and can be developed, deployed, and scaled independently.

## `Publish Subscribe`

The publish-subscribe pattern is a messaging pattern in which a publisher sends a message to a topic, and any number of subscribers can subscribe to that topic to receive the message. The publish-subscribe pattern is also known as the “observer pattern” and is a way of implementing communication between different parts of an application in a decoupled way.

The main advantage of using the publish-subscribe pattern is that it allows for a clear separation of concerns between the publisher and the subscribers, and it can improve the flexibility and scalability of the system. Additionally, it allows for loose coupling between components, meaning that the publisher and subscribers are not aware of each other’s existence, and can be developed, deployed, and scaled independently.

# `Distributed`

Distributed systems refer to the design and organization of software components that are distributed across multiple devices or locations, connected via a network, and work together to achieve a common goal. The main challenge in designing distributed systems is dealing with the inherent complexity that arises from the distribution of components and the communication between them, and it requires techniques such as load balancing, replication, and partitioning to improve scalability, fault-tolerance, and performance. Additionally, security and coordination are also important aspects of distributed systems.

## `Client Server`

The client-server architecture is a common architecture pattern used in distributed systems, where a client (or multiple clients) send requests to a server, and the server responds to those requests. The client and server are separate entities that communicate over a network, such as the Internet or a local network.

The client is responsible for presenting the user interface and handling user input, while the server is responsible for processing the requests and returning the appropriate response. The server can also handle tasks such as data storage, security, and business logic.

## `Peer to Peer`

Peer-to-peer (P2P) architecture is a distributed computing architecture in which each node (peer) in the network acts as both a client and a server. In P2P architecture, there is no central authority or server that manages the network, and each node communicates directly with other nodes to exchange information, share resources, and perform computations.

The main advantage of using P2P architecture is that it allows for a more decentralized and fault-tolerant system. As there is no central authority, there is no single point of failure, and the network can continue to function even if some nodes fail. Additionally, P2P architecture can also improve scalability as the number of nodes in the network increases.

# `Structural`

Structural architecture in software refers to the organization and design of the components of a software system, and how they interact with each other. It deals with the physical organization of the system, and the relationships between the different components.

## `Component Based`

In software architecture, component-based design (CBD) is an approach to designing software systems by composing them from a set of reusable and independent software components. These components encapsulate specific functionality and can be easily integrated into different parts of the system, allowing for a more modular and flexible design.

In CBD, a software system is divided into a set of components, each of which has a well-defined interface and a specific responsibility. These components can be developed, tested, and deployed independently, making it easier to add new features, modify existing ones, and maintain the system.

## `Monolithic`

In software architecture, monolithic architecture is a design approach in which a software system is built as a single, integrated, and self-contained unit. In a monolithic architecture, all the components of the system are tightly coupled and depend on each other. This means that changes in one part of the system may affect other parts of the system.

A monolithic architecture is often used for small to medium-sized systems, where the complexity of the system is manageable and the need for scalability and flexibility is not as high. In a monolithic architecture, the entire system is typically built, deployed, and executed as a single unit, which can make it easier to understand and manage the system.

## `Layered`

In software architecture, layered architecture is a design approach in which a software system is divided into a set of layers, each of which has a specific responsibility and communicates with the other layers through well-defined interfaces. This approach allows for a more modular and flexible design, where each layer can be developed, tested, and deployed independently, making it easier to add new features, modify existing ones, and maintain the system.

A layered architecture is often used for large and complex systems, where the need for scalability and flexibility is high. Each layer in a layered architecture is responsible for a specific functionality and can be thought of as a “black box” with a well-defined interface. The layers communicate with each other through these interfaces, allowing for a clear separation of concerns.

[TOP](#architectural-styles)
