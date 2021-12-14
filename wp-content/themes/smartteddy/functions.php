<?php
/**
 * SmartTeddy functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package SmartTeddy
 */
/**
 * Подлючение carbon-fields
 */
use Carbon_Fields\Container;
use Carbon_Fields\Field;




add_action('after_setup_theme', 'crb_load');
function crb_load()
{
    require_once('inc/carbon-fields/vendor/autoload.php');
    \Carbon_Fields\Carbon_Fields::boot();
}

add_action( 'carbon_fields_register_fields', 'crb_register_custom_fields' );
function crb_register_custom_fields() {
    require_once __DIR__ . '/inc/custom-fields-option/theme-options.php';
    require_once __DIR__ . '/inc/custom-fields-option/tabs.php';
}
/**
 * Load WooCommerce compatibility file.
 */
//if ( class_exists( 'WooCommerce' ) ) {
//    require get_template_directory() . '/inc/woocommerce.php';
//}
/**
 * Подлючение скриптов и стилей
 */
require get_template_directory() . '/inc/enque-scripts-styles.php';
/**
 * Подлючение настроек темы
 */
require get_template_directory() . '/inc/theme-setting.php';
/**
 * Подлючение настроек widget
 */
require get_template_directory() . '/inc/widget-areas.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}



add_filter( 'woocommerce_enqueue_styles', '__return_false' );
function smartteddy_woocommerce_scripts()
{
    wp_enqueue_style('smartteddy-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);

    $font_path = WC()->plugin_url() . '/assets/fonts/';
    $inline_font = '@font-face {
			font-family: "star";
			src: url("' . $font_path . 'star.eot");
			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
				url("' . $font_path . 'star.woff") format("woff"),
				url("' . $font_path . 'star.ttf") format("truetype"),
				url("' . $font_path . 'star.svg#star") format("svg");
			font-weight: normal;
			font-style: normal;
		}';

    wp_add_inline_style('smartteddy-woocommerce-style', $inline_font);
}

add_action('wp_enqueue_scripts', 'smartteddy_woocommerce_scripts');
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');

function custom_override_checkout_fields($fields)
{
    /**
     * Отключение полей billing
     */
    unset($fields['billing']['billing_last_name']);
    unset($fields['billing']['billing_company']);
    unset($fields['billing']['billing_address_2']);
//    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);


    /**
     * отключение label у полей
     */
    foreach ($fields as $category => $value) {
        foreach ($fields[$category] as $field => $property) {
            unset($fields[$category][$field]['label']);
        }
    }
    /**
     * расстановка очередности выведения полей в форме заказа
     */
    $fields['billing']['billing_first_name']['priority'] = 5;
    $fields['billing']['billing_address_1']['priority'] = 2;
    $fields['billing']['billing_city']['priority'] = 4;
    $fields['billing']['billing_postcode']['priority'] = 6;
    $fields['billing']['billing_email']['priority'] = 1;
    $fields['billing']['billing_phone']['priority'] = 3;
    /**
     * добавление классов к полям формы заказа
     */
//    $fields['billing']['billing_postcode']['class'] = array('col-lg-6');
//    $fields['billing']['billing_phone']['class']   = array('col-lg-6');
//    $fields['billing']['billing_address_1']['class']   = array('col-lg-6');
//    $fields['billing']['billing_email']['class'] = array('col-lg-6');
//    $fields['billing']['billing_first_name']['class'] = array('col-lg-6');
//    $fields['billing']['billing_city']['class'] = array('col-lg-6');
//    $fields['billing']['billing_state']['class'] = array('col-lg-6 offset-lg-6');
//    $fields['order']['order_comments']['class'] = array('col-lg-6 offset-lg-6');

    /**
     * добавление placeholder поля формы заказа
     */
    $fields['billing']['billing_first_name']['placeholder'] = 'First and last name';
    $fields['billing']['billing_email']['placeholder'] = 'E-mail';
    $fields['billing']['billing_phone']['placeholder'] = 'Phone number';
    $fields['billing']['billing_address_1']['placeholder'] = 'Address';
    $fields['billing']['billing_city']['placeholder'] = 'City';
    $fields['billing']['billing_postcode']['placeholder'] = 'Zip code';
    $fields['billing']['billing_state']['placeholder'] = 'State';
    $fields['order']['order_comments']['placeholder'] = 'Comments for the delivery';
    $fields['billing']['billing_phone']['label'] = 'Optional';
    $fields['order']['order_comments']['label'] = 'Optional';
    /**
     * необязательные поля
     */
    $fields['billing']['billing_phone']['required'] = false;
    $fields['order']['order_comments']['required'] = false;


//    echo "<pre>";
//    print_r($fields);
//    echo "</pre>";

    return $fields;
}

add_filter('woocommerce_form_field', 'remove_checkout_optional_fields_label', 10, 4);


function remove_checkout_optional_fields_label($field, $key, $args, $value)
{
    // Only on checkout page
    if (is_checkout() && !is_wc_endpoint_url()) {
        $optional = '&nbsp;<span class="optional">(' . esc_html__('optional', 'woocommerce') . ')</span>';
        $field = str_replace($optional, '', $field);
    }
    return $field;
}

/**
 * удаление notice в корзине(cart) при обновлении
 */
remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
/**
 * удаление в пустой корзины (empty-cart) вывода информации
 */
remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );

