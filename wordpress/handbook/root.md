[Volver al Menú](../root.md)

# `Handbook`

# `WordPress - Estructura`

- Core Files
- WordPress DB
- Theme files
- Plugin files

# `Carpetas Principales en la raíz de WordPress`

- ## `wp-admin`

Esta es la carpeta que contiene los archivos y carpetas necesarios para el backend de WordPress, es por eso que cuando ingresas al backend usas la urls https://tudominio/wp-admin, es decir, esta haciendo referencia a esa carpeta.

Algunos de los archivos que componen la carpeta wp-admin son:

- /css
- /imágenes
- /incluye
- /js
- /about.php
- /admin-header.php
- /admin.php

- ## `wp-content`

Si bien es cierto que el contenido de texto de WordPress se almacena en la Base de Datos, hay contenido que son `archivos físicos`, por ejemplo: `imágenes`, `videos` u otros recursos de tu sitio web, terminarán almacenados en esta carpeta.

Además los `plugins` y `temas` que instales también se almacenan dentro de esta carpeta.

- ## `wp-includes`

Este directorio contiene los archivos y carpetas que dan la funcionalidad al core de WordPress, como por ejemplo proveer de una API que hace extensible la funcionalidad a través de Hooks.

<p style="color:red">Nunca deberías modificar los archivos de esta carpeta.</p>

---

# `Principales subcarpetas de WordPress`

Existen algunas subcarpetas con las que frecuentemente trabajarás o al menos necesitaras conocer en donde están ubicadas y para que sirven, estas carpetas son carpetas de contenido, es decir están dentro de la carpeta `wp-content`.

- ## `Plugins`

Aquí se almacenan los plugins que has instalado en tu WordPress, los plugins usualmente se organizan en carpetas, si eliminas la carpeta de un plugin es similar a desinstalar el plugin, esta es la última opción en caso no puedas desinstalarlo desde el backend de tu sitio.

- ## `Themes`

Esta carpeta contiene los temas de WordPress, tanto los que vienen por defecto como los que hayas instalado, en esta carpeta igualmente se encuentran los temas hijo que se crean en base a un tema existente.

- ## `Uploads`

En esta carpeta se almacenan todos los recursos que usará tu sitio web, tal como imágenes, videos, archivos pdf, etc.

Por defecto WordPress organiza los recursos en carpetas por año y subcapetas por el número de mes, sin embargo si vas a empezar recién a trabajar con tu sitio puedes cambiar esta configuración desde: Ajustes > Medios > Subir archivos.

Es posible además que algunos plugins coloquen sus archivos de recursos dentro de esta carpeta.

[MAS INFORMACIÓN](https://kinsta.com/es/base-de-conocimiento/archivos-wordpress/)

---

# `Archivos principales en la raíz de WordPress`

- ## `wp-config.php`

Este es uno de los principales archivos de tu sitio web, si te descargas WordPress verás que este archivo no viene incluido ya que se crea dinámicamente tras una instalación.

Dentro de este archivo verás la configuración de conexión con la base de datos, además puedes definir constantes que será útiles en la administración de tu sitio.

El archivo `wp-config.php` es esencial y muy útil para todos los usuarios de WordPress, ya que contiene todos los ajustes básicos de WordPress. Esto significa que el archivo `wp-config.php` te permite editar varias áreas de tu sitio de WordPress, desde la base de datos hasta hacer posible la actualización automática de tu versión de WordPress. Otra razón por la que `wp-config.php` es tan importante es porque ofrece opciones para activar una función de depuración de WordPress, lo que la hace vital para la resolución de problemas en el futuro.

- ## `wp-login.php`
  Anteriormente vimos que para conectarse al backend del sitio debemos usar la carpeta wp-admin.

Sin embargo es este archivo el que controla el acceso a la administración del sitio, podemos igualmente conectarnos al backend del sitio usando: `https://tudominio.com/wp-login.php`

- ## `.htaccess`

Este es un archivos que se crea cuando habilitas las urls amigables de tu WordPress, además es un archivo importante para realizar redirecciones u otras tareas de seguridad.

El punto delante del nombre del archivo en los sistemas Linux indica que este archivo esta oculto, por lo que es posible que tengas que configurar tu Administrador de Archivos de tu cuenta de hosting o tu cliente FTP para poder verlo.

---

# `Taxonomía`

Es una de esas palabras que la mayoría de la gente nunca escucha o usa. Básicamente, una taxonomía es una forma de agrupar cosas juntas.

## `Categoría`

La taxonomía '`category`' (tal es su nombre interno en WordPress y por eso la nombraremos así) te permite agrupar entradas ordenándolas en varias categorías. Estas categorías pueden luego ser vistas en el sitio usando URLs del tipo /category/nombre. Las categorías tienden a ser predefinidas y abarcar un amplio rango.

## `Etiqueta`

La taxonomía '`post_tag`' es similar a la de las categorías pero más abierta. Las etiquetas pueden ser creadas en el momento, simplemente tipeando su nombre. Pueden ser vistas en el sitio con URLs del tipo /tag/nombre. Las entradas tienden a tener muchas etiquetas, y generalmente se muestran cerca de las entradas o en forma de nubes de etiquetas.

## `Categorías de links`

La taxonomía 'link_category' te permite categorizar tus enlaces. Tienden a ser usados sólo internamente, razones organizacionales, y no son usualmente expuestos en el sitio. Son convenientes para definir grupos de enlaces a mostrar en las barras laterales o el pié de sitio.

## `Taxonomías Personalizadas`

Ya desde la WordPress 2.3, puedes crear tus propias taxonomías pero éstas han sido una característica de WordPress raramente usada hasta la versión 2.9. En verdad, son una forma extremadamente poderosa de agrupar varios items en diversas formas.

---

## `Terms`

This is an individual item or value within a taxonomy.

- If your taxonomy is "Categories," then "News," "Sports," and "Technology" are all terms.
- If your taxonomy is "Tags," then "WordPress," "PHP," and "Development" are all terms.
- If you create a custom taxonomy "Genres," then "Fantasy," "Mystery," and "Romance" would be terms within that "Genres" taxonomy.

---

# `Custom Post Type`

Cuando WordPress empezó, sólo existían los "posts". Nada más. No había páginas, sólo posts, porque WordPress sólo servía para hacer blogs.

Pero con el tiempo sus desarrolladores vieron clarísimo que necesitábamos ir más allá. Y crearon las "Páginas", que son una "especie de post", o por decirlo de otra forma, un "tipo de post". De ahí le viene lo de "Post Type". Seguramente hubiera tenido más sentido llamarle "Content Type", o sea, "Tipo de contenido", pero así quedó.

Así pues, ya teníamos Posts y Páginas (tipo de post). Pero la verdadera revolución llegó con WordPress 3.5, que trajo los "Custom Post Types". ¿Y de que se trata? Pues ni más ni menos que de la posibilidad de crear tus propios tipos de post. Con otras palabras, "Tipos de Posts Personalizados".

Un ejemplo de CPT serían los "Productos" de un eCommerce. Si usáis WooCommerce, veréis el menú de "Productos" en el panel de control. Eso es un CPT. Pero podríamos poner cualquier otro tipo de contenido: Servicios, personas, películas, contactos, animales...

## `Cómo crear un Custom Post Type`

- `A través de un plugin de creación de CPTs`

- `A través de código`

---

# `Paginas`

Las páginas pues, son como posts, con algunas diferencias. Por ejemplo, no tienen fecha, ni categorías ni etiquetas.

---

# `Metabox `

Un Metabox es una interfaz que permite agregar campos adicionales a la página de edición de entradas o páginas en WordPress. Estos campos adicionales pueden contener información personalizada, como datos, imágenes, enlaces o cualquier otro tipo de contenido que desees asociar con una entrada específica.

---

# `Term meta`

El term meta de WordPress es la información adicional que se puede agregar a un término. Se puede usar para guardar valores meta para términos de manera similar a la meta de las publicaciones.

Qué es un término en WordPress
Un término es una clasificación, un grupo o un subconjunto de una Taxonomía. Una Taxonomía puede ser una Categoría, una Etiqueta o una Taxonomía Personalizada.
Qué es el meta de WordPress

El meta de WordPress es una función que permite incluir información adicional sobre una publicación o página. Por ejemplo, el nombre del autor, categorías, etiquetas, fecha, etc.

# `Diferencias entre Meta Box y Term Meta`

- Objeto de los metadatos:
  - Meta Box: Metadatos para entradas, páginas y tipos de publicaciones personalizadas.
  - Term Meta: Metadatos para términos de taxonomía (categorías, etiquetas, etc.).
- Ubicación de uso:
  - Meta Box: Páginas de edición de entradas/páginas.
  - Term Meta: Páginas de edición de términos de taxonomía.
- Finalidad:

  - Meta Box: Agregar información adicional a las publicaciones individuales.
  - Term Meta: Agregar información adicional a las clasificaciones de contenido.

  ***

# `URI vs. Path 🌐`

The core difference is that a URI (Uniform Resource Identifier) is a URL (Uniform Resource Locator) and specifies the web address of a resource, while a path specifies the location of a file on the server's filesystem.

A URI is what a web browser uses to access a file over the internet. It includes the protocol (like http:// or https://), the domain name, and the location of the file within the website's directory structure. For example: https://example.com/wp-content/themes/mytheme/style.css.

A path is the physical location of the file on the web server's hard drive. It's used by the server itself to locate the file. For example: /var/www/html/wp-content/themes/mytheme/style.css.

[TOP](#carpetas-principales-en-la-raíz-de-wordpress)
