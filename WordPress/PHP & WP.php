<?PHP

//ULTIMA VERSION PHP 8.3 23 Nov 2023
//ULTIMA VERSION WORDPRESS 6.6.2 September 10, 2024

//---------------------WORDPRESS-----------------------------------------------------

//Displays information about the current site. name,description,wpurl,url,admin_email,version...
bloginfo( string $show = '' )

//Determines whether current WordPress query has posts to loop over.
have_posts()

//Iterate the post index in the loop.
the_post()

//Displays or retrieves the current post title with optional markup.
the_title( string $before = '', string $after = '', bool $echo = true )

//Displays the post content.
the_content( string $more_link_text = null, bool $strip_teaser = false )

//Displays the permalink for the current post.
the_permalink( int|WP_Post $post )

//Fire the wp_head action.
wp_head()

//Load header template.
get_header( string $name = null, array $args = array() )

//Load footer template.
get_footer( string $name = null, array $args = array() )

//Registers theme support for a given feature.
add_theme_support( string $feature, mixed $args )

//Fires after the theme is loaded.
do_action( 'after_setup_theme' )

//---------------------PRINCIPALES-----------------------------------------------------

//Adds a callback function to an action hook.
add_action( string $hook_name, callable $callback, int $priority = 10, int $accepted_args = 1 );

//Calls the callback functions that have been added to an action hook. (To create a custom hook)
do_action( string $hook_name, mixed $arg );

//Adds a callback function to a filter hook.
add_filter( string $hook_name, callable $callback, int $priority = 10, int $accepted_args = 1 );

//Calls the callback functions that have been added to a filter hook. (To create a custom hook)
apply_filters();

//HTML dentro de PHP
$php_inside_html = '<span> '. $php_dentro_html .' </span>'

//PHP dentro de HTML
<p id="id" class='class'><?php print_r($last_order) ?></p>

//Define una constante que no puede ser modificada
define(string $name, mixed $value, bool $case_insensitive = false): bool

//Comprueba si existe una constante con nombre dada
defined(string $name);

//Debug en WordPress
define( 'WP_DEBUG', true );

//Se evita acceder a la carpeta directamente
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

//-------------------REGISTRAR ARCHIVOS JS, CSS Y PHP--------------------------------

//Registers a script to be enqueued later using the wp_enqueue_script() function.
wp_register_script( string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );

//Registers the script if $src provided (does NOT overwrite), and enqueues it.
wp_enqueue_script( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, bool $in_footer = false );

//Localize a script. Works only if the script has already been added.
wp_localize_script( string $handle, string $object_name, array $l10n );

//Register a CSS stylesheet.
wp_register_style( string $handle, string|bool $src, string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );

//Enqueue a CSS stylesheet. Registers the style if source provided (does NOT overwrite) and enqueues.
wp_enqueue_style( string $handle, string $src = '', string[] $deps = array(), string|bool|null $ver = false, string $media = 'all' );

//Retrieves stylesheet directory URI for the active theme.  //http://localhost/wordpress/wp-content/themes/phoenix
get_stylesheet_directory_uri()

//Retrieves stylesheet URI for the active theme. //http://localhost/wordpress/wp-content/themes/phoenix/style.css
get_stylesheet_uri()

//Es parecido al include solo que si no encuentra el archivo se produce un fatal error
require('somefile.php');

//La sentencia require_once es idéntica a require excepto que PHP verificará si el archivo ya ha sido incluido y si es así, no se incluye (require) de nuevo.
require_once(__ROOT__.'/config.php');
require_once('includes/config.php');

//Incluye un archivo, si no se encuentra devuelve una advertencia
include 'vars.php';

//url del plugin
plugin_dir_url( __FILE__ ) ;//your-url.com/wp-content/plugins/your-plugin/

//url de la carpeta en el sistem
plugin_dir_path( string $file ); // home/user/var/www/wordpress/wp-content/plugins/my-plugin/

//Retrieves the URL of a file in the theme.
get_theme_file_uri( string $file = '' )

//Retrieves the URL for the current site where WordPress application files (e.g. wp-blog-header.php or the wp-admin/ folder) are accessible.
site_url( string $path = '', string|null $scheme = null )

//Retrieves the full permalink for the current post or post ID.
get_permalink( int|WP_Post $post, bool $leavename = false )

//Retrieves the post title.
get_the_title( int|WP_Post $post )

//Returns the ID of the post’s parent.
wp_get_post_parent_id( int|WP_Post|null $post = null )

//-------------------------------REGISTRAR CAMPOS-----------------------------------------

//Registers a setting and its data.
register_setting( string $option_group, string $option_name, array $args = array() );

//Add a new section to a settings page.
add_settings_section( string $id, string $title, callable $callback, string $page );

//Add a new field to a section of a settings page.
add_settings_field( string $id, string $title, callable $callback, string $page, string $section = 'default', array $args = array() );

//------------------------ADD MENU PAGE------------------------------------------

//Add a top-level menu page.
add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null );

//Add a submenu page.
add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', int $position = null );

//Retrieves an option value based on an option name.
get_option( string $option, mixed $default = false );

//Renders an editor.
wp_editor( string $content, string $editor_id, array $settings = array() );

//Adds a new shortcode.
add_shortcode( string $tag, callable $callback );

//Sends an email, similar to PHP’s mail function.
wp_mail( string|string[] $to, string $subject, string $message, string|string[] $headers = '', string|string[] $attachments = array() );
 
//------------------------------------------SEGURIDAD & TRADUCCION--------------------------------------

//Retrieve or display nonce hidden field for forms.
wp_nonce_field( int|string $action = -1, string $name = '_wpnonce', bool $referer = true, bool $echo = true );

//sanitazes a string from user input or from database
sanitaze_text_field( string $str);

//sanitaze textareas
sanitaze_textarea_field( string $str);

//Filters text content and strips out disallowed HTML
wp_kses( string $string, array[]|string $allowed_html, string[] $allowed_protocols = array());

//Sanitazes content for allowed HTML tags for post content  
wp_kses_post( string $data);

//cuando queremos mostrar una información
esc_html();
    //Ej
    <h4><?php echo esc_html( $title ); ?></h4>

//lo mismo pero para las URLS
esc_url();

//JS
esc_js();

//atributos
esc_attr();

//textarea
esc_textarea();

//PHP hace echo y sanitaze a la ves (translate)
esc_html__();

//HTML hace echo y sanitaze a la ves (translate)
esc_html_e();

//Display translated text.
_e();

//Retrieve the translation of $text.
__( string $text, string $domain = 'default' );

//-----------------------------------------USUARIO--------------------------------------------

//Determines whether the current visitor is a logged in user.
is_user_logged_in();

//-----------------------------------------AJAX--------------------------------------------

//Returns true when the page is loaded via ajax.
is_ajax():

//-----------------------------------------IDIOMA--------------------------------------------
//Determines whether the current locale is right-to-left (RTL).
is_rtl();

//-----------------------------------------MENSAJES--------------------------------------------

//Prints messages and errors which are stored in the session, then clears them.
wc_print_notices(); 

//-----------------------------------------PHP--------------------------------------------

//Imprime algo
echo Hola;

//Determina si una variable está definida y no es null
if (isset($var)) {
    echo "Esta variable está definida, así que se imprimirá";
}

//Reemplaza todas las apariciones del string buscado con el string de reemplazo
str_replace();
    //Ej
    $bodytag = str_replace("%body%", "black", "<body text='%body%'>");

// Version PHP
phpversion();

//Devuelve el valor de una directiva de configuración
ini_get();

//Muestra información sobre la configuración de PHP
phpinfo();

//Obtiene el valor entero de una variable retorna 0 si esta lleno 1 si es vacio
intval();

//Obtiene la longitud de un string
strlen();

//Verifica si una variable esta vacia. The empty() function does not generate a warning if the variable does not exist. That means empty() is equivalent to !isset($var) || $var == false.
empty();

//Imprimir Array
print_r();

//Imprimir una cadena con formato
printf();

//Devuelve true si la funcion existe
function_exists();

//Verifica si la clase ha sido definida
class_exists();

//Comprueba si un valor existe en un array
in_array();

//Retrasa la ejecución del programa durante el número de segundos dados por seconds.
sleep();

//-----------------------------------------WOOCOMMERCE--------------------------------------------

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




ADD CUSTOM JS file

function enqueue_custom_js() {
    wp_enqueue_script('custom-js', trailingslashit( get_stylesheet_directory_uri() )  . '/js.js', array('jquery'), '1.0', true);
}
add_action('wp_enqueue_scripts', 'enqueue_custom_js');


Header Requirements

Activation / Deactivation Hooks
    register_activation_hook
    register_deactivation_hook
    register_uninstall_hook

    BUENAS PRACTICAS

Prefix Everything

Check for Existing Implementations

Variables: isset() (includes arrays, objects, etc.)
Functions: function_exists()
Classes: class_exists()
Constants: defined()

Conditional Loading
if ( is_admin() ) {
    // we are in admin mode
    require_once __DIR__ . '/admin/plugin-name-admin.php';
}

Avoiding Direct File Access
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

Architecture Patterns



directories https://developer.wordpress.org/plugins/plugin-basics/determining-plugin-and-content-directories/



file_exists

file_get_contents
