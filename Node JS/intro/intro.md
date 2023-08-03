[Volver al Menú](../root.md)

# `Node.js Introduction`

Node.js is an open source, cross-platform runtime environment and library that is used for running web applications outside the client’s browser.

It is used for server-side programming, and primarily deployed for non-blocking, event-driven servers, such as traditional web sites and back-end API services, but was originally designed with real-time, push-based architectures in mind. Every browser has its own version of a JS engine, and node.js is built on Google Chrome’s V8 JavaScript engine.

# `What is Node.js`

Node.js is a JavaScript runtime that allows developers to create both front-end and back-end applications using JavaScript. It was released in 2009 by Ryan Dahl and is designed to build scalable network applications. Node.js is built on Chrome's V8 JavaScript engine and is an open-source, cross-platform runtime environment for developing server-side and networking applications. Node.js applications are written in JavaScript and can run on various platforms such as Windows, Linux, Unix, macOS, and more. It is a single-threaded, open-source, and cross-platform runtime environment for building fast and scalable server-side and networking applications .

# `Why Node.js`

Node.js is a cross-platform runtime, perfect for a wide range of use cases. Its huge community makes it easy to get started. It uses the V8 engine to compile JavaScript and runs at lightning-fast speeds. Node.js applications are very scalable and maintainable. Cross-platform support allows the creation of all kinds of applications - desktop apps, software as a service, and even mobile applications. Node.js is perfect for data-intensive and real-time applications since it uses an event-driven, non-blocking I/O model, making it lightweight and efficient. With such a huge community, a vast collection of Node.js packages is available to simplify and boost development.

# `History of Node.js`

Node.js has a relatively brief history, having been first created by Ryan Dahl in 2009. It is built on Chrome's V8 JavaScript engine and is an open-source, cross-platform, event-driven runtime environment . Some milestones in the history of Node.js include the creation of npm (Node Package Manager) in 2010, the release of Node.js v0.10 in 2013, and the release of Node.js v4, which marked the convergence of Node and io.js projects in 2015. Today, Node.js is one of the most popular JavaScript runtimes, with a large and active community of developers and a wide range of use cases across web development, desktop applications, mobile apps, IoT, and more.

# `Nodejs vs Browser`

Both the browser and Node.js use JavaScript as their programming language. Building apps that run in the browser is a completely different thing than building a Node.js application. Despite the fact that it's always JavaScript, there are some key differences that make the experience radically different.

From the perspective of a frontend developer who extensively uses JavaScript, Node.js apps bring with them a huge advantage: the comfort of programming everything - the frontend and the backend - in a single language.

You have a huge opportunity because we know how hard it is to fully, deeply learn a programming language, and by using the same language to perform all your work on the web - both on the client and on the server, you're in a unique position of advantage.

`What changes is the ecosystem.`

In the browser, most of the time what you are doing is interacting with the DOM, or other Web Platform APIs like Cookies. Those do not exist in Node.js, of course. You don't have the document, window and all the other objects that are provided by the browser.

And in the browser, we don't have all the nice APIs that Node.js provides through its modules, like the filesystem access functionality.

Another big difference is that in Node.js you control the environment. Unless you are building an open source application that anyone can deploy anywhere, you know which version of Node.js you will run the application on. Compared to the browser environment, where you don't get the luxury to choose what browser your visitors will use, this is very convenient.

This means that you can write all the modern ES2015+ JavaScript that your Node.js version supports. Since JavaScript moves so fast, but browsers can be a bit slow to upgrade, sometimes on the web you are stuck with using older JavaScript / ECMAScript releases. You can use Babel to transform your code to be ES5-compatible before shipping it to the browser, but in Node.js, you won't need that.

Another difference is that Node.js supports both the CommonJS and ES module systems (since Node.js v12), while in the browser we are starting to see the ES Modules standard being implemented.

In practice, this means that you can use both require() and import in Node.js, while you are limited to import in the browser.

# `Running Node.js Code`

The usual way to run a Node.js program is to run the globally available `node` command (once you install Node.js) and pass the name of the file you want to execute.

If your main Node.js application file is app.js, you can call it by typing:

```
node app.js
```




[TOP](#nodejs-introduction)