[Volver al Menú](../root.md)

# `Hooks`

`Todos los Hooks deberian comenzar con use`

# `useState`

`useState` hook is used to manage the state of a component in functional components. Calling `useState` returns an array with two elements: the current state value and a function to update the state.

`Example`

```
import React, { useState } from 'react';

function Example() {
  // Declare a new state variable, which we'll call "count"
  const [count, setCount] = useState(0);

  // Function to modify the count value
  const handleButtonClick = () => {
    // Modifying the count value
    setCount(count + 1);
  };

  return (
    <div>
      <p>You clicked {count} times</p>
      <button onClick={handleButtonClick}>Click me</button>
    </div>
  );
}

```

# `useEffect`

`useEffect` is a special hook that lets you run side effects in React. It is similar to componentDidMount and componentDidUpdate, but it only runs when the component (or some of its props) changes and during the initial mount.

`useEffect` is a React Hook that lets you synchronize a component with an external system.

`Example`

```
import React, { useState, useEffect } from 'react';

function Example() {
  const [count, setCount] = useState(0);

  // useEffect to update the document title
  useEffect(() => {
    document.title = `You clicked ${count} times`;
  }, [count]); // Dependency array to run the effect only when count changes

  return (
    <div>
      <p>You clicked {count} times</p>
      <button onClick={() => setCount(count + 1)}>Click me</button>
    </div>
  );
}

```

If you want to run React's useEffect Hook only on the first render of a component (also called only on mount), then you can pass in a second argument to useEffect:

```
const Toggler = ({ toggle, onToggle }) => {
  React.useEffect(() => {
    console.log('I run only on the first render: mount.');
  }, []);

  return (
    <div>
      <button type="button" onClick={onToggle}>
        Toggle
      </button>

      {toggle && <div>Hello React</div>}
    </div>
  );
};
```

# `useCallback`

`useCallback` is a React Hook that lets you cache a function definition between re-renders.

import React, { useState, useCallback } from 'react';

```
function Example() {
  const [count, setCount] = useState(0);

  // Define a memoized callback function using useCallback
  const handleIncrement = useCallback(() => {
    setCount(count + 1);
  }, [count]); // Dependency array to run the callback only when count changes

  return (
    <div>
      <p>Count: {count}</p>
      <button onClick={handleIncrement}>Increment Count</button>
    </div>
  );
}
```

In this example, the useCallback hook is used to create a memoized callback function handleIncrement that increments the count state. The dependency array [count] ensures that the callback is only recreated when the count state changes, optimizing performance by preventing unnecessary re-renders.

The useCallback hook is particularly useful when passing callbacks to optimized child components that rely on reference equality to prevent unnecessary renders.

# `useContext`

`useContext` is a React Hook that lets you read and subscribe to context from your component.

```
import React, { createContext, useContext } from 'react';

// Create a context
const ThemeContext = createContext('light');

// Component that uses the context
function ThemedComponent() {
  const theme = useContext(ThemeContext);
  return <div>Current theme: {theme}</div>;
}

// Component that provides the context value
function App() {
  return (
    <ThemeContext.Provider value="dark">
      <ThemedComponent />
    </ThemeContext.Provider>
  );
}
```

In this example, the `useContext` hook is used to consume the ThemeContext within the ThemedComponent. The ThemeContext.Provider component provides the context value "dark" to all the components within its tree, allowing ThemedComponent to access and use the theme value.

The `useContext` hook is a powerful tool for consuming context in functional components, providing a straightforward way to access context values without nesting multiple components.

# `useMemo `

React's useMemo Hook can be used to optimize the computation costs of your React function components.

```
import React, { useState, useMemo } from 'react';

function Example({ todos, tab }) {
  // Memoized calculation of visible todos based on dependencies (todos, tab)
  const visibleTodos = useMemo(() => filterTodos(todos, tab), [todos, tab]);

  return (
    <div>
      <h2>Todo List</h2>
      {visibleTodos.map((todo) => (
        <div key={todo.id}>{todo.title}</div>
      ))}
    </div>
  );
}
```

In this example, the useMemo hook is used to memoize the calculation of visibleTodos based on the dependencies todos and tab. This ensures that the calculation is only re-executed when the dependencies change, optimizing performance by preventing unnecessary recalculations.

The useMemo hook is particularly useful for optimizing performance by caching the result of expensive computations in functional components.

# `useReducer`

```
import React, { useReducer } from 'react';

// Initial state for the todos
const initialTodos = [
  { id: 1, title: "Todo 1", complete: false },
  { id: 2, title: "Todo 2", complete: false }
];

// Reducer function to manage state transitions
const reducer = (state, action) => {
  switch (action.type) {
    case "TOGGLE_COMPLETE":
      return state.map((todo) =>
        todo.id === action.id ? { ...todo, complete: !todo.complete } : todo
      );
    default:
      return state;
  }
};

function TodoList() {
  const [todos, dispatch] = useReducer(reducer, initialTodos);

  const handleToggleComplete = (id) => {
    dispatch({ type: "TOGGLE_COMPLETE", id });
  };

  return (
    <div>
      <h2>Todo List</h2>
      {todos.map((todo) => (
        <div key={todo.id}>
          <input
            type="checkbox"
            checked={todo.complete}
            onChange={() => handleToggleComplete(todo.id)}
          />
          <span>{todo.title}</span>
        </div>
      ))}
    </div>
  );
}

```

In this example, the useReducer hook is used to manage the state of a todo list. The reducer function handles state transitions based on dispatched actions, such as toggling the completion status of a todo item. The useReducer hook returns the current state (todos) and a dispatch function to trigger state transitions.

The useReducer hook is particularly useful for managing complex state logic and transitions in functional components.

# `Writing Custom Hooks`

Building your own Hooks lets you extract component logic into reusable functions.



[TOP](#hooks)