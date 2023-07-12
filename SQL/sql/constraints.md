[Volver al Menú](../root.md)

# `Data Constraints`

Data constraints in SQL are used to specify rules for the data in a table. Constraints are used to limit the type of data that can go into a table. This ensures the accuracy and reliability of the data in the table.

1. `NOT NULL Constraint`
2. `UNIQUE Constraint`
3. `PRIMARY KEY Constraint`
4. `FOREIGN KEY Constraint`
6. `CHECK Constraint`
7. `DEFAULT Constraint`
8. `INDEX Constraint`

# `Primary Key`

A primary key is a special relational database table field (or combination of fields) designated to uniquely identify all table records.

A primary key’s main features are:

- It must contain a unique value for each row of data.
- It cannot contain null values.

`Usage of Primary Key`

You define a primary key for a table using the PRIMARY KEY constraint. A table can have only one primary key. You can define a primary key in SQL when you create or modify a table.

`Create Table With Primary Key`

In SQL, you can create a table with a primary key by using CREATE TABLE syntax.

```
CREATE TABLE Employees (
    ID INT PRIMARY KEY,
    NAME TEXT,
    AGE INT,
    ADDRESS CHAR(50)
);
```

`Modify Table to Add Primary Key`

If you want to add a primary key to an existing table, you can use ALTER TABLE syntax.

```
ALTER TABLE Employees
ADD PRIMARY KEY (ID);
```

`Composite Primary Key`

We can also use multiple columns to define a primary key. Such key is known as composite key.

```
CREATE TABLE Customers (
    CustomerID INT,
    StoreID INT,
    CONSTRAINT pk_CustomerID_StoreID PRIMARY KEY (CustomerID,StoreID)
);
```

# `Foreign Key`

A foreign key is a key used to link two tables together. It is a field (or collection of fields) in one table that refers to the primary key in another table. The table with the foreign key is called the child table, and the one with the primary key is called the referenced or parent table.

```
ALTER TABLE child_table
ADD FOREIGN KEY (fk_column)
REFERENCES parent_table (parent_key_column)
```

`Example`

Suppose we have two tables, Orders and Customers where Orders table has a column customer_id that should point to a Customer. If Customers has a customer_id column as the primary key then you can create a foreign key as follows

```
ALTER TABLE Orders
ADD FOREIGN KEY (customer_id)
REFERENCES Customers (customer_id);
```

# `Unique`

The `UNIQUE` constraint ensures that all values in a column are different; that is, each value in the column should occur only once.

Both the `UNIQUE` and PRIMARY KEY constraints provide a guarantee for uniqueness for a column or set of columns. However, a primary key can contain only NULL, and each table can have only one primary key. On the other hand, a `UNIQUE` constraint allows for one NULL value, and a table can have multiple `UNIQUE` constraints.

```
CREATE TABLE table_name (
    column1 data_type UNIQUE,
    column2 data_type,
    column3 data_type,
   ....
);
```

`Example`

Suppose, for instance, we are creating a table named “Employees”. We want the “Email” column to contain only unique values to avoid any duplication in email addresses.

Here’s how we can impose a UNIQUE constraint on the “Email” column:

```
CREATE TABLE Employees (
    ID int NOT NULL,
    Name varchar (255) NOT NULL,
    Email varchar (255) UNIQUE
);
```

# `NOT NULL`

The `NOT NULL` constraint in SQL ensures that a column cannot have a NULL value. Thus, every row/record must contain a value for that column. It is a way to enforce certain fields to be mandatory while inserting records or updating records in a table.

For instance, if you’re designing a table for employee data, you might want to ensure that the employee’s id and name are always provided. In this case, you’d use the `NOT NULL` constraint.

```
CREATE TABLE Employees (
    ID int NOT NULL,
    Name varchar(255) NOT NULL,
    Age int,
    Address varchar(255)
);
```

# `CHECK`

In SQL, `CHECK` is a constraint that limits the value range that can be placed in a column. It enforces domain integrity by limiting the values in a column to meet a certain condition.

`CHECK` constraint can be used in a column definition when you create or modify a table.

```
CREATE TABLE table_name (
    column1 datatype CONSTRAINT constraint_name CHECK (condition),
    column2 datatype,
    ...
);
```

`Examples`

Here is an example of applying a CHECK constraint on a single column:

```
CREATE TABLE Employees (
    ID int NOT NULL,
    Age int,
    Salary int CHECK (Salary>0),
);
```

[TOP](#data-constraints)