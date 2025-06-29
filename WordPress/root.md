[Volver al Menú](/readme.md)

# `WordPress`

- [Notas](notas.md)
- [Estructura](estructura/root.md)

`Displays information about the current site.` `name`, `description`,`wpurl`,`url`,`admin_email`,`version`...`

```bash
bloginfo( string $show = '' )
```

`Determines whether current WordPress query has posts to loop over.`

```bash
have_posts()
```

`Displays or retrieves the current post title with optional markup.`

```bash
the_title( string $before = '', string $after = '', bool $echo = true )
```

`Displays the post content.`

```bash
the_content( string $more_link_text = null, bool $strip_teaser = false )
```

`Displays the permalink for the current post.`

```bash
the_permalink( int|WP_Post $post )
```

`Fire the wp_head action.`

```bash
wp_head()
```

`Load header template.`

```bash
get_header( string $name = null, array $args = array() )
```

`Load footer template.`

```bash
get_footer( string $name = null, array $args = array() )
```

`Registers theme support for a given feature.`

```bash
add_theme_support( string $feature, mixed $args )
```

`Fires after the theme is loaded.`

```bash
do_action( 'after_setup_theme' )
```

---

# `PRINCIPALES`

`Adds a callback function to an action hook.`

```bash
add_action( string $hook_name, callable $callback, int $priority = 10, int $accepted_args = 1 );
```

`Calls the callback functions that have been added to an action hook. (To create a custom hook)`

```bash
do_action( string $hook_name, mixed $arg );
```

`Adds a callback function to a filter hook.`

```bash
add_filter( string $hook_name, callable $callback, int $priority = 10, int $accepted_args = 1 );
```

`Calls the callback functions that have been added to a filter hook. (To create a custom hook)`

```bash
apply_filters();
```

`HTML dentro de PHP`

```bash
$php_inside_html = '<span> '. $php_dentro_html .' </span>'
```

`PHP dentro de HTML`

```bash
<p id="id" class='class'><?php print_r($last_order) ?></p>
```

`Define una constante que no puede ser modificada`

```bash
define(string $name, mixed $value, bool $case_insensitive = false): bool
```

`Comprueba si existe una constante con nombre dada`

```bash
defined(string $name);
```

`Debug en WordPress`

```bash
define( 'WP_DEBUG', true );
```

`Se evita acceder a la carpeta directamente`

```bash
if ( ! defined( 'ABSPATH' ) ) {
exit;
}
```

---

# `REGISTRAR ARCHIVOS JS, CSS Y PHP`

`Registers a script to be enqueued later using the wp_enqueue_script() function.`

```bash
wp_register_script( string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );
```

```bash
function enqueue_custom_js() {
    wp_enqueue_script('custom-js', trailingslashit( get_stylesheet_directory_uri() )  . '/js.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');
```

`Registers the script if $src provided (does NOT overwrite), and enqueues it.`

```bash
wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );
```

`Localize a script. Works only if the script has already been added.`

```bash
wp_localize_script( string $handle, string $object_name, array $l10n );
```

`Register a CSS stylesheet.`

```bash
wp_register_style( string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );
```

`Enqueue a CSS stylesheet. Registers the style if source provided (does NOT overwrite) and enqueues.`

```bash
wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );
```

`Retrieves stylesheet directory URI for the active theme. //http://localhost/wordpress/wp-content/themes/phoenix`

```bash
get_stylesheet_directory_uri()
```

`Retrieves stylesheet URI for the active theme. //http://localhost/wordpress/wp-content/themes/phoenix/style.css`

```bash
get_stylesheet_uri()
```

`Es parecido al include solo que si no encuentra el archivo se produce un fatal error`

```bash
require('somefile.php');
```

`La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.`

```bash
require_once(**ROOT**.'/config.php');
require_once('includes/config.php');
```

`Incluye un archivo, si no se encuentra devuelve una advertencia`

```bash
include 'vars.php';
```

`url del plugin`

```bash
plugin_dir_url( **FILE** ) ;//your-url.com/wp-content/plugins/your-plugin/
```

`url de la carpeta en el system`

```bash
plugin_dir_path( string $file ); // home/user/var/www/wordpress/wp-content/plugins/my-plugin/
```

`Retrieves the URL of a file in the theme.`

```bash
get_theme_file_uri( string $file = '' )
```

`Retrieves the URL for the current site where WordPress application files (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.`

```bash
site_url( string $path = '', string|null $scheme = null )
```

`Retrieves the full permalink for the current post or post ID.`

```bash
get_permalink( int|WP_Post $post, bool $leavename = false )
```

`Retrieves the post title.`

```bash
get_the_title( int|WP_Post $post )
```

`Returns the ID of the post’s paren`t.

```bash
wp_get_post_parent_id( int|WP_Post|null $post = null )
```

---

# `REGISTRAR CAMPOS`

`Registers a setting and its data.`

```bash
register_setting( string $option_group, string $option_name, array $args = array() );
```

`Add a new section to a settings page.`

```bash
add_settings_section( string $id, string $title, callable $callback, string $page );
```

`Add a new field to a section of a settings page.`

```bash
add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() );
```

---

# `ADD MENU PAGE`

`Add a top-level menu page.`

```bash
add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );
```

`Add a submenu page.`

```bash
add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null );
```

`Retrieves an option value based on an option name.`

```bash
get_option( string $option, mixed $default = false );
```

`Renders an editor.`

```bash
wp_editor( string $content, string $editor_id, array $settings = array() );
```

`Adds a new shortcode.`

```bash
add_shortcode( string $tag, callable $callback );
```

`Sends an email, similar to PHP’s mail function.`

```bash
wp_mail( string|string[] $to, string $subject, string $message, string|string[] $headers = '', string|string[] $attachments = array() );
```

---

# `SEGURIDAD & TRADUCCIÓN`

`Retrieve or display nonce hidden field for forms.`

```bash
wp_nonce_field( int|string $action = -1, string $name = '\_wpnonce', bool $referer = true, bool $echo = true );
```

`Sanitizes a string from user input or from database`

```bash
sanitaze_text_field( string $str);
```

`sanitaze textareas`

```bash
sanitaze_textarea_field( string $str);
```

`Filters text content and strips out disallowed HTML`

```bash
wp_kses( string $string, array[]|string $allowed_html, string[] $allowed_protocols = array());
```

`Sanitazes content for allowed HTML tags for post content`

```bash
wp_kses_post( string $data);
```

`Cuando queremos mostrar una información`

```bash
esc_html();
```

`Ej`

```bash
<h4><?php echo esc_html( $title ); ?></h4>
```

`lo mismo pero para las URLS`

```bash
esc_url();
```

`JS`

```bash
esc_js();
```

`Atributos`

```bash
esc_attr();
```

`Textarea`

```bash
esc_textarea();
```

`PHP hace echo y sanitaze a la ves (translate)`

```bash
esc_html\_\_();
```

`HTML hace echo y sanitaze a la ves (translate)`

```bash
esc_html_e();
```

`Display translated text.`

```bash
\_e();
```

`Retrieve the translation of $text.`

```bash
\_\_( string $text, string $domain = 'default' );
```

---

# `USUARIO`

`Determines whether the current visitor is a logged in user.`

```bash
is_user_logged_in();
```

---

# `AJAX`

`Returns true when the page is loaded via ajax.`

```bash
is_ajax():
```

---

# `IDIOMA`

`Determines whether the current locale is right-to-left (RTL).`

```bash
is_rtl();
```

---

# `MENSAJES`

`Prints messages and errors which are stored in the session, then clears them.`

```bash
wc_print_notices();
```

---

# `PLUGINS`

<h1 style="color: red; font-weight: 700">Prefix Everything</h1>

## `Header Requirements`

```bash
/*
 * Plugin Name:       My Basics Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.10.3
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       my-basics-plugin
 * Domain Path:       /languages
 * Requires Plugins:  my-plugin, yet-another-plugin
 */
```

## `Activation / Deactivation Hooks`

`register_activation_hook`

```bash
register_activation_hook( string $file, callable $callback )
```

`register_deactivation_hook`

```bash
register_deactivation_hook( string $file, callable $callback )
```

`register_uninstall_hook`

```bash
register_uninstall_hook( string $file, callable $callback )
```

## `BUENAS PRACTICAS`

`Check for Existing Implementations`

```bash
Variables: isset() (includes arrays, objects, etc.)
Functions: function_exists()
Classes: class_exists()
Constants: defined()
```

`Conditional Loading`

```bash
if ( is_admin() ) {
    // we are in admin mode
    require_once __DIR__ . '/admin/plugin-name-admin.php';
}
```

`Avoiding Direct File Access`

```bash
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}
```

---

# `WOOCOMMERCE`

```bash
// Get Order ID and Key
$order->get_id();
$order->get_order_key();

// Get Order Totals $0.00
$order->get_formatted_order_total();
$order->get_cart_tax();
$order->get_currency();
$order->get_discount_tax();
$order->get_discount_to_display();
$order->get_discount_total();
$order->get_fees();
$order->get_formatted_line_subtotal();
$order->get_shipping_tax();
$order->get_shipping_total();
$order->get_subtotal();
$order->get_subtotal_to_display();
$order->get_tax_location();
$order->get_tax_totals();
$order->get_taxes();
$order->get_total();
$order->get_total_discount();
$order->get_total_tax();
$order->get_total_refunded();
$order->get_total_tax_refunded();
$order->get_total_shipping_refunded();
$order->get_item_count_refunded();
$order->get_total_qty_refunded();
$order->get_qty_refunded_for_item();
$order->get_total_refunded_for_item();
$order->get_tax_refunded_for_item();
$order->get_total_tax_refunded_by_rate_id();
$order->get_remaining_refund_amount();

// Get and Loop Over Order Items
foreach ( $order->get_items() as $item_id => $item ) {
   $product_id = $item->get_product_id();
   $variation_id = $item->get_variation_id();
   $product = $item->get_product();
   $product_name = $item->get_name();
   $quantity = $item->get_quantity();
   $subtotal = $item->get_subtotal();
   $total = $item->get_total();
   $tax = $item->get_subtotal_tax();
   $taxclass = $item->get_tax_class();
   $taxstat = $item->get_tax_status();
   $allmeta = $item->get_meta_data();
   $somemeta = $item->get_meta( '_whatever', true );
   $product_type = $item->get_type();
}

// Other Secondary Items Stuff
$order->get_items_key();
$order->get_items_tax_classes();
$order->get_item_count();
$order->get_item_total();
$order->get_downloadable_items();
$order->get_coupon_codes();

// Get Order Lines
$order->get_line_subtotal();
$order->get_line_tax();
$order->get_line_total();

// Get Order Shipping
$order->get_shipping_method();
$order->get_shipping_methods();
$order->get_shipping_to_display();

// Get Order Dates
$order->get_date_created();
$order->get_date_modified();
$order->get_date_completed();
$order->get_date_paid();

// Get Order User, Billing & Shipping Addresses
$order->get_customer_id();
$order->get_user_id();
$order->get_user();
$order->get_customer_ip_address();
$order->get_customer_user_agent();
$order->get_created_via();
$order->get_customer_note();
$order->get_address_prop();
$order->get_billing_first_name();
$order->get_billing_last_name();
$order->get_billing_company();
$order->get_billing_address_1();
$order->get_billing_address_2();
$order->get_billing_city();
$order->get_billing_state();
$order->get_billing_postcode();
$order->get_billing_country();
$order->get_billing_email();
$order->get_billing_phone();
$order->get_shipping_first_name();
$order->get_shipping_last_name();
$order->get_shipping_company();
$order->get_shipping_address_1();
$order->get_shipping_address_2();
$order->get_shipping_city();
$order->get_shipping_state();
$order->get_shipping_postcode();
$order->get_shipping_country();
$order->get_address();
$order->get_shipping_address_map_url();
$order->get_formatted_billing_full_name();
$order->get_formatted_shipping_full_name();
$order->get_formatted_billing_address();
$order->get_formatted_shipping_address();

// Get Order Payment Details
$order->get_payment_method();
$order->get_payment_method_title();
$order->get_transaction_id();

// Get Order URLs
$order->get_checkout_payment_url();
$order->get_checkout_order_received_url();
$order->get_cancel_order_url();
$order->get_cancel_order_url_raw();
$order->get_cancel_endpoint();
$order->get_view_order_url();
$order->get_edit_order_url();

// Get Order Status
$order->get_status();

// Get Thank You Page URL
$order->get_checkout_order_received_url();
```

# `class wpdb {}`;

En WordPress, wpdb es una clase global de PHP que te permite interactuar con la base de datos de WordPress de manera segura y eficiente. Aquí te explico los puntos clave:

## `Metodos`

- `$wpdb->get_results()`: Para obtener resultados de una consulta SELECT.
- `$wpdb->insert()`: Para insertar datos en una tabla.
- `$wpdb->update()`: Para actualizar datos existentes.
- `$wpdb->delete()`: Para eliminar datos.
- `$wpdb->prepare()`: Para preparar consultas de forma segura.

# `class WP_Query {}`

# `get_posts()`

Retrieves an array of the latest posts, or posts matching the given criteria.

# `set_query_var()`

Sets the value of a query variable in the WP_Query class.

# `get_the_ID()`

Retrieves the ID of the current item in the WordPress Loop.

[TOP](#wordpress)
