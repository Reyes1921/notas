[Volver al Menú](../root.md)

# `Indexes`

An index in SQL is a database object which is used to improve the speed of data retrieval operations on a database table. Similarly to how an index in a book helps you find information quickly without reading the entire book, an index in a database helps the database software find data quickly without scanning the entire table.

- ## `Clustered Index`
- ## `Non-Clustered Index`
- ## `Indexes on Multiple Columns`
- ## `Unique Indexes`
- ## `Explicit vs Implicit Indexes`
- ## `Full-Text Indexes`

# `Managing Indexes`

Indexes can drastically speed up data retrieval in SQL databases by allowing the database to immediately locate the data needed without having to scan the entire database. However, these additional data structures also consume storage, and maintaining them can slow down any create, update, or delete operations, hence the need to manage them appropriately.

`Creating Indexes`
```
CREATE INDEX index_name
ON table_name(column_name);
```

`Removing Indexes`
```
DROP INDEX index_name;
```

`Listing Indexes`
```
SHOW INDEXES IN table_name;
```

`Modifying Indexes`
```
REINDEX INDEX index_name;
```

`Indexes and Performance`
```
While indexes can improve read speed, they also slow down write operations because each write must also update the index. That’s why it’s essential to find a balance between the number of indexes and database performance. Too many indexes can negatively impact performance.

Therefore, you should only create indexes when they are likely to be needed and when they will have a significant impact on improving query performance. You can use the SQL Server Profiler, MySQL’s slow query log, or other database-specific tools to identify the queries that are running slow, and then create indexes to optimize those queries. Regularly monitor your database performance to make sure that the indexes are still needed and that they are providing the expected improvements.
```

# `Query Optimization`

Query optimization is a function of SQL that involves tuning and optimizing a SQL statement so that the system executes it in the fastest and most efficient way possible. It includes optimizing the costs of computation, communication, and disk I/O.

## `Rewriting Queries`

This means changing the original SQL query to an equivalent one which requires fewer system resources. It’s usually done automatically by the database system.

```
SELECT * 
FROM Customers 
WHERE state = 'New York' AND city = 'New York';
```

The above query can be rewritten using a subquery for better optimization:

```
SELECT * 
FROM Customers 
WHERE state = 'New York' 
AND city IN (SELECT city 
              FROM Customers 
              WHERE city = 'New York');
```

## `Choosing the right index`

Indexes are used to find rows with specific column values quickly. Without an index, SQL has to begin with the first row and then read through the entire table to find the appropriate rows. The larger the table, the more costly the operation. Choosing a right and efficient index greatly influence on query performance.

```
CREATE INDEX index_name
ON table_name (column1, column2, ...);
```

## `Fine-tuning Database Design`

Improper database schema designs could result in poor query performances. While not strictly a part of query optimization, tuning the database design can speed up the query execution time drastically.

## `Use of SQL Clauses wisely`

The usage of certain SQL clauses can help in query optimization like `LIMIT`, `BETWEEN` etc.

Example,

```
SELECT column1, column2
FROM table_name
WHERE condition
LIMIT 10;
```

## `System Configuration`

Many database systems allow you to configure system parameters that control its behavior during query execution. For instance, in MySQL, you can set parameters like sort_buffer_size or join_buffer_size to tweak how MySQL would use memory during sorting and joining operations.

In PostgreSQL, you can set work_mem to control how much memory is utilized during operations such as sorting and hashing.

Always remember the goal of query optimization is to lessen the system resources usage in terms of memory, CPU time, and thus improve the query performance.

[TOP](#indexes)