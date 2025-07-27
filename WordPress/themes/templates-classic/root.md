[Volver al Menú](../root.md)

# `Template - Classic Theme`

In classic themes, `Template Tags` are built-in WordPress functions you can use inside a template file to retrieve and display data (such as `the_title()` and `the_content()`).

# `Template files`

In classic themes these are PHP files that contain a mixture of `HTML`, `Template Tags`, and `PHP` code.

# `Template partials`

A template part is a piece of a template that is included as a part of another template, such as a site header.

- `header.php` or `header.html` for generating the site’s header
- `footer.php` or `footer.html` for generating the footer
- `sidebar.php` or `sidebar.html` for generating the sidebar

# `Common WordPress template files`

- `index.php`

The main template file. It is `required` in all themes.

- `style.css`

The main stylesheet. It is `required` in all themes and contains the information header for your theme.

- `rtl.css`

The `right-to-left` stylesheet is included automatically if the website language’s text direction is `right-to-left`.

- `front-page.php`

The front page template is always used as the site front page if it exists, regardless of what settings on `Admin > Settings > Reading`.

- `home.php`

The home page template is the `front page by default`. If you do not set WordPress to use a static front page, `this template is used to show latest posts`.

- `singular.php`

The singular template is used for posts when `single.php` is not found, or for pages when `page.php` are not found. If` singular.php` is not found,` index.php` is used.

- `single.php`

The single post template is used when a visitor requests a `single post`.

- `single-{post-type}.php`

The single post template used when a visitor requests a `single post from a custom post type`. For example, `single-book.php` would be used for displaying single posts from a custom post type named book.

- `archive-{post-type}.php`

The archive post type template is used when visitors request a `custom post type archive`. For example, `archive-books.php` would be used for displaying an archive of posts from the custom post type named books. The archive template file is used if the `archive-{post-type}` template is not present.

- `page.php`

The page template is used when visitors request `individual pages`, which are a built-in template.

- `page-{slug}.php`

The page slug template is used when visitors request a `specific` page, for example one with the “about” slug `(page-about.php)`.

- `category.php`

The category template is used when visitors request `posts by category`.

- `tag.php`

The tag template is used when visitors request `posts by tag`.

- `taxonomy.php`

The taxonomy term template is used when a visitor requests a `term in a custom taxonomy`.

- `author.php`

The author page template is used whenever a visitor loads an `author page`.

- `date.php`

The date/time template is used when posts are requested by `date or time`. For example, the pages generated with these slugs:

```JSON
http://example.com/blog/2014/
http://example.com/blog/2014/05/
http://example.com/blog/2014/05/26/
```

- `archive.php`

The archive template is used when visitors request `posts by category`, `author`, or `date`. Note: this template will be overridden if more specific templates are present like `category.php`, `author.php`, and `date.php`.

- `search.php`

The search results template is used to display a visitor’s `search results`.

- `attachment.php`

The attachment template is used when viewing a `single attachment like an image, pdf, or other media file`.

- `image.php`

The image attachment template is a more specific version of attachment.php and is used when viewing a `single image attachment`. If not present, WordPress will use `attachment.php` instead.

- `404.php`

The 404 template is used when WordPress `cannot find a post, page, or other content` that matches the visitor’s request.

- `comments.php`

The comments template in classic themes.

# `Template Hierarchy`

This article explains how WordPress determines which template file(s) to use on individual pages.

WordPress uses the <a href="https://wordpress.org/support/article/glossary/#query-string">query string</a> to decide which template or set of templates should be used to display the page. The query string is information that is contained in the link to each part of your website.

Put simply, WordPress searches down through the template hierarchy until it finds a matching template file. To determine which template file to use, WordPress:

- Matches every query string to a query type to decide which page is being requested (for example, a search page, a category page, etc);
- Selects the template in the order determined by the template hierarchy;
- Looks for template files with specific names in the current theme’s directory and uses the first matching template file as specified by the hierarchy.

If WordPress cannot find a template file with a matching name, it will skip to the next file in the hierarchy. If WordPress cannot find any matching template file, the theme’s `index.php` file will be used.

When you are using a child theme, any file you add to your child theme will over-ride the same file in the parent theme. For example, both themes contain the same template `category.php`, then child theme’s template is used.

If a child theme contains the specific template such as `category-unicorns.php` and the parent theme contains lower prioritized template such as `category.php`, then child theme’s `category-unicorns.php` is used.

Contrary, if a child theme contains general template only such as category.php and the parent theme contains the specific one such as `category-unicorns.php`, then parent’s template `category-unicorns.php` is used.

<img src="../hierarchy.webp">

## `The Template Hierarchy In Detail`

## `Front page hierarchy`

The Front Page template hierarchy is unique among templates and can change drastically based on what the user has chosen for their Front page displays setting under Settings > Reading in the admin.

- `Your latest posts & static page`

  - front-page.php
  - Falls back to the Home template hierarchy

## `Home hierarchy`

Despite its name, the Home template is not always used for the homepage of a site. Technically, it refers to the page where your latest blog posts are shown (i.e., the blog posts index).

- `Your latest posts`

  - front-page.php
  - home.php
  - index.php

- `A static page`

  - home.php
  - index.php

### `Single hierarchy`

The Single template hierarchy is fired when a visitor lands upon a single post or a single entry from a custom post type. The following hierarchy is used to determine the template:

- {custom-template}.php
- single-{post_type}-{slug}.php
- single-{post_type}.php
- single.php
- singular.php
- index.php

### `Page hierarchy`

The Page template hierarchy fires when someone visits a single page on your website. This hierarchy is used to determine the template:

- {custom-template}.php
- page-{slug}.php
- page-{id}.php
- page.php
- singular.php
- index.php

### `Attachment (media) hierarchy`

- {mime_type}-{sub_type}.php - can be any MIME type (For example: image.php, video.php, pdf.php). For text/plain, the following path is used (in order):
- {sub_type}.php
- {mime_type}.php
- attachment.php
- Falls back to the default Single template hierarchy

```
As of WordPress 6.4, attachment pages are no longer enabled by default on new installations. Users can enable them with a plugin, so it is still good practice to test your theme and ensure it properly displays content when viewing an attachment page.
```

### `Privacy Policy page hierarchy`

- privacy-policy.php
- Falls back to the Page template hierarchy

### `Taxonomy term hierarchy`

- taxonomy-{taxonomy_slug}-{term_slug}.php
- taxonomy-{taxonomy_slug}.php
- taxonomy.php
- archive.php
- index.php

### `Category hierarchy`

- category-{slug}.php
- category-{id}.php
- category.php
- archive.php
- index.php

### `Tag hierarchy`

- tag-{slug}.php
- tag-{id}.php
- tag.php
- archive.php
- index.php

### `Post type archive hierarchy`

- archive-{post_type}.php
- archive.php
- index.php

### `Author hierarchy`

- author-{user_nicename}.php
- author-{user_id}.php
- author.php
- archive.php
- index.php

### `Date hierarchy`

- date.php
- archive.php
- index.php

### `Search hierarchy`

- search.php
- index.php

### `404 (not found) hierarchy`

- 404.php
- index.php

### `Embed hierarchy`

- embed-{post_type}-{post_format}.php
- embed-{post_type}.php
- embed.php
- Finally, WordPress ultimately falls back to its own wp-includes/theme-compat/embed.php template.

```
Embed templates are not supported by the block templates system. To build and use custom embed templates, they must be located in your theme’s root folder and use the PHP file extension.
```

## `Non-ASCII Character Handling`

Since WordPress 4.7, any dynamic part of a template name which includes non-ASCII characters in its name actually supports both the un-encoded and the encoded form, in that order. You can choose which to use.

- page-hello-world-😀.php
- page-hello-world-%f0%9f%98%80.php
- page-6.php
- page.php
- singular.php

## `Filter Hierarchy`

The WordPress template system lets you filter the hierarchy. This means that you can insert and change things at specific points of the hierarchy. The filter (located in the `get_query_template()` function) uses this filter name: "`{$type}_template`" where `$type` is the template type.

Here is a list of all available filters in the template hierarchy:

- embed_template
- 404_template
- search_template
- frontpage_template
- home_template
- privacypolicy_template
- taxonomy_template
- attachment_template
- single_template
- page_template
- singular_template
- category_template
- tag_template
- author_template
- date_template
- archive_template
- index_template

[TOP](#template---classic-theme)
