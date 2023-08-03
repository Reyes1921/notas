[Volver al Menú](../root.md)

# `Modules`

[Common JS](../../JavaScript/modulos/modules.md#commonjs)

[ESM](../../JavaScript/modulos/modules.md#)

# `Custom Modules`

Modules are the collection of JavaScript codes in a separate logical file that can be used in external applications on the basis of their related functionality. Modules are popular as they are easy to use and reusable. To create a module in Node.js, you will need the exports keyword. This keyword tells Node.js that the function can be used outside the module.

Syntax:

```
exports.function_name = function(arg1, arg2, ....argN) {
    // function body
};  
```

## `Example of a custom node module:`

`Create a file that you want to export `

```

// File name: calc.js
 
exports.add = function (x, y) {
    return x + y;
};
 
exports.sub = function (x, y) {
    return x - y;
};
 
exports.mult = function (x, y) {
    return x * y;
};
 
exports.div = function (x, y) {
    return x / y;
};
```

Use the ‘require’ keyword to import the file 

```

// File name: App.js
const calculator = require('./calc');
 
let x = 50, y = 20;
 
console.log("Addition of 50 and 20 is "
    + calculator.add(x, y));
 
console.log("Subtraction of 50 and 20 is "
    + calculator.sub(x, y));
 
console.log("Multiplication of 50 and 20 is "
    + calculator.mult(x, y));
 
console.log("Division of 50 and 20 is "
    + calculator.div(x, y));
```

`Output:`

```
Addition of 50 and 20 is 70
Subtraction of 50 and 20 is 30
Multiplication of 50 and 20 is 1000
Division of 50 and 20 is 2.5
```

# `global keyword`

In browsers, the top-level scope is the global scope. This means that within the browser var something will define a new global variable. In Node.js this is different. The top-level scope is not the global scope; var something inside a Node.js module will be local to that module.

```
global
```

[TOP](#modules)