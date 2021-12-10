<?php
/*
Template Name: How Smart Teddy works
*/
?>
<?get_header();?>
    <section class=" container__bg-smartworks">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex d-sm-block justify-content-center">
                    <h3 class="smartworks__title">Easy to use.<br> Easy to love.</h3>
                    <h3 class="smartworks__title-mob"><span>Easy to use. Easy to love.</span></h3>
                </div>
                <div class="col-lg-12">
                    <div class="smartworks__img-wrap">
                        <span class="smartworks__img"></span>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="smartworks__btn-inner"><div class="smartworks__btn-wrap">
<!--                            <a href="" class="smartworks__btn-link">Download the setup guide</a>-->
                            <?php the_content();?>
                        </div></div>

                </div>
        </div>

    </section>
<?get_template_part( 'template-parts/block-10' );?>
<?get_template_part( 'template-parts/block-5' );?>
<?get_footer();?>