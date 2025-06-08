[Volver al Menú](/readme.md)

# `SEO`

## `Un solo h1 por página`

- `Encabezados (H1, H2, H3)`: Utiliza encabezados para estructurar tu contenido y resaltar los puntos clave.

---

## `Palabras claves`

- `Investigación de palabras clave`: Identifica las palabras clave relevantes para tu negocio y contenido.
- `Densidad de palabras clave`: Utiliza las palabras clave de forma natural y relevante en el texto. Evita el keyword stuffing.

---

## `Meta Title "Title Tag" y Meta Description`

- `Título y meta descripciones`: Crea títulos y meta descripciones atractivos y que incluyan las palabras clave objetivo.

---

## `Buena cantidad de contenido en texto`

- `Contenido de calidad`: Crea contenido original, relevante y valioso para tus usuarios.

---

## `alt a todas las imágenes`

- Utiliza imágenes con nombres descriptivos y añade etiquetas ALT.

---

## `Links externos e internos`

- `Backlink`: Es un enlace hecho de un sitio web a otro. Los motores de búsqueda como Google utilizan la calidad y la cantidad de backlinks como un criterio de clasificación
- `¿Qué es rel=”noreferrer”?`: Evita pasar la información de referencia al sitio web de destino eliminando la información de referencia del encabezado HTTP.
- `¿Qué es rel=”noopener”?`: Impide que la página de apertura obtenga cualquier tipo de acceso a la página original.
- `Noreferrer y  Noopener en WordPress`
  Si está en WordPress, debe saber que cuando agrega un enlace externo a su contenido y lo configura para que se abra en una 'nueva pestaña' (target = ”\_blank”), WordPress agregará automáticamente rel = ”noopener noreferrer” a el enlace.
- `¿Qué es rel=nofollow?`: Cuando agrega rel=”nofollow” a un enlace externo, básicamente le indica a los motores de búsqueda que no pasen ningún PageRank de una página a otra. En otras palabras, les dices que ignoren ese enlace con fines de SEO.

---

## `URLS Amigables`

- `Estructura de URL amigables`: Crea URLs cortas, claras y descriptivas.

---

## `Velocidad de carga`

- Optimiza tu sitio para que cargue rápidamente.

---

## `Schema Markup`

El Schema Markup es un código que se agrega a las páginas web para que los motores de búsqueda comprendan mejor su contenido. Esto ayuda a mejorar la visibilidad de la página en los resultados de búsqueda.

El sencillo código del Schema Markup tiene una actuación bastante efectiva cuando es adicionado en el código HTML de los sitios web. Automáticamente genera una descripción mejorada de lo que hay en la página. Esa función es lo que tiene impacto inmediato en la relación con los algoritmos y favorece el posicionamiento.

### `Donde debe ir`

Schema markup, especially JSON-LD, is typically placed within the `<head>` or `<body>` section of an HTML page, but it can be placed anywhere within the page source code. For JSON-LD, the code should be enclosed within a `<script> tag with the type="application/ld+json" attribute`.

Placing schema markup in the `<footer>` is generally not recommended. It's too late in the page's parsing process, and crawlers might not prioritize or fully process it, especially for critical information.

### `Buena Información`

[Info](https://rockcontent.com/es/blog/schema-markup/)

### `Generador`

[Schema Markup Generator (JSON-LD)](https://technicalseo.com/tools/schema-markup-generator/)

### `Validar Schemas`

[Validator](https://validator.schema.org/)

### `Verificar Schemas`

[Rich Results](https://search.google.com/test/rich-results)

---

## `Sitemap`

Un sitemap es un archivo con una lista de todas las páginas web accesibles a los rastreadores o usuarios. Puede parecerse a la tabla de contenidos de un libro, excepto que las secciones son los enlaces.

- `Mapa del sitio HTML`: Un mapa del sitio HTML es una página web que enumera los enlaces. Por lo general, estos son links a las secciones y páginas más importantes del sitio web.

- `Sitemap XML`: Un mapa del sitio XML es un archivo XML (por ejemplo, sitemap.xml) que se encuentra en la carpeta raíz del sitio web.

---

## `robots.txt`

Un archivo `robots.txt` es un documento de texto ubicado en el directorio raíz de un sitio web. La información que contiene está destinada específicamente a los rastreadores o crawlers de los motores de búsqueda. Este archivo les indica qué URL, incluidas páginas, archivos, carpetas, etc., deben ser rastreadas y cuáles no. Si bien, la presencia de este archivo no es obligatoria para que un sitio web funcione, debe configurarse correctamente para mantener un SEO adecuado.

---

## `Responsive`

- `Responsive design`: Asegúrate de que tu sitio se adapte a diferentes dispositivos.
- `Mobile-first`: Prioriza la experiencia móvil de tus usuarios.

---

## `Análisis`

Utiliza herramientas de análisis para medir el rendimiento de tu sitio y realizar ajustes.

---

## `Actualizaciones`

Mantén tu sitio web y contenido actualizados.

---

## `Herramientas`

- Google Search Console: Para ver cómo Google ve tu sitio web.
- Google Analytics: Para analizar el tráfico de tu sitio web.

---

## `¿Cuál es la diferencia entre SEO y SEM?`

- `SEO = Posicionamiento orgánico`: Search Engine Optimization
- `SEM = Posicionamiento pago`: Search Engine Marketing

---

## `Open Graph`

#### `Metadatos básicos`

Para convertir tus páginas web en objetos gráficos, necesitas añadir metadatos básicos. La versión inicial del protocolo se basa en RDFa, lo que significa que tendrás que añadir `<meta>` etiquetas adicionales en `<head>` tu página web. Las cuatro propiedades necesarias para cada página son:

- `og:title-` El título de su objeto tal como debe aparecer dentro del gráfico, por ejemplo, "La Roca".
- `og:type: `El tipo de objeto, p. ej., "video.movie". Según el tipo que especifique, podrían requerirse otras propiedades.
- `og:image`: Una URL de imagen que debe representar su objeto dentro del gráfico.
- `og:url`: La URL canónica de su objeto que se utilizará como su ID permanente en el gráfico, por ejemplo, "https://www.imdb.com/title/tt0117500/".

[Info](https://ogp-me.translate.goog/?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=tc)

[TOP](#seo)
