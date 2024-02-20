[Volver al Menú](./root.md)

# `Axios`

The most common way for frontend programs to communicate with servers is through the HTTP protocol. You are probably familiar with the Fetch API and the XMLHttpRequest interface, which allows you to fetch resources and make HTTP requests.

Axios is a `promise-based` HTTP Client for `node.js` and the browser. It is `isomorphic` (= it can run in the browser and nodejs with the same codebase). On the server-side it uses the native `node.js` `http` module, while on the client (browser) it uses XMLHttpRequests.

# `Features`

- Make XMLHttpRequests from the browser
- Make http requests from node.js
- Supports the Promise API
- Intercept request and response
- Transform request and response data
- Cancel requests
- Timeouts
- Query parameters serialization with support for nested entries
- Automatic request body serialization to:
    - JSON (application/json)
    - Multipart / FormData (multipart/form-data)
    - URL encoded form (application/x-www-form-urlencoded)
- Posting HTML forms as JSON
- Automatic JSON data handling in response
- Progress capturing for browsers and node.js with extra info (speed rate, remaining time)
- Setting bandwidth limits for node.js
- Compatible with spec-compliant FormData and Blob (including node.js)
- Client side support for protecting against XSRF

# `Installing`

```
npm install axios
```

# `The Axios Instance`

```
const instance = axios.create({
  baseURL: 'https://some-domain.com/api/',
  timeout: 1000,
  headers: {'X-Custom-Header': 'foobar'}
});
```

# `GET request`

```
async function getData() {
  try {
    const response = await axios.get(url);
    // handle the response
  } catch (error) {
    // handle the error
  }
}
```

# `POST request`

```
async function postData(data) {
  try {
    const response = await axios.post(url, data);
    // handle the response
  } catch (error) {
    // handle the error
  }
}
```

# `DELETE request`

```
async function deleteData(id) {
  try {
    const response = await axios.delete(`${url}/${id}`);
    // handle the response
  } catch (error) {
    // handle the error
  }
}
```

# `PUT request`

```
async function updateData(id, data) {
  try {
    const response = await axios.put(`${url}/${id}`, data);
    // handle the response
  } catch (error) {
    // handle the error
  }
}
```

# `PATCH request`

```
async function patchData(id, data) {
  try {
    const response = await axios.patch(`${url}/${id}`, data);
    // handle the response
  } catch (error) {
    // handle the error
  }
}
```

# `Handling Errors`

```
axios.get('/user/12345')
  .catch(function (error) {
    if (error.response) {
      // The request was made and the server responded with a status code
      // that falls out of the range of 2xx
      console.log(error.response.data);
      console.log(error.response.status);
      console.log(error.response.headers);
    } else if (error.request) {
      // The request was made but no response was received
      // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
      // http.ClientRequest in node.js
      console.log(error.request);
    } else {
      // Something happened in setting up the request that triggered an Error
      console.log('Error', error.message);
    }
    console.log(error.config);
  });
```

# `Cancellation`

Starting from v0.22.0 Axios supports AbortController to cancel requests in fetch API way:

```
const controller = new AbortController();

axios.get('/foo/bar', {
   signal: controller.signal
}).then(function(response) {
   //...
});
// cancel the request
controller.abort()
```

[TOP](#axios)