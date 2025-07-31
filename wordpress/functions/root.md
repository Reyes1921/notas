[Volver al Menú](../root.md)

# `Functions`

# `get_queried_object(): WP_Term|WP_Post_Type|WP_Post|WP_User|null`

Retrieves the currently queried object.

`the get_queried_object()` function is a powerful tool used to retrieve the "`thing`" that the current webpage is primarily about. This function is extremely useful for understanding the context of the current page being viewed and dynamically adjusting content or behavior based on that context.

What it does:

`get_queried_object()` returns a PHP object representing the main entity being queried by the current WordPress request. The type of object returned depends on the type of page you are on:

- `WP_Post object`: On a single post, page, or any custom post type. It will contain all the data related to that specific post.
- `WP_Term object`: On a category, tag, or any custom taxonomy archive page. It will contain information about the specific term (category, tag, etc.) being displayed.
- `WP_User object`: On an author archive page. It will contain information about the user whose posts are being displayed.
- `WP_Post_Type object`: On a custom post type archive page.
- `null`: In some cases, like the main blog index page (if it's not a static "Posts page") or date archives, `get_queried_object()` might return null because there isn't a single, clear "object" being queried in the same way.

```JSON
<?php
$queried_object = get_queried_object();

if ( $queried_object ) {
    if ( is_a( $queried_object, 'WP_Post' ) ) {
        echo '<h1>Single Post/Page: ' . esc_html( $queried_object->post_title ) . '</h1>';
    } elseif ( is_a( $queried_object, 'WP_Term' ) ) {
        echo '<h2>Archive for: ' . esc_html( $queried_object->name ) . '</h2>';
    } elseif ( is_a( $queried_object, 'WP_User' ) ) {
        echo '<h2>Posts by: ' . esc_html( $queried_object->display_name ) . '</h2>';
    } elseif ( is_a( $queried_object, 'WP_Post_Type' ) ) {
        echo '<h2>Archive for: ' . esc_html( $queried_object->labels->name ) . '</h2>';
    } else {
        echo '<p>Unknown queried object type.</p>';
    }
} else {
    echo '<p>No specific object queried.</p>';
}
?>
```

---

# `set_query_var( string $query_var, mixed $value )`

Sets the value of a query variable in the `WP_Query` class.

The `set_query_var()` function in WordPress allows you to set or modify a query variable in the global `$wp_query` object.

Its primary use is to programmatically influence the main WordPress query before it runs or to pass custom data that can then be retrieved later in the same page load.

## `Common Use Cases:`

- `Modifying the Main Query`: You can change parameters of the main query before it's executed. This is often done using hooks like `pre_get_posts`.

```JSON
function my_custom_posts_per_page( $query ) {
    if ( $query->is_main_query() && ! is_admin() && is_category( 'my-special-category' ) ) {
        set_query_var( 'posts_per_page', 5 ); // Show only 5 posts on this category archive
    }
}
add_action( 'pre_get_posts', 'my_custom_posts_per_page' );
```

- `Passing Data to Template Parts`: Before WordPress 5.5, `set_query_var()` was a common way to pass data from a parent template to a template part loaded with `get_template_part()`.

```JSON
// In your main template file (e.g., single.php)
$product_id = 123;
set_query_var( 'current_product_id', $product_id );
get_template_part( 'template-parts/product-details' );

// In template-parts/product-details.php
$product_id = get_query_var( 'current_product_id' );
if ( $product_id ) {
    echo '<p>Displaying details for product ID: ' . absint( $product_id ) . '</p>';
    // ... fetch and display product details based on $product_id
}
```

Note: Since WordPress 5.5, `get_template_part()` itself has a third `$args` parameter, which is a cleaner way to pass data to template parts.

## `The New, Cleaner Way (WordPress 5.5+):`

Using the `$args` parameter in `get_template_part()`:

```JSON
<?php
$my_data_for_part = [
    'title_prefix' => 'Feature:',
    'is_highlight' => true,
    'custom_message' => 'This is direct data passing!',
];

// Pass an array of arguments directly to the template part
get_template_part( 'template-parts/content', 'article', $my_data_for_part );
?>
```

`In your template part file (e.g., template-parts/content-article.php):`

```JSON
<?php
// The $args variable is automatically available here
// You can use array destructuring for convenience (PHP 7.1+)
$default_args = [
    'title_prefix'   => '',
    'is_highlight'   => false,
    'custom_message' => '',
];
$args = wp_parse_args( $args, $default_args ); // Merge with defaults for safety

$title_prefix   = $args['title_prefix'];
$is_highlight   = $args['is_highlight'];
$custom_message = $args['custom_message'];

// Or, for PHP 7.1+
// extract( $args ); // This is an older method, be cautious with variable naming conflicts.
                    // Using direct array access or destructuring is safer.
?>

<article <?php if ( $is_highlight ) echo 'class="highlight"'; ?>>
    <h2><?php echo esc_html( $title_prefix ); ?> <?php the_title(); ?></h2>
    <?php the_content(); ?>
    <?php if ( $custom_message ) : ?>
        <p><strong>Info:</strong> <?php echo esc_html( $custom_message ); ?></p>
    <?php endif; ?>
</article>
```

---

# `get_query_var( string $query_var, mixed $default_value = '' ): mixed`

Retrieves the value of a query variable in the `WP_Query` class.

---

# `get_template_part( string $slug, string|null $name = null, array $args = array() ): void|false`

Loads a template part into a template.

Provides a simple mechanism for child themes to overload reusable sections of code in the theme.

Includes the named template part for a theme or if a name is specified then a specialized part will be included. If the theme contains no `{slug}.php` file then no template will be included.

The template is included using require, not require_once, so you may include the same template part multiple times.

For the $name parameter, if the file is called "`{slug}-special.php`" then specify "special".

`Return`

void|false Void on success, false if the template does not exist.

---

[TOP](#functions)
