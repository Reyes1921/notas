[Volver al Menú](../state/root.md)

# `Context`

Usually, you will pass information from a parent component to a child component via props. But passing props can become verbose and inconvenient if you have to pass them through many components in the middle, or if many components in your app need the same information. Context lets the parent component make some information available to any component in the tree below it—no matter how deep—without passing it explicitly through props.

## `The problem with passing props `

Passing props is a great way to explicitly pipe data through your UI tree to the components that use it.

But passing props can become verbose and inconvenient when you need to pass some prop deeply through the tree, or if many components need the same prop. The nearest common ancestor could be far removed from the components that need data, and lifting state up that high can lead to a situation called “prop drilling”.

## `Context: an alternative to passing props `

Context lets a parent component provide data to the entire tree below it. There are many uses for context. Here is one example. Consider this Heading component that accepts a level for its size:

## `Step 1: Create the context `

```
import { createContext } from 'react';

export const CatContext = createContext();
```

## `Step 3: Provide the context `

```
import { useState } from "react"
import { CatContext } from "./CatContext";

export const CatProvider = ({ children }) => {

    const [catWeight, setCatWeight] = useState(0);

    return (
        <CatContext.Provider value={{ catWeight, setCatWeight }}>
            {children}
        </CatContext.Provider>
    )
}
```

This tells React: “if any component inside this` <CatProvider>` asks for CatContext, give them this level.” The component will use the value of the nearest <CatProvider.Provider> in the UI tree above it.

[TOP](#context)
