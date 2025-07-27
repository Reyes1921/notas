[Volver al Menú](../root.md)

# `Including Assets`

# `URL and directory path functions`

Three of the primary URL helper functions are:

- `get_stylesheet_uri()`: Returns the active theme’s style.css file URL.
- `get_theme_file_uri( $file )`: Returns the active theme’s URL, with an optional $file parameter. Falls back to the parent theme if a child theme is active and the file doesn’t exist.
- `get_parent_theme_file_uri( $file )`: Returns the parent theme’s URL, with an optional $file path.

For directory paths, which are needed less often for assets, there are two primary functions:

- `get_theme_file_path( $file )`: Returns the active theme’s directory path, with an optional $file parameter. Falls back to the parent theme if a child theme is active and the file doesn’t exist.
- `get_parent_theme_file_path( $file )`: Returns the parent theme’s directory path, with an optional $file parameter.

---

# `Including CSS`

`wp_enqueue_style()` is the primary function for enqueueing a stylesheet, which tells WordPress that you want to put it in the queue to load.

```JSON
wp_enqueue_style(
    string $handle,
    string $src           = '',
    string[] $deps        = array(),
    string|bool|null $ver = false,
    string $media         = 'all'
);
```

# `Front-end stylesheets`

```JSON
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_styles' );

function theme_slug_enqueue_styles() {
    wp_enqueue_style(
        'theme-slug-style',
        get_stylesheet_uri()
    );
}
```

# `Inline styles`

There are times when you might need to add some inline CSS to the <head> area on the front end. WordPress has the wp_add_inline_style() function for this specific scenario.

Here is a look at the function signature:

```JSON
wp_add_inline_style(
string $handle,
string $data
);
```

# `Editor stylesheets`

When creating a theme with custom CSS on the front end, you will almost always want your custom styles to also appear in the editor. This will create a consistent user experience across the site. But WordPress does not automatically load your front-end stylesheets in the editor.

```JSON
add_editor_style( array|string $stylesheet = 'editor-style.css' );
```

---

# `Including JavaScript`

Like stylesheets, WordPress has a primary function for enqueueing JavaScript files: wp_enqueue_script(). You would also use this function within an action hook callback in your functions.php file, and you’ll learn which hooks to use in the following sections.

```JSON
wp_enqueue_script(
    string $handle,
    string $src           = '',
    string[] $deps        = array(),
    string|bool|null $ver = false,
    array|bool $in_footer = false
);
```

# `Front-end JavaScript`

```JSON
add_action( 'wp_enqueue_scripts', 'theme_slug_enqueue_scripts' );

function theme_slug_enqueue_scripts() {
    wp_enqueue_script(
        'theme-slug-navigation',
        get_parent_theme_file_uri( 'assets/js/navigation.js' ),
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
```

# `Inline JavaScript`

Sometimes you might want to add some inline JavaScript to the `<head>` area on the front end. WordPress has the ` ` function for this purpose.

```JSON
wp_add_inline_script(
    string $handle,
    string $data,
    string $position = 'after'
);
```

# `Editor JavaScript`

When you need to load a JavaScript file for the block editor, you must use the `enqueue_block_editor_assets` hook. Note that this is for loading scripts on the admin page itself and not within the content iframe.

Suppose you had an `assets/js/editor.js` file that you needed to load for the editor. Your code should look like this:

```JSON
add_action( 'enqueue_block_editor_assets', 'theme_slug_enqueue_editor_scripts' );

function theme_slug_enqueue_editor_scripts() {
    wp_enqueue_script(
        'theme-slug-editor',
        get_parent_theme_file_uri( 'assets/js/editor.js' ),
        array(),
        wp_get_theme()->get( 'Version' ),
        true
    );
}
```

[TOP](#including-assets)
