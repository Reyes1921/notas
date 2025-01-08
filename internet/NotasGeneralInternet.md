[Volver al Menú](root.md)

- AND
- OR
- NOT
- NAND
- NOR
- XOR
- XNOR

# `Ver ip de una pagina web`

Hacer ping a esa web desde la consola del windows sin el www y el https

```
ping google.com
```

# `Difference Between SPA and PWA`

Single Page Applications (SPAs) and Progressive Web Applications (PWAs) are both modern web application architectures that offer enhanced user experiences. However, there are distinct differences between the two.

## `SPAs:`

- `Definition`: SPAs are web applications that load a single HTML page and dynamically update that page as the user interacts with the app.

- `Development`: SPAs are typically developed using frameworks like Angular or libraries like React.
  Offline Capability: SPAs do not have inherent offline capabilities and rely on the server for content updates.

- `Cost and Development Speed`: SPA development is usually faster and more cost-effective than PWA development due to the availability of ready-made libraries and frameworks.

- `Security`: SPAs do not have specific security requirements beyond standard web security practices.

## `PWAs:`

- `Definition`: PWAs are web applications that leverage modern web capabilities to deliver an app-like experience to users. They can be installed on a user's device and offer offline functionality.

- `Offline Capability`: PWAs can run both online and offline, allowing users to access the app even without an internet connection.

- `Security`: PWAs must be run under HTTPS, ensuring a high-security standard, making them suitable for applications that require users to submit personal data or sensitive information.

- `Battery Consumption`: PWAs may consume more battery compared to SPAs.

- `Accessibility`: PWAs allow users to add a shortcut to the application, making it easy for them to use it again.
  Cost and Development Speed: PWA development may be more time-consuming and costly compared to SPA development due to the need for specific offline and installation capabilities .

# `IP`

- `ipv4` = 32 bits 255.255.255.255 2\*\*32
- `ipv6` = 128 bits 2\*\*128

# `Estructuras de datos`

## ` Linked List`:

Es una estructura de datos que consiste en una secuencia de nodos, donde cada nodo contiene un campo de datos y un campo de enlace.
Los nodos se enlazan entre sí de tal manera que cada nodo contiene un enlace al siguiente nodo de la secuencia.
El primer nodo de la secuencia se denomina nodo cabeza y el último nodo se denomina nodo cola.
El nodo cola contiene un enlace nulo, que indica el final de la secuencia.
La secuencia de nodos se denomina lista enlazada.
Las listas enlazadas son una de las estructuras de datos más simples y más utilizadas.
Las listas enlazadas son muy útiles cuando no se conoce de antemano el número de elementos que se van a almacenar en la estructura de datos.
Las listas enlazadas son muy eficientes en la inserción y eliminación de elementos en cualquier posición de la secuencia.
Sin embargo, las listas enlazadas son poco eficientes en la búsqueda de elementos en la secuencia.

## `Stack`:

Es una estructura de datos que permite almacenar y recuperar datos en un orden LIFO (Last In, First Out).

## `Queue`:

Es una estructura de datos que permite almacenar y recuperar datos en el orden en que se introdujeron.

## `Graph`:

Es una estructura de datos que permite almacenar y recuperar datos en forma de grafo. Contiene nodos que estan conectados por medio de aristas o vertices.

## `Tree`:

Es una estructura de datos que permite almacenar y recuperar datos en forma de árbol de manera jerarquica y puede tener muchos hijos.

## `Binary Tree`:

Es un arbol donde puede tener maximo 0, 1 o 2 hijos. Hay varios tipos, el full, completo y perfecto.

## `Heap (Max heap - Min heap)`:

Es un tipo especial de arbol binario donde el valor de cada nodo es mayor o igual que el valor de sus hijos.

## `AVL Tree`:

Es un arbol binario de busqueda balanceado, donde la diferencia de altura entre los subarboles izquierdo y derecho no puede ser mayor a 1.

## `Decision Tree`:

Es un arbol binario que se utiliza para clasificar datos, donde cada nodo representa una caracteristica y cada rama representa una decision.

## `Red-Black Tree`:

Es un arbol binario de busqueda balanceado, donde cada nodo tiene un color, rojo o negro

## `Matrix`:

Es una estructura de datos compuesta por fils y columnas.

## `Hash table`:

Es una estructura que da keys unicos a valores.

## `Gap Buffer`:

Es un array dinamico que permite de forma eficiente agregar o eliminar elmenetos en cualquier posicion cerca de la misma locacion.

## `Array`:

Un array es una estructura de datos que permite almacenar un conjunto de datos del mismo tipo. Su posicionamiento en la memoria es contiguo.

# `ISO Model (Open System Interconnection Model)`:

Es un modelo de referencia para la arquitectura de sistemas de información, que se utiliza para describir la organización de los datos y la lógica de los procesos de negocio en un sistema de información.

## `7 Layers (Please Do Not Throw Sausage Pizza Away)`

### `Datos - Appliation Layer`:

Es la capa mas alta de la arquitectura, es la que se comunica con el usuario y es la que se comunica con el sistema operativo.

### `Datos - Presentation Layer`:

Aquí tendremos los servicios responsables de que la representación de la información sea coherente en ambos extremos de la comunicación.

### `Datos - Session Layer`:

Se encarga de establecer,administrar y finalizar las sesiones entre dos hosts que se estan comunicando.

### `Segmento - Transport Layer`:

Está encargado de la transferencia libre de errores de los datos entre el emisor y el receptor, aunque no estén directamente conectados, así como de mantener el flujo de la red. (segementacion, retransmision, control de flujo)

### `Paquetes - Network Layer`:

Provee principalmente los servicios de envío, enrutamiento(routing) y control de congestionamiento de los datos (paquetes de datos) de un nodo a otro en la red, esta es la capa más inferior en cuanto a manejo de transmisiones punto a punto.

### `Tramas - Data Link Layer`:

La capa de enlace de datos proporciona tránsito de datos confiable a través de un enlace físico. Al hacerlo, la capa se ocupa del direccionamiento físico (comparado con el lógico) , la topología de red, el acceso a la red, la notificación de errores, entrega ordenada de tramas y control de flujo.

### `Bits - Physical Layer`:

La capa física se encarga de definir todos los aspectos relacionados con los elementos físicos de conexión de los dispositivos a la red, así como de establecer los procedimientos para transmitir la información sobre la serial física empleada. En este sentido, puede decirse que la capa física es la encargada de definir cuatro tipos de características de los elementos de interconexión: Mecánicas, Eléctricas, Funcionales y De procedimiento.

# `TCP/ IP Model (Transmission Control Protocol / Internet Protocol)`:

## `Datos -Appliation`:

Es la capa mas alta de la arquitectura, es la que se comunica con el usuario y es la que se comunica con el sistema operativo.

## `Segmentos - Transport Layer`:

Es la capa que se encarga de la presentacion de los datos, es decir, la capa que se encarga de la interfaz de usuario.

## `Paquetes -Internet Layer`:

Tramas -Network Access Layer:

[TOP](#ver-ip-de-una-pagina-web)
