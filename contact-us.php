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
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d202.4486421917385!2d51.34950606215711!3d35.72183387109481!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e0759b7cee829%3A0x5d64063cc9d474f0!2sSattarkhan%20Traditional%20Market!5e0!3m2!1sen!2s!4v1715695938554!5m2!1sen!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
<!--                    <div class="banner-about">-->
<!--                        <img src="--><?php //echo get_the_post_thumbnail_url(); ?><!--" alt="">-->
<!--                        <div class="banner-about-color">-->
<!--                            <h1>تماس با ما</h1>-->
<!--                        </div>-->
<!--                    </div>-->
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

