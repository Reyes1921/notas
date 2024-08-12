[Volver al Menú](../root.md)

# `Advanced Topics`

# `<Suspense>`

React Suspense is a feature in React that allows components to “suspend” rendering while they are waiting for something to happen, such as data to be fetched from an API or an image to be loaded. Suspense allows developers to create a more seamless user experience by rendering a placeholder or fallback component while the component is waiting for the required data to be available.

Here is a general overview of how React Suspense works:

- A component that uses Suspense wraps a component that may need to “suspend” rendering in a Suspense component.
- The wrapped component throws a promise when it needs to suspend rendering.
- The Suspense component catches the promise and renders a fallback component while the promise is pending.
- When the promise resolves, the wrapped component is rendered with the required data.

```
export default function ArtistPage({ artist }) {
  return (
    <>
      <h1>{artist.name}</h1>
      <Suspense fallback={<Loading />}>
        <Albums artistId={artist.id} />
      </Suspense>
    </>
  );
}

function Loading() {
  return <h2>🌀 Loading...</h2>;
}

```

# `Portals`

Portals provide a first-class way to render children into a DOM node that exists outside the DOM hierarchy of the parent component.

createPortal lets you render some children into a different part of the DOM.

```
<div>
  <SomeComponent />
  {createPortal(children, domNode, key?)}
</div>
```

To create a portal, call createPortal, passing some JSX, and the DOM node where it should be rendered:

```
import { createPortal } from 'react-dom';

// ...

<div>
  <p>This child is placed in the parent div.</p>
  {createPortal(
    <p>This child is placed in the document body.</p>,
    document.body
  )}
</div>
```

[Mas Información](https://react.dev/reference/react-dom/createPortal)

# `Server APIs`

The react-dom/server APIs let you render React components to HTML on the server. These APIs are only used on the server at the top level of your app to generate the initial HTML. A framework may call them for you. Most of your components don’t need to import or use them.

<p style="color: red"> These APIs will be removed in a future major version of React.</p>

# `Error Boundaries`

In the past, JavaScript errors inside components used to corrupt React’s internal state and cause it to emit cryptic errors on next renders. These errors were always caused by an earlier error in the application code, but React did not provide a way to handle them gracefully in components, and could not recover from them.

Error boundaries are React components that catch JavaScript errors anywhere in their child component tree, log those errors, and display a fallback UI instead of the component tree that crashed. Error boundaries catch errors during rendering, in lifecycle methods, and in constructors of the whole tree below them.

To implement an error boundary component, you need to provide static getDerivedStateFromError which lets you update state in response to an error and display an error message to the user. You can also optionally implement componentDidCatch to add some extra logic, for example, to log the error to an analytics service.

```
<ErrorBoundary fallback={<p>Something went wrong</p>}>
  <Profile />
</ErrorBoundary>

```

If Profile or its child component throws an error, ErrorBoundary will “catch” that error, display a fallback UI with the error message you’ve provided, and send a production error report to your error reporting service.

[TOP](#advanced-topics)
