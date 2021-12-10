<?php
/**
 * Checkout Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/form-checkout.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.0
 */

if (!defined('ABSPATH')) {
    exit;
}

//do_action('woocommerce_before_checkout_form', $checkout);

// If checkout registration is disabled and not logged in, the user cannot checkout.
if (!$checkout->is_registration_enabled() && $checkout->is_registration_required() && !is_user_logged_in()) {
    echo esc_html(apply_filters('woocommerce_checkout_must_be_logged_in_message', __('You must be logged in to checkout.', 'woocommerce')));
    return;
}
?>

<h1 class="checkout__title"><span>Checkout</span></h1>
<div class="container form__checkout-wrap">
    <div class="row">
        <div class="col-lg-12">
            <form name="checkout" method="post" class="checkout row woocommerce-checkout form__checkout-wrap_mob"
                  action="<?php echo esc_url(wc_get_checkout_url()); ?>" enctype="multipart/form-data">

                <?php if ($checkout->get_checkout_fields()) : ?>

                    <?php  do_action('woocommerce_checkout_before_customer_details'); ?>

                    <div id="customer_details" class="col-lg-8">

                        <?php do_action('woocommerce_checkout_billing'); ?>


                        <?php do_action('woocommerce_checkout_shipping'); ?>

                    </div>

<!--                    --><?php //do_action('woocommerce_checkout_after_customer_details'); ?>

                <?php endif; ?>

                <?php do_action('woocommerce_checkout_before_order_review_heading'); ?>

                <div id="order_review" class="woocommerce-checkout-review-order col-lg-4">
                    <div class="row">  <?php do_action( 'woocommerce_checkout_order_review' ); ?></div>
                </div>
                <?php do_action('woocommerce_checkout_before_order_review'); ?>

                <?php do_action('woocommerce_checkout_after_order_review'); ?>

            </form>
        </div>
    </div>
</div>



