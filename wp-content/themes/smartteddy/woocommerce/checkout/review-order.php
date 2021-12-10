<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 5.2.0
 */

defined('ABSPATH') || exit;
?>


<div class="col-md-6 col-lg-12">

    <?
    /**
     * Доставка
     */

    ?>
    <h3 class="checkbox__title-wrap">3. Shipping method</h3>
    <?php if (WC()->cart->needs_shipping() && WC()->cart->show_shipping()) : ?>
        <?php wc_cart_totals_shipping_html(); ?>
    <?php endif; ?>

</div>
<div class="col-md-6 col-lg-12">

    <?
    /**
     * Методы оплаты
     */
    ?>
    <h3 class="checkbox__title-wrap">4. Payment</h3>


    <?
    /**
     * Итоговая цена
     */
    ?>
    <div class="checkout__total-wrap">
        <span class="woocommerce-Price-amount">Total:</span>
        <?php wc_cart_totals_order_total_html(); ?>
        <span class="checkout__total-desc">Including delivery</span>
    </div>
    <? do_action('woocommerce_before_checkout_form', $checkout); ?>
</div>




