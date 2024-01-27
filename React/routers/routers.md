[Volver al Menú](../root.md)

# `Routers`

# `React Router`

React router is the most famous library when it comes to implementing routing in React applications.

## `Install`

```
npm install react-router-dom localforage match-sorter sort-by
```

## `Adding a Router`

First thing to do is create a Browser Router and configure our first route. This will enable client side routing for our web app.

```
import * as React from "react";
import * as ReactDOM from "react-dom/client";
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";
import "./index.css";

const router = createBrowserRouter([
  {
    path: "/",
    element: <div>Hello world!</div>,
  },
]);

ReactDOM.createRoot(document.getElementById("root")).render(
  <React.StrictMode>
    <RouterProvider router={router} />
  </React.StrictMode>
);
```

## `createBrowserRouter`

This is the recommended router for all React Router web projects. It uses the DOM History API to update the URL and manage the history stack.

```
import * as React from "react";
import * as ReactDOM from "react-dom";
import {
  createBrowserRouter,
  RouterProvider,
} from "react-router-dom";

import Root, { rootLoader } from "./routes/root";
import Team, { teamLoader } from "./routes/team";

const router = createBrowserRouter([
  {
    path: "/",
    element: <Root />,
    loader: rootLoader,
    children: [
      {
        path: "team",
        element: <Team />,
        loader: teamLoader,
      },
    ],
  },
]);

ReactDOM.createRoot(document.getElementById("root")).render(
  <RouterProvider router={router} />
);
```









[TOP](#routers)