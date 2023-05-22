[Volver al Menú](../root.md)

# `HTML Best Practices`

Learn to follow the best practices for writing maintainable and scalable HTML documents.

# `General`

## `Start with DOCTYPE`

DOCTYPE is required for activating no-quirks mode.

```
<!DOCTYPE html>
<html>
  ...
</html>
```

<p style="color:red">Don’t use legacy or obsolete DOCTYPE</p>
<p style="color:red">Don’t use XML Declaration</p>

## `Don’t use character references as much as possible`

If you write an HTML document with UTF-8, almost all characters (including Emoji) can be written directly.

<p style="color: red">Bad:</p>


```
<p><small>Copyright &copy; 2014 W3C<sup>&reg;</sup></small></p>
```
<p style="color: green" > Good </p>


```
<p><small>Copyright © 2014 W3C<sup>®</sup></small></p>
```

## `Escape &, <, >, ", and ' with named character references`

These characters should escape always for a bug-free HTML document.

<p style="color: red">Bad:</p>

```
<h1>The "&" character</h1>
```
<p style="color: green" > Good </p>

```
<h1>The &quot;&amp;&quot; character</h1>
```

## `Use numeric character references for control or invisible characters`

These characters are easily mistaken for another character. And also spec does not guarantee to define a human readable name for these characters.

<p style="color: red">Bad:</p>

```
<p>This book can read in 1 hour.</p>
```
<p style="color: green" > Good </p>

```
<p>This book can read in 1&##xA0;hour.</p>
```

## `Put white spaces around comment contents`

Some characters cannot be used immediately after comment open or before comment close.

`<!-- This section is non-normative -->`

## `Don’t omit closing tag`

## `Don’t put white spaces around tags and attribute values`

<p style="color: red">Bad:</p>

```
<h1 class=" title " >HTML Best Practices</h1>
```
<p style="color: green" > Good </p>

```
<h1 class="title">HTML Best Practices</h1>
```

## `Don’t mix character cases`

<p style="color: red">Bad:</p>

```
<a HREF="##general">General</A>
```

## `Don’t mix quotation marks`

## `Don’t separate attributes with two or more white spaces`

## `Omit boolean attribute value`

<p style="color: red">Bad:</p>

```
<audio autoplay="autoplay" src="/audio/theme.mp3">
```
<p style="color: green" > Good </p>

```
<audio autoplay src="/audio/theme.mp3">
```

## `Omit namespaces`
SVG and MathML can be used directly in an HTML document.

<p style="color: red">Bad:</p>

```
<svg xmlns="http://www.w3.org/2000/svg">
  ...
</svg>
```
<p style="color: green" > Good </p>

```
<svg>
  ...
</svg>
```

## `Don’t use XML attributes`

## `Don’t mix data-*, Microdata, and RDFa Lite attributes with common attributes`
A tag string can be very complicated. This simple rule helps reading such tag string.

<p style="color: red">Bad:</p>

```
<img alt="HTML Best Practices" data-height="31" data-width="88" itemprop="image" src="/img/logo.png">
```
<p style="color: green" > Good </p>

```
<img alt="HTML Best Practices" src="/img/logo.png" data-width="88" data-height="31" itemprop="image">
```

## `Prefer default implicit ARIA semantics`

<p style="color: red">Bad:</p>

```
<nav role="navigation">
  ...
</nav>

<hr role="separator">
```
<p style="color: green" > Good </p>

```
<nav>
  ...
</nav>

<hr>
```

# `The root element`

## `Add lang attribute`

<p style="color: green" > Good </p>

```
<html lang="en-US">
```

# `Document metadata`

## `Add title element`

## `Don’t use base element`

An absolute path or URL is safer for both developers and users.
<p style="color: red">Bad:</p>

```
<head>
  ...
  <base href="/blog/">
  <link href="hello-world" rel="canonical">
  ...
</head>
```
<p style="color: green" > Good </p>

```
<head>
  ...
  <link href="/blog/hello-world" rel="canonical">
  ...
</head>
```

## `Specify MIME type of minor linked resources`

This is a hint how application handles this resource.

<p style="color: red">Bad:</p>

```
<link href="/pdf" rel="alternate">
<link href="/feed" rel="alternate">
<link href="/css/screen.css" rel="stylesheet">
```
<p style="color: green" > Good </p>

```
<link href="/pdf" rel="alternate" type="application/pdf">
<link href="/feed" rel="alternate" type="application/rss+xml">
<link href="/css/screen.css" rel="stylesheet">
```

## `Don’t link to favicon.ico`
Almost all browsers fetch /favicon.ico automatically and asynchronously.

<p style="color: red">Bad:</p>

```
<link href="/favicon.ico" rel="icon" type="image/vnd.microsoft.icon">
```
<p style="color: green" > Good </p>

```
<!-- Place `favicon.ico` in the root directory. -->
```

## `Add apple-touch-icon link`

## `Add title attribute to alternate stylesheets`

## `Specify document character encoding`

UTF-8 is not default in all browsers yet.

<p style="color: red">Bad:</p>

```
<head>
  <title>HTML Best Practices</title>
</head>
```
<p style="color: green" > Good </p>

```
<head>
  <meta charset="UTF-8">
  <title>HTML Best Practices</title>
</head>
```

## `Don’t use legacy character encoding format`

<p style="color: green" > Good </p>

```
<meta charset="UTF-8">
```

## `Specify character encoding at first`

Spec requires the character encoding is specified within the first 1024 bytes of the document.

<p style="color: green" > Good </p>

```
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width" name="viewport">
  ...
</head>
```

## `Use UTF-8`

With UTF-8, you are free to use Emoji.

<p style="color: green" > Good </p>

```
<meta charset="UTF-8">
```

## `Omit type attribute for CSS`

<p style="color: green" > Good </p>

```
<style>
  ...
</style>
```

## `Don’t comment out contents of style element`

This ritual is for the old browser.

<p style="color: red">Bad:</p>

```
<style>
<!--
  ...
  -->
</style>
```
<p style="color: green" > Good </p>

```
<style>
  ...
</style>
```

## `Don’t mix tag for CSS and JavaScript`

Sometimes script element blocks DOM construction.

<p style="color: red">Bad:</p>

```
<script src="/js/jquery.min.js"></script>
<link href="/css/screen.css" rel="stylesheet">
<script src="/js/main.js"></script>
```
<p style="color: green" > Good </p>

```
<link href="/css/screen.css" rel="stylesheet">
<script src="/js/jquery.min.js"></script>
<script src="/js/main.js"></script>
```
Also <p style="color: green" > good </p>

```
<script src="/js/jquery.min.js"></script>
<script src="/js/main.js"></script>
<link href="/css/screen.css" rel="stylesheet">
```

# `Sections`

## `Add body element`

## `Forget about hgroup element`

This element is not used very much.

## `Use address element only for contact information`

`address` element is for email address, social network account, street address, telephone number, or something you can get in touch with.

# `Grouping content`

## `Use appropriate element in blockquote element`

<p style="color: green" > Good </p>

```
<blockquote>
  <p>For writing maintainable and scalable HTML documents.</p>
</blockquote>
```

## `Don’t include attribution directly in blockquote element`

blockquote element’s content is a quote.

## `Write one list item per line`

Looooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooong line is hard toooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo read.

<p style="color: red">Bad:</p>

```
<ul>
  <li>General</li><li>The root Element</li><li>Sections</li>...
</ul>
```
<p style="color: green" > Good </p>

```
<ul>
  <li>General</li>
  <li>The root Element</li>
  <li>Sections</li>
  ...
</ul>
```

## `Place figcaption element as first or last child of figure element`

Spec disallows `figcaption` element in the middle of figure element.

## `Use main element`

`main` element can be used wrapping contents.

## `Avoid div element as much as possible`

`div` element is an element of last resort.

## `Don’t split same link that can be grouped`

`a` element can wrap almost all elements (except interactive elements like form controls and a element itself).

<p style="color: green" > Good </p>

```
<a href="https://whatwg.org/">
  <h1>WHATWG</h1>

  <p>A community maintaining and evolving HTML since 2004.</p>
</a>
```

## `Use download attribute for downloading a resource`

It will force browsers to download linked resource to the storage.

<p style="color: red">Bad:</p>

```
<a href="/downloads/offline.zip">offline version</a>
```
<p style="color: green" > Good </p>

```
<a download href="/downloads/offline.zip">offline version</a>
```

## `Use rel, hreflang, and type attribute if needed`

These hints help applications to handle linked resources.

<p style="color: red">Bad:</p>

```
<a href="/ja/pdf">Japanese PDF version</a>
```
<p style="color: green" > Good </p>

```
<a href="/ja/pdf" hreflang="ja" rel="alternate" type="application/pdf">Japanese PDF version</a>
```

## `Don’t use em element for warning or caution`

These are seriousness. So, strong element is more appropriate.

## `Avoid s, i, b, and u element as much as possible`

These elements’ semantics is too difficult to humans.

## `Add title attribute to abbr element`

## `Add datetime attribute to non-machine-readable time element`

When datetime attribute does not present, the format of time element’s content is restricted.

<p style="color: red">Bad:</p>

```
<time>Dec 19, 2014</time>
```
<p style="color: green" > Good </p>

```
<time datetime="2014-12-19">Dec 19, 2014</time>
```

## `Keep kbd element as simple as possible`

Nesting `kbd` element is too difficult to humans.

## `Avoid span element as much as possible`

`span` element is an element of last resort.

## `Break after br element`

Line break should be needed where br element is used.

<p style="color: green" > Good </p>

```
<p>HTML<br>
Best<br>
Practices</p>
```

## `Don’t use br element only for presentational purpose`

`br` element is not for line breaking, it is for line breaks in the contents.

# `Embedded content`

## `Add alt attrbute to img element if needed`

## `Empty alt attribute if possible`

If the image is supplemental, there is equivalent content somewhere in the near.

## `Omit alt attribute if possible`

Sometimes you don’t know what text is suitable for alt attribute.

## `Empty iframe element`

There is some restriction in its content. Being empty is always safe.

## `Markup map element content`

This content presents to a screen reader.

<p style="color: red">Bad:</p>

```
<map name="toc">
  <a href="#general">General</a>
  <area alt="General" coords="0, 0, 40, 40" href="#General"> |
  <a href="#the_root_element">The root element</a>
  <area alt="The root element" coords="50, 0, 90, 40" href="#the_root_element"> |
  <a href="#sections">Sections</a>
  <area alt="Sections" coords="100, 0, 140, 40" href="#sections">
</map>
```
<p style="color: green" > Good </p>

```
<map name="toc">
  <p>
    <a href="#general">General</a>
    <area alt="General" coords="0, 0, 40, 40" href="#General"> |
    <a href="#the_root_element">The root element</a>
    <area alt="The root element" coords="50, 0, 90, 40" href="#the_root_element"> |
    <a href="#sections">Sections</a>
    <area alt="Sections" coords="100, 0, 140, 40" href="#sections">
  </p>
</map>
```

## `Provide fallback img element for picture element`

The support of picture element is not good yet.

<p style="color: green" > Good </p>

```
<picture>
  <source srcset="/img/logo.webp" type="image/webp">
  <source srcset="/img/logo.hdp" type="image/vnd.ms-photo">
  <source srcset="/img/logo.jp2" type="image/jp2">
  <img src="/img/logo.jpg">
</picture>
```

## `Provide fallback content for audio or video element`

Fallback content is needed for newly introduced elements in HTML.

<p style="color: green" > Good </p>

```
<video>
  <source src="/mov/theme.mp4" type="video/mp4">
  <source src="/mov/theme.ogv" type="video/ogg">
  ...
  <iframe src="//www.youtube.com/embed/..." allowfullscreen></iframe>
</video>
```

# `Tabular data`

## `Write one cell per line`

Long lines are hard to scan.

<p style="color: green" > Good </p>

```
<tr>
  <td>General</td>
  <td>The root Element</td>
  <td>Sections</td>
</tr>
```

## `Use th element for header cell`

# `Forms`

## `Omit for attribute if possible`

`label` element can contain some form elements.

<p style="color: green" > Good </p>

```
<label>Query: <input name="q" type="text"></label>
```

## `Use appropriate type attribute for input element`

## `Add value attribute to input type="submit"`
The default label for submit button is not standarized across the browser and languages.

## `Don’t use placeholder attribute for labeling`

## `Write one option element per line`

Long lines are hard to scan.

<p style="color: green" > Good </p>

```
<datalist id="toc">
  <option label="General">
  <option label="The root element">
  <option label="Sections">
</datalist>
```

## `Add max attribute to progress element`

With max attribute, the value attribute can be written in an easy format.

```
<progress max="100" value="50"> 50%</progress>
```

## `Add min and max attribute to meter element`

With min and max attribute, the value attribute can be written in an easy format.

# `Place legend element as the first child of fieldset element`

<p style="color: green" > Good </p>

```
<fieldset>
  <legend>About "General"</legend>
  <p><label>Is this section useful?: <input name="usefulness-general" type="checkbox"></label></p>
  ...
</fieldset>
```

# `Scripting`

## `Omit type attribute for JavaScript`

## `Don’t comment out contents of script element`

## `Don’t use script-injected script element`

async attribute is the best for both simplicity and performance.

<p style="color: red">Bad:</p>

```
<script>
  var script = document.createElement("script");
  script.async = true;
  script.src = "//example.com/widget.js";
  document.getElementsByTagName("head")[0].appendChild(script);
</script>
```
<p style="color: green" > Good </p>

```
<script async defer src="https://example.com/widget.js"></script>
```

# `Other`

## `Indent consistently`

Indentation is important for readability.

<p style="color: green" > Good </p>

```
<html>
  <head>
    ...
  </head>
  <body>
    ...
  </body>
</html>
```

## `Use absolute path for internal links`

An absolute path works better on your localhost without internet connection. 

<p style="color: green" > Good </p>

```
<link rel="apple-touch-icon" href="/apple-touch-icon-precomposed.png">
...
<p>You can find more at <a href="/contact.html">contact page</a>.</p>
```

## `Don’t use protocol-relative URL for external resources`

With protocol, you can load external resources reliably and safely.

<p style="color: red">Bad:</p>

```
<script src="//example.com/js/library.js">
```
<p style="color: green" > Good </p>

```
<script src="https://example.com/js/library.js">
```

[TOP](#general)