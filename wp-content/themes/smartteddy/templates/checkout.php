<?php
/*
Template Name: Checkout
*/
?>
<?php
/**
 * При успешном заказе на странице /checkout/order-received/ меняем нижний оступ
 */
if(is_wc_endpoint_url('order-received') ){
    ?>
    <style>
        .checkout__wrap {
            padding-bottom: 100px !important;
        }
    </style>
<?php
}

?>
<? get_header(); ?>
    <div class="checkout__wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="checkout__img-wrap d-block d-sm-none">
                        <img class="checkout__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/checkout-img-mob.svg"></img>
                    </div>
                </div>
            </div>
        </div>
        <?php echo do_shortcode('[woocommerce_checkout]'); ?>
        <? get_template_part('template-parts/block-checkout'); ?>
    </div>
<? get_footer(); ?>


