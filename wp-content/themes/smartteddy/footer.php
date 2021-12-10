
<footer class="footer">
    <div class="cookies__wrap">
        <? get_template_part('template-parts/cookies'); ?>
    </div>

    <!--    --><? //get_template_part( 'template-parts/newsletter' );?>
    <div class="newsletter__form-wrap">
        <?php echo do_shortcode('[newsletter_form form="1"]'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-2 col-sm-3 col-3">
                <a href="<?= is_home() ?>" class="footer__logo-link">
                    <img class="footer__logo"
                         src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/footer__logo.svg" alt="">
                </a>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-9 col-9 d-sm-flex flex-sm-column-reverse d-md-block d-flex flex-column">
                <div class="footer__contacts order-1">
                    <a href="tel:+79295065403" class="footer__tel">(929) 506 5403</a>
                    <a href="mailto:hello@smartteddy.store" class="footer__email">hello@smartteddy.store</a>
                </div>
                <div class="footer__social-network">
                    <a href="https://www.instagram.com/my_smartteddy/">
                        <div class="social__network-wrap">
                            <span class="social__network-youtube"></span>
                        </div>
                    </a>
                    <a href="https://www.instagram.com/my_smartteddy/">
                        <div class="social__network-wrap">
                            <span class="social__network-insta"></span>
                        </div>
                    </a>

                </div>
            </div>
            <div class="col-lg-3 col-md-5 col-sm-9 col-9 offset-sm-3 offset-3 offset-md-0">
                <?php menu_bottom_footer(); ?>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12 d-sm-flex d-md-flex d-flex d-lg-block  justify-content-center flex-column align-items-center">
                <div class="footer__pay">
                    <span class="footer__icon-pay"></span>
                </div>
                <div class="footer__c">© Mishka Ai Inc. 2021</div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

<script>
    // EDIT
    // Attaching to a button click (jQuery 1.7+) and set cookie
    $("#cookie__close").on("click", function () {
        $.cookie('the_cookie', 'the_value', {expires: 7, path: '/'});
    });
    // Attaching to a button click (jQuery < 1.7) and set cookie
    $(".cookie__btn-decline, .cookie__notice-icon").click(function () {
        $.removeCookie('the_cookie');
    });

    function windowUpCook() {
        document.getElementsByClassName('cookies__wrap')[0].style.display = "block";
        document.body.style.backgroundColor = 'rgba(0,0,0,0.5)';
    }

    if ($.cookie('the_cookie') == null) {
        console.log($.cookie('the_cookie'));
        setTimeout('windowUpCook();', 5000);
    }

    function windowCloseCook() {
        document.getElementsByClassName('cookies__wrap')[0].style.display = "none";
        document.body.style.backgroundColor = '#EEEEEE';
    }
</script>