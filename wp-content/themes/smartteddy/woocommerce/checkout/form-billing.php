<?php
/**
 * Checkout billing information form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-billing.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 * @global WC_Checkout $checkout
 */

defined('ABSPATH') || exit;
?>
<div class="container">
    <div class="row">
        <?php do_action( 'woocommerce_before_checkout_billing_form', $checkout ); ?>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h3 class="checkbox__title-wrap">1. Contact information</h3>
            <?
            /**
             * Поля формы заказа Contact information
             */
            $fields = $checkout->get_checkout_fields('billing');
            $fields = array_filter($fields, static function ($data, $name) {
                return in_array($name, ['billing_email', 'billing_phone', 'billing_first_name'], true);
            }, ARRAY_FILTER_USE_BOTH);

            foreach ($fields as $key => $field) {
                woocommerce_form_field($key, $field, $checkout->get_value($key));
            }
            ?>

        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
            <h3 class="checkbox__title-wrap checkbox__title-wrap_mob">2. Shipping information</h3>
            <?
            /**
             * Поля формы заказа Shipping information
             */
            $fields = $checkout->get_checkout_fields('billing');
            //var_dump($fields);
            $fields = array_filter($fields, static function ($data, $name) {
                return in_array($name, ['billing_address_1', 'billing_city', 'billing_postcode', 'billing_billing_state', 'billing_state', 'billing_country'], true);
            }, ARRAY_FILTER_USE_BOTH);

            foreach ($fields as $key => $field) {

                woocommerce_form_field($key, $field, $checkout->get_value($key));
            }
            ?>
            <?php do_action( 'woocommerce_after_checkout_billing_form', $checkout ); ?>
            <?
            /**
             * Комментарий к заказу
             */
            ?>
            <? foreach ($checkout->get_checkout_fields('order') as $key => $field) : ?>
                <? woocommerce_form_field($key, $field, $checkout->get_value($key)); ?>
            <? endforeach; ?>
        </div>
<!--        <div class="col-lg-4 col-md-12 col-sm-12">-->
<!--            <div id="order_review" class="woocommerce-checkout-review-order row">-->
<!--                --><?php //do_action('woocommerce_checkout_order_review'); ?>
<!--            </div>-->
<!--        </div>-->
        <div class="col-lg-12 col-md-12 d-none d-sm-block">
            <?/**
             *Мишка картинка
             */
            ?>
            <div class="checkout__img-wrap">
                <img class="checkout__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/checkout-img.svg"></img>
            </div>
        </div>
    </div>
</div>


