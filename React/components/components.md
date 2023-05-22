[Volver al Menú](../root.md)

# `Components`

# `Functional Components`

Functional components are some of the more common components that will come across while working in React. These are simply JavaScript functions. We can create a functional component to React by writing a JavaScript function. These functions may or may not receive data as parameters. In the functional Components, the return value is the JSX code to render to the DOM tree. Functional components can also have state which is managed using React hooks.

Traditionally when creating web pages, web developers marked up their content and then added interaction by sprinkling on some JavaScript. This worked great when interaction was a nice-to-have on the web. Now it is expected for many sites and all apps. React puts interactivity first while still using the same technology: a React component is a JavaScript function that you can sprinkle with markup.

<h2 style="color:red">Pitfall</h2>

Without parentheses, any code on the lines after return will be ignored!

```
return (
  <div>
    <img src="https://i.imgur.com/MK3eW3As.jpg" alt="Katherine Johnson" />
  </div>
);
```

<h2 style="color:red">Pitfall</h2>
Components can render other components, but you must never nest their definitions:

```
export default function Gallery() {
  // 🔴 Never define a component inside another component!
  function Profile() {
    // ...
  }
  // ...
}
```

The snippet above is very slow and causes bugs. Instead, define every component at the top level:

```
export default function Gallery() {
  // ...
}

// ✅ Declare components at the top level
function Profile() {
  // ...
}
```
When a child component needs some data from a parent, pass it by props instead of nesting definitions.

<h2 style="color:green">Resumen</h2>

You’ve just gotten your first taste of React! Let’s recap some key points.

- React lets you create components, reusable UI elements for your app.

- In a React app, every piece of UI is a component.

- React components are regular JavaScript functions except:

  - Their names always begin with a capital letter.
  - They return JSX markup.

# `Components Basic`

# `JSX`

`JSX` stands for `JavaScript XML`.

``JSX`` is a syntax extension for `JavaScript` that lets you write `HTML`-like markup inside a `JavaScript` file. Although there are other ways to write components, most `React` developers prefer the conciseness of `JSX`, and most codebases use it.

Each `React` component is a `JavaScript` function that may contain some markup that `React` renders into the browser. `React` components use a syntax extension called `JSX` to represent that markup. `JSX` looks a lot like `HTML`, but it is a bit stricter and can display dynamic information. The best way to understand this is to convert some `HTML` markup to `JSX` markup.

<h2 style="color:red">Nota</h2>

`JSX` and `React` are two separate things. They’re often used together, but you can use them independently of each other. `JSX` is a syntax extension, while `React` is a `JavaScript` library.


# `The Rules of JSX`

# `1. Return a single root element `

To return multiple elements from a component, wrap them with a single parent tag. If you don’t want to add an extra `<div>` to your markup, you can write `<>` and `</>` instea. This empty tag is called a Fragment. `Fragments` let you group things without leaving any trace in the browser HTML tree.

```
<>
  <h1>Hedy Lamarr's Todos</h1>
  <img 
    src="https://i.imgur.com/yXOvdOSs.jpg" 
    alt="Hedy Lamarr" 
    class="photo"
  >
  <ul>
    ...
  </ul>
</>
```

## `Why do multiple JSX tags need to be wrapped?`

`JSX` looks like `HTML`, but under the hood it is transformed into plain JavaScript objects. You can’t return two objects from a function without wrapping them into an array. This explains why you also can’t return two `JSX` tags without wrapping them into another tag or a Fragment.

# `2. Close all the tags `

`JSX` requires tags to be explicitly closed: self-closing tags like `<img>` must become `<img />`, and wrapping tags like `<li>`oranges must be written as `<li>`oranges`</li>`.

```
<>
  <img 
    src="https://i.imgur.com/yXOvdOSs.jpg" 
    alt="Hedy Lamarr" 
    class="photo"
   />
  <ul>
    <li>Invent new traffic lights</li>
    <li>Rehearse a movie scene</li>
    <li>Improve the spectrum technology</li>
  </ul>
</>
```

# `3. camelCase all most of the things!`

JSX turns into JavaScript and attributes written in JSX become keys of JavaScript objects. In your own components, you will often want to read those attributes into variables. But JavaScript has limitations on variable names. For example, their names can’t contain dashes or be reserved words like class.

This is why, in React, many HTML and SVG attributes are written in camelCase. For example, instead of stroke-width you use strokeWidth. Since class is a reserved word, in React you write className instead, named after the corresponding DOM property:

<h2 style="color:red">Pitfall</h2>

For historical reasons, `aria-*` and `data-*` attributes are written as in HTML with dashes.

## `Pro-tip: Use a JSX Converter`

Converting all these attributes in existing markup can be tedious! We recommend using a converter to translate your existing HTML and SVG to JSX. Converters are very useful in practice, but it’s still worth understanding what is going on so that you can comfortably write JSX on your own.

<h2 style="color:green">Resumen</h2>

Now you know why JSX exists and how to use it in components:


- React components group rendering logic together with markup because they are related.

- JSX is similar to HTML, with a few differences. You can use a converter if you need to.

- Error messages will often point you in the right direction to fixing your markup.


# `JavaScript in JSX with Curly Braces`

JSX lets you write HTML-like markup inside a JavaScript file, keeping rendering logic and content in the same place. Sometimes you will want to add a little JavaScript logic or reference a dynamic property inside that markup. In this situation, you can use curly braces in your JSX to open a window to JavaScript.

## `Passing strings with quotes `

When you want to pass a string attribute to JSX, you put it in single or double quotes.

But what if you want to dynamically specify the src or alt text? You could use a value from JavaScript by replacing `"` and `" `with `{` and `}`:

Notice the difference between className="avatar", which specifies an "avatar" CSS class name that makes the image round, and src={avatar} that reads the value of the JavaScript variable called avatar. That’s because curly braces let you work with JavaScript right there in your markup!

## `Using curly braces: A window into the JavaScript world`

JSX is a special way of writing JavaScript. That means it’s possible to use JavaScript inside it—with curly braces { }. The example below first declares a name for the scientist, name, then embeds it with curly braces inside the `<h1>`:

```
export default function TodoList() {
  const name = 'Gregorio Y. Zara';
  return (
    <h1>{name}'s To Do List</h1>
  );
}

```
Try changing the name’s value from 'Gregorio Y. Zara' to 'Hedy Lamarr'. See how the list title changes?

Any JavaScript expression will work between curly braces, including function calls like formatDate():

```
const today = new Date();

function formatDate(date) {
  return new Intl.DateTimeFormat(
    'en-US',
    { weekday: 'long' }
  ).format(date);
}

export default function TodoList() {
  return (
    <h1>To Do List for {formatDate(today)}</h1>
  );
}
```

## `Where to use curly braces `

You can only use curly braces in two ways inside JSX:

- As text directly inside a JSX tag: `<h1>`{name}'s To Do List`</h1>` works, but <{tag}>Gregorio Y. Zara's To Do List</{tag}> will not.

- As attributes immediately following the = sign: src={avatar} will read the avatar variable, but src="{avatar}" will pass the string "{avatar}".

## `Using “double curlies”: CSS and other objects in JSX `

In addition to strings, numbers, and other JavaScript expressions, you can even pass objects in JSX. Objects are also denoted with curly braces, like { name: "Hedy Lamarr", inventions: 5 }. Therefore, to pass a JS object in JSX, you must wrap the object in another pair of curly braces: person={{ name: "Hedy Lamarr", inventions: 5 }}.

You may see this with inline CSS styles in JSX. React does not require you to use inline styles (CSS classes work great for most cases). But when you need an inline style, you pass an object to the style attribute:

```
export default function TodoList() {
  return (
    <ul style={{
      backgroundColor: 'black',
      color: 'pink'
    }}>
      <li>Improve the videophone</li>
      <li>Prepare aeronautics lectures</li>
      <li>Work on the alcohol-fuelled engine</li>
    </ul>
  );
}

```

`The next time you see {{ and }} in JSX, know that it’s nothing more than an object inside the JSX curlies!`

<h2 style="color:red">Pitfall</h2>

Inline style properties are written in camelCase. For example, HTML `<ul style="background-color: black">` would be written as `<ul style={{ backgroundColor: 'black' }}>`  in your component.

# `Props vs State`

Props (short for “properties”) and state are both plain JavaScript objects. While both hold information that influences the output of component render, they are different in one important way: props get passed to the component (similar to function parameters) whereas state is managed within the component (similar to variables declared within a function).

Passing props from component to component in React doesn't make components interactive, because props are read-only and therefore immutable. If you want interactive React components, you have to introduce stateful values by using React State. Usually state is co-located to a React component by using React's useState Hook:

```
import * as React from 'react';

const App = () => {
  const greeting = 'Welcome to React';

  const [isShow, setShow] = React.useState(true);

  const handleToggle = () => {
    setShow(!isShow);
  };

  return (
    <div>
      <button onClick={handleToggle} type="button">
        Toggle
      </button>

      {isShow ? <Welcome text={greeting} /> : null}
    </div>
  );
};

const Welcome = ({ text }) => {
  return <h1>{text}</h1>;
};

export default App;
```

# `Conditional Rendering`

Your components will often need to display different things depending on different conditions. In React, you can conditionally render JSX using JavaScript syntax like `if` statements, `&&`, and `? :` operators.

```
function Item({ name, isPacked }) {
  if (isPacked) {
    return <li className="item">{name} ✔</li>;
  }
  return <li className="item">{name}</li>;
}

export default function PackingList() {
  return (
    <section>
      <h1>Sally Ride's Packing List</h1>
      <ul>
        <Item 
          isPacked={true} 
          name="Space suit" 
        />
        <Item 
          isPacked={true} 
          name="Helmet with a golden leaf" 
        />
        <Item 
          isPacked={false} 
          name="Photo of Tam" 
        />
      </ul>
    </section>
  );
}

```

# `Composition vs Inheritance`

React Composition is a development pattern based on React's original component model where we build components from other components using explicit defined props or the implicit children prop.

In terms of refactoring, React composition is a pattern that can be used to break a complex component down to smaller components, and then composing those smaller components to structure and complete your application.

Any component can render other components - that’s composition. A Navigation component that renders that Button - also a simple component, that composes other components:
```
const Navigation = () => {
  return (
    <>
      // Rendering out Button component in Navigation component. Composition!
      <Button title="Create" onClick={onClickHandler} />
      ... // some other navigation code
    </>
  );
};
```


# `Class Components`

Components can either be created using the class based approach or a functional approach. These components are simple classes (made up of multiple functions that add functionality to the application). All class based components are child classes for the Component class of ReactJS.

Although the class components are supported in React, it is encouraged to write functional components and make use of hooks in modern React applications.