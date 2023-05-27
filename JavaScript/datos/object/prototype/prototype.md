[Volver al Menú](../object.md)

# `Prototipos y herencia (delegacion de objeto)`

### `Herencia prototípica`

En programación, a menudo queremos tomar algo y extenderlo.

Por ejemplo: tenemos un objeto user con sus propiedades y métodos, y queremos hacer que admin y guest sean variantes ligeramente modificadas del mismo. Nos gustaría reutilizar lo que tenemos en user; no queremos copiar ni reimplementar sus métodos, sino solamente construir un nuevo objeto encima del existente.

En JavaScript, los objetos tienen una propiedad oculta especial `[[Prototype]]` (como se menciona en la especificación); que puede ser null, o hacer referencia a otro objeto llamado “prototipo”:

Cuando leemos una propiedad de object, si JavaScript no la encuentra allí la toma automáticamente del prototipo. En programación esto se llama “herencia prototípica”.

La propiedad [[Prototype]] es interna y está oculta, pero hay muchas formas de configurarla.

Una de ellas es usar el nombre especial **proto**, así:

<h2 style='color: green'>Resumen</h2>

- En JavaScript, todos los objetos tienen una propiedad oculta [[Prototype]] que es: otro objeto, o null.
- Podemos usar obj.**proto** para acceder a ella (un getter/setter histórico, también hay otras formas que se cubrirán pronto).
- El objeto al que hace referencia [[Prototype]] se denomina “prototipo”.
- Si en obj queremos leer una propiedad o llamar a un método que no existen, entonces JavaScript intenta encontrarlos en el prototipo.
- Las operaciones de escritura/eliminación actúan directamente sobre el objeto, no usan el prototipo (suponiendo que sea una propiedad de datos, no un setter).
- Si llamamos a obj.method(), y method se toma del prototipo, this todavía hace referencia a obj. Por lo tanto, los métodos siempre funcionan con el objeto actual, incluso si se heredan.
- El bucle for..in itera sobre las propiedades propias y heredadas. Todos los demás métodos de obtención de valor/clave solo operan en el objeto mismo.

### `F.prototype`

[mas informacion](https://es.javascript.info/function-prototype)

### `Prototipos nativos`

La propiedad "prototype" es ampliamente utilizada por el núcleo de JavaScript mismo. Todas las funciones de constructor integradas lo usan.

<img src="native-prototypes-classes.svg" width="600">

<h2 style='color: green'>Resumen</h2>

- Todos los objetos integrados siguen el mismo patrón:
- Los métodos se almacenan en el prototipo (Array.prototype, Object.prototype, Date.prototype, etc.)
- El objeto en sí solo almacena los datos (elementos de arreglo, propiedades de objeto, la fecha)
- Los primitivos también almacenan métodos en prototipos de objetos contenedores: Number.prototype, String.prototype y Boolean.prototype. Solo undefined y null no tienen objetos contenedores.
- Los prototipos integrados se pueden modificar o completar con nuevos métodos. Pero no se recomienda cambiarlos. El único caso permitido es probablemente cuando agregamos un nuevo estándar que aún no es soportado por el motor de JavaScript.

### `Métodos prototipo, objetos sin __proto__`

- Para crear un objeto con un prototipo dado, use:

1. sintaxis literal: { **proto**: ... }, permite especificar multiples propiedades
2. o Object.create(proto, [descriptors]), permite especificar descriptores de propiedad.
   El Object.create brinda una forma fácil de hacer la copia superficial de un objeto con todos sus descriptores:

```
let clone = Object.create(Object.getPrototypeOf(obj), Object.getOwnPropertyDescriptors(obj));
```

- Los métodos modernos para obtener y establecer el prototipo son:

1. `Object.getPrototypeOf(obj)` – devuelve el [[Prototype]] de obj (igual que el getter de **proto**).

2. `Object.setPrototypeOf(obj, proto)` – establece el [[Prototype]] de obj en proto (igual que el setter de **proto**).

- No está recomendado obtener y establecer el prototipo usando los getter/setter nativos de **proto**. Ahora están en el Anexo B de la especificación.

- También hemos cubierto objetos sin prototipo, creados con Object.create(null) o {**proto**: null}.

Estos objetos son usados como diccionarios, para almacenar cualquier (posiblemente generadas por el usuario) clave.

- Normalmente, los objetos heredan métodos nativos y getter/setter de **proto** desde Object.prototype, haciendo sus claves correspondientes “ocupadas” y potencialmente causar efectos secundarios. Con el prototipo null, los objetos están verdaderamente vacíos.
