[Volver al Menú](../root.md)

## `Basico`

Instalaciones del curso de React de Fernando Herrera

```
npm init -y
node index.js
npm i nodemon -g //ver cambios automaticamente
nodemon index.js
npm i express //express
npm i dotenv
npm i express-validator
```

---

## `Abrir archivo`

```
node file.js
```

## `Para que no tengamos que levantar el servidor con cada cambio y no tener que usar nodemon`

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

[TOP](#basico)
