[Volver al Menú](../root.md)

# `APIs`

API is the acronym for Application Programming Interface, which is a software intermediary that allows two applications to talk to each other.

---

# `HTTP Server`

## `Http module`

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

## `Express.js`

Express is a node js web application framework that provides broad features for building web and mobile applications. It is used to build a single page, multipage, and hybrid web application.

```
$ npm install express
```

### `Hello World`

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

### `Express application generator`

Use the application generator tool, express-generator, to quickly create an application skeleton.

```
$ npx express-generator
```

### `Basic routing`

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

### `Serving static files in Express`

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

## `NestJS`

NestJS is a progressive Node.js framework for creating efficient and scalable server-side applications.

## `Fastify`

Fastify is a web framework highly focused on providing the best developer experience with the least overhead and a powerful plugin architecture, inspired by Hapi and Express.

---

# `Making API Calls`

## `Making API calls with HTTP`

You can make API calls using the `http` module in Node.js as well. Here are the two methods that you can use:

- `http.get()` - Make http GET requests.

```
http.get('http://localhost:8000/', (res) => {
  const { statusCode } = res;
  const contentType = res.headers['content-type'];

  let error;
  // Any 2xx status code signals a successful response but
  // here we're only checking for 200.
  if (statusCode !== 200) {
    error = new Error('Request Failed.\n' +
                      `Status Code: ${statusCode}`);
  } else if (!/^application\/json/.test(contentType)) {
    error = new Error('Invalid content-type.\n' +
                      `Expected application/json but received ${contentType}`);
  }
  if (error) {
    console.error(error.message);
    // Consume response data to free up memory
    res.resume();
    return;
  }

  res.setEncoding('utf8');
  let rawData = '';
  res.on('data', (chunk) => { rawData += chunk; });
  res.on('end', () => {
    try {
      const parsedData = JSON.parse(rawData);
      console.log(parsedData);
    } catch (e) {
      console.error(e.message);
    }
  });
}).on('error', (e) => {
  console.error(`Got error: ${e.message}`);
});

// Create a local server to receive data from
const server = http.createServer((req, res) => {
  res.writeHead(200, { 'Content-Type': 'application/json' });
  res.end(JSON.stringify({
    data: 'Hello World!'
  }));
});

server.listen(8000);
```

- `http.request()` - Similar to `http.get()` but enables sending other types of http requests (GET requests inclusive).

```
const options = new URL('http://abc:xyz@example.com');

const req = http.request(options, (res) => {
  // ...
});
```

## `Axios`

Axios is a promise-based HTTP Client for node.js and the browser. Used for making requests to web servers. On the server-side it uses the native node.js http module, while on the client (browser) it uses XMLHttpRequests.

`axios(config)`

```
// Send a POST request
axios({
  method: 'post',
  url: '/user/12345',
  data: {
    firstName: 'Fred',
    lastName: 'Flintstone'
  }
});
```

```
// GET request for remote image in node.js
axios({
  method: 'get',
  url: 'http://bit.ly/2mTM3nY',
  responseType: 'stream'
})
  .then(function (response) {
    response.data.pipe(fs.createWriteStream('ada_lovelace.jpg'))
  });
```

`axios(url[, config])`

```
// Send a GET request (default method)
axios('/user/12345');
```

### `Request method aliases`

For convenience aliases have been provided for all supported request methods.

- axios.request(config)
- axios.get(url[, config])
- axios.delete(url[, config])
- axios.head(url[, config])
- axios.options(url[, config])
- axios.post(url[, data[, config]])
- axios.put(url[, data[, config]])
- axios.patch(url[, data[, config]])
- axios.postForm(url[, data[, config]])
- axios.putForm(url[, data[, config]])
- axios.patchForm(url[, data[, config]])

# `Fetch`

[Fetch](../../JavaScript/apis/apis.md)

## `unfetch`

unfetch is a tiny 500b fetch “barely-polyfill”

## `Got`

Got is a lighter, human-friendly, and powerful HTTP request library explicitly designed to work with Node.js. It supports pagination, RFC compliant caching, makes an API request again if it fails, supports cookies out of the box, etc

# `Authentication`

## `JSON Web Token`

`JWT`, or` JSON-Web-Token`, is an open standard for sharing security information between two parties — a client and a server. Each JWT contains encoded JSON objects, including a set of claims. JWTs are signed using a cryptographic algorithm to ensure that the claims cannot be altered after the token is issued.

## `Passport js`

Passport.js is authentication middleware for Node.js. It makes implementing authentication in express apps really easy and fast. It is extremely flexible and modular. It uses “strategies” to support authentication using a username and password, Facebook, Twitter, and a lot of other sites.

[TOP](#apis)
