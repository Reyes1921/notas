[Volver al Menú](../root.md)

# `Error Handling`

Error handling is a way to find bugs and solve them as quickly as humanly possible. The errors in Node.js can be either operation or programmer errors. 

# `Error types`

Programming errors refer to situations that prevent a program from working properly. Experiencing different types of errors in programming is a huge part of the development process. 

### `Javascript Errors`

JavaScript Errors are used by JavaScript to inform developers about various issue in the script being executed. These issues can be syntax error where the developer/programmer has used the wrong syntax, it can be due to some wrong user input or some other problem.

JavaScript has six types of errors that may occur during the execution of the script:

- `EvalError`
- `RangeError`
- `ReferenceError`
- `SyntaxError`
- `TypeError`
- `URIError`

### `System Errors`

Node.js generates system errors when exceptions occur within its runtime environment. These usually occur when an application violates an operating system constraint. For example, a system error will occur if an application attempts to read a file that does not exist.

Below are the system errors commonly encountered when writing a Node.js program

- `EACCES` - Permission denied
- `EADDRINUSE` - Address already in use
- `ECONNRESET` - Connection reset by peer
- `EEXIST` - File exists
- `EISDIR` - Is a directory
- `EMFILE` - Too many open files in system
- `ENOENT` - No such file or directory
- `ENOTDIR` - Not a directory
- `ENOTEMPTY` - Directory not empty
- `ENOTFOUND` - DNS lookup failed
- `EPERM` - Operation not permitted
- `EPIPE` - Broken Pipe
- `ETIMEDOUT` - Operation timed out

### `User Specified Errors`

Using the built-in error classes or a generic instance of the Error object is usually not precise enough to communicate all the different error types. Therefore, it is necessary to create custom error classes to better reflect the types of errors that could occur in your application. For example, you could have a ValidationError class for errors that occur while validating user input, DatabaseError class for database operations, TimeoutError for operations that elapse their assigned timeouts, and so on.

```
function validateInput(input) {
  if (!input) {
    throw new ValidationError('Only truthy inputs allowed', input);
  }

  return input;
}

try {
  validateInput(userJson);
} catch (err) {
  if (err instanceof ValidationError) {
    console.error(`Validation error: ${err.message}, caused by: ${err.cause}`);
    return;
  }

  console.error(`Other error: ${err.message}`);
}
```

### `Assertion Errors`

An `AssertionError` in Node.js is an error that is thrown when the assert module determines that a given expression is not truthy. The assert module is a built-in Node.js module that provides a simple set of assertion tests that can be used to test the behavior of your code.

# `Uncaught Exceptions`

When a JavaScript error is not properly handled, an uncaughtException is emitted. These suggest the programmer has made an error, and they should be treated with the utmost priority.

The correct use of uncaughtException is to perform synchronous cleanup of allocated resources (e.g. file descriptors, handles, etc) before shutting down the process. It is not safe to resume normal operation after uncaughtException because system becomes corrupted. The best way is to let the application crash, log the error and then restart the process automatically using nodemon or pm2.

# `Async errors`

Errors must always be handled. If you are using synchronous programming you could use a try catch. But this does not work if you work asynchronous! Async errors will only be handled inside the callback function!

There are three ways to handle errors in async scenarios (not mutually inclusive):

- `Rejection`
- `Try/Catch`
- `Propagation`

### `Rejection`

So, when an error occurs in a synchronous function it's an exception, but when an error occurs in a Promise its an asynchronous error or a promise `rejection`. Basically, exceptions are synchronous errors and rejections are asynchronous errors.

```
function divideByTwo(amount) {
  return new Promise((resolve, reject) => {
    if (typeof amount !== 'number') {
      reject(new TypeError('amount must be a number'));
      return;
    }
    if (amount <= 0) {
      reject(new RangeError('amount must be greater than zero'));
      return;
    }
    if (amount % 2) {
      reject(new OddError('amount'));
      return;
    }
    resolve(amount / 2);
  });
}

divideByTwo(3);
```

### `Async Try/Catch`

The async/await syntax supports try/catch of rejections, which means that try/catch can be used on asynchronous promise-based APIs instead of the then and catch handlers.

```
async function run() {
  try {
    const result = await divideByTwo(1);
    console.log('result', result);
  } catch (err) {
    if (err.code === 'ERR_AMOUNT_MUST_BE_NUMBER') {
      console.error('wrong type');
    } else if (err.code === 'ERR_AMOUNT_MUST_EXCEED_ZERO') {
      console.error('out of range');
    } else if (err.code === 'ERR_MUST_BE_EVEN') {
      console.error('cannot be odd');
    } else {
      console.error('Unknown error', err);
    }
  }
}

run();
```

### `Propagation`

Another way of handling errors is propagation. Error propagation is where, instead of handling the error where it occurs, the caller is responsible for error handling. When using async/await functions, and we want to propagate an error we simply rethrow it.

```
class OddError extends Error {
  constructor(varName = '') {
    super(varName + ' must be even');
    this.code = 'ERR_MUST_BE_EVEN';
  }
  get name() {
    return 'OddError [' + this.code + ']';
  }
}

function codify(err, code) {
  err.code = code;
  return err;
}

async function divideByTwo(amount) {
  if (typeof amount !== 'number')
    throw codify(
      new TypeError('amount must be a number'),
      'ERR_AMOUNT_MUST_BE_NUMBER',
    );
  if (amount <= 0)
    throw codify(
      new RangeError('amount must be greater than zero'),
      'ERR_AMOUNT_MUST_EXCEED_ZERO',
    );
  if (amount % 2) throw new OddError('amount');
  // uncomment next line to see error propagation
  // throw Error('propagate - some other error');;
  return amount / 2;
}

async function run() {
  try {
    const result = await divideByTwo(4);
    console.log('result', result);
  } catch (err) {
    if (err.code === 'ERR_AMOUNT_MUST_BE_NUMBER') {
      throw Error('wrong type');
    } else if (err.code === 'ERRO_AMOUNT_MUST_EXCEED_ZERO') {
      throw Error('out of range');
    } else if (err.code === 'ERR_MUST_BE_EVEN') {
      throw Error('cannot be odd');
    } else {
      throw err;
    }
  }
}
run().catch(err => {
  console.error('Error caught', err);
});
```

# `Stack Trace`

The stack trace is used to trace the active stack frames at a particular instance during the execution of a program. The stack trace is useful while debugging code as it shows the exact point that has caused an error.

```
console.log("This program demonstrates "
            + "stack trace in Node.js");
var err = new Error().stack
console.log(err);
```

# `Using debugger`

Node.js includes a command-line debugging utility. The Node.js debugger client is not a full-featured debugger, but simple stepping and inspection are possible. To use it, start Node.js with the inspect argument followed by the path to the script to debug.

`Example - $ node inspect myscript.js`

[TOP](#error-handling)