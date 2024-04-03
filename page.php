<?php
/**
 * Template Name: Home Page
 *
 * @author Afsaneh
 */
get_header(); ?>

<main>
    <?php while (have_posts()) : the_post(); ?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if (!is_account_page()) { ?>
                        <div class="web-cart-section">
                            <?php the_content(); ?>
                        </div>
                    <?php } ?>
                    <?php if (is_account_page() && is_user_logged_in()) { ?>
                        <div class="web-myAccount-section">
                            <?php the_content(); ?>
                        </div>
                    <?php } ?>
                    <?php if (is_account_page() && !is_user_logged_in()) { ?>
                        <div class="web-myAccount-section">
                            <div id="notLogin" class="noFlex">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</main>

<?php get_footer(); ?>
