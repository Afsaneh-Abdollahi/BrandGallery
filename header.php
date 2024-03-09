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

<header class="main-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <button class="burger-menu mobile-menu"><i class="far fa-bars"></i></button>
                <a href="<?php echo home_url(); ?>" class="logo">
                    <img class="logo" src="<?php echo get_template_directory_uri() ?>/img/logo.jpg"
                         alt="logo">
                </a>
                <div class="left-icons">
                    <a href="<?php bloginfo('url'); ?>/cart/">
                        <i class="fas fa-shopping-cart" aria-hidden="true"></i>

                        <span class="cart-counter">
                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                            </span>
                    </a>
                    <a href="<?php bloginfo('url'); ?>/my-account/">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </a>
                </div>

                <div class="left-menu">
                    <ul>
                        <li>
                            <?php if (is_user_logged_in()) : ?>
                                <a class="header__details-user">
                                    <?php

                                    global $current_user;
                                    echo $current_user->display_name
                                    ?>
                                    <i class="fa fa-user" aria-hidden="true"></i>

                                </a>
                            <?php else : ?>
                                <a href="<?php echo get_permalink(get_option('woocommerce_myaccount_page_id')); ?>">
                                    <?php
                                    echo 'ورود | ثبت نام';
                                    ?>
                                    <i class="fa fa-user" aria-hidden="true"></i>

                                </a>
                            <?php endif; ?>

                            <?php
                            if (is_user_logged_in()) { ?>
                                <div class="user-menu-list">
                                    <ul>
                                        <li>
                                            <img src="<?php echo get_template_directory_uri() ?>/img/wallet-pro.svg"
                                                 alt="" class="wallet">
                                            <?php
                                            if (is_plugin_active('woo-wallet/woo-wallet.php')) {

                                                $title = __('Current wallet balance', 'woo-wallet');
                                                $menu_item = '<a class="woo-wallet-menu-contents" href="' . esc_url(wc_get_account_endpoint_url(get_option('woocommerce_woo_wallet_endpoint', 'woo-wallet'))) . '" title="' . $title . '">';
                                                $menu_item .= 'اعتبار: ';
                                                $menu_item .= woo_wallet()->wallet->get_wallet_balance(get_current_user_id());
                                                $menu_item .= '</a>';

                                                echo $menu_item;
                                            } else {
                                                echo '<a href="#" class="wc-Symbol">0 تومان</a>';
                                            }
                                            ?>
                                        </li>


                                        <li>
                                            <a href="" class="">
                                                <img src=""
                                                     alt="">
                                                پیشخوان
                                            </a>
                                        </li>

                                        <li>
                                            <a href="">
                                                <img src=""
                                                     alt="">
                                                سفارشات
                                            </a>
                                        </li>
                                        <li>
                                            <a href=""
                                               class="color">
                                                <img src=""
                                                     alt="">
                                                اطلاعات حساب کاربری
                                            </a>
                                        </li>
                                        <li class="log-out">
                                            <a href="">
                                                <img src=""
                                                     alt=""> خروج
                                            </a>
                                        </li>


                                    </ul>
                                </div>
                                <?php
                            }
                            ?>
                        </li>

                        <li>
                            <a href="<?php bloginfo('url'); ?>/cart/">سبد خرید <i
                                        class="fas fa-shopping-cart" aria-hidden="true"></i>
                            </a>
                            <span class="cart-counter">
                                <?php echo WC()->cart->get_cart_contents_count(); ?>
                            </span>
                        </li>

                    </ul>
                </div>
                <div class="clearfix"></div>


                <div class="row">
                    <div class="col-lg-12">

                        <div class="toparea menu">
                                <?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => 'ul')) ?>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="search-form" role="search">
                            <?php echo do_shortcode(get_field('search_shortcode', 'option') ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>



