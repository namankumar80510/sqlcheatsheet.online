---
title: SQL Cheat Sheet
summary: "Access quick SQL references and examples for queries, joins, functions, etc. with our comprehensive cheat sheet! Dive into essential SQL commands, syntax, and tips for mastering databases."
---

Access quick SQL references and examples for queries, joins, functions with our comprehensive cheat sheet! Dive into essential SQL commands, syntax, and tips for mastering databases.

## Table of Contents

[TOC]

## Quick Intro to SQL

- SQL (Structured Query Language) is a standard programming language designed for managing and manipulating relational databases.
- It enables users to store, manipulate, and retrieve data from databases.
- SQL is used for various tasks such as querying data, inserting new data, updating existing data, and deleting data.
- It provides a wide range of commands and functions to perform these tasks, including SELECT, INSERT, UPDATE, DELETE, JOIN, and more.
- SQL operates on relational database management systems (RDBMS) like MySQL, PostgreSQL, SQL Server, Oracle, and SQLite.
- It uses a syntax based on English-like commands, making it relatively easy to learn and use for database operations.
- It is essential for developers, data analysts, and anyone dealing with databases to effectively manage and analyze data.

## SQL Basics: Quick Reference Cheat Sheet

Below, we have compiled a quick reference cheat sheet for SQL (Structured Query Language).

### WHERE Clause

```sql
SELECT column1, column2
FROM table_name
WHERE condition;
```

### GROUP BY Clause

```sql
SELECT column1, COUNT(*)
FROM table_name
GROUP BY column1;
```

### JOINs

```sql
SELECT column1, column2
FROM table1
JOIN table2 ON table1.column_name = table2.column_name;
```

### DISTINCT Keyword

```sql
SELECT DISTINCT column1, column2
FROM table_name;
```

### LIMIT Clause

```sql
SELECT column1, column2
FROM table_name
LIMIT number;
```

### AND / OR
```sql
SELECT column_name(s)
FROM table_name
WHERE condition
AND|OR condition
```

### ALTER TABLE
```sql
ALTER TABLE table_name
ADD column_name datatype
```
or
```sql
ALTER TABLE table_name
DROP COLUMN column_name
```

### AS (alias)
```sql
SELECT column_name AS column_alias
FROM table_name
```

or

```sql
SELECT column_name
FROM table_name AS table_alias
```

### BETWEEN
```sql
SELECT column_name(s)
FROM table_name
WHERE column_name
BETWEEN value1 AND value2
```

### CREATE DATABASE

```sql
CREATE DATABASE database_name
```

### CREATE TABLE

```sql
CREATE TABLE table_name
(
column_name1 data_type,
column_name2 data_type,
column_name3 data_type,
...
)
```

### CREATE INDEX
```sql
CREATE INDEX index_name
ON table_name (column_name)
```

or

```sql
CREATE UNIQUE INDEX index_name
ON table_name (column_name)
```

### CREATE VIEW
```sql
CREATE VIEW view_name AS
SELECT column_name(s)
FROM table_name
WHERE condition
```

### DELETE

```sql
DELETE FROM table_name
WHERE some_column=some_value
```

or, run the below code to delete the entire table.

```sql
DELETE FROM table_name
```

### DROP DATABASE
```sql
DROP DATABASE database_name
```

### DROP INDEX
```sql
DROP INDEX table_name.index_name (SQL Server)
DROP INDEX index_name ON table_name (MS Access)
DROP INDEX index_name (DB2/Oracle)
ALTER TABLE table_name
DROP INDEX index_name (MySQL)
```

### DROP TABLE
```sql
DROP TABLE table_name
```

### EXISTS
```sql
IF EXISTS (SELECT * FROM table_name WHERE id = ?)
BEGIN
--do what needs to be done if exists
END
ELSE
BEGIN
--do what needs to be done if not
END
```

### GROUP BY
```sql
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
```

### HAVING
```sql
SELECT column_name, aggregate_function(column_name)
FROM table_name
WHERE column_name operator value
GROUP BY column_name
HAVING aggregate_function(column_name) operator value
```

### IN
```sql
SELECT column_name(s)
FROM table_name
WHERE column_name
IN (value1,value2,...)
```

### INSERT INTO
```sql
INSERT INTO table_name
VALUES (value1, value2, value3,...)
```
or
```sql
INSERT INTO table_name
(column1, column2, column3,...)
VALUES (value1, value2, value3,...)
```

### INNER JOIN
```sql
SELECT column_name(s)
FROM table_name1
INNER JOIN table_name2
ON table_name1.column_name=table_name2.column_name
```

### LEFT JOIN
```sql
SELECT column_name(s)
FROM table_name1
LEFT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
```

### RIGHT JOIN
```sql
SELECT column_name(s)
FROM table_name1
RIGHT JOIN table_name2
ON table_name1.column_name=table_name2.column_name
```

### FULL JOIN
```sql
SELECT column_name(s)
FROM table_name1
FULL JOIN table_name2
ON table_name1.column_name=table_name2.column_name
```

### LIKE
```sql
SELECT column_name(s)
FROM table_name
WHERE column_name
LIKE pattern
```

### ORDER BY
```sql
SELECT column_name(s)
FROM table_name
ORDER BY column_name [ASC|DESC]
```

### SELECT
```sql
SELECT column_name(s)
FROM table_name
```

### SELECT *
```sql
SELECT *
FROM table_name
```

### SELECT DISTINCT
```sql
SELECT DISTINCT column_name(s)
FROM table_name
```

### SELECT INTO
```sql
SELECT *
INTO new_table_name [IN externaldatabase]
FROM old_table_name
```
or
```sql
SELECT column_name(s)
INTO new_table_name [IN externaldatabase]
FROM old_table_name
```

### SELECT TOP
```sql
SELECT TOP number|percent column_name(s)
FROM table_name
```

### TRUNCATE TABLE
```sql
TRUNCATE TABLE table_name
```

### UNION
```sql
SELECT column_name(s) FROM table_name1
UNION
SELECT column_name(s) FROM table_name2
```

### UNION ALL
```sql
SELECT column_name(s) FROM table_name1
UNION ALL
SELECT column_name(s) FROM table_name2
```

### UPDATE
```sql
UPDATE table_name
SET column1=value, column2=value,...
WHERE some_column=some_value
```
