[Volver al Menú](./root.md)

# `Web and mobile`

# `Reactive and Functional programming`

`Functional programming` is a programming paradigm designed to handle pure mathematical functions. This paradigm is totally focused on writing more compounded and pure functions.

`Reactive programming` describes a design paradigm that relies on asynchronous programming logic to handle real-time updates to otherwise static content. It provides an efficient means — the use of automated data streams — to handle data updates to content whenever a user makes an inquiry.

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
