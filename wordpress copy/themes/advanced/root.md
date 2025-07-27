[Volver al Menú](../root.md)

# `Advanced Topics`

# `Internationalization`

Internationalization is the process of developing your theme in such a way that its custom text can be translated into other languages. The term is often abbreviated as “i18n” because there are 18 letters between the “i” and “n,” the first and last letters.

## `Defining your text domain`

As described in the Main Stylesheet documentation, you can configure several important pieces of metadata about your theme via the style.css file header. In particular, there are two meta values you can define related to internationalization:

- `Text Domain`: The string used for the text domain for translations.
- `Domain Path`: A relative path to where theme translations are stored. WordPress uses this field when the theme is disabled to detect translations. Defaults to /languages if not defined.

```JSON
/**
 * Theme Name:        Fabled Sunset
 * ...
 * Text Domain:       fabled-sunset
 * Domain Path:       /assets/lang
 * ...
 */
```

## `Wrapping text with internationalization functions`

For text in your theme to be easily translated in your theme, it must be wrapped in an internationalization function instead of hardcoded.

Let’s wrap that text in the \_e() internationalization function, which tells WordPress that the text inside should be available for translation and echoed (printed to the screen):

```JSON
<h2><?php _e( 'Latest Posts', 'themeslug' ); ?></h2>
```

As you may have noticed, the \_e() function accepted a second parameter of themeslug. This should be replaced with your text domain.

## `Loading translations`

For themes hosted in the WordPress Theme Directory, you do not need to load translations. WordPress automatically checks the wp-content/languages directory in a user’s install and will download translations from the Translating WordPress site. All translations can be handled there, and you don’t have to worry about storing or loading them from your theme.

Translation in WordPress are saved in `.po` (human readable) and `.mo` (machine readable) files. The `.mo` files are the ones actually used by WordPress.

WordPress will look in two places for translation files based on the user’s locale defined for the site:

- wp-content/themes/your-theme/{domain-path}/{locale}.mo
- wp-content/languages/themes/{textdomain}-{locale}.mo

To load translation files from your theme, you must use one of two functions:

- load_theme_textdomain()
- load_child_theme_textdomain() (if building a child theme)

Let’s take a look at the load_theme_textdomain() function signature (it’s the same for both functions):

```JSON
add_action( 'after_setup_theme', 'themeslug_load_textdomain' );

function themeslug_load_textdomain() {
	load_theme_textdomain(
		'fabled-sunset',
		get_parent_theme_file_path( 'assets/lang' )
	);
}
```

---

# `Child Themes`

Child themes are extensions of a parent theme. They allow you to modify an existing theme without directly editing that theme’s code. They are often something as simple as a few minor color changes, but they can also be complex and include custom overrides of the parent theme.

## `What are parent and child themes?`

### `Parent themes`

All themes—unless they are specifically a child theme—are technically parent themes. Basically, this means that they are complete themes that can be installed and activated in WordPress.

### `Child themes`

A child theme includes everything from its parent theme by default. This includes the design and any of its functionality. But it can also be used to make customizations to the parent theme without directly modifying the parent theme’s files.

# `What about grandchild themes?`

This is not currently possible. There are only two levels to the standard theme hierarchy: parent and child theme.

# `How to create a child theme`

- ` Create a child theme folder`
  First, your child theme needs a name. This can be whatever you want your theme to be called, but for this guide, let’s name it “Grand Sunrise.”
- `Create a style.css`
  Now you’ll need to create a file named `style.css`. It is the one absolutely necessary file for a child theme to exist.

  As noted in the Main Stylesheet documentation, there is an additional field necessary to declare a theme as a child theme. You must add the `Template` header field to the `style.css` File Header:

```JSON
/**
 * Theme Name: Grand Sunrise
 * Template:   twentytwentyfour
 * ...other header fields
 */
```

There is one caveat to the `Template` field. It must be a 100% match of the folder name of the parent theme, relative to the `wp-content/themes` folder. In this case, we know that the Twenty Twenty-Four theme folder is located at `wp-content/themes/twentytwentyfour`. Therefore, the `Template` value must be `twentytwentyfour`.

## `Using functions.php`

Unlike templates and patterns, the functions.php file of a child theme does not override the functions.php file in the parent theme. In fact, they are both loaded, with the child being loaded immediately before the parent.

<div style="color:red">Do not copy code directly from the functions.php of a parent theme into your child theme. That will likely lead to fatal errors because of duplicate function names.</div>

## `Referencing or including other files`

For example, if you wanted to include another PHP file via your functions.php, you would use the `get_theme_file_path()` function. Here is a code snippet that shows including a functions-helpers.php file from an /inc folder in your child theme:

```JSON
require_once get_theme_file_path( 'inc/functions-helpers.php' );
```

When you need to reference a file by its URL, such as an image or stylesheet, you must use a different function: `get_theme_file_uri()`. Let’s look at an example of using a file named bunny.jpg from your theme’s /assets/images folder in an `<img>` HTML tag:

```JSON

<?php $image = get_theme_file_uri( 'assets/images/bunny.jpg' ); ?>

<img src="<?php echo esc_url( $image ); ?>" alt="" />
```

---

# `Build Process`

A build process is a method of converting source code files into a final build/production version that can be read by the computer. In particular, themes will most often be minifying or converting source code into CSS or JavaScript so that they can be read by the browser.

[More Info](https://developer.wordpress.org/themes/advanced-topics/build-process/)

---

# `Privacy`

WordPress 4.9.6 introduced several tools to help sites meet the requirements of the European Union’s new GDPR (General Data Protection Regulation) and other potential laws across the world. This article details what theme authors need to know about compatibility with the features.

[More Info](https://developer.wordpress.org/themes/advanced-topics/privacy/)

---

# `Testing`

Whether you are planning to share your WordPress theme with a broad audience or aiming for a specific platform, this article will help you get your theme ready for release. It focuses on general theme testing to ensure your theme’s quality and compatibility across various environments.

[Testing](https://developer.wordpress.org/themes/advanced-topics/testing/)

---

# `Debugging`

Debugging is the practice of finding and fixing errors in any software that you build. And it is an essential part of WordPress theme development, regardless of whether you are building a block or classic theme.

## `WP_DEBUG`

The `WP_DEBUG` constant is the only one defined in a default WordPress installation’s `wp-config.php` file. In a standard install, it is set to `false`, but it is set to `true` if you are running a development copy of WordPress.

```JSON
define( 'WP_DEBUG', true );
```

## `WP_DISABLE_FATAL_ERROR_HANDLER`

WordPress 5.2 introduced a fatal error handler to ensure that users do not get locked out of their site when a theme or plugin causes a fatal error. This is a great feature in production/live sites. But it can be problematic in development, preventing you from fully diagnosing errors.

For this reason, in development, you should disable this to make sure things are broken until you can fix them. Define this constant in your wp-config.php file:

```JSON
define( 'WP_DISABLE_FATAL_ERROR_HANDLER', true );
```

## `WP_DEBUG_DISPLAY`

`WP_DEBUG_DISPLAY` is used to control whether debug messages display within the HTML of your WordPress site. By default, when WP_DEBUG is enabled, debugging messages will be shown on the screen. So, you can safely not define `WP_DEBUG_DISPLAY` during development.

```JSON
define( 'WP_DEBUG_DISPLAY', false );
```

## `WP_DEBUG_LOG`

The `WP_DEBUG_LOG` constant is an optional feature that you can set to log errors to a debug.log file in your site’s /wp-content directory. By default, this is disabled.

Generally, if you turn off on-screen debugging messages via WP_DEBUG_DISPLAY, then you will want to opt for storing these messages in the debug log.

```JSON
define( 'WP_DEBUG_LOG', true );
```

---

# `Security`

When releasing any code out into the world, whether it will only exist on your own site or hundreds of thousands of sites, it’s important to strive to make it as secure as possible. Responsible coding means being vigilant about all the ways your theme can be exploited.

## `Cross-Site Scripting (XSS)`

Cross-Site Scripting (XSS) happens when a nefarious party injects JavaScript into a web page.

```JSON
<img src="<?php echo esc_url( $great_user_picture_url ); ?>" />
```

Content that has HTML entities within can be sanitized to allow only specified HTML elements:

```JSON
$allowed_html = array(
	'a' => array(
		'href' => array()
	),
	'br'     => array(),
	'em'     => array(),
	'strong' => array()
);

echo wp_kses( $custom_content, $allowed_html );
```

## `SQL Injection`

SQL Injection happens when values being input are not properly sanitized, allowing for any SQL commands in the data to potentially be executed. To prevent this, the WordPress API is extensive. For example, it offers functions like `add_post_meta()` so that you don’t need to manually insert metadata via SQL

## `Cross-Site Request Forgery (CSRF)`

Cross-site request forgery or CSRF (pronounced sea-surf) is when a nefarious party tricks a user into performing an unwanted action within a web application they are authenticated in. For example, a phishing email might contain a link to a page that would delete a user’s account in the WordPress admin.

This is more common in plugins than themes. But if your theme includes any HTML or HTTP-based form submissions, use a nonce to guarantee a user intends to perform an action:

```JSON
<form method="post">
	<!-- some inputs here ... -->
	<?php wp_nonce_field( 'name_of_my_action', 'name_of_nonce_field' ); ?>
</form>
```

---

# `Publishing Themes`

[More Info](https://developer.wordpress.org/themes/advanced-topics/publishing-themes/)

---

# `Plugin API Hooks`

A theme should work well with WordPress plugins. Plugins add functionality by using actions and filters, which are collectively called hooks (see Plugin API for more information).

Most hooks are executed internally by WordPress, so your theme does not need special tags for them to work. However, a few hooks need to be included in your theme templates. These hooks are fired by special Template Tags:

- `wp_head()`
  Goes at the end of the `<head>` element of a theme’s `header.php` template file.

- `wp_body_open()`
  Goes at the begining of the `<body>` element of a theme’s `header.php` template file.

- `wp_footer()`
  Goes in `footer.php`, just before the closing `</body>` tag.

- `wp_meta()`
  Typically goes in the `<li>Meta</li>` section of a Theme’s menu or sidebar.

- `comment_form()`
  Goes in `comments.php` directly before the file’s closing tag (`</div>`).

---

# `UI Best Practices`

## `Logo Homepage Link`

The logo at the top each page should send the user to the homepage of your site.

## `Descriptive Anchor Text`

The anchor text is the visible text for a hyperlink. Good link text should give the reader an idea of the action that will take place when clicking it.

## `Style Links with Underlines`

## `Different Link Colors`

Color is another visual cue that text is clickable. Styling hyperlinks with a different color than the surrounding text makes them easier to distinguish.

Hyperlinks are one of the few HTML features that have state. The two most important states are visited and unvisited.

Having different colors for these two states helps users identify the pages they’ve visited before. A good trick for taking the guess work out of visited links is to color them 10%-20% darker than the unvisited links.

There are 3 other states that links can have:

hover, when a mouse is over an element
focus, similar to hover but for keyboard users
active, when a user is clicking on a link

## `Color Contrast`

## `Sufficient Font Size`

Make your text easy to read. By making your text large enough, you increase the usability of your site and make the content easier to understand. 14px is the smallest text should be.

## `Associate Labels with Inputs`

Labels inform the user what an input field is for. You can connect the label to the input by using the for attribute in the label. This will allow the user to click the label and focus on the input field.

```JSON
<label for="username">Username</label>
<input type="text" id="username" name="login" />
```

## `Placeholder Text in Forms`

```JSON
<label for="name">Name</label>
<input type="text" id="name" name="name" placeholder="John Smith" />
```

## `Descriptive Buttons`

The web is filled with buttons that have unclear meanings. Remember the last time you used ‘OK’ or ‘submit’ on your login form? Choosing better words to display on your buttons can make your website easier to use. Try the pattern [verb] [noun] — Create user, Delete File, Update Password, Send Message. Each describes what will happen when the user clicks the button.

---

# `JavaScript Best Practices`

[More Info](https://developer.wordpress.org/themes/advanced-topics/javascript-best-practices/)

[TOP](#advanced-topics)
