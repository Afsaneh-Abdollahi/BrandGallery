<?php
/**
 * Template Name: Home Page
 *
 * @author Afsaneh
 */
get_header(); ?>

<div class="cover-section py-5 text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="title">
                    <h3><?php the_title(); ?></h3>
                </div>
                <?php woocommerce_breadcrumb(); ?>
            </div>
        </div>
    </div>
</div>

<main style="background-color: #ffffff !important;" class="pt-0">
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
