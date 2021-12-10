<?php
/**
 * WooCommerce Compatibility File
 *
 * @link https://woocommerce.com/
 *
 * @package SmartTeddy
 */

/**
 * WooCommerce setup function.
 *
 * @link https://docs.woocommerce.com/document/third-party-custom-theme-compatibility/
 * @link https://github.com/woocommerce/woocommerce/wiki/Enabling-product-gallery-features-(zoom,-swipe,-lightbox)
 * @link https://github.com/woocommerce/woocommerce/wiki/Declaring-WooCommerce-support-in-themes
 *
 * @return void
 */

//add_filter( 'woocommerce_enqueue_styles', '__return_false' );
/**
 * WooCommerce specific scripts & stylesheets.
 *
 * @return void
 */
//function smartteddy_woocommerce_scripts()
//{
//    wp_enqueue_style('smartteddy-woocommerce-style', get_template_directory_uri() . '/woocommerce.css', array(), _S_VERSION);
//
//    $font_path = WC()->plugin_url() . '/assets/fonts/';
//    $inline_font = '@font-face {
//			font-family: "star";
//			src: url("' . $font_path . 'star.eot");
//			src: url("' . $font_path . 'star.eot?#iefix") format("embedded-opentype"),
//				url("' . $font_path . 'star.woff") format("woff"),
//				url("' . $font_path . 'star.ttf") format("truetype"),
//				url("' . $font_path . 'star.svg#star") format("svg");
//			font-weight: normal;
//			font-style: normal;
//		}';
//
//    wp_add_inline_style('smartteddy-woocommerce-style', $inline_font);
//}
//
//add_action('wp_enqueue_scripts', 'smartteddy_woocommerce_scripts');

/**
 * Disable the default WooCommerce stylesheet.
 *
 * Removing the default WooCommerce stylesheet and enqueing your own will
 * protect you during WooCommerce core updates.
 *
 * @link https://docs.woocommerce.com/document/disable-the-default-stylesheet/
 */
add_filter('woocommerce_enqueue_styles', '__return_empty_array');

/**
 * Add 'woocommerce-active' class to the body tag.
 *
 * @param array $classes CSS classes applied to the body tag.
 * @return array $classes modified to include 'woocommerce-active' class.
 */
function smartteddy_woocommerce_active_body_class($classes)
{
    $classes[] = 'woocommerce-active';

    return $classes;
}

add_filter('body_class', 'smartteddy_woocommerce_active_body_class');

/**
 * Related Products Args.
 *
 * @param array $args related products args.
 * @return array $args related products args.
 */
function smartteddy_woocommerce_related_products_args($args)
{
    $defaults = array(
        'posts_per_page' => 3,
        'columns' => 3,
    );

    $args = wp_parse_args($defaults, $args);

    return $args;
}

add_filter('woocommerce_output_related_products_args', 'smartteddy_woocommerce_related_products_args');

/**
 * Remove default WooCommerce wrapper.
 */
remove_action('woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action('woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

if (!function_exists('smartteddy_woocommerce_wrapper_before')) {
    /**
     * Before Content.
     *
     * Wraps all WooCommerce content in wrappers which match the theme markup.
     *
     * @return void
     */
    function smartteddy_woocommerce_wrapper_before()
    {
        ?>
        <main id="primary" class="site-main">
        <?php
    }
}
add_action('woocommerce_before_main_content', 'smartteddy_woocommerce_wrapper_before');

if (!function_exists('smartteddy_woocommerce_wrapper_after')) {
    /**
     * After Content.
     *
     * Closes the wrapping divs.
     *
     * @return void
     */
    function smartteddy_woocommerce_wrapper_after()
    {
        ?>
        </main><!-- #main -->
        <?php
    }
}
add_action('woocommerce_after_main_content', 'smartteddy_woocommerce_wrapper_after');

/**
 * Sample implementation of the WooCommerce Mini Cart.
 *
 * You can add the WooCommerce Mini Cart to header.php like so ...
 *
 * <?php
 * if ( function_exists( 'smartteddy_woocommerce_header_cart' ) ) {
 * smartteddy_woocommerce_header_cart();
 * }
 * ?>
 */

if (!function_exists('smartteddy_woocommerce_cart_link_fragment')) {
    /**
     * Cart Fragments.
     *
     * Ensure cart contents update when products are added to the cart via AJAX.
     *
     * @param array $fragments Fragments to refresh via AJAX.
     * @return array Fragments to refresh via AJAX.
     */
    function smartteddy_woocommerce_cart_link_fragment($fragments)
    {
        ob_start();
        smartteddy_woocommerce_cart_link();
        $fragments['a.cart-contents'] = ob_get_clean();

        return $fragments;
    }
}
add_filter('woocommerce_add_to_cart_fragments', 'smartteddy_woocommerce_cart_link_fragment');

if (!function_exists('smartteddy_woocommerce_cart_link')) {
    /**
     * Cart Link.
     *
     * Displayed a link to the cart including the number of items present and the cart total.
     *
     * @return void
     */
    function smartteddy_woocommerce_cart_link()
    {
        ?>
        <a class="cart-contents" href="<?php echo esc_url(wc_get_cart_url()); ?>"
           title="<?php esc_attr_e('View your shopping cart', 'smartteddy'); ?>">
            <?php
            $item_count_text = sprintf(
            /* translators: number of items in the mini cart. */
                _n('%d item', '%d items', WC()->cart->get_cart_contents_count(), 'smartteddy'),
                WC()->cart->get_cart_contents_count()
            );
            ?>
            <span class="amount"><?php echo wp_kses_data(WC()->cart->get_cart_subtotal()); ?></span> <span
                    class="count"><?php echo esc_html($item_count_text); ?></span>
        </a>
        <?php
    }
}

if (!function_exists('smartteddy_woocommerce_header_cart')) {
    /**
     * Display Header Cart.
     *
     * @return void
     */
    function smartteddy_woocommerce_header_cart()
    {
        if (is_cart()) {
            $class = 'current-menu-item';
        } else {
            $class = '';
        }
        ?>
        <ul id="site-header-cart" class="site-header-cart">
            <li class="<?php echo esc_attr($class); ?>">
                <?php smartteddy_woocommerce_cart_link(); ?>
            </li>
            <li>
                <?php
                $instance = array(
                    'title' => '',
                );

                the_widget('WC_Widget_Cart', $instance);
                ?>
            </li>
        </ul>
        <?php
    }
}


//add_filter('woocommerce_checkout_fields', 'custom_override_checkout_fields');
//
//function custom_override_checkout_fields($fields)
//{
//    /**
//     * Отключение полей billing
//     */
//    unset($fields['billing']['billing_last_name']);
//    unset($fields['billing']['billing_company']);
//    unset($fields['billing']['billing_address_2']);
////    unset($fields['billing']['billing_country']);
//    unset($fields['billing']['billing_state']);
//
//
//    /**
//     * отключение label у полей
//     */
//    foreach ($fields as $category => $value) {
//        foreach ($fields[$category] as $field => $property) {
//            unset($fields[$category][$field]['label']);
//        }
//    }
//    /**
//     * расстановка очередности выведения полей в форме заказа
//     */
//    $fields['billing']['billing_first_name']['priority'] = 5;
//    $fields['billing']['billing_address_1']['priority'] = 2;
//    $fields['billing']['billing_city']['priority'] = 4;
//    $fields['billing']['billing_postcode']['priority'] = 6;
//    $fields['billing']['billing_email']['priority'] = 1;
//    $fields['billing']['billing_phone']['priority'] = 3;
//    /**
//     * добавление классов к полям формы заказа
//     */
////    $fields['billing']['billing_postcode']['class'] = array('col-lg-6');
////    $fields['billing']['billing_phone']['class']   = array('col-lg-6');
////    $fields['billing']['billing_address_1']['class']   = array('col-lg-6');
////    $fields['billing']['billing_email']['class'] = array('col-lg-6');
////    $fields['billing']['billing_first_name']['class'] = array('col-lg-6');
////    $fields['billing']['billing_city']['class'] = array('col-lg-6');
////    $fields['billing']['billing_state']['class'] = array('col-lg-6 offset-lg-6');
////    $fields['order']['order_comments']['class'] = array('col-lg-6 offset-lg-6');
//
//    /**
//     * добавление placeholder поля формы заказа
//     */
//    $fields['billing']['billing_first_name']['placeholder'] = 'First and last name';
//    $fields['billing']['billing_email']['placeholder'] = 'E-mail';
//    $fields['billing']['billing_phone']['placeholder'] = 'Phone number';
//    $fields['billing']['billing_address_1']['placeholder'] = 'Address';
//    $fields['billing']['billing_city']['placeholder'] = 'City';
//    $fields['billing']['billing_postcode']['placeholder'] = 'Zip code';
//    $fields['billing']['billing_state']['placeholder'] = 'State';
//    $fields['order']['order_comments']['placeholder'] = 'Comments for the delivery';
//    $fields['billing']['billing_phone']['label'] = 'Optional';
//    $fields['order']['order_comments']['label'] = 'Optional';
//    /**
//     * необязательные поля
//     */
//    $fields['billing']['billing_phone']['required'] = false;
//    $fields['order']['order_comments']['required'] = false;
//
//
////    echo "<pre>";
////    print_r($fields);
////    echo "</pre>";
//
//    return $fields;
//}

/**
 * добавление кастомного поля Штата(региона), т.к. по дефолту select, а нужно input
 */
//add_filter('woocommerce_default_address_fields', 'art_override_default_address_fields');
//function art_override_default_address_fields($address_fields)
//{
////        echo "<pre>";
////    print_r($address_fields);
////    echo "</pre>";
//    $address_fields['billing_state']['type'] = 'select';
//    $address_fields['billing_state']['priority'] = 9;
//    $address_fields['billing_state']['required'] = true;
//    $address_fields['billing_state']['placeholder'] = __('Enter state', 'my_theme_slug');
//    return $address_fields;
//}

/**
 * удаление option у label "(необязательно)"
 */
//add_filter('woocommerce_form_field', 'remove_checkout_optional_fields_label', 10, 4);
//function remove_checkout_optional_fields_label($field, $key, $args, $value)
//{
//    // Only on checkout page
//    if (is_checkout() && !is_wc_endpoint_url()) {
//        $optional = '&nbsp;<span class="optional">(' . esc_html__('optional', 'woocommerce') . ')</span>';
//        $field = str_replace($optional, '', $field);
//    }
//    return $field;
//}
///**
// * удаление notice в корзине(cart) при обновлении
// */
//remove_action( 'woocommerce_before_cart', 'woocommerce_output_all_notices', 10 );
///**
// * удаление в пустой корзины (empty-cart) вывода информации
// */
//remove_action( 'woocommerce_cart_is_empty', 'wc_empty_cart_message', 10 );


///**
// * @return void
// * @throws Exception
// * Выводит товар в козину при попадании на сайт, если меняется id товара, то и сдесь его надо менять
// */
//function truemisha_add_product_to_cart() {
//    // сначала определяемся с ID товара
//    $product_id = 22;
//    if ( !is_page('cart')) {
//        WC()->cart->empty_cart(); // если хотите сначала очистить корзину
//        WC()->cart->add_to_cart( $product_id );
//    }
//}
//add_action( 'template_redirect', 'truemisha_add_product_to_cart' );
