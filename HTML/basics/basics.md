[Volver al Menú](../root.md)

# `HTML Basics`

HTML stands for HyperText Markup Language. It is used on the frontend and gives the structure to the webpage which you can style using CSS and make interactive using JavaScript.

# `HTML 5`

Describir semánticamente tu contenido es una de esas pequeñas cosas que puedes hacer como desarrollador para realzar magníficamente la experiencia de las personas y servicios que usan tus sitios y aplicaciones web.

Semantic means "relating to meaning". Writing semantic HTML means using HTML elements to structure your content based on each element's meaning, not its appearance.

# `<!DOCTYPE html>`

All HTML documents must start with a `<!DOCTYPE>` declaration.

The declaration is not an HTML tag. It is an "information" to the browser about what document type to expect.

The only purpose of `<!DOCTYPE html>` is to activate no-quirks mode. Older versions of HTML standard DOCTYPEs provided additional meaning, but no browser ever used the DOCTYPE for anything other than switching between render modes.

## `Modo quirks y modo estándar`

En los viejos tiempos de la web, las páginas normalmente se escribían en dos versiones: una para Netscape Navigator y otra para Microsoft Internet Explorer. Cuando se crearon los estándares web en el W3C, los navegadores no podían simplemente comenzar a usarlos, ya que hacerlo dañaría la mayoría de los sitios existentes en la web. Por lo tanto, los navegadores introdujeron dos modos para tratar los sitios que cumplen con los nuevos estándares de manera diferente a los sitios antiguos.

Ahora hay tres modos utilizados por los motores de diseño en los navegadores web: quirks mode (modo de peculiaridades), limited-quirks mode (modo de peculiaridades limitadas) y no-quirks mode (modo sin peculiaridades). En quirks mode, el diseño emula el comportamiento de Navigator 4 e Internet Explorer 5. Esto es esencial para admitir sitios web creados antes de la adopción generalizada de estándares web. En no-quirks mode, el comportamiento es (con suerte) el comportamiento deseado descrito por las especificaciones modernas de HTML y CSS. En limited-quirks mode, solo se implementa una cantidad muy pequeña de peculiaridades.

Los modos limited-quirks y no-quirks solían llamarse modo "casi estándar" y modo "estándar completo", respectivamente. Estos nombres se han cambiado ya que el comportamiento ahora está estandarizado.

In HTML 5, the declaration is simple:

`<!DOCTYPE html>`

# `<html>`

he `<html>` element is the root element for an HTML document. It is the parent of the `<head>` and `<body>`, containing everything in the HTML document other than the doctype. If omitted it will be implied, but it is important to include it, as this is the element on which the language of the content of the document is declared.

# `<html lang="en">`

The lang language attribute added to the`<html>` tag defines the main language of the document. The value of the lang attribute is a two- or three-letter ISO language code followed by the region. The region is optional, but recommended, as a language can vary greatly between regions. For example, French is very different in Canada (fr-CA) versus Burkina Faso (fr-BF). This language declaration enables screen readers, search engines, and translation services to know the document language.

# `<head>`

El elemento `<head>` contiene información sobre el documento, como sus metadatos, títulos y enlaces a hojas de estilo y scripts.

```
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="img/favicon.png" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Rate Movies</title>
</head>
```

# `<meta>: The metadata element`

The `<meta>` HTML element represents metadata that cannot be represented by other meta-related elements, such as `<base>`, `<link>`, `<script>`, `<style>`, or `<title>`.

The type of metadata provided by the `<meta>` element can be one of the following:

- If the `name` attribute is set, the `<meta>` element provides document-level metadata that applies to the whole page.
- If the `http-equiv` attribute is set, the `<meta>` element acts as a pragma directive to simulate directives that could otherwise be given by an HTTP header.
- If the `charset` attribute is set, the `<meta>` element is a charset declaration, giving the character encoding in which the document is encoded.
- If the `itemprop` attribute is set, the `<meta>` element provides user-defined metadata.

## `<meta charset="UTF-8">`

The very first element in the `<head>` should be the charset character encoding declaration. It comes before the title to ensure the browser can render the characters in that title and all the characters in the rest of the document.

The default encoding in most browsers is windows-1252, depending on the locale. However, you should use UTF-8, as it enables the two- to four-byte encoding of all characters, even ones you didn't even know existed. Also, it's the encoding type required by HTML5.

By declaring UTF-8 (case-insensitive), you can even include emojis in your title (but please don't).

The character encoding is inherited into everything in the document, even `<style>` and `<script>`. This little declaration means you can include emojis in class names and the selectorAPI (again, please don't). If you do use emojis, make sure to use them in a way that enhances usability without harming accessibility.

## `<meta http-equiv="X-UA-Compatible" content="IE=edge">`

El atributo http-equiv se utiliza para indicar al navegador que el documento debe ser renderizado en modo de compatibilidad con el navegador especificado.

## `<meta name="viewport" content="width=device-width, initial-scale=1.0">`

The other meta tag that should be considered essential is the viewport meta tag, which helps site responsiveness, enabling content to render well by default, no matter the viewport width. While the viewport meta tag has been around since June 2007, when the first iPhone came out, it's only recently been documented in a specification. As it enables controlling a viewport's size and scale, and prevents the site's content from being sized down to fit a 960px site onto a 320px screen, it is definitely recommended.

Viewport is part of the Lighthouse accessibility audit; your site will pass if it is scalable and has no maximum size set.

# `<link>: The External Resource Link element`

The `<link>` HTML element specifies relationships between the current document and an external resource. This element is most commonly used to link to stylesheets, but is also used to establish site icons (both "favicon" style icons and icons for the home screen and apps on mobile devices) among other things.

## `<link rel="icon" sizes="16x16 32x32 48x48" href="img/favicon.png" type="image/x-icon">`

Use the `<link>` tag, with the rel="icon" attribute/value pair to identify the favicon to be used for your document. A favicon is a very small icon that appears on the browser tab, generally to the left of the document title. When you have an unwieldy number of tabs open, the tabs will shrink and the title may disappear altogether, but the icon always remains visible. Most favicons are company or application logos.

The preceding code says "use the mlwicon.png as the icon for scenarios where a 16px, 32px, or 48px makes sense." The sizes attribute accepts the value of any for scalable icons or a space-separated list of square widthXheight values; where the width and height values are 16, 32, 48, or greater in that geometric sequence, the pixel unit is omitted, and the X is case-insensitive.

```
<link rel="apple-touch-icon" sizes="180x180" href="/images/mlwicon.png" />
<link rel="mask-icon" href="/images/mlwicon.svg" color="#226DAA" />
```

There are two special non-standard kind of icons for Safari browser: apple-touch-icon for iOS devices and mask-icon for pinned tabs on macOS. apple-touch-icon is applied only when the user adds a site to home screen: you can specify multiple icons with different sizes for different devices. mask-icon will only be used if the user pins the tab in desktop Safari: the icon itself should be a monochrome SVG, and the color attribute fills the icon with needed color.

### `Alternate versions of the site #`

We use the alternate value of the rel attribute to identify translations, or alternate representations, of the site.

Let's pretend we have versions of the site translated into French and Brazilian Portuguese:

```
<link rel="alternate" href="https://www.machinelearningworkshop.com/fr/" hreflang="fr-FR" />
<link rel="alternate" href="https://www.machinelearningworkshop.com/pt/" hreflang="pt-BR" />
```

# `<style></style> - <link rel="stylesheet" type="text/css" href="css/style.css">`

There are three ways to include CSS: `<link>`, `<style>`, and the style attribute.

The main two ways to include styles in your HTML file are by including an external resource using a `<link>` element with the rel attribute set to stylesheet, or including CSS direction in the head of your document within opening and closing `<style>` tags.

# `<title>Rate Movies</title>`

El elemento `<title>` especifica el título del documento, que se muestra en la barra de título del navegador o en la pestaña de la página.

# `<script></script>`

The `<script>` tag is used to include, well, scripts. The default type is JavaScript. If you include any other scripting language, include the type attribute with the mime type, or type="module" if it's a JavaScript module. Only JavaScript and JavaScript modules get parsed and executed.

The `<script>` tags can be used to encapsulate your code or to download an external file. In MLW, there is no external script file because contrary to popular belief, you don't need JavaScript for a functional website, and, well, this is an HTML learning path, not a JavaScript one.

With JavaScript, you don't want to reference an element before it exists. It doesn't exist yet, so we won't include it yet. When we do add the light switch element, we'll add the `<script>` at the bottom of the `<body>` rather than in the `<head>`. Why? Two reasons. We want to ensure elements exist before the script referencing them is encountered as we're not basing this script on a DOMContentLoaded event. And, mainly, JavaScript is not only render-blocking, but the browser stops downloading all assets when scripts are downloaded and doesn't resume downloading other assets until the JavaScript is executed. For this reason, you will often find JavaScript requests at the end of the document rather than in the head.

There are two attributes that can reduce the blocking nature of JavaScript download and execution: defer and async. With defer, HTML rendering is not blocked during the download, and the JavaScript only executes after the document has otherwise finished rendering. With async, rendering isn't blocked during the download either, but once the script has finished downloading, the rendering is paused while the JavaScript is executed.

<img src="script-defer-async.avif" width:100px />

# `More Information about metadata`

<a href="https://web.dev/learn/html/metadata/">Here</a>

# `<body>`

El elemento `<body>` representa el contenido principal de un documento HTML. El contenido del cuerpo es lo que se muestra en la ventana del navegador.

# `<header></header>`

El elemento `<header>` representa un contenedor para contenido introductorio o de navegación. Un encabezado típico puede contener un logotipo, el nombre del sitio, una sección de navegación, etc.

# `<nav></nav>`

El elemento `<nav>` representa una sección de una página cuyo propósito es proporcionar enlaces de navegación, ya sea dentro de la página actual o a otras páginas. Las secciones de navegación más comunes son menús, tablas de contenido, índices y barras de navegación.

# `<section></section>`

El elemento `<section>` representa una sección genérica de un documento o aplicación. Una sección, en este contexto, es un contenido autónomo, independiente del resto del contenido.

# `<article></article>`

El elemento `<article>` representa una composición autónoma en un documento, página, aplicación o sitio web, que se puede distribuir o reutilizar independientemente del resto.

# `<aside></aside>`

El elemento `<aside>` representa una sección de contenido que está separada del contenido principal del documento, página o aplicación.

Este elemento puede utilizarse para efectos tipográficos, barras laterales, elementos publicitarios, para grupos de elementos de la navegación, u otro contenido que se considere separado del contenido principal de la página.

# `<main></main>`

El elemento `<main>` representa el contenido principal de su documento. El contenido principal consiste en contenido que es directamente relacionado o expresa el tema central de un documento o la funcionalidad central de una aplicación.

There's a single `<main>` landmark element. The `<main>` element identifies the main content of the document. There should be only one <main> per page.

# `<footer></footer>`

El elemento `<footer>` representa un pie de página para su contenido de sección más cercano o el elemento raíz de la sección.

# `<h1></h1> ... <h6></h6>`

# `<p></p>`

El elemento `<p>` representa un párrafo.

# `<b></b>`

El elemento `<b>` representa texto en negrita.

# `<i></i>`

El elemento `<i>` representa texto en cursiva.

# `<u></u>`

El elemento `<u>` representa texto subrayado.

# `<s></s>`

El elemento `<s>` representa texto tachado.

# `<small></small>`

El elemento `<small>` representa texto de menor importancia que el texto principal.

# `<strong></strong>`

El elemento `<strong>` representa texto importante, y normalmente se muestra en negrita.

# `<em></em>`

El elemento `<em>` representa texto enfatizado, y normalmente se muestra en cursiva.

# `<mark></mark>`

El elemento `<mark>` representa texto marcado o resaltado, normalmente se muestra con un fondo amarillo.

# `<sub></sub>`

El elemento `<sub>` representa texto que debe ser mostrado como subíndice.

# `<sup></sup>`

El elemento `<sup>` representa texto que debe ser mostrado como superíndice.

# `<br>`

El elemento `<br>` representa un salto de línea.

# `<hr>`

El elemento `<hr>` representa un salto temático entre parrafos (o cualquier otro contenido) de un documento.

# `blockquote`

El elemento `<blockquote>` representa una sección larga de contenido que es citado de otra fuente, normalmente con una cita o referencia.

# `<pre></pre>`

El elemento `<pre>` representa texto preformateado.

# `<div></div>`

El elemento `<div>` representa una división genérica de un documento.

# `<span></span>`

El elemento `<span>` representa una porción genérica de texto, sin ningún significado especial.

# `<ul></ul>`

El elemento `<ul>` representa una lista de elementos sin ordenar, y sus elementos hijos `<li>` representan los elementos de la lista.

# `<ol></ol>`

El elemento `<ol>` representa una lista de elementos ordenados, y sus elementos hijos `<li>` representan los elementos de la lista.

# `<li></li>`

El elemento `<li>` representa un elemento de una lista.

# `<a></a>`

El elemento `<a>` representa un hipervínculo, ya sea un hipervínculo a otro recurso o a un lugar dentro del mismo documento.

# `<address>`

El elemento `<address>` representa la información de contacto de un autor o propietario de un documento o de una aplicación.

# `<img src="" alt="">`

El elemento `<img>` representa una imagen.

# `<video></video>`

El elemento `<video>` representa un reproductor de vídeo.

# `<audio></audio>`

El elemento `<audio>` representa un reproductor de audio.

# `<iframe></iframe>`

El elemento `<iframe>` representa un subdocumento.

# `<form></form>`

El elemento `<form>` representa una sección de contenido que consta de controles de formulario que permiten al usuario enviar información a un servidor web.

# `<label></label>`

El elemento `<label>` representa una etiqueta de texto.

# `<textarea></textarea>`

El elemento `<textarea>` representa un control de formulario de texto multilínea.

# `<button></button>`

El elemento `<button>` representa un botón de control.

# `<select></select>`

El elemento `<select>` representa un control de formulario que permite al usuario seleccionar una o más opciones de una lista de opciones.

# `<option></option>`

El elemento `<option>` representa una opción en un elemento `<select>`.

# `<fieldset></fieldset>`

El elemento `<fieldset>` representa un conjunto de controles de formulario.

# `<legend></legend>`

El elemento `<legend>` representa un título para el contenido de su elemento padre `<fieldset>`.

# `<input type="text">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir datos.

# `<input type="submit">`

El elemento `<input>` representa un control de formulario que permite al usuario enviar datos al servidor.

# `<input type="radio">`

El elemento `<input>` representa un control de formulario que permite al usuario seleccionar una opción entre un conjunto de opciones.

# `<input type="checkbox">`

El elemento `<input>` representa un control de formulario que permite al usuario seleccionar una o más opciones entre un conjunto de opciones.

# `<input type="number">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir un número.

# `<input type="range">`

El elemento `<input>` representa un control de formulario que permite al usuario seleccionar un valor dentro de un rango determinado.

# `<input type="date">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una fecha.

# `<input type="time">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una hora.

# `<input type="datetime-local">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una fecha y una hora.

# `<input type="email">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una dirección de correo electrónico.

# `<input type="url">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una URL.

# `<input type="tel">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir un número de teléfono.

# `<input type="search">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir un texto de búsqueda.

# `<input type="color">`

El elemento `<input>` representa un control de formulario que permite al usuario seleccionar un color.

# `<input type="file">`

El elemento `<input>` representa un control de formulario que permite al usuario seleccionar un archivo.

# `<input type="hidden">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir datos que no se mostrarán al usuario.

# `<input type="password">`

El elemento `<input>` representa un control de formulario que permite al usuario introducir una contraseña.

# `<input type="button">`

El elemento `<input>` representa un control de formulario que permite al usuario activar un control de formulario o ejecutar una acción.

# `<input type="image">`

El elemento `<input>` representa un control de formulario que permite al usuario enviar sus datos de formulario al servidor web.

# `<input type="reset">`

El elemento `<input>` representa un control de formulario que permite al usuario restablecer los datos de un formulario.

# `<table></table>`

El elemento `<table>` representa una tabla.

# `<thead></thead>`

El elemento `<thead>` representa un grupo de filas que constituyen los encabezados de una tabla.

# `<tbody></tbody>`

El elemento `<tbody>` representa un grupo de filas que constituyen el cuerpo de una tabla.

# `<tfoot></tfoot>`

El elemento `<tfoot>` representa un grupo de filas que constituyen los pies de una tabla.

# `<tr></tr>`

El elemento `<tr>` representa una fila de celdas en una tabla.

# `<th></th>`

El elemento `<th>` representa una celda de encabezado en una tabla.

# `<td></td>`

El elemento `<td>` representa una celda de datos en una tabla.

# `<caption></caption>`

El elemento `<caption>` representa el título de una tabla.

# `<colgroup></colgroup>`

El elemento `<colgroup>` representa un grupo de una o más columnas de una tabla.

# `<col>`

El elemento `<col>` representa una columna de una tabla.

# `<figure></figure>`

El elemento `<figure>` representa una figura ilustrativa, que puede consistir en una imagen, un diagrama, un código de ejemplo, una ilustración, un esquema o un gráfico.

# `<figcaption></figcaption>`

El elemento `<figcaption>` representa el título de una figura ilustrativa.

# `<embed>`

Usada para integrar una aplicación o contenido interactivo externo que no suele ser HTML.

# `<object> </object>`

Utilizada llamar a un recurso externo de la web. Este recurso será tratado como una imagen, o un recurso externo para ser procesado por un plugin.

# `<source>`

Permite a autores especificar recursos multimedia alternativos para las etiquetas de `<video>` o `<audio>`

# `<svg> </svg>`

Se usa para llamar a una imagen vectorizada.

# `Estructura HTML5`

<img src="estructura-html5.jpg" width=600>

# `Void Elements`

Los elementos vacíos son aquellos que no tienen contenido, por lo tanto no se cierran. Los elementos vacíos son:

- `<area>`

- `<base>`

- `<br>`

- `<col>`

- `<embed>`

- `<hr>`

- `<img>`

- `<input>`

- `<keygen>`

- `<link>`

- `<meta>`

- `<param>`

- `<source>`

- `<track>`

- `<wbr>`

<h1 style="color: red">Block-level Elements</h1>

- `<address>`
- `<article>`
- `<aside>`
- `<blockquote>`
- `<canvas>`
- `<dd>`
- `<div>`
- `<dl>`
- `<dt>`
- `<fieldset>`
- `<figcaption>`
- `<figure>`
- `<footer>`
- `<form>`
- `<h1>-<h6>`
- `<header>`
- `<hr>`
- `<li>`
- `<main>`
- `<nav>`
- `<noscript>`
- `<ol>`
- `<p>`
- `<pre>`
- `<section>`
- `<table>`
- `<tfoot>`
- `<ul>`
- `<video>`

<h1 style="color: red">Inline Elements</h1>

- `<a>`
- `<abbr>`
- `<acronym>`
- `<b>`
- `<bdo>`
- `<big>`
- `<br>`
- `<button>`
- `<cite>`
- `<code>`
- `<dfn>`
- `<em>`
- `<i>`
- `<img>`
- `<input>`
- `<kbd>`
- `<label>`
- `<map>`
- `<object>`
- `<output>`
- `<q>`
- `<samp>`
- `<script>`
- `<select>`
- `<small>`
- `<span>`
- `<strong>`
- `<sub>`
- `<sup>`
- `<textarea>`
- `<time>`
- `<tt>`
- `<var>`

# `Tag Description`

| Tag            | Description                                                                                                                                                    |
| -------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `<!--...-->`   | Defines a comment                                                                                                                                              |
| `<!DOCTYPE>`   | Defines the document type                                                                                                                                      |
| `<a>    `      | Defines a hyperlink                                                                                                                                            |
| `<abbr>   `    | Defines an abbreviation or an acronym                                                                                                                          |
| `<acronym>`    | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use `<abbr>` instead. Defines an acronym                                              |
| `<address>`    | Defines contact information for the author/owner of a document                                                                                                 |
| `<applet>   `  | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use `<embed> or <object>` instead. Defines an embedded applet                         |
| `<area>`       | Defines an area inside an image map                                                                                                                            |
| `<article>`    | Defines an article                                                                                                                                             |
| `<aside>`      | Defines content aside from the page content                                                                                                                    |
| `<audio>`      | Defines embedded sound content                                                                                                                                 |
| `<b>`          | Defines bold text                                                                                                                                              |
| `<base>`       | Specifies the base URL/target for all relative URLs in a document                                                                                              |
| `<basefont>`   | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use CSS instead. Specifies a default color, size, and font for all text in a document |
| `<bdi>`        | Isolates a part of text that might be formatted in a different direction from other text outside it                                                            |
| `<bdo>`        | Overrides the current text direction                                                                                                                           |
| `<big>`        | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use CSS instead. Defines big text                                                     |
| `<blockquote>` | Defines a section that is quoted from another source                                                                                                           |
| `<body>`       | Defines the document's body                                                                                                                                    |
| `<br>`         | Defines a single line break                                                                                                                                    |
| `<button>`     | Defines a clickable button                                                                                                                                     |
| `<canvas>`     | Used to draw graphics, on the fly, via scripting (usually JavaScript)                                                                                          |
| `<caption>`    | Defines a table caption                                                                                                                                        |
| `<center>`     | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use CSS instead. Defines centered text                                                |
| `<cite>`       | Defines the title of a work                                                                                                                                    |
| `<code>`       | Defines a piece of computer code                                                                                                                               |
| `<col>`        | Specifies column properties for each column within a `<colgroup>` element                                                                                      |
| `<colgroup>`   | Specifies a group of one or more columns in a table for formatting                                                                                             |
| `<data>`       | Adds a machine-readable translation of a given content                                                                                                         |
| `<datalist>`   | Specifies a list of pre-defined options for input controls                                                                                                     |
| `<dd>`         | Defines a description/value of a term in a description list                                                                                                    |
| `<del>`        | Defines text that has been deleted from a document                                                                                                             |
| `<details>`    | Defines additional details that the user can view or hide                                                                                                      |
| `<dfn>`        | Specifies a term that is going to be defined within the content                                                                                                |
| `<dialog>`     | Defines a dialog box or window                                                                                                                                 |
| `<dir>`        | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use `<ul>` instead. Defines a directory list                                          |
| `<div>`        | Defines a section in a document                                                                                                                                |
| `<dl>`         | Defines a description list                                                                                                                                     |
| `<dt>`         | Defines a term/name in a description list                                                                                                                      |
| `<em>`         | Defines emphasized text                                                                                                                                        |
| `<embed>`      | Defines a container for an external application                                                                                                                |
| `<fieldset>`   | Groups related elements in a form                                                                                                                              |
| `<figcaption>` | Defines a caption for a `<figure> `element                                                                                                                     |
| `<figure>`     | Specifies self-contained content                                                                                                                               |
| `<font>`       | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use CSS instead. Defines font, color, and size for text                               |
| `<footer>`     | Defines a footer for a document or section                                                                                                                     |
| `<form>`       | Defines an HTML form for user input                                                                                                                            |
| `<frame>`      | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Defines a window (a frame) in a frameset                                              |
| `<frameset>`   | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Defines a set of frames                                                               |
| `<h1> to <h6>` | Defines HTML headings                                                                                                                                          |
| `<head>`       | Contains metadata/information for the document                                                                                                                 |
| `<header>`     | Defines a header for a document or section                                                                                                                     |
| `<hr>`         | Defines a thematic change in the content                                                                                                                       |
| `<html>`       | Defines the root of an HTML document                                                                                                                           |
| `<i>`          | Defines a part of text in an alternate voice or mood                                                                                                           |
| `<iframe>`     | Defines an inline frame                                                                                                                                        |
| `<img>`        | Defines an image                                                                                                                                               |
| `<input>`      | Defines an input control                                                                                                                                       |
| `<ins>`        | Defines a text that has been inserted into a document                                                                                                          |
| `<kbd>`        | Defines keyboard input                                                                                                                                         |
| `<label>`      | Defines a label for an `<input>` element                                                                                                                       |
| `<legend>`     | Defines a caption for a `<fieldset> `element                                                                                                                   |
| `<li>`         | Defines a list item                                                                                                                                            |
| `<link>`       | Defines the relationship between a document and an external resource (most used to link to style sheets)                                                       |
| `<main>`       | Specifies the main content of a document                                                                                                                       |
| `<map>`        | Defines an image map                                                                                                                                           |
| `<mark>`       | Defines marked/highlighted text                                                                                                                                |
| `<meta>`       | Defines metadata about an HTML document                                                                                                                        |
| `<meter>`      | Defines a scalar measurement within a known range (a gauge)                                                                                                    |
| `<nav>`        | Defines navigation links                                                                                                                                       |
| `<noframes>`   | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Defines an alternate content for users that do not support frames                     |
| `<noscript>`   | Defines an alternate content for users that do not support client-side scripts                                                                                 |
| `<object>`     | Defines a container for an external application                                                                                                                |
| `<ol>`         | Defines an ordered list                                                                                                                                        |
| `<optgroup>`   | Defines a group of related options in a drop-down list                                                                                                         |
| `<option>`     | Defines an option in a drop-down list                                                                                                                          |
| `<output>`     | Defines the result of a calculation                                                                                                                            |
| `<p>`          | Defines a paragraph                                                                                                                                            |
| `<param>`      | Defines a parameter for an object                                                                                                                              |
| `<picture>`    | Defines a container for multiple image resources                                                                                                               |
| `<pre>`        | Defines preformatted text                                                                                                                                      |
| `<progress>`   | Represents the progress of a task                                                                                                                              |
| `<q>`          | Defines a short quotation                                                                                                                                      |
| `<rp>`         | Defines what to show in browsers that do not support ruby annotations                                                                                          |
| `<rt>`         | Defines an explanation/pronunciation of characters (for East Asian typography)                                                                                 |
| `<ruby>`       | Defines a ruby annotation (for East Asian typography)                                                                                                          |
| `<s>`          | Defines text that is no longer correct                                                                                                                         |
| `<samp>`       | Defines sample output from a computer program                                                                                                                  |
| `<script>`     | Defines a client-side script                                                                                                                                   |
| `<section>`    | Defines a section in a document                                                                                                                                |
| `<select>`     | Defines a drop-down list                                                                                                                                       |
| `<small>`      | Defines smaller text                                                                                                                                           |
| `<source>`     | Defines multiple media resources for media elements (`<video> and <audio>`)                                                                                    |
| `<span>`       | Defines a section in a document                                                                                                                                |
| `<strike>`     | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use `<del>` or `<s>` instead. Defines strikethrough text                              |
| `<strong>`     | Defines important text                                                                                                                                         |
| `<style>`      | Defines style information for a document                                                                                                                       |
| `<sub>`        | Defines subscripted text                                                                                                                                       |
| `<summary>`    | Defines a visible heading for a `<details>` element                                                                                                            |
| `<sup>`        | Defines superscripted text                                                                                                                                     |
| `<svg>`        | Defines a container for SVG graphics                                                                                                                           |
| `<table>`      | Defines a table                                                                                                                                                |
| `<tbody>`      | Groups the body content in a table                                                                                                                             |
| `<td>`         | Defines a cell in a table                                                                                                                                      |
| `<template>`   | Defines a container for content that should be hidden when the page loads                                                                                      |
| `<textarea>`   | Defines a multiline input control (text area)                                                                                                                  |
| `<tfoot>`      | Groups the footer content in a table                                                                                                                           |
| `<th>`         | Defines a header cell in a table                                                                                                                               |
| `<thead>`      | Groups the header content in a table                                                                                                                           |
| `<time>`       | Defines a specific time (or datetime)                                                                                                                          |
| `<title>`      | Defines a title for the document                                                                                                                               |
| `<tr>`         | Defines a row in a table                                                                                                                                       |
| `<track>`      | Defines text tracks for media elements (`<video> and <audio>`)                                                                                                 |
| `<tt>`         | <p  style="color: red; display: inline-block">Not supported in HTML5</p> Use CSS instead. Defines teletype text                                                |
| `<u>`          | Defines some text that is unarticulated and styled differently from normal text                                                                                |
| `<ul>`         | Defines an unordered list                                                                                                                                      |
| `<var>`        | Defines a variable                                                                                                                                             |
| `<video>`      | Defines embedded video content                                                                                                                                 |
| `<wbr>`        | Defines a possible line-break                                                                                                                                  |

[TOP](#html-5)
