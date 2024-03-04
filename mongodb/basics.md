[Volver al Menú](./root.md)

# `MongoDB Basics`

`MongoDB` is a popular `NoSQL` database system that stores data in Flexible JSON-like documents, making it suitable for working with large scale and unstructured data.

- `Database`: Stores all your collections within a MongoDB instance.
- `Collection`: A group of related documents, similar to a table in a relational database.
- `Document`: A single record within a collection, which is stored as BSON (Binary JSON) format.
- `Field`: A key-value pair within a document.
- `_id`: A unique identifier automatically generated for each document within a collection.

## `Basic Operations`

- `Insert`: To insert a single document, use `db.collection.insertOne()`. For inserting multiple documents, use `db.collection.insertMany()`.
- `Find`: Fetch documents from a collection using `db.collection.find()`, and filter the results with query criteria like `{field: value}`. To fetch only one document, use `db.collection.findOne()`.
- `Update`: Update fields or entire documents by using update operators like `$set` and` $unset` with `db.collection.updateOne()` or `db.collection.updateMany()`.
- `Delete`: Remove documents from a collection using `db.collection.deleteOne()` or `db.collection.deleteMany()` with query criteria.
- `Drop`: Permanently delete a collection or a database using `db.collection.drop()` and `db.dropDatabase()`.

## `Indexes and Aggregations`

- `Indexes`: Improve the performance of searches by creating indexes on fields within a collection using db.collection.createIndex() or build compound indexes for querying multiple fields.
- `Aggregations`: Perform complex data processing tasks like filtering, grouping, transforming, and sorting using aggregation operations like `$match`, `$group`, `$project`, and `$sort`.

## `Data Modeling`

MongoDB’s flexible schema allows for various data modeling techniques, including:

- `Embedded Documents`: Store related data together in a single document, which is suitable for one-to-one or one-to-few relationships.
- `Normalization`: Store related data in separate documents with references between them, suitable for one-to-many or many-to-many relationships.
- `Hybrid Approach`: Combine embedded documents and normalization to balance performance and storage needs.

# `SQL vs NoSQL`

When discussing databases, it’s essential to understand the difference between SQL and NoSQL databases, as each has its own set of advantages and limitations. 

## `SQL Databases`

SQL (Structured Query Language) databases are also known as relational databases. They have a predefined schema, and data is stored in tables consisting of rows and columns. 

### `Advantages of SQL databases:`

- `Predefined schema`: Ideal for applications with a fixed structure.
- `ACID transactions`: Ensures data consistency and reliability.
- `Support for complex queries`: Rich SQL queries can handle complex data relationships and aggregation operations.
- `Scalability`: Vertical scaling by adding more resources to the server (e.g., RAM, CPU).

### `Limitations of SQL databases:`

- `Rigid schema`: Data structure updates are time-consuming and can lead to downtime.
- `Scaling`: Difficulties in horizontal scaling and sharding of data across multiple servers.
- `Not well-suited for hierarchical data`: Requires multiple tables and JOINs to model tree-like structures.

## `NoSQL Databases`

`NoSQL` (Not only SQL) databases refer to non-relational databases, which don’t follow a fixed schema for data storage. Instead, they use a flexible and semi-structured format like JSON documents, key-value pairs, or graphs. `MongoDB`, `Cassandra`, `Redis`, and `Couchbase` are some popular `NoSQL` databases.

### `Advantages of NoSQL databases:`

- `Flexible schema`: Easily adapts to changes without disrupting the application.
- `Scalability`: Horizontal scaling by partitioning data across multiple servers (sharding).
- `Fast`: Designed for faster read and writes, often with a simpler query language.
- `Handling large volumes of data`: Better suited to managing big data and real-time applications.
- `Support for various data structures`: Different NoSQL databases cater to various needs, like document, graph, or key-value stores.

### `Limitations of NoSQL databases:`

- `Limited query capabilities`: Some NoSQL databases lack complex query and aggregation support or use specific query languages.
- `Weaker consistency`: Many NoSQL databases follow the BASE (Basically Available, Soft state, Eventual consistency) properties that provide weaker consistency guarantees than ACID-compliant databases.

# `What is MongoDB`

MongoDB is an open-source, document-based, and cross-platform NoSQL database that offers high performance, high availability, and easy scalability. It differs from traditional relational databases by utilizing a flexible, schema-less data model built on top of BSON (Binary JSON), allowing for non-structured data to be easily stored and queried.

## `Key Features of MongoDB`

- `Document-oriented`: MongoDB stores data in JSON-like documents (BSON format), meaning that the data model is very flexible and can adapt to real-world object representations easily.

- `Scalability`: MongoDB offers automatic scaling, as it can be scaled horizontally by sharding (partitioning data across multiple servers) and vertically by adding storage capacity.

- `Indexing`: To enhance query performance, MongoDB supports indexing on any attribute within a document.

- `Replication`: MongoDB provides high availability through replica sets, which are primary and secondary nodes that maintain copies of the data.

- `Aggregation`: MongoDB features a powerful aggregation framework to perform complex data operations, such as transformations, filtering, and sorting.

- `Support for ad hoc queries`: MongoDB supports searching by field, range, and regular expression queries.

# `When to use MongoDB?`

MongoDB is an ideal database solution in various scenarios

- Handling Large Volumes of Data
- Flexible Schema
- High Availability
- Real-Time Analytics & Reporting
- Geo-spatial Queries
- Rapid Application Development

## `Summary`

In conclusion, you should consider using MongoDB when dealing with large volumes of data, requiring a flexible schema, needing high availability, handling location-based data, or aiming for rapid application development. However, always evaluate its suitability based on your specific project requirements and performance goals.

# `What is MongoDB Atlas?`

MongoDB Atlas is a fully managed cloud-based database service built and maintained by MongoDB. The Atlas platform is available on major cloud providers like AWS, Azure, and Google Cloud Platform, allowing developers to deploy, manage, and scale their MongoDB clusters in a seamless and efficient manner.

MongoDB Atlas is a powerful and versatile database service that simplifies and enhances the process of deploying, managing, and scaling MongoDB instances in the cloud. With its robust set of features and security capabilities, Atlas is an ideal choice for developers who want to build and maintain scalable and efficient applications using MongoDB.

# `MongoDB Terminology`

This section of the guide will introduce you to the basic terminology used while working with MongoDB. Understanding these terms will help you to grasp the fundamentals of MongoDB and make it easier for you to follow along with the rest of the guide.

## `MongoDB Terminology`

- `Database`: A MongoDB database is used to store and manage a set of collections. It consists of various collections, indexes, and other essential data structures required to store the data efficiently.
- `Collection`: A collection in MongoDB is a group of documents. The name of a collection must be unique within its database. Collections can be viewed as the table equivalencies in a relational database.
- `Document`: A document is a record in a MongoDB collection. It is comprised of a set of fields, similar to a row in a relational database. However, unlike tables in a relational database, no schema or specific structure is enforced on the documents within a collection.
- `Field`: A field in MongoDB is a key-value pair inside a document. It can store various types of data, including strings, numbers, arrays, and other documents. Fields in MongoDB can be seen as columns in a relational database.
- `Index`: Indexes in MongoDB are data structures that improve the speed of common search operations. They store a small portion of the dataset in a well-organized structure. This structure allows MongoDB to search and sort documents faster by reducing the number of documents it has to scan.
- `Query`: A query in MongoDB is used to retrieve data from the database. It retrieves specific documents or subsets of documents from a collection based on a given condition.
- `Cursor`: A cursor is a pointer to the result set of a query. It allows developers to process individual documents from the result set in an efficient manner.
- `Aggregation`: Aggregation in MongoDB is the process of summarizing and transforming the data stored in collections. It is used to run complex analytical operations on the dataset or create summary reports.
- `Replica Set`: A replica set in MongoDB is a group of mongodb instances that maintain the same data set. It provides redundancy, high availability, and automatic failover in case the primary node becomes unreachable.
- `Sharding`: Sharding is a method of distributing data across multiple machines. It is used in MongoDB to horizontally scale the database by partitioning the dataset into smaller, more manageable chunks called shards.

[TOP](#mongodb-basics)

