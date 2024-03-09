<?php
/**
 * The template for displaying the footer
 */
?>

<!-- footer -->

<footer class="footer">
    <div class="container-fluid">

        <?php if (have_rows('services_repeater', 'option')): ?>
            <section>
                <div class="service-section">
                    <div class="row">
                        <?php while (have_rows('services_repeater', 'option')) : the_row(); ?>
                            <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                                <img src="<?php echo get_sub_field('img'); ?>" alt="">
                                <div>
                                    <h4><?php echo get_sub_field('title') ?></h4>
                                    <span class="text-muted"><?php echo get_sub_field('description') ?></span>
                                </div>
                            </div>
                        <?php endwhile;
                        wp_reset_query(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <div class="main_footer">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                    <div class="menu">
                        <?php
                        if (has_nav_menu('footer-menu1')) { ?>
                            <h4><?php echo get_field('footer_menu_title') ?></h4>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu1',
                                    'menu' => '',
                                    'container' => false,
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                    <div class="menu">
                        <?php
                        if (has_nav_menu('footer-menu2')) { ?>
                            <h4><?php echo get_field('footer_menu_title') ?></h4>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu2',
                                    'menu' => '',
                                    'container' => false,
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                    <div class="menu">
                        <?php
                        if (has_nav_menu('footer-menu3')) { ?>
                            <h4><?php echo get_field('footer_menu_title') ?></h4>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu3',
                                    'menu' => '',
                                    'container' => false,
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-12 mb-1 d-flex">
                    <div class="menu">
                        <?php
                        if (has_nav_menu('footer-menu4')) { ?>
                            <h4><?php echo get_field('footer_menu_title', 'footer-menu4'); ?></h4>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location' => 'footer-menu4',
                                    'menu' => '',
                                    'container' => false,
                                )
                            );
                        }
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if (have_rows('contact_us_repeater', 'option')) { ?>
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 footer-contact-us">
                        <h3>تماس با ما</h3>
                        <ul>
                            <?php while (have_rows('contact_us_repeater', 'option')) : the_row(); ?>
                                <li> <?php echo get_sub_field('title'); ?> :
                                    <span><?php echo get_sub_field('value'); ?></span>
                                </li>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 col-12 namad">
                        <a href="#">
                            <img src="<?php echo PATH?>/img/enamad.png" alt="">
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
    <div class="copyright">
        <div class="container-fluid">
            <p>تمام حقوق مادی و معنوی این وب سایت متعلق به برند گالری می باشد.</p>
            <ul class="footer-social">
                <?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
                    <li><a href="<?php echo get_sub_field('link') ?>"><i
                                    class="fab <?php echo get_sub_field('icon') ?>"></i></a></li>
                <?php endwhile;
                wp_reset_query(); ?>
            </ul>
        </div>
    </div>
</footer>

<!-- /footer -->

<?php wp_footer(); ?>
</body>
</html>
