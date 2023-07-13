[Volver al Menú](../root.md)

# `What are Relational Databases?`

A relational database is a type of database that stores and organizes data in a structured way. It uses a structure that allows data to be identified and accessed in relation to other data in the database. Data in a relational database is stored in various data tables, each of which has a unique key identifying every row.

## `Modelo entidad-relación de base de datos relacional`

One of the main advantages of a relational database is its ability to represent relationships between tables. These relationships could be one-to-one, one-to-many, or many-to-many relationships. They allow for efficient querying and manipulation of related data across multiple tables.

- `One-to-One`: This is a relationship where a row in one table has a single corresponding row in another table. For example, a person could have a single passport, and a passport can only belong to one person.

- `One-to-Many`: This is a relationship where a row in one table can have multiple corresponding rows in another table. For example, a customer can have multiple orders, but an order can only belong to one customer.

- `Many-to-Many`: This is a relationship where multiple rows in one table can have multiple corresponding rows in another table. To represent a many-to-many relationship, a third table, called a junction table or associative table, is needed. For example, a student can enroll in multiple courses, and a course can have multiple students enrolled.

## `Breve historia`

El modelo de base de datos relacional fue creado en 1970 por Edgar Frank Codd desde los laboratorios de IBM, para mejorar la forma en que se consultaban los datos. Para comprender mejor cómo funciona y por qué es tan importante en la era digital, te explicaremos algunos conceptos fundamentales. 

Desarrollado por EF Codd desde IBM en la década de 1970, el modelo de base de datos relacional permite que cualquier tabla se relacione con otra mediante un atributo común. En lugar de usar estructuras jerárquicas para organizar los datos, Codd propuso un cambio a un modelo de datos en el que los datos se almacenan, se consultan y se relacionan en tablas sin reorganizar las tablas que los contienen. 

## `Ejemplos de bases de datos relacionales`

Ahora que comprendes cómo funcionan las bases de datos relacionales, puedes comenzar a conocer los diversos sistemas de administración de bases de datos relacionales que usa el modelo de base de datos relacional. Un sistema de administración de bases de datos relacionales (`RDBMS`) es un programa que se usa para crear, actualizar y administrar bases de datos relacionales. Algunos de los `RDBMS` más conocidos son `MySQL`, `PostgreSQL`, `MariaDB`, `Microsoft SQL Server` y `Oracle Database`. 

# `RDBMS Benefits and Limitations`

## `Beneficios de las bases de datos relacionales`

- `Structured Data`: RDBMS allows data storage in a structured way, using rows and columns in tables. This makes it easy to manipulate the data using SQL (Structured Query Language), ensuring efficient and flexible usage.

- `ACID Properties`: ACID stands for `Atomicity`, `Consistency`, `Isolation`, and `Durability`. These properties ensure reliable and safe data manipulation in a RDBMS, making it suitable for mission-critical applications.

- `Normalization`: RDBMS supports data normalization, a process that organizes data in a way that reduces data redundancy and improves data integrity.

- `Scalability`: RDBMSs generally provide good scalability options, allowing for the addition of more storage or computational resources as the data and workload grow.

- `Data Integrity`: RDBMS provides mechanisms like constraints, primary keys, and foreign keys to enforce data integrity and consistency, ensuring that the data is accurate and reliable.

- `Security`: RDBMSs offer various security features such as user authentication, access control, and data encryption to protect sensitive data.

## `Limitations`

- `Complexity`: 

Setting up and managing an RDBMS can be complex, especially for large applications. It requires technical knowledge and skills to manage, tune, and optimize the database.

- `Cost`: 

`RDBMSs` can be expensive, both in terms of licensing fees and the computational and storage resources they require.

- `Fixed Schema`: 

RDBMS follows a rigid schema for data organization, which means any changes to the schema can be time-consuming and complicated.

- `Handling of Unstructured Data`: 

`RDBMSs` are not suitable for handling unstructured data like multimedia files, social media posts, and sensor data, as their relational structure is optimized for structured data.

- `Horizontal Scalability`: 

`RDBMSs` are not as easily horizontally scalable as NoSQL databases. Scaling horizontally, which involves adding more machines to the system, can be challenging in terms of cost and complexity.

# `SQL vs NoSQL`

## `SQL Databases`

SQL (Structured Query Language) databases are also known as relational databases. They have a predefined schema, and data is stored in tables consisting of rows and columns. SQL databases follow the ACID (Atomicity, Consistency, Isolation, Durability) properties to ensure reliable transactions. Some popular SQL databases include MySQL, PostgreSQL, and Microsoft SQL Server.

## `NoSQL Databases`

NoSQL (Not only SQL) databases refer to non-relational databases, which don’t follow a fixed schema for data storage. Instead, they use a flexible and semi-structured format like JSON documents, key-value pairs, or graphs. MongoDB, Cassandra, Redis, and Couchbase are some popular NoSQL databases.

`Advantages of NoSQL databases:`

- `Flexible schema`: Easily adapts to changes without disrupting the application.
- `Scalability`: Horizontal scaling by partitioning data across multiple servers (sharding).
- `Fast`: Designed for faster read and writes, often with a simpler query language.
- `Handling large volumes of data`: Better suited to managing big data and real-time applications.
- `Support for various data structures`: Different NoSQL databases cater to various needs, like document, graph, or key-value stores.

`Limitations of NoSQL databases:`

- `Limited query capabilities`: Some NoSQL databases lack complex query and aggregation support or use specific query languages.
- `Weaker consistency`: Many NoSQL databases follow the BASE (Basically Available, Soft state, Eventual consistency) properties that provide weaker consistency guarantees than ACID-compliant databases.

[TOP](#what-are-relational-databases)