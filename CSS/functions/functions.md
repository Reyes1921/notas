[Volver al Menú](../root.md)

# `Functions`

<table> <thead> <tr> <th>Función CSS</th> <th>Tipo</th> <th>Descripción</th> </tr> </thead> <tbody> <tr> <td><a href="/css/funciones-css/funcion-calc/"><code>calc()</code></a></td> <td>Cálculo</td> <td colspan="2">Realiza <strong>cálculos</strong> con unidades CSS como <code>px</code>, <code>%</code>, <code>vw</code>, <code>vh</code> u otras.</td> </tr> <tr> <td><a href="/css/funciones-css/funcion-calc/#signo-de-un-n%C3%BAmero"><code>abs()</code></a> / <a href="/css/funciones-css/funcion-calc/#signo-de-un-n%C3%BAmero"><code>sign()</code></a></td> <td>Signo</td> <td colspan="2">Funciones para obtener el valor absoluto o el signo de un número.</td> </tr> <tr> <td><a href="/css/funciones-css/funcion-min-max-clamp/"><code>min()</code></a> / <a href="/css/funciones-css/funcion-min-max-clamp/#la-funci%C3%B3n-max"><code>max()</code></a></td> <td>Comparación</td> <td colspan="2">Permite calcular el valor <strong>mínimo</strong> o <strong>máximo</strong> de las unidades indicadas.</td> </tr> <tr> <td><a href="/css/funciones-css/funcion-min-max-clamp/#la-funci%C3%B3n-clamp"><code>clamp()</code></a></td> <td>Comparación</td> <td colspan="2">Permite calcular valores «ajustados». Equivalente a <code>max(</code>MIN<code>, min(</code>VAL<code>, </code>MAX<code>))</code>.</td> </tr> <tr> <td><a href="/css/funciones-css/funcion-round-mod-rem/"><code>round()</code></a> / <a href="/css/funciones-css/funcion-round-mod-rem/#la-funci%C3%B3n-mod"><code>mod()</code></a> / <a href="/css/funciones-css/funcion-round-mod-rem/#la-funci%C3%B3n-rem"><code>rem()</code></a></td> <td>Escalonadas</td> <td colspan="2">Funciones que permiten redondear, obtener el módulo o el resto.</td> </tr> <tr> <td><a href="/css/funciones-css/funciones-trigonometricas/"><code>sin()</code></a> / <a href="/css/funciones-css/funciones-trigonometricas/"><code>cos()</code></a> / <a href="/css/funciones-css/funciones-trigonometricas/"><code>tan()</code></a></td> <td>Trigonométricas</td> <td colspan="2">Permite obtener el <strong>seno</strong>, <strong>coseno</strong> o <strong>tangente</strong> de un valor.</td> </tr> <tr> <td><a href="/css/funciones-css/funciones-trigonometricas/"><code>asin()</code></a> / <a href="/css/funciones-css/funciones-trigonometricas/"><code>acos()</code></a> / <a href="/css/funciones-css/funciones-trigonometricas/"><code>atan()</code></a></td> <td>Trigonométricas</td> <td colspan="2">Permite obtener el <strong>arcoseno</strong>, <strong>arcocoseno</strong> o <strong>arcotangente</strong> de un valor.</td> </tr> <tr> <td><a href="/css/funciones-css/funciones-trigonometricas/"><code>atan2()</code></a></td> <td>Trigonométricas</td> <td colspan="2">Aplica la función <strong>arcotangente de dos parámetros</strong>.</td> </tr> <tr> <td><a href="/css/funciones-css/funciones-exponenciales/"><code>pow()</code></a> / <a href="/css/funciones-css/funciones-exponenciales/"><code>sqrt()</code></a> / <a href="/css/funciones-css/funciones-exponenciales/"><code>hypot()</code></a></td> <td>Exponenciales</td> <td colspan="2">Permite realizar potenciación, raíces cuadradas o hipotenusa.</td> </tr> <tr> <td><a href="/css/funciones-css/funciones-exponenciales/"><code>log()</code></a> / <a href="/css/funciones-css/funciones-exponenciales/"><code>exp()</code></a></td> <td>Exponenciales</td> <td colspan="2">Permite realizar logaritmos o potencias de <code>e</code>.</td> </tr> </tbody> </table>

## `var()`

```
<var()> =
  var( <custom-property-name> , <declaration-value>? )
```

`<custom-property-name>`
El nombre de la custom property a la que se hace referencia, representada por un identificador válido, es decir, cualquier nombre que comience por dos guiones. Las "custom properties" son para uso exclusivo de autores y usuarios. CSS no dará nunca un significado más alla del que se detalla aquí.

`<declaration-value>`
El valor por defecto de la custom property en caso de que la custom property referenciada sea inválida. Este valor puede contener cualquier caracter salvo algunos con significado especial como saltos de linea, llaves sin cerrar, exclamaciones o puntos y comas .

## `hsl()`

The hsl() functional notation expresses a color in the sRGB color space according to its hue, saturation, and lightness components. An optional alpha component represents the color's transparency.

```

/* Absolute values */
hsl(120deg 75% 25%)
hsl(120 75 25) /* deg and % units are optional */
hsl(120deg 75% 25% / 60%)
hsl(none 75% 25%)

/* Relative values */
hsl(from green h s l / 0.5)
hsl(from #0000FF h s calc(l + 20))
hsl(from rgb(200 0 0) calc(h + 30) s calc(l + 30))
```

[TOP](#functions)