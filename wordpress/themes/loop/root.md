[Volver al Menú](../root.md)

# `The Loop`

The Loop is the default mechanism WordPress uses for outputting posts through a theme’s `template files`. How many posts are retrieved is determined by the number of posts to show per page defined in the Reading settings.

You can use the Loop for a number of different things, for example to:

- display post `titles` and `excerpts` on your `blog’s homepage`;
- display the `content` and `comments` on a `single post`;
- display the `content` on an `individual page` using `template tags`; and
- display `data` from `Custom Post Types` and `Custom Fields`.

# `The Loop in Detail`

```JSON
<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        // Display post content
    endwhile;
endif;
?>
```

# `Using The Loop`

The Loop should be placed in `index.php`, and in any other `templates` which are used to display post information.

The Loop must always begin with the same `if` and `while` statements, as mentioned above and must end with the same end statements.

Any `template tags` that you wish to apply to all posts `must exist between` the beginning and ending statements.

# `Resetting multiple loops`

It’s important when using multiple loops in a template that you reset them. Not doing so can lead to unexpected results due to how data is stored and used within the global `$post` variable. There are three main ways to reset the loop depending on the way they are called.

- `wp_reset_postdata()`
- `wp_reset_query()`
- `rewind_posts()`

# `Using wp_reset_postdata`

Use `wp_reset_postdata()` when you are running custom or multiple loops with `WP_Query`. This function restores the global `$post` variable to the current post in the main query. If you’re following best practices, this is the most common function you will use to reset loops.

To properly use this function, place the following code after any loops with WP_Query.

```JSON
<?php
// The main query.
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title();
        the_content();
    endwhile;
else :
    // When no posts are found, output this text.
    _e( 'Sorry, no posts matched your criteria.' );
endif;
wp_reset_postdata();

/*
 * The secondary query. Note that you can use any category name here. In our example,
 * we use "example-category".
 */
$secondary_query = new WP_Query( 'category_name=example-category' );

// The second loop.
if ( $secondary_query->have_posts() )
    echo '<ul>';
    while ( $secondary_query->have_posts() ) : $secondary_query->the_post();
        the_title( '<li>', '</li>' );
     endwhile;
     echo '</ul>';
endif;
wp_reset_postdata();
?>
```

# `Using rewind_posts`

You can use `rewind_posts()` to loop through the same `query` a second time. This is useful if you want to display the same `query` twice in different locations on a page.

```JSON
<?php
// Start the main loop
if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        the_title();
    endwhile;
endif;

// Use rewind_posts() to use the query a second time.
rewind_posts();

// Start a new loop
while ( have_posts() ) : the_post();
    the_content();
endwhile;
?>
```

# `Using wp_reset_query`

Using `wp_reset_query()` restores the `WP_Query` and global `$post` data to the original main query. You `MUST` use this function to reset your loop if you use `query_posts()` within your loop. You can use it after custom loops with `WP_Query` because it actually calls `wp_reset_postdata() `when it runs. However, it’s best practice to use `wp_reset_postdata()` with any custom loops involving `WP_Query`.

<p style="color: red">query_posts() is not best practice and should be avoided if at all possible. Therefore, you shouldn’t have much use for wp_reset_query().</p>

To properly use this function, place the following code after any loops with query_posts().

```JSON
<?php wp_reset_query(); ?>
```

[TOP](#the-loop)
