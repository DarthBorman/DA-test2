<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Dudca_Agency_Test
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&family=Work+Sans:wght@400;700&display=swap"
          rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="site-wrap">
    <header class="header">
        <div class="header__mobile-panel"></div>
        <div class="content-wrap">
            <a href="#" class="header__logo">
                <img src="<?php echo get_template_directory_uri();?>/img/logo.svg" alt="logo">
            </a>
            <?php
            $args = array(
                'menu' => 'main-menu',
                'container'     => '',
                'depth'         => 2,
                'fallback_cb'   => false,
                'items_wrap'    => '<ul id="%1$s" class="main-menu">%3$s</ul>',
            );
            wp_nav_menu($args);
            ?>
            <a href="#" id="dad-mobile-btn">
                <div class="dad-span-1"></div>
                <div class="dad-span-2"></div>
                <div class="dad-span-3"></div>
            </a>
        </div>
        <div class="banner">
            <img src="<?php echo get_template_directory_uri();?>/img/banner-img.png" alt="banner-img" class="banner__img">
            <div class="banner__body">
                <div class="banner__frame">
                    <div class="banner__top-left"></div>
                    <div class="banner__top-right"></div>
                    <div class="banner__bottom-left"></div>
                    <div class="banner__bottom-right"></div>
                </div>
                <h1 class="banner__title">Workforce Survey</h1>
                <div class="banner__text">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis
                    praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi
                </div>
                <a href="#" class="banner__link">Start Now</a>
            </div>
        </div>
    </header>
