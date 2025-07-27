[Volver al Menú](../root.md)

# `Post Types`

Internally, all of the Post Types are stored in the same place — in the wp_posts database table — but are differentiated by a database column called post_type.

# `Default Post Types`

There are several default Post Types readily available to users or internally used by the WordPress installation. The most common are:

- Post (Post Type: ‘post’)
- Page (Post Type: ‘page’)
- Attachment (Post Type: ‘attachment’)
- Revision (Post Type: ‘revision’)
- Navigation menu (Post Type: ‘nav_menu_item’)
- Block templates (Post Type: ‘wp_template’)
- Template parts (Post Type: ‘wp_template_part’)

## `Post`

- `single` and `single-post`
- `category` and all its iterations
- `tag` and all its iterations
- `taxonomy` and all its iterations
- `archive` and all its iterations
- `author` and all its iterations
- `date` and all its iterations
- `search`
- `home`
- `index`

## `Page`

- `page` and all its iterations
- `front-page`
- `search`
- `index`

## `Attachment`

- contain information (such as name or description) about files uploaded through the media upload system
- for images, this includes metadata information stored in the wp_postmeta table (including size, thumbnails, location, etc)

- `MIME_type`
- `attachment`
- `single-attachment`
- `single`
- `index`

## `Custom Post Types`

- `single-{post-type}`
- `archive-{post-type}`
- `search`
- `index`

[TOP](#post-types)
