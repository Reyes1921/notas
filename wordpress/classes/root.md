[Volver al Menú](../root.md)

# `Classes`

# `class WP_Query {}`

The WordPress Query class.

Most of the time you can find the information you want without actually dealing with the class internals and global variables. There are a whole bunch of functions that you can call from anywhere that will enable you to get the information you need.

There are two main scenarios you might want to use `WP_Query` in. The first is to find out what type of request WordPress is currently dealing with. The `$is_*` properties are designed to hold this information: use the `Conditional Tags` to interact here. This is the more common scenario to plugin writers (the second normally applies to theme writers).

The second is during `The Loop`. `WP_Query` provides numerous functions for common tasks within `The Loop`. To begin with, `have_posts()` , which calls `$wp_query->have_posts()`, is called to see if there are any posts to show. If there are, a while loop is begun, using `have_posts()` as the condition. This will iterate around as long as there are posts to show. In each iteration, `the_post()` , which calls `$wp_query->the_post()` is called, setting up internal variables within `$wp_query` and the global `$post` variable (which the Template Tags rely on), as above. These are the functions you should use when writing a theme file that needs a loop.

```JSON
<?php
// The Query.
$the_query = new WP_Query( $args );

// The Loop.
if ( $the_query->have_posts() ) {
	echo '<ul>';
	while ( $the_query->have_posts() ) {
		$the_query->the_post();
		echo '<li>' . esc_html( get_the_title() ) . '</li>';
	}
	echo '</ul>';
} else {
	esc_html_e( 'Sorry, no posts matched your criteria.' );
}
// Restore original Post Data.
wp_reset_postdata();

```

# `Properties and Methods`

[Properties and Methods](https://developer.wordpress.org/reference/classes/wp_query/#properties-and-methods)

[Taxonomy Parameters](https://developer.wordpress.org/reference/classes/wp_query/#taxonomy-parameters)

[Post & Page Parameters](https://developer.wordpress.org/reference/classes/wp_query/#post-page-parameters)

[Order & Orderby Parameters](https://developer.wordpress.org/reference/classes/wp_query/#order-orderby-parameters)

[Custom Field (post meta) Parameters](https://developer.wordpress.org/reference/classes/wp_query/#custom-field-post-meta-parameters)

---

[TOP](#classes)
