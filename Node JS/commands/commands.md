[Volver al Menú](../root.md)

# `Command Line Applications`

Command Line Applications are applications that can be run from the command line. They are also called CLI (Command Line Interface) applications. Users can interact with clients entirely by terminal commands. They are very useful for automation and building tools.

# `Environment variables`

Node.js provides the env property under the core module i.e process which hosts all the environment variables that were set at the moment when the process was started.

The following example covers how to accesses the NODE_ENV environment variable, which is set to development by default.

`Note:` The process module does not require a require() method because it is automatically available on it. 

```
process.env.NODE_ENV // "development"
```

## `dotenv`

dotenv is a zero-dependency module that loads environment variables from a .env file into process.env. Storing configuration in the environment separate from code is based on The Twelve-Factor App methodology.

## `process.env`

In Node. js, process. env is a global variable that is injected during runtime. It is a view of the state of the system environment variables. When we set an environment variable, it is loaded into process.env during runtime and can later be accessed.

# `Exiting and exit codes`

`Exiting` is a way of terminating a Node.js process by using node.js process module.

`Exiting of Script Implicitly`

- Using `process.exit()` - process.exit (code)
- Using `process.kill()` - process.kill(pid[, signal]) 
- Using `process.on()` - process.on() 
- Using `process.abort` - process.abort() 

`Using process.on()`

```
import process from 'node:process';

process.on('exit', (code) => {
  console.log(`About to exit with code: ${code}`);
});
```

`Using process.exit()`

If your Node.js process is not terminated properly, you can use the exit() function to terminate it forcefully. You need to do this by manually canceling the process in the terminal. The process.exit() is one of the commonly used and quick ways to terminate the process, even if the asynchronous calls are still running.

`Using process.kill()`

Another suitable method to terminate the Node.js process is to use the process.kill() function. The process.kill is a built-in Node.js method that takes different parameters to work properly. Below is the syntax of the process.kill() method. 

```
process.kill(pid[, signal]) 
```

`Using process.abort`

The process.abort is the similar process like other methods to terminate the process successfully. But the significant difference between this method and others is that it will immediately terminate the node.js program and then create a core file. To explain the abort process, we will be using the same example as above.

```
console.log('Code running'); 
process.on('exit', function(code) { 
 return console.log(`exiting the code ${code}`); 
}); 
setTimeout((function() { 
return process.abort(); 
}), 5000); 
```

# `Printing output`

## `Process stdout`

The `process.stdout` property returns a stream connected to stdout (fd 1). It is a net.Socket (which is a Duplex stream) unless fd 1 refers to a file, in which case it is a Writable stream.

## `process.stderr`

The `process.stderr` is an inbuilt application programming interface of class Process within process module which is used to returns a stream connected to stderr.

## `Chalk Package`

Chalk is a clean and focused library used to do string styling in your terminal applications. With it you can print different styled messages to your console like changing font colors, font boldness, font opacity and also the background of any message printed on your console.

## `Figlet Package`

This package aims to fully implement the FIGfont spec in JavaScript, which represents the graphical arrangement of characters representing larger characters. It works in the browser and with Node.js.

## `Cli progress Package`

CLI-Progress is a package that provides a custom progress bar for CLI applications.

# `Taking input`

Node.js provides a few ways to take inputs from user, including the built-in `process.stdin` and `readline` module. There are also several third party packages like `prompts` and `Enquirer` built on top of `readline` that provide an easy to use and intuitive interface.

## `Process stdin`

The `process.stdin` is a standard Readable stream which listens for user input and is accessible via the process module. It uses on() function to listen for input events.

## `Prompts Package`

Prompts is a higher level and user friendly interface built on top of Node.js’s inbuilt `Readline` module. It supports different type of prompts such as text, password, autocomplete, date, etc. It is an interactive module and comes with inbuilt validation support.

## `Inquirer Package`

Inquirer.js is a collection of common interactive command line interfaces for taking inputs from user. It is promise based and supports chaining series of prompt questions together, receiving text input, checkboxes, lists of choices and much more.

You can use it to empower your terminal applications that need user input or to build your own CLI.

# `Command line args`

Command-line arguments are a way to provide additional input for commands. You can use command-line arguments to add flexibility and customization to your Node.js scripts.

## `process.argv`

`process.argv` is an array of parameters that are sent when you run a Node.js file or Node.js process.

This property returns an array containing the arguments passed to the process when run it in the command line. The first element is the process execution path and the second element is the path for the js file.

## `Commander.js Package`

Commander is a light-weight, expressive, and powerful command-line framework for node.js. with Commander.js you can create your own command-line interface (CLI).

[TOP](#command-line-applications)