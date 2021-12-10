<?php
/*
Template Name: Cart
*/
?>
<? get_header(); ?>
<?php if(is_page('cart')){?>
    <style>
        .woocommerce-notices-wrapper {
            display: none !important;
        }
    </style>
<?php } ?>
<section class="container__cart-bg">
    <div class="container ">
        <div class="row">
            <div class="col-lg-12">
                <?php echo do_shortcode('[woocommerce_cart]'); ?>
            </div>
        </div>
    </div>
</section>

        <? get_template_part('template-parts/block-checkout'); ?>

<? get_footer(); ?>


