[Volver al Menú](../root.md)

# `References`

This section contains lists of Template Tags and Conditional Tags.

# `Template Tags`

- [List of Template Tags](https://developer.wordpress.org/themes/references/list-of-template-tags/)

## `General tags`

- `get_header()` || `get_header( '404' );`
- `get_footer()` || `get_footer( '404' )`
- `get_template_part()` || `get_sidebar( 'left' )`
- `get_template_part`
- `bloginfo()` Displays information about the current site.
- `wp_enqueue_script()` Enqueues a script.

## `Category tags`

- `the_terms()` Displays the terms for a post in a list.
- `the_taxonomies()` Displays the taxonomies of a post with available options.

## `Link tags`

- `the_permalink()` Displays the permalink for the current post.
- `get_permalink` Retrieves the full permalink for the current post or post ID.
- `home_url` Retrieves the URL for the current site where the front end is accessible.
- `site_url` Retrieves the URL for the current site where WordPress application files (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.
- `get_post_permalink` Retrieves the permalink for a post of a custom post type.
- `get_page_link` Retrieves the permalink for the current page or page ID.

## `Post tags`

- `the_content()` Displays the post content.
- `the_excerpt()` Displays the post excerpt.
- `the_ID()` Displays the ID of the current item in the WordPress Loop.
- ``
- ``
- ``

## `Linking to Core Theme Files`

You can create custom versions of these files can be called as well by naming the file sidebar-{your_custom_template}.php, header-{your_custom_template}.php and footer-{your_custom_template}.php. You can then use Template Tags with the custom template name as the only parameter, like this:

```JSON
get_header( 'your_custom_template' );
get_footer( 'your_custom_template' );
get_sidebar( 'your_custom_template' );
```

WordPress creates pages by assembling various files. Aside from the standard files for the header, footer and sidebar, you can create custom template files and call them at any location in the page using get_template_part() .

For example `content-product.php`

```JSON
get_template_part( 'content', 'product' );
```

## `Dynamic Linking in Templates`

Regardless of your permalink settings, you can link to a page or post dynamically by referring to its unique numerical ID (seen in several pages in the admin interface) with

```JSON
<a href="<?php echo get_permalink($ID); ?>">This is a link</a>
```

This is a convenient way to create page menus as you can later change page slugs without breaking links, as IDs will stay the same. However, this might increase database queries.

---

# `Conditional Tags`

Conditional Tags can be used in your Template Files in classic themes to alter the display of content depending on the conditions that the current page matches. They tell WordPress what code to display under specific conditions. Conditional Tags usually work with PHP if /else Conditional Statements.

```JSON
if ( is_user_logged_in() ) :
	echo 'Welcome, registered user!';
else :
	echo 'Welcome, visitor!';
endif;
```

## `Where to Use Conditional Tags`

For a Conditional Tag to modify your data, the information must already have been retrieved from your database, i.e. the query must have already run. If you use a Conditional Tag before there is data, there’ll be nothing to ask the if/else statement about.

Two ways to implement Conditional Tags:

- place it in a Template File
- create a function out of it in functions.php that hooks into an action/filter that triggers at a later point

## `List of Conditional Tags`

- [List of Conditional Tags](https://developer.wordpress.org/themes/references/list-of-conditional-tags/)

# `The Conditions For`

- ### `The Main Page`

`is_home()` This will only prove true on the page which you set as the “Posts page” in Settings > Reading.

- ### `The Front Page`

`is_front_page()` This condition returns true when the front page of the site is displayed, regardless of whether it is set to show posts or a static page.

- ### `The Administration Panels`

`is_admin()` This condition returns true when the Dashboard or the administration panels are being displayed.

- ### `A Single Post Page`

`is_single()` Returns true when any single Post (or attachment, or custom Post Type) is being displayed. This condition returns false if you are on a page. Can also check for certain posts by ID and other parameters

- ### `A Single Post, Page, or Attachment`

`is_singular()` Returns true for any is_single, is_page, and is_attachment. It does allow testing for post types.

- ### `A Post Type`

`get_post_type()` You can test to see if the current post is of a certain type by including `get_post_type()`

`post_type_exists()` Returns true if a given post type is a registered post type.

- ### `A “PAGE” Page`

`is_page()` This section refers to WordPress Pages, not any generic webpage from your blog, or in other words to the built in post_type ‘page’.

- ### `Is a Page Template`

`is_page_template()` Allows you to determine whether or not you are in a page template or if a specific page template is being used.

- ### `A Taxonomy Page`

`has_term()` Check if the current post has any of given terms.

`taxonomy_exists()` When a particular taxonomy is registered via register_taxonomy()

- ### `Any Archive Page`

`is_archive()`

- ### `Inside The Loop`

`in_the_loop()` Check to see if you are “inside the loop”. Useful for plugin authors, this conditional returns as true when you are inside the loop.

- ### `An Active Plugin`

`is_plugin_active()` Checks if a plugin is activated.

- ### `A Child Theme`

`is_child_theme()` Checks whether a child theme is in use.

- is_sticky()
- is_post_type_hierarchical( $post_type )
- is_post_type_archive()
- comments_open()
- pings_open()
- is_category()
- is_tag(), has_tag
- is_tax()
- taxonomy_exists()
- is_author()
- is_multi_author()
- is_date()
- is_year()
- is_month()
- is_day()
- is_time()
- is_new_day()
- is_search()
- is_404()
- is_privacy_policy()
- is_attachment() An attachment is an image or other file uploaded through the post editor’s upload utility
- is_feed()
- is_trackback()
- is_preview()
- has_excerpt()
- has_nav_menu()
- is_active_sidebar()
- is_multisite()
- is_main_site()
- is_super_admin() Determines if a user is a network (super) admin.
- current_theme_supports()

[TOP](#references)
