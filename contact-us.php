<?php
/**
 * Template Name: Contact Us
 *
 * @author Afsaneh
 */
get_header(); ?>
<main class="about">
    <section class="section-top-cover">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-about">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                        <div class="banner-about-color">
                            <h1>تماس با ما</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-top-contact">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="main-contact footer footer-contact-us">
                        <ul>
                            <?php while (have_rows('contact_us_repeater', 'option')) : the_row(); ?>
                                <li><i class="fas <?php echo  get_sub_field('icon'); ?>"></i> <?php echo get_sub_field('title'); ?> :
                                    <span><?php echo get_sub_field('value'); ?></span>
                                </li>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>

