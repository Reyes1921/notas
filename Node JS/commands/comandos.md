[Volver al Menú](../root.md)

## `Abrir archivo`
```
node file.js
```

## `Para que no tengamos que levantar el servidor con cada cambio`
```
node --watch file.js
```

## `Crear archivo con la extension .http para poder llamar mas facil los metodos`

```
GET http://localhost:1234/

POST http://localhost:1234/movies

```

## `Inicializar node en el proyecto para que se cree el archivo package.json`

```
npm init -y
```

## `Instalar express`

```
npm install --save express
```

## `Llamar a express`
```
const express = require('express');
```

## `El punto de entrada de la app`

```
const app = express();
```

# `get method`

```
  app.get('/', (req, res) => {
    res.send('Hello World');
  });
```

## `Escuhar el puerto`

```
app.listen(port,hostname, ()=>{
    console.log(`Server listening on port http://${hostname}:${port}/`);
})
```