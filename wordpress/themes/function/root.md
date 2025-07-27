[Volver al Menú](../root.md)

# `What is functions.php?`

<p style="color:red">Functions.php can be used by both classic themes, block themes, and child themes.</p>

The `functions.php` essentially acts like a WordPress plugin, letting you add custom PHP functions, classes, interfaces, and more. It opens up the entirety of the PHP programming language to your theme.

WordPress automatically loads the `functions.php` file (if it exists) as soon as it loads the theme on all page views on both the admin and front-end of the website. So it provides you with a lot of power to build unique features around WordPress.

<p style="color:red">The same result can be produced using either a plugin or functions.php. If you are creating new features that should be available no matter what the website looks like, it is best practice to put them in a plugin.</p>

There are advantages and tradeoffs to either using a WordPress plugin or using functions.php.

A WordPress plugin:

- requires specific, unique header text;
- is stored in wp-content/plugins, usually in a subdirectory;
- only executes on page load when activated;
- applies to all themes; and
- should have a single purpose – for example, offer search engine optimization features or help with backups.

Meanwhile, a functions.php file:

- requires no unique header text;
- is stored in theme’s subdirectory in wp-content/themes;
- executes only when in the active theme’s directory;
- applies only to that theme (if the theme is changed, the features can no longer be used); and
- can have numerous blocks of code used for many different purposes.

<p style="color:red">Although the child theme’s functions.php is loaded by WordPress right before the parent theme’s functions.php, it does not override it. The child theme’s functions.php can be used to augment or replace the parent theme’s functions. Similarly, functions.php is loaded after any plugin files have loaded.</p>

# `Common uses for functions.php`

- `Adding actions or filters to hooks`
- `Theme setup function`
- `Loading scripts and styles`
- `Including other PHP files`

There are other common features you can include in functions.php. Listed below are some of the most common features. Click through and learn more about each of these features.

- `Custom Headers -Classic themes`
- `Sidebars (widget areas) -Classic themes`
- `Custom Background -Classic themes`
- `Title tag -Classic themes`
- `Add Editor Styles`
- `HTML5 -Classic themes`

# `Theme Setup`

A number of theme features should be included within a “setup” function that runs initially when your theme is activated.

<p style="color:red">It’s important to namespace your functions with your theme name. All examples below use myfirsttheme_ as their namespace, which should be customized based on your theme name.</p>

```bash
if ( ! function_exists( 'myfirsttheme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress
 * features.
 *
 * It is important to set up these functions before the init hook so
 * that none of these features are lost.
 *
 *  @since MyFirstTheme 1.0
 */
function myfirsttheme_setup() { ... }
```

# `Your functions.php File`

If you choose to include all the functions listed above, this is what your functions.php might look like. It has been commented with references to above.

```JSON
/**
 * MyFirstTheme's functions and definitions
 *
 * @package MyFirstTheme
 * @since MyFirstTheme 1.0
 */

/**
 * First, let's set the maximum content width based on the theme's
 * design and stylesheet.
 * This will limit the width of all uploaded images and embeds.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 800; /* pixels */
}


if ( ! function_exists( 'myfirsttheme_setup' ) ) :

	/**
	 * Sets up theme defaults and registers support for various
	 * WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme
	 * hook, which runs before the init hook. The init hook is too late
	 * for some features, such as indicating support post thumbnails.
	 */
	function myfirsttheme_setup() {

		/**
		 * Make theme available for translation.
		 * Translations can be placed in the /languages/ directory.
		 */
		load_theme_textdomain( 'myfirsttheme', get_template_directory() . '/languages' );

		/**
		 * Add default posts and comments RSS feed links to <head>.
		 */
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Enable support for post thumbnails and featured images.
		 */
		add_theme_support( 'post-thumbnails' );

		/**
		 * Add support for two custom navigation menus.
		 */
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'myfirsttheme' ),
			'secondary' => __( 'Secondary Menu', 'myfirsttheme' ),
		) );

		/**
		 * Enable support for the following post formats:
		 * aside, gallery, quote, image, and video
		 */
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'quote', 'image', 'video' ) );
	}
endif; // myfirsttheme_setup
add_action( 'after_setup_theme', 'myfirsttheme_setup' );

```

[TOP](#what-is-functionsphp)
