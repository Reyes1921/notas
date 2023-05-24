[Volver al Menú](../root.md)

# `Semantic HTML`

Semantic element clearly describes its meaning to both the browser and the developer. In HTML, semantic element are the type of elements that can be used to define different parts of a web page such as `<form>`, `<table>`, `<article>`, `<header>`, `<footer>`, etc.

# `<article>`

The `<article>` element specifies independent, self-contained content.

An article should make sense on its own, and it should be possible to distribute it independently from the rest of the web site.

Examples of where the `<article>` element can be used:

    - Forum posts
    - Blog posts
    - User comments
    - Product cards
    - Newspaper articles

# `<aside>`

The `<aside>` element defines some content aside from the content it is placed in (like a sidebar).

The `<aside>` content should be indirectly related to the surrounding content.

# `<details>`

Defines additional details that the user can view or hide

# `<summary>`

Defines a visible heading for a `<details>` element

# `<figcaption>`

The `<figcaption>` tag defines a caption for a `<figure>` element. The `<figcaption>` element can be placed as the first or as the last child of a `<figure>` element.

```
<figure>
  <img src="image.jpg" alt="Image description" />
  <figcaption>Image caption</figcaption>
</figure>
```

# `<figure>`

The `<figure>` tag specifies self-contained content, like illustrations, diagrams, photos, code listings, etc.

# `<footer>`

The `<footer>` element defines a footer for a document or section.

A `<footer>` element typically contains:

    - authorship information
    - copyright information
    - contact information
    - sitemap
    - back to top links
    - related documents

# `<header>`

The `<header>` element represents a container for introductory content or a set of navigational links.

A `<header>` element typically contains:

    - one or more heading elements (`<h1> - <h6>`)
    - logo or icon
    - authorship information

# `<main>`

Specifies the main content of a document

# `<mark>`

Defines marked/highlighted text

# `<nav>`

The `<nav>` element defines a set of navigation links.

Notice that NOT all links of a document should be inside a `<nav>` element. The `<nav>` element is intended only for major blocks of navigation links.

Browsers, such as screen readers for disabled users, can use this element to determine whether to omit the initial rendering of this content.

```
<nav>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About</a></li>
    <li><a href="#">Contact</a></li>
  </ul>
</nav>
```

# `<section>`

Defines a section in a document


# `<time>`

Defines a date/time

```
<p>The event will take place on <time datetime="2021-01-01">January 1st, 2021</time>.</p>
```

# `Semantic Elements in HTML`

<table class="ws-table-all notranslate">
<tbody><tr>
<th style="width:20%">Tag</th>
<th>Description</th>
</tr>
<tr>
<td>&lt;article&gt;</a></td>
<td>Defines independent, self-contained content</td>
</tr>
<tr>
<td>&lt;aside&gt;</a></td>
<td>Defines content aside from the page content</td>
</tr>
<tr>
<td>&lt;details&gt;</a></td>
<td>Defines additional details that the user can view or hide</td>
</tr>
<tr>
<td>&lt;figcaption&gt;</a></td>
<td>Defines a caption for a &lt;figure&gt; element</td>
</tr>
<tr>
<td>&lt;figure&gt;</a></td>
<td>Specifies self-contained content, like illustrations, diagrams, photos, code 
listings, etc.</td>
</tr>
<tr>
<td>&lt;footer&gt;</a></td>
<td>Defines a footer for a document or section</td>
</tr>
<tr>
<td>&lt;header&gt;</a></td>
<td>Specifies a header for a document or section</td>
</tr>
<tr>
<td>&lt;main&gt;</a></td>
<td>Specifies the main content of a document</td>
</tr>
<tr>
<td>&lt;mark&gt;</a></td>
<td>Defines marked/highlighted text</td>
</tr>
<tr>
<td>&lt;nav&gt;</a></td>
<td>Defines navigation links</td>
</tr>
<tr>
<td>&lt;section&gt;</a></td>
<td>Defines a section in a document</td>
</tr>
<tr>
<td>&lt;summary&gt;</a></td>
<td>Defines a visible heading for a &lt;details&gt; element</td>
</tr>
<tr>
<td>&lt;time&gt;</a></td>
<td>Defines a date/time</td>
</tr>
</tbody></table>