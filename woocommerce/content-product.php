
        <?php
        /**
         * The template for displaying product content within loops
         *
         * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
         *
         * HOWEVER, on occasion WooCommerce will need to update template files and you
         * (the theme developer) will need to copy the new files to your theme to
         * maintain compatibility. We try to do this as little as possible, but it does
         * happen. When this occurs the version of the template file will be bumped and
         * the readme will list any important changes.
         *
         * @see     https://docs.woocommerce.com/document/template-structure/
         * @package WooCommerce\Templates
         * @version 3.6.0
         */

        defined('ABSPATH') || exit;

        global $product;

        // Ensure visibility.
        if (empty($product) || !$product->is_visible()) {
            return;
        }
        ?>

        <?php
        if (is_product()) {
            echo '<div class="swiper-slide">';
        } else {
            echo '<div class="col-lg-4 col-md-6 col-sm-6 col-12 ">';
        }
        ?>
            <a href="<?php the_permalink(); ?>">
                <div class="card product-item">
                    <?php
                    global $product;
                    if ($product->is_in_stock()) {
                        if ($product->is_on_sale()) :
                            echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $product);
                        endif;
                    } ?>
                    <div class="img">
                        <img src="<?php the_post_thumbnail_url(); ?>"
                             alt="<?php the_title(); ?>" class="img-fluid">
                    </div>
                    <div class="card-body">
                        <h4 class="h6 name">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h4>
                        <div class="product-price">
                            <p class="price-section">
                                <?php global $product;
                                if ($product->is_in_stock()) {
                                    echo $product->get_price_html();
                                } else {
                                    echo '<span class="notfound-price"><a href="tel:02144245213">ناموجود</br>جهت استعلام تماس بگیرید</a></span>';
                                }
                                ?></p>
                        </div>
                    </div>
                </div>
            </a>
        </div>


