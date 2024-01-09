[Volver al Menú](../root.md)

# `APIs`

API is the acronym for Application Programming Interface, which is a software intermediary that allows two applications to talk to each other.

# `HTTP Server`

# `Http module`

To make HTTP requests in Node.js, there is a built-in module HTTP in Node.js to transfer data over the HTTP. The HTTP module creates an HTTP server that listens to server ports and gives a response back to the client.

```
const http = require('http');
```

`Example #1`

```
const http = require('http');
 
// Create a server
http.createServer((request, response) => {
 
    // Sends a chunk of the response body
    response.write('Hello World!');
 
    // Signals the server that all of
    // the response headers and body
    // have been sent
    response.end();
}).listen(3000); // Server listening on port 3000
```

`Example #2`

```
const http = require('http');

const hostname = '127.0.0.1';
const port = 3000;

const server = http.createServer((req, res) => {
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/plain');
  res.end('Hello World\n');
});

server.listen(port, hostname, () => {
  console.log(`Server running at http://${hostname}:${port}/`);
});
```

# `Express.js`

Express is a node js web application framework that provides broad features for building web and mobile applications. It is used to build a single page, multipage, and hybrid web application.

```
$ npm install express
```

## `Hello World`

```
const express = require('express')
const app = express()
const port = 3000

app.get('/', (req, res) => {
  res.send('Hello World!')
})

app.listen(port, () => {
  console.log(`Example app listening on port ${port}`)
})
```

## `Express application generator`

Use the application generator tool, express-generator, to quickly create an application skeleton.

```
$ npx express-generator
```

## `Basic routing`

Routing refers to determining how an application responds to a client request to a particular endpoint, which is a URI (or path) and a specific HTTP request method (GET, POST, and so on).

Each route can have one or more handler functions, which are executed when the route is matched.

```
app.METHOD(PATH, HANDLER)
```

```
app.get('/', (req, res) => {
  res.send('Hello World!')
})
```

```
app.post('/', (req, res) => {
  res.send('Got a POST request')
})
```

```
app.put('/user', (req, res) => {
  res.send('Got a PUT request at /user')
})
```

```
app.delete('/user', (req, res) => {
  res.send('Got a DELETE request at /user')
})
```

## `Serving static files in Express`

To serve static files such as images, CSS files, and JavaScript files, use the express.static built-in middleware function in Express.

```
express.static(root, [options])
```

`Example`

```
app.use(express.static('public'))
```

Now, you can load the files that are in the public directory:

```
http://localhost:3000/images/kitten.jpg
http://localhost:3000/css/style.css
http://localhost:3000/js/app.js
http://localhost:3000/images/bg.png
http://localhost:3000/hello.html
```

[TOP](#apis)