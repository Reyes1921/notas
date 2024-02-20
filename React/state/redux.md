[Volver al Menú](../state/root.md)

# `Redux`

Redux is a predictable state container for JavaScript apps. It helps you write applications that behave consistently, run in different environments (client, server, and native), and are easy to test. On top of that, it provides a great developer experience.

## `Redux is really:`

- A single store containing "global" state
- Dispatching plain object actions to the store when something happens in the app
- Pure reducer functions looking at those actions and returning immutably updated state

## `Conceptos básicos`

Redux de por si es muy simple.

Imagine que el estado de su aplicación se describe como un simble objeto.

```
{
  todos: [{
    text: 'Comer',
    completed: true
  }, {
    text: 'Hacer ejercicio',
    completed: false
  }],
  visibilityFilter: 'SHOW_COMPLETED'
}
```

Para cambiar algo en el estado, es necesario enviar una acción. Una acción es un simple objeto en JavaScript que describe lo que sucedió.

```
{ type: 'ADD_TODO', text: 'Ir a nadar a la piscina' }
{ type: 'TOGGLE_TODO', index: 1 }
{ type: 'SET_VISIBILITY_FILTER', filter: 'SHOW_ALL' }
```

Hacer valer que cada cambio sea descrito como una acción nos permite tener una claro entendimiento de lo que está pasando en la aplicación. Si algo cambió, sabemos por qué cambió. Las acciones son como migas de pan (el rastro) de lo que ha sucedido. Finalmente, para juntar el estado y las acciones entre si, escribimos una función llamada reductor (reducer). Una vez más, nada de magia sobre él asunto, es sólo una función que toma el estado y la acción como argumentos y devuelve el siguiente estado de la aplicación.

```
function visibilityFilter(state = 'SHOW_ALL', action) {
  if (action.type === 'SET_VISIBILITY_FILTER') {
    return action.filter;
  } else {
    return state;
  }
}

function todos(state = [], action) {
  switch (action.type) {
  case 'ADD_TODO':
    return state.concat([{ text: action.text, completed: false }]);
  case 'TOGGLE_TODO':
    return state.map((todo, index) =>
      action.index === index ?
        { text: todo.text, completed: !todo.completed } :
        todo
   )
  default:
    return state;
  }
}
```

Y escribimos otro reductor que gestiona el estado completo de nuestra aplicación llamando a esos dos reductores por sus respectivas state keys:

```
function todoApp(state = {}, action) {
  return {
    todos: todos(state.todos, action),
    visibilityFilter: visibilityFilter(state.visibilityFilter, action)
  };
}
```

Esto es básicamente toda la idea de Redux. Tenga en cuenta que no hemos utilizado ninguna API de Redux. Ya se incluyen algunas utilidades para facilitar este patrón, pero la idea principal es que usted describe cómo su estado se actualiza con el tiempo en respuesta a los objetos de acción, y el 90% del código que se escribe es simplemente JavaScript, sin uso de Redux en si mismo, sus APIs, o cualquier magia.

## `Tres Principios`

Redux puede ser descrito en tres principios fundamentales:

- ### `Única fuente de la verdad`

El `estado` de toda tu aplicación esta almacenado en un árbol guardado en un único `store`.

- ### `El estado es de solo lectura`

La única forma de modificar el estado es emitiendo una `acción`, un objeto describiendo que ocurrió.

- ### `Los cambios se realizan con funciones puras`

Para especificar como el árbol de estado es transformado por las acciones, se utilizan `reducers` puros.

## `Acciones`

Las acciones son un bloque de información que envia datos desde tu aplicación a tu store. Son la única fuente de información para el store. Las envias al store usando `store.dispatch()`.

## `Reducers`

Las acciones describen que algo pasó, pero no especifican cómo cambió el estado de la aplicación en respuesta. Esto es trabajo de los `reducers`.

## `Store`

En las secciones anteriores, definimos las acciones que representan los hechos sobre "lo que pasó" y los reductores son los que actualizan el estado de acuerdo a esas acciones.

El `Store` es el objeto que los reúne. El `store` tiene las siguientes responsabilidades:

- Contiene el estado de la aplicación;
- Permite el acceso al estado via getState();
- Permite que el estado sea actualizado via dispatch(action);
- Registra los listeners via subscribe(listener);
- Maneja la anuliación del registro de los listeners via el retorno de la función de subscribe(listener).

## `What is a "thunk"?`

The word "thunk" is a programming term that means "a piece of code that does some delayed work". Rather than execute some logic now, we can write a function body or code that can be used to perform the work later.

n the same way that Redux code normally uses action creators to generate action objects for dispatching instead of writing action objects by hand, we normally use thunk action creators to generate the thunk functions that are dispatched. A thunk action creator is a function that may have some arguments, and returns a new thunk function. The thunk typically closes over any arguments passed to the action creator, so they can be used in the logic:

```
// fetchTodoById is the "thunk action creator"
export function fetchTodoById(todoId) {
  // fetchTodoByIdThunk is the "thunk function"
  return async function fetchTodoByIdThunk(dispatch, getState) {
    const response = await client.get(`/fakeApi/todo/${todoId}`)
    dispatch(todosLoaded(response.todos))
  }
}
```

# `Redux Toolkit (RTK)`

Redux Toolkit (`RTK`) is a library for managing state in JavaScript applications. It is an opinionated set of tools and utilities for building Redux applications, and it is designed to make it easier and faster to build Redux applications.

Is our official recommended approach for writing Redux logic. It wraps around the Redux core, and contains packages and functions that we think are essential for building a Redux app. Redux Toolkit builds in our suggested best practices, simplifies most Redux tasks, prevents common mistakes, and makes it easier to write Redux applications.

`RTK` includes utilities that help simplify many common use cases, including store setup, creating reducers and writing immutable update logic, and even creating entire "slices" of state at once.

## `What Does Redux Toolkit Do?`

While these were the patterns originally shown in the Redux docs, they unfortunately require a lot of very verbose and repetitive code. Most of this boilerplate isn't necessary to use Redux. On top of that, the boilerplate-y code lead to more opportunities to make mistakes.

Redux Toolkit starts with two key APIs that simplify the most common things you do in every Redux app:

- `configureStore` sets up a well-configured Redux store with a single function call, including combining reducers, adding the thunk middleware, and setting up the Redux DevTools integration. It also is easier to configure than `createStore`, because it takes named options parameters.

`app/store.js`

```
import { configureStore } from '@reduxjs/toolkit'
import todosReducer from '../features/todos/todosSlice'
import filtersReducer from '../features/filters/filtersSlice'

export const store = configureStore({
  reducer: {
    todos: todosReducer,
    filters: filtersReducer,
  },
})
```

- `createSlice` lets you write reducers that use the Immer library to enable writing immutable updates using "mutating" JS syntax like `state.value = 123`, with no spreads needed. It also automatically generates action creator functions for each reducer, and generates action type strings internally based on your reducer's names. Finally, it works great with TypeScript.

`features/todos/todosSlice.js`

```
import { createSlice } from '@reduxjs/toolkit'

const todosSlice = createSlice({
  name: 'todos',
  initialState: [],
  reducers: {
    todoAdded(state, action) {
      state.push({
        id: action.payload.id,
        text: action.payload.text,
        completed: false,
      })
    },
    todoToggled(state, action) {
      const todo = state.find((todo) => todo.id === action.payload)
      todo.completed = !todo.completed
    },
  },
})

export const { todoAdded, todoToggled } = todosSlice.actions
export default todosSlice.reducer
```

## `Provide the Redux Store to React`

Once the store is created, we can make it available to our React components by putting a React-Redux `<Provider>` around our application in src/index.js. Import the Redux store we just created, put a `<Provider>` around your `<App>`, and pass the store as a prop:

`index.js`

```
import React from 'react'
import ReactDOM from 'react-dom'
import './index.css'
import App from './App'
import { store } from './app/store'
import { Provider } from 'react-redux'

ReactDOM.render(
  <Provider store={store}>
    <App />
  </Provider>,
  document.getElementById('root')
)
```

## `Use Redux State and Actions in React Components`

Now we can use the React-Redux hooks to let React components interact with the Redux store. We can read data from the store with `useSelector`, and dispatch actions using `useDispatch`. Create a `src/features/counter/Counter.js` file with a `<Counter>` component inside, then import that component into `App.js` and render it inside of `<App>`.

```
import React from 'react'
import { useSelector, useDispatch } from 'react-redux'
import { decrement, increment } from './counterSlice'

export function Counter() {
  const count = useSelector((state) => state.counter.value)
  const dispatch = useDispatch()

  return (
    <div>
      <div>
        <button
          aria-label="Increment value"
          onClick={() => dispatch(increment())}
        >
          Increment
        </button>
        <span>{count}</span>
        <button
          aria-label="Decrement value"
          onClick={() => dispatch(decrement())}
        >
          Decrement
        </button>
      </div>
    </div>
  )
}
```


## `Installing`

```
npm install @reduxjs/toolkit
```

# `React Redux`

## `Installing`

```
npm install react-redux
```

## `Why Use React Redux?`

`React Redux` is the official Redux UI binding library for React. If you are using Redux and React together, you should also use `React Redux` to bind these two libraries.

```
import { useSelector, useDispatch } from 'react-redux';
import { Provider } from 'react-redux';
```

# `Overview`

<img src='reduxImg.gif' />

[TOP](#redux)