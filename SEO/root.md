[Volver al Menú](/readme.md)

# `SEO`

# `Un solo h1 por página`

- `Encabezados (H1, H2, H3)`: Utiliza encabezados para estructurar tu contenido y resaltar los puntos clave.

---

# `Palabras claves`

- `Investigación de palabras clave`: Identifica las palabras clave relevantes para tu negocio y contenido.
- `Densidad de palabras clave`: Utiliza las palabras clave de forma natural y relevante en el texto. Evita el keyword stuffing (a SEO practice where keywords are excessively and unnaturally inserted into content with the goal of manipulating search engine rankings.).

---

# `Meta Title "Title Tag" y Meta Description`

- `Título y meta descripciones`: Crea títulos y meta descripciones atractivos y que incluyan las palabras clave objetivo.

---

# `Buena cantidad de contenido en texto`

- `Contenido de calidad`: Crea contenido original, relevante y valioso para tus usuarios.

---

# `alt a todas las imágenes`

- Utiliza imágenes con nombres descriptivos y añade etiquetas ALT.

---

# `Links externos e internos`

- `Backlink`: Es un enlace hecho de un sitio web a otro. Los motores de búsqueda como Google utilizan la calidad y la cantidad de backlinks como un criterio de clasificación
- `¿Qué es rel=”noreferrer”?`: Evita pasar la información de referencia al sitio web de destino eliminando la información de referencia del encabezado HTTP.
- `¿Qué es rel=”noopener”?`: Impide que la página de apertura obtenga cualquier tipo de acceso a la página original.
- `Noreferrer y  Noopener en WordPress`
  Si está en WordPress, debe saber que cuando agrega un enlace externo a su contenido y lo configura para que se abra en una 'nueva pestaña' (target = ”\_blank”), WordPress agregará automáticamente rel = ”noopener noreferrer” a el enlace.
- `¿Qué es rel=nofollow?`: Cuando agrega rel=”nofollow” a un enlace externo, básicamente le indica a los motores de búsqueda que no pasen ningún PageRank de una página a otra. En otras palabras, les dices que ignoren ese enlace con fines de SEO.

---

# `URLS Amigables`

- `Estructura de URL amigables`: Crea URLs cortas, claras y descriptivas.

---

# `Velocidad de carga`

- Optimiza tu sitio para que cargue rápidamente.

---

# `Sitemap`

Un sitemap es un archivo con una lista de todas las páginas web accesibles a los rastreadores o usuarios. Puede parecerse a la tabla de contenidos de un libro, excepto que las secciones son los enlaces.

`Mapa del sitio HTML`: Un mapa del sitio HTML es una página web que enumera los enlaces. Por lo general, estos son links a las secciones y páginas más importantes del sitio web.

`Sitemap XML`: Un mapa del sitio XML es un archivo XML (por ejemplo, sitemap.xml) que se encuentra en la carpeta raíz del sitio web.

- [Mas Información](https://developers.google.com/search/docs/crawling-indexing/sitemaps/overview?hl=es)
- [Crear y enviar sitemaps](https://developers.google.com/search/docs/crawling-indexing/sitemaps/build-sitemap?hl=es)
- [Crear Sitemaps](https://www.xml-sitemaps.com/)

---

# `robots.txt`

Un archivo `robots.txt` indica a los rastreadores de los buscadores a qué URLs de tu sitio pueden acceder. Principalmente, se utiliza para evitar que las solicitudes que recibe tu sitio lo sobrecarguen; `no es un mecanismo para impedir que una página web aparezca en Google`. Si quieres que una página web no aparezca en Google, bloquea la indexación con noindex o protege la página con una contraseña.

## `¿Para qué sirve un archivo robots.txt?`

Los archivos robots.txt sirven principalmente para gestionar el tráfico de los rastreadores a tu sitio, aunque también suelen usarse para que Google no rastree determinados archivos, según el tipo de archivo:

## `El efecto de robots.txt en diferentes tipos de archivo`

- `Página web` :

Puedes usar un archivo robots.txt en páginas web (HTML, PDF y otros formatos no multimedia que Google pueda leer) para gestionar el tráfico de los rastreadores si crees que tu servidor se sobrecargará con solicitudes del rastreador de Google, o para evitar que se rastreen páginas sin importancia o similares de tu sitio.

<div style="color:red;">Advertencia: No utilices un archivo `robots.txt` para impedir que tus páginas web (incluidos PDFs y otros formatos de texto compatibles con Google) aparezcan en los resultados de la Búsqueda de Google.</div>

Es posible que acaben indexándose, aunque no se visiten, si hay otras páginas que dirigen a ella con texto descriptivo. Si quieres impedir que una página aparezca en los resultados de búsqueda, usa otro método. Por ejemplo, protégela con una contraseña o utiliza una directiva noindex.

Si tu página web está bloqueada por un archivo `robots.txt`, la URL puede seguir apareciendo en los resultados de búsqueda, pero sin ninguna descripción. Los archivos de imagen, de vídeo, PDFs y otros archivos que no sean HTML insertados en la página bloqueada tampoco se rastrearán, a menos que se haga referencia a ellos en otras páginas que sí se puedan rastrear. Si en la búsqueda se muestra este resultado con tu página y quieres corregirlo, quita del archivo `robots.txt` la entrada que está bloqueando la página. Si quieres ocultar la página completamente de la Búsqueda, utiliza otro método.

- `Archivo multimedia`:

Con un archivo `robots.txt`, puedes gestionar el tráfico de los rastreadores y evitar que aparezcan archivos de imagen, vídeo y audio en los resultados de la Búsqueda de Google. Aun así, no impedirá que otras páginas o usuarios incluyan enlaces a tu archivo de imagen, vídeo o audio.

- `Archivo de recursos`:

Con un archivo `robots.txt`, puedes bloquear archivos de recursos (como los de imagen, secuencias de comandos o estilo que no sean importantes) `si crees que prescindir de ellos no perjudicará considerablemente a las páginas`. No obstante, si crees que complicaría el análisis del rastreador de Google, no debes bloquearlos, ya que si lo haces, Google no podrá analizar correctamente páginas que dependan de estos recursos.

## `Cómo escribir y enviar un archivo robots.txt`

Los archivos robots.txt deben situarse en la raíz de los sitios. Por ejemplo, si tu sitio es `www.example.com`, este archivo debe estar en `www.example.com/robots.txt`. El archivo robots.txt es un archivo de texto sin formato que debe cumplir el estándar de exclusión de robots. Los archivos robots.txt constan de una o varias reglas. Cada regla bloquea o permite el acceso de todos o de un rastreador determinado a una ruta de archivo concreta del dominio o subdominio en el que se aloja el archivo robots.txt. A menos que especifiques lo contrario en el archivo robots.txt, de forma implícita das permiso para rastrear todos los archivos.

A continuación, se muestra un archivo robots.txt sencillo con dos reglas:

```JSON
User-agent: Googlebot
Disallow: /nogooglebot/

User-agent: *
Allow: /

Sitemap: https://www.example.com/sitemap.xml
```

Esto es lo que hace el archivo robots.txt:

- El user-agent Googlebot no puede rastrear ninguna URL que comience por https://example.com/nogooglebot/.
- El resto de los user-agents pueden rastrear todo el sitio. Se podría haber omitido esta regla y el resultado habría sido el mismo, ya que los user-agents pueden rastrear todo el sitio de forma predeterminada.
- El archivo de sitemap del sitio está en https://www.example.com/sitemap.xml.

[Mas Información](https://developers.google.com/search/docs/crawling-indexing/robots/create-robots-txt?hl=es)

---

# `No Index`

`noindex` es una regla que se configura con una etiqueta `<meta>` o con un encabezado de respuesta HTTP, y que sirve para impedir que los buscadores que admiten la regla `noindex`, como Google, indexen contenido. Así, cuando el robot de Google rastrea una página y extrae la etiqueta o el encabezado, Google la retira de los resultados de la Búsqueda aunque otros sitios tengan enlaces a ella.

<div style="color:red;">Importante: Para que la regla noindex surta efecto, la página o el recurso en cuestión no debe haberse bloqueado mediante un archivo robots.txt ni ningún otro mecanismo que impida al rastreador acceder a ellos. Si el rastreador no puede acceder, no verá la regla noindex, por lo que la página podrá seguir apareciendo en los resultados de búsqueda, por ejemplo si otras páginas tienen enlaces a ella.</div>

La directiva noindex es útil si no tienes acceso raíz a tu servidor, ya que te permite controlar el acceso a tu sitio a nivel de página.

## `Implementar noindex`

Puedes implementar noindex de dos formas: como etiqueta `<meta>` o como encabezado de respuesta HTTP. Ambos métodos tienen el mismo efecto, así que elige el que mejor se adapte a tu sitio y a tu tipo de contenido. Google no admite que se especifique la regla noindex en el archivo robots.txt.

También puedes combinar la regla noindex con otras reglas que controlan la indexación. Por ejemplo, puedes unir una indicación nofollow con una regla noindex: `<meta name="robots" content="noindex, nofollow" />`.

## `Etiqueta <meta>`

Para impedir que todos los buscadores que admiten la regla noindex indexen una página de tu sitio, coloca la etiqueta <`meta>` siguiente en la sección `<head>` de tu página:

```
<meta name="robots" content="noindex">
```

Si solo quieres impedir que lo hagan los rastreadores web de Google, incluye esta otra etiqueta meta:

```
<meta name="googlebot" content="noindex">
```

Es posible que algunos buscadores interpreten la regla noindex de otra forma, por lo que puede que tu página siga apareciendo en sus resultados.

## `Encabezado de respuesta HTTP`

En lugar de una etiqueta `<meta>`, puedes devolver un encabezado HTTP X-Robots-Tag con el valor noindex o none en tu respuesta. Un encabezado de respuesta puede usarse en recursos que no sean HTML (como archivos PDF, de vídeo y de imagen). A continuación, se muestra un ejemplo de una respuesta HTTP con un encabezado X-Robots-Tag que indica a los buscadores que no indexen una página:

```JSON
HTTP/1.1 200 OK
(...)
X-Robots-Tag: noindex
(...)
```

## `Depurar problemas de noindex`

Para ver las etiquetas `<meta> `y los encabezados HTTP de tu página, primero tenemos que rastrearla. Por tanto, si una página sigue apareciendo en los resultados, probablemente sea porque no la hemos rastreado desde que añadiste la regla `noindex`. En función de la importancia de la página en Internet, el robot de Google puede tardar meses en volver a visitarla. Puedes solicitar que Google vuelva a rastrear una página con la [herramienta de inspección de URLs](https://support.google.com/webmasters/answer/9012289?hl=es).

Si necesitas retirar rápidamente una página de tu sitio de los resultados de búsqueda de Google, consulta nuestra documentación sobre retiradas.

También puede ser que el archivo robots.txt esté bloqueando el acceso de los rastreadores web de Google a esa URL y que por eso no puedan ver la etiqueta. Para desbloquear tu página y que Google pueda acceder a ella, modifica el archivo robots.txt.

Por último, asegúrate de que el robot de Google pueda ver la regla `noindex`. Para comprobar si tu implementación de `noindex` es correcta, usa la herramienta de inspección de URLs para ver el código HTML que ha recibido el robot de Google al rastrear la página. También puedes usar el informe "Indexación de páginas" de Search Console para monitorizar las páginas de tu sitio de las que el robot de Google ha extraído una regla `noindex`.

---

# `Canonicalización`

La canonicalización es el proceso de seleccionar la URL representativa de determinado contenido (canónica). Por lo tanto, una URL canónica es la URL de una página que Google ha elegido como la más representativa de un conjunto de páginas duplicadas. Este proceso, a menudo llamado "anulación de duplicados", ayuda a Google a mostrar solo una versión del contenido duplicado en los resultados de búsqueda.

Existen varios motivos por los que un sitio puede tener contenido duplicado:

- Variantes regionales: por ejemplo, contenido para EE. UU. y el Reino Unido al que se puede acceder desde varias URLs, pero que básicamente es el mismo contenido en el mismo idioma.
- Variantes de dispositivo: por ejemplo, una página con una versión para móviles y otra para ordenadores.
- Variantes de protocolos: por ejemplo, las versiones HTTP y HTTPS de un sitio.
- Funciones del sitio: por ejemplo, los resultados de ordenar y filtrar las funciones de una página de categoría.
- Variantes accidentales: por ejemplo, cuando los rastreadores pueden acceder por error a la versión demo de un sitio.

Es normal que en un sitio haya contenido duplicado, lo cual no infringe las políticas de spam de Google. Sin embargo, dejar que se pueda acceder a un mismo contenido a través de varias URLs, puede empeorar la experiencia de usuario (por ejemplo, puede que los usuarios se pregunten cuál es la página adecuada y si hay diferencias entre ellas) y hacer que sea más difícil controlar el rendimiento de tu contenido en los resultados de búsqueda.

---

# `Open Graph`

### `Metadatos básicos`

Para convertir tus páginas web en objetos gráficos, necesitas añadir metadatos básicos. La versión inicial del protocolo se basa en RDFa, lo que significa que tendrás que añadir `<meta>` etiquetas adicionales en `<head>` tu página web. Las cuatro propiedades necesarias para cada página son:

- `og:title-` El título de su objeto tal como debe aparecer dentro del gráfico, por ejemplo, "La Roca".
- `og:type: `El tipo de objeto, p. ej., "video.movie". Según el tipo que especifique, podrían requerirse otras propiedades.
- `og:image`: Una URL de imagen que debe representar su objeto dentro del gráfico.
- `og:url`: La URL canónica de su objeto que se utilizará como su ID permanente en el gráfico, por ejemplo, "https://www.imdb.com/title/tt0117500/".

[Info](https://ogp-me.translate.goog/?_x_tr_sl=en&_x_tr_tl=es&_x_tr_hl=es&_x_tr_pto=tc)

---

# `Introducción al marcado de datos estructurados en la Búsqueda de Google (Schema Markup)`

La Búsqueda de Google hace todo lo posible por entender el contenido de las páginas. Puedes ayudar en este proceso incluyendo pistas explícitas sobre el significado de tus páginas mediante datos estructurados, que son un formato estandarizado con el que proporcionar información sobre páginas y clasificar su contenido. Por ejemplo, en una página de recetas, podrías marcar con datos estructurados los ingredientes, el tiempo y la temperatura de cocción, o las calorías, entre otros detalles.

## `Formatos admitidos`

A menos que se indique lo contrario, la Búsqueda de Google admite datos estructurados en los siguientes formatos: En general, te recomendamos que uses el formato que te resulte más sencillo de implementar y mantener (en la mayoría de los casos, es JSON-LD). Para Google, los 3 formatos son igual de válidos, siempre que las etiquetas sean válidas y se implementen correctamente según la documentación de la función.

<table class="responsive" id="format-placement">
  <tbody><tr>
    <th colspan="2">Formatos</th>
  </tr>
  <tr>
    <td><a class="external-link" href="https://json-ld.org/">JSON-LD</a>* <b>(opción recomendada)</b></td>
    <td>Notación de JavaScript insertada en una etiqueta <code dir="ltr" translate="no">&lt;script&gt;</code> situada en los elementos <code dir="ltr" translate="no">&lt;head&gt;</code> y <code dir="ltr" translate="no">&lt;body&gt;</code> de una página HTML. Las etiquetas no se intercalan con el texto que pueden ver los usuarios, por lo que es más fácil expresar elementos de datos anidados, como <code dir="ltr" translate="no">Country</code> de <code dir="ltr" translate="no">Postal<wbr>Address</code> de <code dir="ltr" translate="no">Music<wbr>Venue</code> de <code dir="ltr" translate="no">Event</code>.
      Además, Google puede leer los datos de JSON-LD que se <a href="https://developers.google.com/search/docs/guides/generate-structured-data-with-javascript?hl=es">insertan dinámicamente en el contenido de las páginas</a>, por ejemplo, mediante código JavaScript o widgets insertados de un sistema de gestión de contenido.</td>
  </tr>
  <tr>
    <td><a class="external-link" href="https://html.spec.whatwg.org/multipage/microdata.html#microdata">Microdatos</a></td>
    <td>Especificación HTML de comunidad abierta con la que se pueden anidar datos estructurados dentro de contenido HTML. Al igual que en el formato RDFa, las propiedades que se quieren exponer como datos estructurados deben marcarse con atributos de etiquetas HTML. Suele usarse en el elemento <code dir="ltr" translate="no">&lt;body&gt;</code>, pero se puede usar también en <code dir="ltr" translate="no">&lt;head&gt;</code>.</td>
  </tr>
  <tr>
    <td><a class="external-link" href="https://rdfa.info/">RDFa</a></td>
    <td>Extensión HTML5 que admite datos vinculados mediante <a class="external-link" href="https://www.w3.org/TR/rdfa-lite/#the-attributes">atributos de etiquetas HTML</a> que corresponden al contenido que los usuarios pueden ver y que quieres describir para los motores de búsqueda. Por lo general, este formato se usa tanto en la sección <code dir="ltr" translate="no">&lt;head&gt;</code> como en <code dir="ltr" translate="no">&lt;body&gt;</code> de las páginas HTML.</td>
  </tr>
</tbody></table>

## `JSON for Linking Data - JSON-LD`

```JSON
{
  "@context": "https://json-ld.org/contexts/person.jsonld",
  "@id": "http://dbpedia.org/resource/John_Lennon",
  "name": "John Lennon",
  "born": "1940-10-09",
  "spouse": "http://dbpedia.org/resource/Cynthia_Lennon"
}
```

```JSON
  <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "NewsArticle",
      "headline": "Title of a News Article",
      "image": [
        "https://example.com/photos/1x1/photo.jpg",
        "https://example.com/photos/4x3/photo.jpg",
        "https://example.com/photos/16x9/photo.jpg"
       ],
      "datePublished": "2024-01-05T08:00:00+08:00",
      "dateModified": "2024-02-05T09:20:00+08:00",
      "author": [{
          "@type": "Person",
          "name": "Jane Doe",
          "url": "https://example.com/profile/janedoe123"
        },{
          "@type": "Person",
          "name": "John Doe",
          "url": "https://example.com/profile/johndoe123"
      }]
    }
    </script>
```

## `Microdata`

At a high level, microdata consists of a group of name-value pairs. The groups are called items, and each name-value pair is a property. Items and properties are represented by regular elements.

To create an item, the `itemscope` attribute is used.

To add a property to an item, the itemprop attribute is used on one of the item's descendants.

```JSON
<div itemscope>
 <p>My name is <span itemprop="name">Elizabeth</span>.</p>
</div>

<div itemscope>
 <p>My name is <span itemprop="name">Daniel</span>.</p>
</div>
```

```JSON
<div itemscope itemtype="https://schema.org/NewsArticle">
      <div itemprop="headline">Title of News Article</div>
      <meta itemprop="image" content="https://example.com/photos/1x1/photo.jpg" />
      <meta itemprop="image" content="https://example.com/photos/4x3/photo.jpg" />
      <img itemprop="image" src="https://example.com/photos/16x9/photo.jpg" />
      <div>
        <span itemprop="datePublished" content="2024-01-05T08:00:00+08:00">
          January 5, 2024 at 8:00am
        </span>
        (last modified
        <span itemprop="dateModified" content="2024-02-05T09:20:00+08:00">
          February 5, 2024 at 9:20am
        </span>
        )
      </div>
      <div>
        by
        <span itemprop="author" itemscope itemtype="https://schema.org/Person">
          <a itemprop="url" href="https://example.com/profile/janedoe123">
            <span itemprop="name">Jane Doe</span>
          </a>
        </span>
        and
        <span itemprop="author" itemscope itemtype="https://schema.org/Person">
          <a itemprop="url" href="https://example.com/profile/johndoe123">
            <span itemprop="name">John Doe</span>
          </a>
        </span>
      </div>
    </div>
```

[Mas Información](https://html.spec.whatwg.org/multipage/microdata.html#encoding-microdata)

### `Generador`

[Schema Markup Generator (JSON-LD)](https://technicalseo.com/tools/schema-markup-generator/)

### `Validar Schemas`

[Validator](https://validator.schema.org/)

### `Verificar Schemas`

[Rich Results](https://search.google.com/test/rich-results)

---

# `Responsive`

- `Responsive design`: Asegúrate de que tu sitio se adapte a diferentes dispositivos.
- `Mobile-first`: Prioriza la experiencia móvil de tus usuarios.

---

# `Análisis`

Utiliza herramientas de análisis para medir el rendimiento de tu sitio y realizar ajustes.

---

# `Actualizaciones`

Mantén tu sitio web y contenido actualizados.

---

# `Herramientas`

- Google Search Console: Para ver cómo Google ve tu sitio web.
- Google Analytics: Para analizar el tráfico de tu sitio web.

---

# `¿Cuál es la diferencia entre SEO y SEM?`

- `SEO = Posicionamiento orgánico`: Search Engine Optimization
- `SEM = Posicionamiento pago`: Search Engine Marketing

[TOP](#seo)
