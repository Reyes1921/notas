[Volver al Menú](./root.md)

# `Data Model and Data Types`

In MongoDB, data is stored in BSON format, which supports various data types. Understanding these data types is essential as they play a crucial role in schema design and query performance. 

# `Double`

A Double in MongoDB is a 64-bit floating-point number used to store numerical values that require high precision. This data type is suitable for situations where fractional values or very large numbers are needed (e.g., decimal numbers, scientific calculations, etc.).

```
{
    "_id" : ObjectId("5d5c361494341a5f5c529cdc"),
    "name" : "Pi",
    "value" : 3.141592653589793
}
```

# `Array`

In this section, we will discuss the Array datatype in MongoDB. Arrays are used to store multiple values in a single field of a MongoDB document. Arrays can contain values of different data types, including strings, numbers, dates, objects, and other embedded arrays.

```
{
  "_id": ObjectId("123xyz"),
  "name": "John Doe",
  "hobbies": ["reading", "swimming", "coding"]
}
```

## `Updating Arrays`

You can update documents containing arrays by using operators like `$push`, `$addToSet`, `$pull`, and `$pop`.

```
db.collection.updateOne(
  { _id: ObjectId('123xyz') },
  { $push: { hobbies: 'painting' } }
);
```

# `String`

A string in MongoDB represents the sequence of characters or text. It’s a powerful and flexible data type that can hold anything, from names and descriptions to lengthy texts. Strings in MongoDB are UTF-8 encoded, which makes them compatible with a wide range of characters from many languages.

```
{
    "name": "John Doe",
    "city": "New York",
    "description": "A software developer working at XYZ company.",
}
```

# `Object`

In MongoDB, the Object data type (or BSON data type) is used to represent embedded documents, which are essentially documents inside another document. An object is a key-value pair, where the key is a string and the value can be of any data type supported by MongoDB, including other objects or arrays. This data type is fundamental to MongoDB’s flexibility and the schema-less design of the database.

```
{
  "_id": ObjectId("507f191e810c19729de860ea"),
  "name": "Alice",
  "age": 28,
  "address": {
    "street": "Main Street",
    "city": "New York",
    "state": "NY"
  }
}
```

# `Binary data`

Binary Data is a datatype in MongoDB that is used to store binary content like images, audio files, or any other data that can be represented in binary format. This datatype is particularly useful when you need to store large files, manipulate raw binary data, or work with data that cannot be encoded as UTF-8 strings.

## `Working with Binary Data in MongoDB`

To work with binary data in MongoDB, you will need to utilize the Binary class provided by your MongoDB driver. This class offers methods to create, encode, and decode binary data objects.

```
from bson.binary import Binary
from bson import ObjectId

# Create a binary data object
image_data = open("image.jpg", "rb").read()
binary_image_data = Binary(image_data)

# Storing binary data in a MongoDB collection
data_collection = db.collection_name
document = {
    "name": "Sample Image",
    "image_data": binary_image_data,
}
stored_data = data_collection.insert_one(document)
```

# `Undefined`

In this section, we will discuss the “undefined” datatype in MongoDB. This datatype was originally used in the early versions of MongoDB, but now it is deprecated and should not be used in new applications.

## `Why should it not be used?`

In the newer versions of MongoDB, it is recommended to use the null value for representing missing or undefined values in the database. Although the undefined datatype is still supported for backward compatibility, it is advised to avoid the use of it, as the null value is more widely accepted and understood.

```
{
  "field1": null,
  "field2": undefined
}
```

# `ObjectId`

Object ID is a unique identifier in MongoDB and one of its primary datatypes. It is the default identifier created by MongoDB when you insert a document into a collection without specifying an _id.

## `Structure of an Object ID`

An Object ID consists of 12 bytes, where:

- The first 4 bytes represent the timestamp of the document’s creation in seconds since the Unix epoch.
- The next 3 bytes contain a unique identifier of the machine where the document was created, usually calculated using its hostname.
- Following that, 2 bytes represent the process ID of the system where the document was created.
- The last 3 bytes are a counter that starts from a random value, incremented for each new document created.

## `Benefits of Object ID`

- The generation of the Object ID is unique, ensuring that no two documents have the same _id value in a collection.
- The structure of the Object ID provides important information about the document’s creation, such as when and where it was created.
- The Object ID enables efficient indexing and high performance in large-scale MongoDB deployments.

# `Boolean`

The Boolean data type in MongoDB is used to store true or false values. Booleans are used when you want to represent a binary state, where a field can have one of two possible values. MongoDB supports the standard `true` and `false` literals for this data type.

```
{
    "name": "John Doe",
    "isActive": true,
    "email": "john.doe@example.com"
}
```

# `Date`

In MongoDB, the Date datatype is used to store the date and time values in a specific format. This is essential when working with date-based data, such as recording timestamps, scheduling events, or organizing data based on time.

## `Date Format`

MongoDB internally stores dates as the number of milliseconds since the Unix epoch (January 1, 1970). This BSON data format makes it efficient for storing and querying date values. However, when working with dates in your application, it is common to use a human-readable format such as ISO 8601.

`const currentDate = new Date();`

```
db.events.updateOne(
  { _id: ObjectId('your_document_id') },
  {
    $set: {
      title: 'Sample Event',
      eventDate: { $currentDate: { $type: 'date' } }
    }
  }
);
```

# `Null`

In MongoDB, the null data type represents a missing value or a field that’s purposely set to have no value. This is an important data type when you need to represent the absence of a value in a specific field, for example, when a field is optional in your documents.

```
db.users.insertOne({
  name: 'Alice',
  email: 'alice@example.com',
  phone: null,
});
```

# `Regular Expression`

In MongoDB, regular expressions (regex) are a powerful data type that allows you to search for patterns within text strings. They can be used in query operations to find documents that match a specific pattern and are particularly useful when working with text-based data or when you don’t have an exact match for your query.

```
// Creating a regex to find documents containing the word 'example'
var regex = /example/i; // Using JavaScript regex syntax with 'i' flag (case-insensitive)
var bsonRegex = new RegExp('example', 'i'); // Using BSON RegExp type
```

```
db.collection.find({ field: /example/i }); // Using plain regex pattern
db.collection.find({ field: { $regex: /example/i } }); // Using $regex operator
```


# `JavaScript`

In MongoDB, JavaScript is a valuable data type that allows you to store and manipulate code within the database effectively. This data type can be beneficial when working with complex data structures and scenarios that require more flexibility than what the standard BSON types offer. In this section, we will discuss the JavaScript data type, its usage, and some limitations.

## `Usage`

You can store JavaScript directly within MongoDB as a string value, and you can also access JavaScript functions in the context of the mongo shell or MongoDB server. To store JavaScript code, you can use the Code BSON data type or the $function operator, introduced in version 4.4.

```
db.scripts.insert({
  name: 'helloWorld',
  code: new Code("function() { return 'Hello World!'; }"),
});
```

## `Limitations`

While incredibly flexible, there are some limitations when using JavaScript in MongoDB:

- `Performance`: JavaScript execution in MongoDB is slower compared to native BSON queries, so it should not be the first choice for high-performance applications.

- `Concurrency`: JavaScript in MongoDB is single-threaded, which can lead to reduced concurrency and potential blocking if several operations rely on JavaScript code execution.

- `Security`: Storing and executing JavaScript code may present security risks like code injection attacks. Ensure proper precautions, such as validation and role management, are in place to minimize such risks.

# `Symbol`

The Symbol datatype is a legacy data type in MongoDB. It was primarily used to store textual data with some additional metadata but is now deprecated and advised not to be used for new projects.

Although you might encounter Symbols in older databases, it’s recommended to use the String datatype for new projects or migrate existing symbols to strings, as they don’t provide any advantage over the String datatype.

```
{
  "_id" : ObjectId("6190e2d973f6e571b47537a0"),
  "title" : Symbol("Hello World"),
  "description" : "A simple example of the Symbol datatype"
}
```

# `Int32 / Int`

In MongoDB, the int (short for integer) data type is used for storing whole numbers without a fractional component. Integers can be either positive or negative and are commonly used in scenarios requiring counting or ranking, such as user’s ages, product quantity, or the number of upvotes.

```
{
  "name": "John Doe",
  "age": 30,
  "upvotes": 150
}
```

# `Int64 / Long`

The Long data type in MongoDB is a 64-bit integer, which is useful when you need to store large integral values beyond the range of the standard int (32-bit integer) data type. The range for the Long data type is from -2^63 to 2^63 - 1. This data type is suitable for applications that require high-precision numerical data, such as analytics and scientific calculations.

```
{
  "largeValue": { "$numberLong": "1234567890123456789" }
}
```

# `Timestamp`

A “Timestamp” in MongoDB is a specific datatype used for tracking the time of an event or a document modification. It’s a 64-bit value containing a 4-byte incrementing ordinal for operations within a given second and a 4-byte timestamp representing the seconds since the Unix epoch (Jan 1, 1970).

```
new Timestamp(t, i);
```

For example, to create a Timestamp for the current time:

```
var currentTimestamp = new Timestamp(
  Math.floor(new Date().getTime() / 1000),
  1
);
```

To query documents based on their Timestamp, you can use the `$gt`, `$gte`, `$lt`, or `$lte` query operators:

```
// Find all documents with a Timestamp greater than a specified date
db.collection.find({
  timestampFieldName: {
    $gt: new Timestamp(Math.floor(new Date('2021-01-01').getTime() / 1000), 1),
  },
});
```

# `Decimal128`

Decimal128 is a high-precision 128-bit decimal-based floating-point data type in MongoDB. It provides greater precision and a larger range for storing decimal numbers compared to other common floating-point data types like Double.

```
db.example.insertOne({
  amount: {
    $numberDecimal: '1234.567890123456789012345678901234',
  },
});
```

# `Min Key`

In this section, we will discuss the “Min Key” data type in MongoDB. It represents the lowest possible BSON value in the sorting order, making it useful when you need to compare values across documents.

## `What is Min Key?`

Min Key is a unique data type in MongoDB that is used to represent the smallest value possible when performing sorting operations. It is often used in queries or schema design when you need to ensure that a specific field has the lowest possible value compared to other BSON types.

# `Max Key`

Max Key is a special data type in MongoDB that is used mainly for sorting and comparing values. It has the unique characteristic of being greater than all other BSON types during the sorting process. This makes Max Key quite useful when you need to create a document that should always appear after other documents in a sorted query or when you are setting a limit for a range of data, and you want to ensure that nothing exceeds that limit.

## `Properties`

- Max Key is a constant that holds the value greater than any other BSON data type value.
- It is used for comparing and sorting values in MongoDB collections.
- Max Key is a part of the BSON data type, which is the primary data format used in MongoDB for storing, querying, and returning documents.
- Max Key is not to be confused with a regular value in a document and is primarily used for internal purposes.

# `BSON vs JSON`

In MongoDB, data is stored in a binary format called BSON (Binary JSON), which is a superset of JSON (JavaScript Object Notation). While both BSON and JSON are used to represent data in MongoDB, they have some key differences.

## `BSON`

`BSON` is a binary-encoded serialization of JSON-like documents. It is designed to be efficient in storage, traversability, and encoding/decoding. Some of its key features include:

- Binary Encoding: BSON encodes data in a binary format, which offers better performance and allows the storage of data types not supported by JSON.
- Support for Additional Data Types: BSON supports more data types compared to JSON, such as Date, Binary, ObjectId, and Decimal128. This makes it possible to represent diverse data more accurately in MongoDB documents.
- Efficient Traversability: In BSON, the size of each element is encoded, which makes it easy to skip over elements, thus making the traversal faster.

## `JSON`

`JSON` is a lightweight and human-readable data representation format that can be easily parsed and generated by many programming languages. It is used widely as a medium for transmitting data over the web. Some features of JSON include:

- Human-readable: JSON is textual with a simple structure, making it easy for humans to read and write.
- Interoperable: JSON can be easily parsed and generated by many different programming languages, making it a popular choice for data interchange between applications.
- Limited Data Types: JSON supports fewer data types compared to BSON, such as strings, numbers, booleans, and null. This means that some data, like dates or binary data, must be represented as strings or custom objects in JSON.

## `Summary`

While BSON and JSON are related, they serve different purposes in the context of MongoDB:

- BSON is the binary format used by MongoDB to store and retrieve data efficiently with support for additional native data types.
- JSON, being a more human-readable and widely used format, is typically used for data interchange between MongoDB and applications.

By using BSON internally, MongoDB can take advantage of its benefits in storage, traversability, and a richer data type representation while still providing the interoperability and readability of JSON through query interfaces and drivers.

# `Embedded Documents and Arrays`

In MongoDB, one of the powerful features is the ability to store complex data structures like Embedded Documents Arrays. These are essentially arrays of sub-documents (also known as nested documents) that can be stored within a single document. This allows us to model complex data relationships in a highly efficient way while maintaining good performance.

## `What are Embedded Documents Arrays?`

```
{
    _id: 1,
    name: 'John Doe',
    addresses: [
        {
            street: '123 Main St',
            city: 'New York',
            zipcode: '10001'
        },
        {
            street: '456 Broadway',
            city: 'Los Angeles',
            zipcode: '90001'
        }
    ]
}
```

Overall, Embedded Documents Arrays are a powerful feature in MongoDB, allowing you to store complex data relationships in a performant and efficient manner. Use them wisely to take full advantage of MongoDB’s flexibility and scalability.

[TOP](#data-model-and-data-types)