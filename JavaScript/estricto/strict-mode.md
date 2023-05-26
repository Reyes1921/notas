[Volver al Menú](../root.md)

# `Strict Mode`

Es para que todo funcione de la manera moderna luego de tantos cambios que se le han hecho al lenguaje si no se usa ciertas cosas funcionan como antes, se usa como un "string", por ejemplo si se usa num=5 sin el strict mode no pasa nada pero si se usa con el strict mode da error.

Para habilitar completamente todas las características de JavaScript moderno, debemos comenzar los scripts con "use strict". La directiva debe estar en la parte superior de un script o al comienzo de una función.

Sin la directiva "use strict" todo sigue funcionando, pero algunas características se comportan de la manera antigua y “compatible”. Generalmente preferimos el comportamiento moderno.

Algunas características modernas del lenguaje (como las clases) activan el modo estricto implícitamente.

All modern browsers support running JavaScript in "Strict Mode".

In "Strict Mode", undeclared variables are not automatically global.

Ejemplo:
```
'use strict'
pi = 3,1416;
console.log(pi); // ReferenceError: pi is not defined
```
Tambien puede ir dentro de una funcion
```
function(){
    'use strict'
    pi = 3,1416;
    console.log(pi); // ReferenceError: pi is not defined
}
``` 

## `¿Deberíamos utilizar “use strict”?`
La pregunta podría parecer obvia, pero no lo es.

Uno podría recomendar que se comiencen los script con "use strict"… ¿Pero sabes lo que es interesante?

El JavaScript moderno admite “clases” y “módulos”, estructuras de lenguaje avanzadas (que seguramente llegaremos a ver), que automáticamente habilitan use strict. Entonces no necesitamos agregar la directiva "use strict" si las usamos.

Entonces, por ahora "use strict"; es un invitado bienvenido al tope de tus scripts. Luego, cuando tu código sea todo clases y módulos, puedes omitirlo.

A partir de ahora tenemos que saber acerca de use strict en general.

En los siguientes capítulos, a medida que aprendamos características del lenguaje, veremos las diferencias entre el modo estricto y el antiguo. Afortunadamente no hay muchas y realmente hacen nuestra vida mejor.

Todos los ejemplos en este tutorial asumen modo estricto salvo que (muy raramente) se especifique lo contrario.