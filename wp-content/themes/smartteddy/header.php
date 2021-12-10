<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package SmartTeddy
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/icons/header-logo-green.svg" sizes="16x16" >
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="access" role="navigation">

</div>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="header__wrap col-lg-12">
                <div class="header__logo">
                    <a href="/" class="header__logo-link">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/logo__icon.svg" alt="">
                    </a>
                </div>
                <div class="header__inner">
                    <?php menu_top_header();?>
                    <div class="header__btn">
                        <a href="<?= is_home()?>/cart/?add-to-cart=22" class="header__btn-link">Buy now</a>
                    </div>
                    <div class="header__nav-mobile">
                        <a href="#" class="nav__mobile-icon_link">
                            <span class="header__logo-burger"></span>
                        </a>
                    </div>
                </div>
                <?php menu_mobile_header();?>
            </div>

        </div>
    </div>
</header>
