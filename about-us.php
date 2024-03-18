<?php
/**
 * Template Name: About Us
 *
 * @author Afsaneh
 */
get_header(); ?>
<main class="about">
    <section class="section-top-cover">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-lg-12">
                        <div class="banner-about ">
                            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                            <div class="banner-about-color">
                                <h1>درباره ما</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog single">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="paragraph">
                        <?php echo the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
