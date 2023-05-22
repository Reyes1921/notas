[Volver al Menú](../root.md)

# `Introduction to JavaScript`

# `What is JavaScript?`

JavaScript is a programming language used most often for dynamic client-side scripts on webpages, but it is also often used on the server-side, using a runtime such as Node.js. 
JavaScript is primarily used in the browser, enabling developers to manipulate webpage content through the DOM, manipulate data with AJAX and IndexedDB, draw graphics with canvas, interact with the device running the browser through various APIs, and more. JavaScript is one of the world's most commonly-used languages, owing to the recent growth and performance improvement of APIs available in browsers. 

JavaScript (JS) es un lenguaje de programación ligero, interpretado, o compilado justo-a-tiempo (just-in-time) con funciones de primera clase. Si bien es más conocido como un lenguaje de scripting (secuencias de comandos) para páginas web, y es usado en muchos entornos fuera del navegador, tal como Node.js, Apache CouchDB y Adobe Acrobat JavaScript es un lenguaje de programación basada en prototipos, multiparadigma, de un solo hilo, dinámico, con soporte para programación orientada a objetos, imperativa y declarativa (por ejemplo programación funcional).

# `History of JavaScript `

JavaScript was initially created by Brendan Eich of NetScape and was first announced in a press release by Netscape in 1995. It has a bizarre history of naming; initially, it was named Mocha by the creator, which was later renamed LiveScript. In 1996, about a year later after the release, NetScape decided to rename it to JavaScript with hopes of capitalizing on the Java community (although JavaScript did not have any relationship with Java) and released Netscape 2.0 with the official support of JavaScript. 

# `Javascript Versions`

JavaScript was invented by Brendan Eich, and in 1997 and became an ECMA standard. ECMAScript is the official language name. ECMAScript versions include ES1, ES2, ES3, ES5, and ES6.

Version	| Official Name | Description
---|---|---
ES1	| ECMAScript 1 (1997)	| First edition
ES2	| ECMAScript 2 (1998) |	Editorial changes
ES3	| ECMAScript 3 (1999)	| Added regular expressions & try/catch
ES4	| ECMAScript 4	| Not released
ES5	| ECMAScript 5 (2009)	| Added “strict mode”, JSON support, String.trim(), Array.isArray(), & Array iteration methods.
ES6	| ECMAScript 2015	| Added let and const, default parameter values, Array.find(), & Array.findIndex()
ES6	| ECMAScript 2016	| Added exponential operator & Array.prototype.includes
ES6	| ECMAScript 2017	| Added string padding, Object.entries, Object.values, async functions, & shared memory
ES6	| ECMAScript 2018	| Added rest / spread properties, asynchronous iteration, Promise.finally(), & RegExp

# `How to run Javascript`

JavaScript can be run in the browser by including the external script file using the script tag, writing it within the HTML page using the script tag again, running it in the browser console or you can also use REPL.

REPL: Un bucle Lectura-Evaluación-Impresión, REPL por las siglas en inglés de «Read-Eval-Print-Loop», también conocido como alto nivel interactivo o consola de lenguaje

- How to Run JavaScript from the Command Line

    Install Node.js

- How to Run JavaScript from the Browser

    You can run code in the browser by creating an HTML file that references the script. In our case, we used the defer option, which will execute the JS after the HTML file is finished loading.

- Run a script from an HTML file

    Now simply open this HTML file on your local machine and open the developer console (next step) to see the output.

- Inspect the Browser Console

    In Chrome, you can open the developer console with Ctrl+Shift+J (Windows) or Ctrl+Option+J (Mac), or manually from the settings menu by selecting More Tools -> Developer Tools. The console allows you to run code in the browser, similar to how

- Run JavaScript with a Framework

    It is worth mentioning that frameworks like React, Angular, Svelte, etc will take care of the building & running of your app automatically and provide framework-specific tooling and steps for running code. In the real world, you are more likely to use the tooling provided by the framework to run your code, as opposed to the basic methods shown in this couse.