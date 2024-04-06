<?php
defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
?>

    <div class="cover-section py-5 text-center">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="title">
                        <h3>فروشگاه</h3>
                    </div>
                    <?php woocommerce_breadcrumb(); ?>
                </div>
            </div>
        </div>
    </div>

    <div class="archive">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-12 col-12">
                    <?php dynamic_sidebar('shop'); ?>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-12">
                    <div class="row">
                        <?php
                        if ( woocommerce_product_loop() ) {
                            while ( have_posts() ) {
                                the_post();
                                wc_get_template_part( 'content', 'product' );
                            }
                        } else {
                            /**
                             * Hook: woocommerce_no_products_found.
                             *
                             * @hooked wc_no_products_found - 10
                             */
                            do_action( 'woocommerce_no_products_found' );
                        }
                        ?>
                    </div>
                    <?php
                    /**
                     * Hook: woocommerce_after_shop_loop.
                     *
                     * @hooked woocommerce_pagination - 10
                     */
                    do_action( 'woocommerce_after_shop_loop' );
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

get_footer( 'shop' );
