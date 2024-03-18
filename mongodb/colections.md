[Volver al Menú](./root.md)

# `Collections`

In MongoDB, collections are used to organize documents. A collection can be thought of as a container or group used to store documents of similar structure, like a table in relational databases. However, unlike tables, collections don’t enforce a strict schema, offering more flexibility in managing your data.

## `Key Features`

- `Flexible Schema`: A collection can contain multiple documents with different structures or fields, allowing you to store unstructured or semi-structured data.

- `Dynamic`: Collections can be created implicitly or explicitly, and documents can be added or removed easily without affecting others in the collection.

# `insert() and relevant`

In MongoDB, collections are used to store documents. To add data into these collections, MongoDB provides two primary insertion methods: insertOne() and insertMany(). In this section, we’ll explore the usage and syntax of these methods, along with their options and some basic examples.

## `insertOne()`

The insertOne() method is used to insert a single document into a collection. This method returns an InsertOneResult object, that shows the outcome of the operation.

```
db.collection.insertOne(
   <document>,
   {
      writeConcern: <document>,
      ordered: <boolean>,
      bypassDocumentValidation: <boolean>,
      comment: <any>
   }
)
```

## `insertMany()`

The insertMany() method is used to insert multiple documents into a collection at once. It returns an InsertManyResult object, displaying the status of the operation.

```
db.collection.insertMany(
   [ <document_1>, <document_2>, ... ],
   {
      writeConcern: <document>,
      ordered: <boolean>,
      bypassDocumentValidation: <boolean>,
      comment: <any>
   }
)
```

# `find() and relevant`

In MongoDB, the find() method is an essential aspect of working with collections. It enables you to search for specific documents within a collection by providing query parameters. In this section, we’ll explore various find methods and how to filter, sort, and limit the search results.

## `Basic Find Method`

```
db.collection_name.find();
```

## `Query Filters`

```
db.users.find({ age: 25 });
```

## `Logical Operators`

```
db.users.find({ $and: [{ age: 25 }, { first_name: 'John' }] });
```

## `Projection`

```
db.users.find({ age: 25 }, { first_name: 1, age: 1 });
```

## `Sorting`

```
db.users.find().sort({ age: 1 });
```

## `Limit and Skip`

```
db.users.find().limit(5);
```

```
db.users.find().skip(10);
```

# `update() and relevant`

In MongoDB, update methods are used to modify the existing documents of a collection. They allow you to perform updates on specific fields or the entire document, depending on the query criteria provided. Here is a summary of the most commonly used update methods in MongoDB:

## `updateOne()`

This method updates the first document that matches the query criteria provided. The syntax for updateOne is:

```
db.collection.updateOne(<filter>, <update>, <options>)
```

## `updateMany()`

This method updates multiple documents that match the query criteria provided. The syntax for updateMany is:

```
db.collection.updateMany(<filter>, <update>, <options>)
```

## `replaceOne():`

This method replaces a document that matches the query criteria with a new document. The syntax for replaceOne is:

```
db.collection.replaceOne(<filter>, <replacement>, <options>)
```

# `deleteOne() and others`

When working with MongoDB, you will often need to delete documents or even entire collections to manage and maintain your database effectively. MongoDB provides several methods to remove documents from a collection, allowing for flexibility in how you choose to manage your data. In this section, we will explore key delete methods in MongoDB and provide examples for each.

## `db.collection.deleteOne()`

The deleteOne() method is used to delete a single document from a collection. It requires specifying a filter that selects the document(s) to be deleted. If multiple documents match the provided filter, only the first one (by natural order) will be deleted.

```
db.users.deleteOne({ firstName: 'John' });
```

## `db.collection.deleteMany()`

The deleteMany() method is used to remove multiple documents from a collection. Similar to deleteOne(), it requires specifying a filter to select the documents to be removed. The difference is that all documents matching the provided filter will be removed.

```
db.users.deleteMany({ country: 'Australia' });
```

## `db.collection.drop()`

In cases where you want to remove an entire collection, including the documents and the metadata, you can use the drop() method. This command does not require a filter, as it removes everything in the specified collection.

```
db.users.drop();
```

# `bulkWrite() and others`

Bulk write operations allow you to perform multiple create, update, and delete operations in a single command, which can significantly improve the performance of your application. MongoDB provides two types of bulk write operations:

- `Ordered Bulk Write`: In this type of bulk operation, MongoDB executes the write operations in the order you provide. If a write operation fails, MongoDB returns an error and does not proceed with the remaining operations.

```
const orderedBulk = db.collection('mycollection').initializeOrderedBulkOp();

orderedBulk.insert({ _id: 1, name: 'John Doe' });
orderedBulk.find({ _id: 2 }).updateOne({ $set: { name: 'Jane Doe' } });
orderedBulk.find({ _id: 3 }).remove();

orderedBulk.execute((err, result) => {
  // Handle error or result
});
```

- `Unordered Bulk Write`: In this type of bulk operation, MongoDB can execute the write operations in any order. If a write operation fails, MongoDB will continue to process the remaining write operations.

```
const unorderedBulk = db.collection('mycollection').initializeUnorderedBulkOp();

unorderedBulk.insert({ _id: 1, name: 'John Doe' });
unorderedBulk.find({ _id: 2 }).updateOne({ $set: { name: 'Jane Doe' } });
unorderedBulk.find({ _id: 3 }).remove();

unorderedBulk.execute((err, result) => {
  // Handle error or result
});
```

# `Counting Documents`

When working with MongoDB, you might often need to know the number of documents present in a collection. MongoDB provides a few methods to efficiently count documents in a collection. In this section, we will discuss the following methods:

- `countDocuments()`
- `estimatedDocumentCount()`

## `countDocuments()`

The countDocuments() method is used to count the number of documents in a collection based on a specified filter. It provides an accurate count that may involve reading all documents in the collection.

```
collection.countDocuments(filter, options);
```

## `estimatedDocumentCount()`

The estimatedDocumentCount() method provides an approximate count of documents in the collection, without applying any filters. This method uses the collection’s metadata to determine the count and is generally faster than countDocuments().

```
collection.estimatedDocumentCount(options);
```

# `validate()`

The validate command is used to examine a MongoDB collection to verify and report on the correctness of its internal structures, such as indexes, namespace details, or documents. This command can also return statistics about the storage and distribution of data within a collection.

```
db.runCommand({validate: "<collection_name>", options...})
```

## `Output`

The validate command returns an object that contains information about the validation process and its results.

```
{
    "ns": <string>, // Namespace of the validated collection
    "nIndexes": <number>, // Number of indexes in the collection
    "keysPerIndex": {
        <index_name>: <number> // Number of keys per index
    },
    "valid": <boolean>, // If true, the collection is valid
    "errors": [<string>, ...], // Array of error messages, if any
    "warnings": [<string>, ...], // Array of warning messages, if any
    "ok": <number> // If 1, the validation command executed successfully
}
```

[TOP](#collections)
