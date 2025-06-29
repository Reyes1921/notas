[Volver al Menú](../root.md)

# `Data Definition Language (DDL)`

Data Definition Language (`DDL`) is a subset of SQL. Its primary function is to create, modify, and delete database structures but not data.

- `CREATE TABLE`
- `DROP TABLE`
- `ALTER TABLE`
- `TRUNCATE TABLE`
- `RENAME TABLE`

# `Create Table`

The `CREATE TABLE` statement in SQL is a Data Definition Language (DDL) command used to create a new table in the database.

```
CREATE TABLE Employees (
    ID int,
    Name varchar(255),
    Salary int,
    Department varchar(255),
    Position varchar(255)
);
```

# `Alter Table`

The `ALTER TABLE` command in SQL is used to add, delete/drop, or modify columns in an existing table. It’s also useful for adding and dropping constraints such as primary key, foreign key, etc.

`Add Column`

```
ALTER TABLE tableName
ADD columnName datatype;
```

`Drop Column`

```
ALTER TABLE tableName
DROP COLUMN columnName;
```

```
ALTER TABLE tableName
DROP (columnName1,
       columnName2,
       ...
      );
```

`Modify Column`

```
ALTER TABLE tableName
ALTER COLUMN columnName TYPE newDataType;
```

`Add/Drop Constraints`

```
ALTER TABLE tableName
ADD CONSTRAINT constraintName
PRIMARY KEY (column1, column2, ... column_n);
```

```
ALTER TABLE tableName
DROP CONSTRAINT constraintName;
```

# `Truncate Table`

The `TRUNCATE TABLE` statement is a Data Definition Language (DDL) operation that is used to mark the extents of a table for deallocation (empty for reuse). The result of this operation quickly removes all data from a table, typically bypassing a number of integrity enforcing mechanisms intended to protect data (like triggers).

It effectively eliminates all records in a table, but not the table itself. Unlike the DELETE statement, `TRUNCATE TABLE` does not generate individual row delete statements, so the usual overhead for logging or locking does not apply.

```
TRUNCATE TABLE table_name;
```

## `Example`

If you have a table named Orders and you want to delete all its records, you would use:

```
TRUNCATE TABLE Orders;
```

After executing this statement, the Orders table would still exist, but it would be empty.

## `Limitations`

Truncate preserves the structure of the table for future use. But you can’t truncate a table that:

- Is referenced by a FOREIGN KEY constraint. (You can truncate a table that has a foreign key that references itself.)
- Participates in an indexed view.
- Is published by using transactional replication or merge replication.

If you try to truncate a table with a foreign key constraint, SQL Server will prevent you from doing so and you will have to use the DELETE statement instead.

# `Drop Table`

The `DROP TABLE` statement is a Data Definition Language (DDL) operation that is used to completely remove a table from the database. This operation deletes the table structure along with all the data in it, effectively removing the table from the database system.

When you execute the `DROP TABLE` statement, it eliminates both the table and its data, as well as any associated indexes, constraints, and triggers. Unlike the TRUNCATE TABLE statement, which only removes data but keeps the table structure, `DROP TABLE` removes everything associated with the table.

[TOP](#data-definition-language-ddl)
