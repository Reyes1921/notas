[Volver al Menú](./root.md)

# `Web and mobile`

# `Reactive and Functional programming`

`Functional programming` is a programming paradigm designed to handle pure mathematical functions. This paradigm is totally focused on writing more compounded and pure functions.

`Reactive programming` describes a design paradigm that relies on asynchronous programming logic to handle real-time updates to otherwise static content. It provides an efficient means — the use of automated data streams — to handle data updates to content whenever a user makes an inquiry.

# `Functional Programming`

Functional programming is a programming paradigm that emphasizes the use of pure functions and immutable data. It is a way of writing computer programs that emphasizes the use of functions and mathematical concepts, such as recursion, rather than using objects and classes like in object-oriented programming. In functional programming, functions are first-class citizens, which means they can be passed as arguments to other functions and returned as values.

Functional programming encourages immutability, which means that once a variable is assigned a value, it cannot be changed. This can simplify code, as it eliminates the need for state management and the bugs that can come with it.

## `The 7 Core Functional Programming Concepts`

- `Pure Functions (Funciones Puras)`: Son funciones que, dado el mismo input, siempre producen el mismo output y no tienen efectos secundarios (side effects) observables fuera de la función. Esto significa que no modifican variables globales, no realizan operaciones de I/O (como imprimir en pantalla o leer archivos) y no alteran el estado interno de objetos.

- `First-Class Functions (Funciones de Primera Clase)`: En un lenguaje que soporta funciones de primera clase, las funciones son tratadas como cualquier otro valor. Esto significa que pueden ser asignadas a variables, pasadas como argumentos a otras funciones y retornadas como resultado de otras funciones.

- `Higher-Order Functions (Funciones de Orden Superior)`: Son funciones que cumplen al menos una de las siguientes condiciones:

  - Aceptan una o más funciones como argumentos.
  - Retornan una función como resultado.

- `Immutability (Inmutabilidad):` Se refiere a la propiedad de que los datos, una vez creados, no pueden ser modificados. En lugar de cambiar un objeto existente, las operaciones que parecen modificarlo en realidad crean un nuevo objeto con los cambios.

- `Recursion (Recursión)`: Es una técnica donde una función se llama a sí misma dentro de su propia definición. Se utiliza para resolver problemas que pueden descomponerse en subproblemas más pequeños y similares. Es importante tener una condición de base para evitar una recursión infinita.

- `Function Composition (Composición de Funciones)`: Es el proceso de combinar dos o más funciones para crear una nueva función. El resultado de una función se pasa como argumento a la siguiente función en la composición. Si tenemos funciones f y g, su composición h se denota como h(x)=f(g(x)).

- `Referential Transparency (Transparencia Referencial)`: Una expresión es referencialmente transparente si puede ser reemplazada por su valor resultante sin cambiar el comportamiento del programa. Esto se cumple para las llamadas a funciones puras, ya que siempre producen el mismo resultado para la misma entrada.

# `React`

React is the most popular front-end JavaScript library for building user interfaces. React can also render on the server using Node and power mobile apps using React Native.

# `SPA vs SSG vs SSR`

## `SPA`

A single page application loads only a single web document from the server and then updates the content of that document on demand via Javascript APIs without reloading the entire document. React, Vue, Angular are the top frameworks used to create single page applications.

This approach is relatively new compared with the previous two. This is a result of the rapid growth of the internet, software, and hardware industries over the last two decades. With SPA, the server provides the user with an empty HTML page and Javascript. The latter is where the magic happens. When the browser receives the HTML + Javascript, it loads the Javascript. Once loaded, the JS takes place and, through a set of operations in the DOM, renders the necessary components to the page. The routing is then handled by the browser itself, not hitting the server. This is usually done through a frontend framework (or library) like React, Vue, or Angular.

## `SSR`

This technique uses a server like Node.js to fully render the web document upon the receival of a request and then send it back to the client. This way the user get an interactive document with all the necessary information without having to wait for any JavaScript or CSS files to load.

In SSR, when a web page is requested, it is rendered on the server, served to the client, and finally rendered by the client.

## `SSG`

Static site generation renders the web document in the server(like SSR), however the page is rendered at build time. So, instead of rendering the page on the server upon the receival of a request, the page is already rendered in the server, waiting to be served to the client.

SSG has similarities with SSR. The page is also generated in the server, however, the page is rendered at build time. So, instead of rendering the page on the server upon the receival of a request, the page is already rendered in the server, waiting to be served to the client.

# `PWA`

Progressive Web Apps (PWAs) are websites that are progressively enhanced to function like installed, native apps on supporting platforms, while functioning like regular websites on other browsers.

# `Microfrontends`

Microfrontends is an architectural style where independently deliverable frontend applications built by different teams using different technologies are composed into a greater whole. Simply, a Micro-Frontend is a portion of a webpage (not the entire page). There is a “Host” or a “Container” page in the Micro-Frontend Architecture page that can host one or more Micro-Frontends.

# `W3c and WHATWG Standards`

`World Wide Web Consortium (W3C)` standards define the best practices for web development to enable developers to build rich interactive experiences that are available on any device. Theses standards range from recommended web technologies such as HTML, CSS, XML to the generally accepted principles of web architecture, semantics and services.

`Web Hypertext Application Technology Working Group (WHATWG)` is another set of web standards that came into existence after W3C announced that it was going to be focusing on XHTML over HTML.

[TOP](#web-and-mobile)
