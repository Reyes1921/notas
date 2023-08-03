[Volver al Menú](../root.md)

# `Working with Files`

You can programmatically manipulate files in Node.js with the built-in fs module. The name is short for “file system,” and the module contains all the functions you need to read, write, and delete files on the local machine.

# `Fs module`

File System or fs module is a built in module in Node that enables interacting with the file system using JavaScript. All file system operations have synchronous, callback, and promise-based forms, and are accessible using both CommonJS syntax and ES6 Modules.

### `Common use for the File System module:`

### `Read files`

The `fs.readFile()` method is used to read files on your computer.

```
var http = require('http');
var fs = require('fs');
http.createServer(function (req, res) {
  fs.readFile('demofile1.html', function(err, data) {
    res.writeHead(200, {'Content-Type': 'text/html'});
    res.write(data);
    return res.end();
  });
}).listen(8080);
```

### `Create files`

The File System module has methods for creating new files:

`fs.appendFile()`

The `fs.appendFile()` method appends specified content to a file

```
var fs = require('fs');

fs.appendFile('mynewfile1.txt', 'Hello content!', function (err) {
  if (err) throw err;
  console.log('Saved!');
});
```

`fs.open()`

The `fs.open()` method takes a "flag" as the second argument, if the flag is "w" for "writing", the specified file is opened for writing.

```
var fs = require('fs');

fs.open('mynewfile2.txt', 'w', function (err, file) {
  if (err) throw err;
  console.log('Saved!');
});
```

`fs.writeFile()`

The `fs.writeFile()` method replaces the specified file and content if it exists.

```
var fs = require('fs');

fs.writeFile('mynewfile3.txt', 'Hello content!', function (err) {
  if (err) throw err;
  console.log('Saved!');
});
```

### `Update files`

The File System module has methods for updating files:

- `fs.appendFile()`
- `fs.writeFile()`

### `Delete files`

To delete a file with the File System module,  use the `fs.unlink()` method.

The `fs.unlink()` method deletes the specified file

```
var fs = require('fs');

fs.unlink('mynewfile2.txt', function (err) {
  if (err) throw err;
  console.log('File deleted!');
});
```

### `Rename files`

To rename a file with the File System module,  use the `fs.rename()` method.

The `fs.rename()` method renames the specified file:

```
var fs = require('fs');

fs.rename('mynewfile1.txt', 'myrenamedfile.txt', function (err) {
  if (err) throw err;
  console.log('File Renamed!');
});
```

# `path module`

The path module provides utilities for working with file and directory paths. It’s built-in to Node.js core and can simply be used by requiring it.

Every file in the system has a path. On Linux and macOS, a path might look like: /users/joe/file.txt while Windows computers are different, and have a structure such as: C:\users\joe\file.txt

You need to pay attention when using paths in your applications, as this difference must be taken into account.

You include this module in your files using const path = require('path'); and you can start using its methods.

```
const notes = '/users/joe/notes.txt';

path.dirname(notes); // /users/joe
path.basename(notes); // notes.txt
path.extname(notes); // .txt
```

### `path.join()`

You can join two or more parts of a path by using `path.join()`.

```
const name = 'joe';
path.join('/', 'users', name, 'notes.txt'); // '/users/joe/notes.txt'
```

### `path.resolve()`

You can get the absolute path calculation of a relative path using `path.resolve()`:

```
path.resolve('joe.txt'); // '/Users/joe/joe.txt' if run from my home folder
```

### `path.normalize()`

`path.normalize()` is another useful function, that will try and calculate the actual path, when it contains relative specifiers like . or .., or double slashes:
```
path.normalize('/users/joe/..//test.txt'); // '/users/test.txt'
```

# `process.cwd()`

The `process.cwd()` method returns the current working directory of the Node.js process.

```
import { cwd } from 'node:process';

console.log(`Current directory: ${cwd()}`);
```

# `__dirname`

The `__dirname` in a node script returns the path of the folder where the current JavaScript file resides. `__filename` and `__dirname` are used to get the filename and directory name of the currently executing file.

### `What's the difference between process.cwd() vs __dirname?`

`process.cwd()` returns the current working directory,

i.e. the directory from which you invoked the `node` command.

`__dirname` returns the directory name of the directory containing the JavaScript source code file


# `__filename`

The `__filename` in Node.js returns the filename of the executed code. It gives the absolute path of the code file. The following approach covers implementing `__filename` in the Node.js project.

# `OpenSource Packages`

### `Glob`

The glob pattern is most commonly used to specify filenames, called wildcard characters, and strings, called wildcard matching.

### `Globby`

`User-friendly glob matching`

Based on fast-glob but adds a bunch of useful features.

### `fs-extra`

fs-extra adds file system methods that aren’t included in the native fs module and adds promise support to the fs methods. It also uses graceful-fs to prevent EMFILE errors. It should be a drop in replacement for fs.

### `Chokidar`

Chokidar is a fast open-source file watcher for node. js. You give it a bunch of files, it watches them for changes and notifies you every time an old file is edited; or a new file is created.

[TOP](#working-with-files)