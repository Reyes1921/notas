[Volver al Menú](../root.md)

# `Transactions`

A `transaction` in SQL is a unit of work that is performed against a database. Transactions are units or sequences of work accomplished in a logical order, whether in a manual fashion by a user or automatically by some sort of a database program.

Transactions are used to ensure data integrity and to handle database errors while processing. SQL transactions are controlled by the following commands:

`BEGIN TRANSACTION`
`COMMIT`
`ROLLBACK`

# `BEGIN`

In the context of SQL transactions, BEGIN is a keyword used to start a transaction. It marks the point at which the data referenced by a connection is logically consistent. After the BEGIN statement, the transaction is considered to be “open” and remains so until it is committed or rolled back.

Once you’ve initiated a transaction with BEGIN, all the subsequent SQL statements will be a part of this transaction until an explicit COMMIT or ROLLBACK is given.

```
BEGIN;

INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country)
VALUES ('Cardinal', 'Tom B. Erichsen', 'Skagen 21', 'Stavanger', '4006', 'Norway');

COMMIT;
```

In this example:

- `BEGIN`; marks the start of the transaction.
- The `INSERT` statement adds a new row of data to the Customers table.
- `COMMIT`; ends the transaction and permanently saves the changes made during this transaction.

Note: If something goes wrong with one of the SQL statements within the transaction (after the BEGIN; statement), you can choose to ROLLBACK the transaction, which means canceling all the changes made in this transaction up to the point of error.


# `COMMIT`

The SQL COMMIT command is used to save all the modifications made by the current transaction to the database. A COMMIT command ends the current transaction and makes permanent all changes performed in the transaction. It is a way of ending your transaction and saving your changes to the database.

After the SQL COMMIT statement is executed, it can not be rolled back, which means you can’t undo the operations. COMMIT command is used when the user is satisfied with the changes made in the transaction, and these changes can now be made permanent in the database.

```
START TRANSACTION;
UPDATE Account SET amount = amount - 2000 WHERE name = 'A';
UPDATE Account SET amount = amount + 2000 WHERE name = 'B';
COMMIT;
```

In this transaction, $2000 is transferred from account ‘A’ to account ‘B’. The COMMIT statement makes these changes permanent in the database.

Syntax with ROLLBACK:

```
START TRANSACTION;
UPDATE Account SET amount = amount - 2000 WHERE name = 'A';
UPDATE Account SET amount = amount + 2000 WHERE name = 'B';
IF @@ERROR != 0 
   ROLLBACK  
ELSE 
   COMMIT;
```

# `ROLLBACK`

The `ROLLBACK` command is a transactional control language (TCL) instruction that undoes an unsuccessful or unsatisfactory running transaction. This process also applies to SQL Server where all individual statements in SQL Server are treated as a single atomic transaction.

When a `ROLLBACK` command is issued, all the operations (such as Insert, Delete, Update, etc.) are undone and the database is restored to its initial state before the transaction started.

```
BEGIN TRANSACTION;

-- Adding new employee.
INSERT INTO Employee(ID, Name) VALUES(1, 'John');

-- Create a savepoint to be able to roll back to this point.
SAVEPOINT SP1;

-- Oh no! I made a mistake creating this employee. Let's roll back to the savepoint.
ROLLBACK TO SAVEPOINT SP1;

-- Now I can try again.
INSERT INTO Employee(ID, Name) VALUES(1, 'Jack');

-- Commit the changes.
COMMIT;
```

# `SAVEPOINT`

A savepoint is a way of implementing subtransactions (nested transactions) within a relational database management system by indicating a particular point within a transaction that a user can “roll back” to in case of failure. The main property of a savepoint is that it enables you to create a rollback segment within a transaction. This allows you to revert the changes made to the database after the Savepoint without having to discard the entire transaction.

A Savepoint might be used in instances where if a particular operation fails, you would like to revert the database to the state it was in before the operation was attempted, but you do not want to give up on the entire transaction.

```
START TRANSACTION;
INSERT INTO Table1 (Column1) VALUES ('Value1');

SAVEPOINT SP1;

INSERT INTO Table1 (Column1) VALUES ('Value2');

ROLLBACK TO SP1;

COMMIT;
```

# `ACID`

`ACID` are the four properties of relational database systems that help in making sure that we are able to perform the transactions in a reliable manner. It’s an acronym which refers to the presence of four properties: atomicity, consistency, isolation and durability.


# `Transaction Isolation Levels`

SQL supports four transaction isolation levels, each differing in how it deals with concurrency and locks to protect the integrity of the data. Each level makes different trade-offs between consistency and performance. Here is a brief of these isolation levels with relevant SQL statements.

- ### `READ UNCOMMITTED`
- ### `READ COMMITTED`
- ### `REPEATABLE READ`
- ### `SERIALIZABLE `

[TOP](#transactions)
