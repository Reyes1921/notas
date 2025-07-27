[Volver al Menú](../root.md)

# `File Header`

The `style.css` file header is used to configure data about the theme. WordPress uses this information to determine how some features work and displays some of this data under the Appearance > Themes screen for users.

# `Header fields`

There are many supported fields, and you will likely use most of them in your themes. Here is a quick look at a theme’s `style.css` file header with each of the fields configured:

```JSON
/**
 * Theme Name:        Fabled Sunset
 * Theme URI:         https://example.com/fabled-sunset
 * Description:       Custom theme description...
 * Version:           1.0.0
 * Author:            Your Name
 * Author URI:        https://example.com
 * Tags:              block-patterns, full-site-editing
 * Text Domain:       fabled-sunset
 * Domain Path:       /assets/lang
 * Tested up to:      6.4
 * Requires at least: 6.2
 * Requires PHP:      7.4
 * License:           GNU General Public License v2.0 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 */
```

# `Child theme header fields`

When building a child theme, there is one additional supported field: `Template`. This is used to designate the parent theme’s folder.

If the fictional “Fabled Sunset” theme listed above was the parent of your child theme named “Grand Sunrise,” your `style.css` header fields would look similar to this:

```JSON
/**
 * Theme Name: Grand Sunrise
 * Template:   fabled-sunset
 * ...other header fields
 */
```

The Template field must match the parent theme’s folder name exactly (relative to the wp-content/themes directory) for this to work. Otherwise, WordPress will not be able to appropriately match them.

[TOP](#file-header)
