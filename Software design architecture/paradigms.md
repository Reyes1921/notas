[Volver al Menú](root.md)

# `Programming Paradigms`

A programming paradigm is a fundamental style or approach to solving problems using a programming language. Different programming paradigms provide different ways of organizing and structuring code, and have different strengths and weaknesses. Some of the most common programming paradigms include:

- Structured Programming
- Functional programming
- Declarative programming
- Imperative programming
- Logic programming
- Object-oriented programming

# `Structured Programming`

Structured programming is a programming paradigm that emphasizes the use of structured control flow constructs, such as loops and conditional statements, to organize code into logical, easy-to-understand blocks. It is a way of writing computer programs that emphasizes the use of procedures and functions, as well as data structures, to organize code and make it easier to understand, debug, and maintain. The main idea behind structured programming is to break down a program into smaller, manageable pieces that can be easily understood, tested, and modified. This approach is opposed to the use of “goto” statements, which are considered to be unstructured and can lead to difficult-to-read and difficult-to-maintain code.

Structured programming is a programming paradigm aimed at improving the clarity, quality, and development time of a computer program by making extensive use of the structured control flow constructs of selection (if/then/else) and repetition (while and for), block structures, and subroutines in contrast to using simple tests and jumps such as the go to statement, which can lead to “spaghetti code” that is potentially difficult to follow and maintain.

La programación estructurada es un paradigma de programación que se basa en la organización del código en bloques de instrucciones con una estructura clara y definida. Estos bloques se combinan mediante tres estructuras de control básicas:

Secuencia: Las instrucciones se ejecutan en el orden en que aparecen.
Selección: Se elige una de varias opciones de ejecución en función de una condición.
Iteración: Se repite un bloque de instrucciones mientras se cumpla una condición.
La programación estructurada se considera más legible, mantenible y depurable que otros paradigmas de programación, como la programación no estructurada. Esto se debe a que su estructura clara y definida facilita la comprensión y el seguimiento del flujo de ejecución del programa.

Además, la programación estructurada promueve el uso de funciones y subrutinas para dividir el código en partes más pequeñas y reutilizables. Esto mejora la modularidad y la organización del programa.

Algunos de los conceptos clave de la programación estructurada en español son:

- Algoritmo: Una secuencia de pasos para resolver un problema.
- Diagrama de flujo: Una representación gráfica de un algoritmo.
- Variable: Un nombre que representa un valor.
- Condición: Una expresión que devuelve verdadero o falso.
- Bucle: Una estructura de control que repite un bloque de instrucciones.
- La programación estructurada es un concepto fundamental en la programación de computadoras y se utiliza en la mayoría de los lenguajes de programación modernos.

Aquí hay un ejemplo de código de programación estructurada en español:

```bash
function calcularFactorial(numero) {
  if (numero === 0) {
    return 1;
  } else {
    return numero * calcularFactorial(numero - 1);
  }
}
```

var resultado = calcularFactorial(5);
console.log("El factorial de 5 es: " + resultado);
Este código define una función llamada calcularFactorial que calcula el factorial de un número dado. La función utiliza una estructura de selección (if-else) para determinar si el número es 0 o no. Si el número es 0, la función devuelve 1. De lo contrario, la función llama a sí misma con un número menor y multiplica el resultado por el número original.

El código principal del programa llama a la función calcularFactorial con el número 5 y almacena el resultado en la variable resultado. Finalmente, el código imprime el resultado en la consola.

Este ejemplo demuestra cómo la programación estructurada se puede utilizar para crear código claro, conciso y eficiente.

# `Functional Programming`

Functional programming is a programming paradigm that emphasizes the use of pure functions and immutable data. It is a way of writing computer programs that emphasizes the use of functions and mathematical concepts, such as recursion, rather than using objects and classes like in object-oriented programming. In functional programming, functions are first-class citizens, which means they can be passed as arguments to other functions and returned as values.

Functional programming encourages immutability, which means that once a variable is assigned a value, it cannot be changed. This can simplify code, as it eliminates the need for state management and the bugs that can come with it.

## `The 7 Core Functional Programming Concepts`

- `Pure Functions`
- `First-Class Functions`
- `Higher-Order Functions`
- `Immutability`
- `Recursion`
- `Function Composition`
- `Referential Transparency`

# `Imperative programming`

Imperative programming is the oldest and most basic programming approach. Within the imperative paradigm, code describes a step-by-step process for a program’s execution. Because of this, beginners often find it easier to reason with imperative code by following along with the steps in the process.

The step-by-step process contains individual statements, instructions, or function calls. In the programming world, this process is called the control flow.

In other words, you’re interested in how the program runs, and you give it explicit instructions. Let’s illustrate this with a pseudocode example.

Examples of imperative programming languages include:

- `Java`
- `C`
- `Pascal`
- `Python`
- `Ruby`
- `Fortran`
- `PHP`

```bash
let longPasswords = [];
for (let i = 0; i < passwords.length; i++) {
   const password = passwords[i];
   if (password.length >= 9) {
      longPasswords.push(password);
   }
}

console.log(longPasswords); // logs ["freecodecamp", "mypassword123"];
```

# `Declarative programming`

In contrast with imperative programming, declarative programming describes what you want the program to achieve rather than how it should run.

In other words, within the declarative paradigm, you define the results you want a program to accomplish without describing its control flow. Ultimately, it’s up to the programming language’s implementation and the compiler to determine how to achieve the results. This places emphasis not on the execution process, but on the results and their ties to your overall goal. In other words, writing declarative code forces you to ask first what you want out of your program. Defining this helps you develop more expressive and explicit code.

Examples of declarative programming languages include:

- `SQL`
- `Miranda`
- `Prolog`
- `Lisp`
- `Many markup languages (e.g., HTML)`

```bash
const longPasswords = passwords.filter(password => password.length >= 9);

console.log(longPasswords); // logs ["freecodecamp", "mypassword123"];
```

# `Logical Programming`

La programación lógica es un paradigma de programación que se basa en la lógica formal para representar y resolver problemas. En la programación lógica, los programas se construyen a partir de un conjunto de hechos y reglas lógicas. Los hechos son declaraciones simples que describen la información básica del problema, mientras que las reglas son declaraciones condicionales que relacionan los hechos entre sí.

Para resolver un problema en la programación lógica, se plantea una consulta que describe el objetivo que se desea alcanzar. El sistema de inferencia del lenguaje de programación lógica busca una solución a la consulta mediante la aplicación de las reglas lógicas a los hechos conocidos.

Algunos de los conceptos clave de la programación lógica son:

- Hecho: Una declaración simple que describe un hecho básico.
- Regla: Una declaración condicional que relaciona los hechos entre sí.
- Consulta: Una pregunta que se plantea al sistema de inferencia.
- Sistema de inferencia: Un sistema que busca soluciones a las consultas mediante la aplicación de las reglas lógicas a los hechos conocidos.
- Unificación: El proceso de encontrar sustituciones para las variables en las reglas y consultas que hacen que las expresiones sean iguales.

La programación lógica se utiliza en una variedad de aplicaciones, como inteligencia artificial, procesamiento de lenguaje natural y bases de datos. Algunos lenguajes de programación lógicos populares incluyen Prolog, Datalog y Mercury.

Aquí hay un ejemplo de código de programación lógica en Prolog:

```bash
Prolog
padre(juan, maria).
padre(juan, pedro).
madre(ana, maria).
madre(ana, pedro).

abuelo(X, Y) :- padre(X, Z), padre(Z, Y).
abuelo(X, Y) :- padre(X, Z), madre(Z, Y).

?- abuelo(juan, X).
```

Este código define una familia con dos padres, dos hijos y dos abuelos. La regla abuelo define los criterios para ser abuelo. La consulta ?- abuelo(juan, X) pregunta al sistema de inferencia quién es el abuelo de Juan. El sistema de inferencia aplicará las reglas lógicas a los hechos conocidos para encontrar la respuesta.

# `Object Oriented Programming`

Object-oriented programming (OOP) is a programming paradigm that is based on the concept of “objects,” which are instances of a class. In OOP, a class is a blueprint for creating objects, which have both data (attributes) and behavior (methods). The main idea behind OOP is to model real-world objects and their interactions, making it well-suited for creating complex and large-scale software systems.

[TOP](#programming-paradigms)
