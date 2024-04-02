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
<div <?php wc_product_class('col-lg-4 col-md-6 col-sm-6 col-12', $product); ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="product-item hb-shadow">
            <?php
            global $product;
            if ($product->is_in_stock()) {
                if ($product->is_on_sale()) :
                    echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $product);
                endif;
            } ?>
            <figur><img src="<?php the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-fluid"></figur>
            <div class="product-content">
                <h2 data-toggle="tooltip" title="<?php the_title(); ?>"><a
                            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <div class="product-text text-muted">
                    <ul class="list-unstyled">
                        <?php echo hb_attribute(); ?>
                    </ul>
                </div>
                <div class="product-price">
                    <p class="price-section">
                        <?php if (get_field('wholesale') == true) {
                            echo '<span class="notfound-price">عمده</span>';
                        }else { ?>
                            <?php global $product;
                            if ($product->is_in_stock()) {
                                echo $product->get_price_html();
                            } else {
                                echo '<span class="notfound-price">ناموجود</span>';
                            }
                        } ?></p>
                </div>
                <div class="product-buy">
                    <?php if (get_field('wholesale') == true) { ?>
                        <a href="https://wa.me/989305354356">
                            استعلام قیمت از واتساپ
                            <i class="fab fa-whatsapp"></i>
                        </a>
                    <?php } else { ?>
                        <a href="<?php the_permalink(); ?>">خرید آنلاین</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </a>
</div>
