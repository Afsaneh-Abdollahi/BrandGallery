<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined('ABSPATH') || exit;

global $product;
$attachment_ids = $product->get_gallery_image_ids();
?>

<div class="gallery-section hb-shadow swiper swiper-gallery">


    <div class="swiper-wrapper">
        <?php
        if ($attachment_ids && $product->get_image_id()) {
            foreach ($attachment_ids as $attachment_id) {
                echo '<div class="swiper-slide"><div class="img">' . wp_get_attachment_image($attachment_id, 'woocommerce_single') . '</div></div>';
            }
        } else {
            $html = '<div class="woocommerce-product-gallery__image--placeholder">';
            $html .= sprintf('<img src="%s" alt="%s" class="wp-post-image img-fluid"  />', esc_url(wc_placeholder_img_src('woocommerce_single')), esc_html__('Awaiting product image', 'woocommerce'));
            $html .= '</div>';
            echo $html;
        }
        ?>
    </div>
    <div class="swiper-pagination"></div>

</div>
<?php
//do_action('woocommerce_product_thumbnails');
//?>