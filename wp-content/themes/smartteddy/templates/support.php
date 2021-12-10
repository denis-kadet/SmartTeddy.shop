<?php
/*
Template Name: Support
*/
?>
<?get_header();?>
<?php
$support_tel = carbon_get_theme_option('support__contacts-tel');
$support_tel_field = carbon_get_theme_option('support__contacts-tel-field');
$support_time = carbon_get_theme_option('support__contacts-time');
$support_email = carbon_get_theme_option('support__contacts-email');
?>
<main class="main">
<section class="section support__section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-4  col-sm-8 col-8">
                <div class="support__contacts">
                    <a href="tel:<?= esc_html($support_tel_field) ?>" class="support__tel"><?= esc_html($support_tel) ?></a>
                    <div class="support__contact-desc"><?= esc_html($support_time) ?></div>
                    <a href="mailto:<?= esc_html($support_email) ?>" class="support__email"><?= esc_html($support_email) ?></a>
                    <span class="support__contact-arrows"></span>
                </div>

            </div>
            <div class="col-lg-4 col-lg-4 col-sm-4 col-4">
                <div class="support__img-wrap">
                    <img class="support__img" src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/support-bear.svg" alt="">
                </div>
            </div>
            <div class="col-lg-8 col-lg-8  col-sm-12 col-12">
                <?php echo do_shortcode('[contact-form-7 id="27" title="Subscribe"]'); ?>
            </div>
        </div>
    </div>

</section>
    <section class="support__section support__section-1">
        <div class="container support__bg">
            <div class="row support__bg-mob">
                <?get_template_part( 'template-parts/support-1' );?>
                <?get_template_part( 'template-parts/support-2' );?>
                <?get_template_part( 'template-parts/support-3' );?>
                <?get_template_part( 'template-parts/support-4' );?>
            </div>
        </div>
    </section>
</main>
<?get_footer();?>