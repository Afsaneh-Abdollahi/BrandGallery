<?php
/**
 * Template Name: About Us
 *
 * @author Afsaneh
 */
get_header(); ?>
<main>
    <section class="section-top-about">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <div class="title">
                        <h3>درباره ما</h3>
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
