<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <title><?php wp_title(''); ?><?php if (wp_title('', false)) {
            echo ' :';
        } ?><?php bloginfo('name'); ?></title>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="author" content="RamzArz"/>
    <meta name="keywords" content="RamzArz"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <?php wp_head(); ?>

</head>

<body <?php body_class();
$custom_logo_id = get_theme_mod('fe');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?> >

<header class="site_header">

    <div class="header-section">
        <div class="header-main">
            <div class="container">
                <div class="header-top">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="header-right">
                                <div class="search-box desktop">
                                    <?php echo do_shortcode(get_field('search_shortcode', 'option') ); ?>
                                </div>

                            </div>
                            <div class="header-left">
                                <a href="https://harirdibascarf.com/my-account/" class="account-box">
                                    <i class="fa-solid fa-user"></i>
                                    <?php $current_user = wp_get_current_user(); ?>
                                    <?php  if (is_user_logged_in()) {?>
                                        <span><?php echo $current_user->user_firstname ."  ". $current_user->user_lastname?></span>
                                    <?php }else { ?>
                                        <span>ورود / عضویت</span>
                                    <?php } ?>
                                </a>
                                <a href="<?php bloginfo('url'); ?>/cart/">
                                    <div class="header-cart">
                                        <i class="fas fa-shopping-cart"></i>
                                        <div class="cart_count"><span><?php echo WC()->cart->get_cart_contents_count(); ?></span></div>
                                    </div>
                                </a>
                            </div>
                            <div class="header-center">
                                <a href="<?php bloginfo('url'); ?>" class="header-logo">
                                    <img src="" alt="">
                                </a>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-box mobile">
                            <?php echo do_shortcode(get_field('search_shortcode', 'option') ); ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header-bottom">
                            <button class="burger-menu"><i class="fas fa-bars"></i></button>
                            <div class="header-menu">
                                <button class="close-menu"><i class="fa fa-times"></i></button>
                                <a href="<?php bloginfo('url'); ?>" class="header-logo">
                                    <img src="" alt="">
                                </a>
                                <nav>
                                    <?php wp_nav_menu(array('theme_location' => 'header-main-menu', 'container' => 'ul')) ?>
                                </nav>
                            </div>
                            <?php if (have_rows('social_media_repeater', 'option')): ?>
                                <ul class="header-social">
                                    <?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
                                        <li><a href="<?php echo get_sub_field('link') ?>"><i
                                                        class="fab <?php echo get_sub_field('icon') ?>"></i></a></li>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                </ul>
                                <div class="clearfix"></div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>



