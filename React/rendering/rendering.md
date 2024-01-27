[Volver al Menú](../root.md)

# `Rendering`

React follows a declarative approach to rendering components, which means that developers specify what a component should look like, and React takes care of rendering the component to the screen. This is in contrast to an imperative approach, where developers would write code to manually manipulate the DOM (Document Object Model) to update the UI.

The virtual DOM (VDOM) is an important aspect of how React works. It is a lightweight in-memory representation of the DOM (Document Object Model), and it is used to optimize the rendering of components in a React application.

- Components are written as JavaScript classes or functions that define a render method. The render method returns a description of what the component should look like, using JSX syntax.
- When a component is rendered, React creates a virtual DOM (VDOM) representation of the component. The VDOM is a lightweight in-memory representation of the DOM, and it is used to optimize the rendering of components.
- React compares the VDOM representation of the component with the previous VDOM representation (if it exists). If there are differences between the two VDOMs, React calculates the minimum number of DOM updates needed to bring the actual DOM into line with the new VDOM.
- React updates the actual DOM with the minimum number of DOM updates needed to reflect the changes in the VDOM.

This process is known as reconciliation, and it is an important aspect of how React works. By using a declarative approach and a VDOM, React is able to optimize the rendering of components and improve the performance of web applications.

# `Strict Mode`

By wrapping a component tree with StrictMode, React will activate additional checks and warnings for its descendants. This doesn't affect the production build but provides insights during development.

In Strict Mode, React does a few extra things during development:

- It renders components twice to catch bugs caused by impure rendering.
- It runs side-effects (like data fetching) twice to find mistakes in them caused by missing effect cleanup.
- It checks if deprecated APIs are used, and logs a warning message to the console if so.

# `Component Life Cycle`

React components have a lifecycle consisting of three phases: `Mounting`, `Updating`, and `Unmounting` along with several “lifecycle methods” that you can override to run code at particular times in the process.

It is not recommended to use lifecycle methods manually. Instead, use the useEffect hook with functional components.

## `Mounting`

Mounting means putting elements into the DOM.

- `constructor()`
- `getDerivedStateFromProps()`
- `render()`
- `componentDidMount()`

The `render()` method is required and will always be called, the others are optional and will be called if you define them.

## `Updating`

The next phase in the lifecycle is when a component is updated.

A component is updated whenever there is a change in the component's state or props.

- `getDerivedStateFromProps()`
- `shouldComponentUpdate()`
- `render()`
- `getSnapshotBeforeUpdate()`
- `componentDidUpdate()`

## `Unmounting`

The next phase in the lifecycle is when a component is removed from the DOM, or unmounting as React likes to call it.

- `componentWillUnmount()`

# `Lists and Keys`

When you render lists in React, you can use `the` key prop to specify a unique key for each item. This key is used to identify which item to update when you want to update a specific item.

Keys tell React which array item each component corresponds to, so that it can match them up later. This becomes important if your array items can move (e.g. due to sorting), get inserted, or get deleted. A well-chosen key helps React infer what exactly has happened, and make the correct updates to the DOM tree.

`Example`

```
const numbers = [1, 2, 3, 4, 5];
const updatedNums = numbers.map((number, index) =>
  <li key={index}>
    {number}
  </li>
);
```

<h2 style="color: red">Pitfall</h2>

You might be tempted to use an item’s index in the array as its key. In fact, that’s what React will use if you don’t specify a key at all. But the order in which you render items will change over time if an item is inserted, deleted, or if the array gets reordered. Index as a key often leads to subtle and confusing bugs.

Similarly, do not generate keys on the fly, e.g. with key={Math.random()}. This will cause keys to never match up between renders, leading to all your components and DOM being recreated every time. Not only is this slow, but it will also lose any user input inside the list items. Instead, use a stable ID based on the data.

Note that your components won’t receive key as a prop. It’s only used as a hint by React itself. If your component needs an ID, you have to pass it as a separate prop: <Profile key={id} userId={id} />.

# `Render Props`

The term ‘render props’ refers to a technique for sharing code between React components using a prop whose value is a function.

A component with a render prop takes a function that returns a React element and calls it instead of implementing its own render logic.

```
import React from 'react';

function Mouse({ render }) {
  const [position, setPosition] = React.useState({ x: 0, y: 0 });

  function handleMouseMove(event) {
    setPosition({
      x: event.clientX,
      y: event.clientY
    });
  }

  return (
    <div style={{ height: '100vh' }} onMouseMove={handleMouseMove}>
      {render(position)}
    </div>
  );
}

function App() {
  return (
    <div>
      <h1>Render Prop Example</h1>
      <Mouse render={mouse => (
        <p>The mouse position is {mouse.x}, {mouse.y}</p>
      )} />
    </div>
  );
}

export default App;
```

In this example, the Mouse component is a functional component that uses the useState hook to manage the state of the mouse position. It accepts a render prop, which is a function that returns a React element based on the mouse position. The App component then uses the Mouse component and provides the rendering logic for displaying the mouse position.

## `PropTypes`

In React are used to define and validate the types of data being passed as props to components. They help in creating strict rules for the data being passed in the props, which can be especially useful for larger applications to validate the data, aid in debugging, and avoid bugs in the future.

`Example`

```
import React from 'react';
import PropTypes from 'prop-types';

function Greeting(props) {
  return (
    <h1>Hello, {props.name}</h1>
  );
}

Greeting.propTypes = {
  name: PropTypes.string
};

export default Greeting;

```

### `Types of PropTypes`

There are various types of PropTypes that can be used to define the expected types of props, such as `string`, `number`, `array`, `object`, `function`, etc. Additionally, PropTypes can also be marked as required using the isRequired attribute, which ensures that a prop of a specific type must be provided .

## `DefaultProps`

Using defaultProps allows us to specify default values for props in a component. If the name prop is not provided when using the Greeting component, it will default to 'Stranger'. This can be useful when you want to ensure that a prop has a fallback value if it's not explicitly provided, thus providing a better user experience and preventing errors related to missing props.

`Example`

```
import React from 'react';
import PropTypes from 'prop-types';

function Greeting(props) {
  return (
    <h1>Hello, {props.name}</h1>
  );
}

Greeting.propTypes = {
  name: PropTypes.string
};

Greeting.defaultProps = {
  name: 'Stranger'
};

export default Greeting;

```

# `Refs`

Refs provide a way to access DOM nodes or React elements created in the render method.

In the typical React dataflow, props are the only way that parent components interact with their children. To modify a child, you re-render it with new props. However, there are a few cases where you need to imperatively modify a child outside of the typical dataflow. The child to be modified could be an instance of a React component, or it could be a DOM element. For both of these cases, React provides an escape hatch.

`Adding rest to a component`

```
import { useRef } from 'react';

export default function Counter() {
  let ref = useRef(0);

  function handleClick() {
    ref.current = ref.current + 1;
    alert('You clicked ' + ref.current + ' times!');
  }

  return (
    <button onClick={handleClick}>
      Click me!
    </button>
  );
}

```

The ref points to a number, but, like state, you could point to anything: a string, an object, or even a function. Unlike state, ref is a plain JavaScript object with the current property that you can read and modify.

Note that the component doesn’t re-render with every increment. Like state, refs are retained by React between re-renders. However, setting state re-renders a component. Changing a ref does not!

### `Differences between refs and state `

<table><thead><tr><th>refs</th><th>state</th></tr></thead><tbody><tr><td><code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">useRef(initialValue)</code> returns <code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">{ current: initialValue }</code></td><td><code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">useState(initialValue)</code> returns the current value of a state variable and a state setter function ( <code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">[value, setValue]</code>)</td></tr><tr><td>Doesn’t trigger re-render when you change it.</td><td>Triggers re-render when you change it.</td></tr><tr><td>Mutable—you can modify and update <code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">current</code>’s value outside of the rendering process.</td><td>”Immutable”—you must use the state setting function to modify state variables to queue a re-render.</td></tr><tr><td>You shouldn’t read (or write) the <code dir="ltr" class="inline text-code text-secondary dark:text-secondary-dark px-1 rounded-md no-underline bg-gray-30 bg-opacity-10 py-px">current</code> value during rendering.</td><td>You can read state at any time. However, each render has its own <a class="inline text-link dark:text-link-dark border-b border-link border-opacity-0 hover:border-opacity-100 duration-100 ease-in transition leading-normal" href="/learn/state-as-a-snapshot">snapshot</a> of state which does not change.</td></tr></tbody></table>

# `Events`

Handling events with React elements is very similar to handling events on DOM elements. There are some syntax differences:

- React events are named using camelCase, rather than lowercase.
- With JSX you pass a function as the event handler, rather than a string.

`Example`

```
export default function Button() {
  function handleClick() {
    alert('You clicked me!');
  }

  return (
    <button onClick={handleClick}>
      Click me
    </button>
  );
}
```

Alternatively, you can define an event handler inline in the JSX:

```
<button onClick={function handleClick() {
  alert('You clicked me!');
}}>
```
Or, more concisely, using an arrow function:

```
<button onClick={() => {
  alert('You clicked me!');
}}>

```

# `High Order Components`

A higher-order component (HOC) is an advanced technique in React for reusing component logic. HOCs are not part of the React API, per se. They are a pattern that emerges from React’s compositional nature.

Concretely, a higher-order component is a function that takes a component and returns a new component.

Higher-order components are not commonly used in modern React code. In order to reuse logic, React hooks are mainly used now.

`Example`

```
import React from 'react';

// Define a higher-order component
const withLoading = (WrappedComponent) => {
  return class WithLoading extends React.Component {
    render() {
      const { isLoading, ...props } = this.props;
      if (isLoading) {
        return <div>Loading...</div>;
      } else {
        return <WrappedComponent {...props} />;
      }
    }
  };
};

// Create a component
class MyComponent extends React.Component {
  render() {
    return <div>Content loaded!</div>;
  }
}

// Enhance the component with the higher-order component
const MyComponentWithLoading = withLoading(MyComponent);

// Use the enhanced component
class App extends React.Component {
  render() {
    return (
      <div>
        <h1>Higher-Order Component Example</h1>
        <MyComponentWithLoading isLoading={true} />
      </div>
    );
  }
}

export default App;
```

In this example, the withLoading function is a higher-order component that takes a WrappedComponent and returns a new component that conditionally renders a loading message based on the isLoading prop. The MyComponent is then enhanced with the withLoading higher-order component to create MyComponentWithLoading, which can be used in the App component.

Higher-order components are commonly used for cross-cutting concerns such as logging, authentication, and data fetching. They provide a way to share behavior between components without repeating code.

[TOP](#rendering)