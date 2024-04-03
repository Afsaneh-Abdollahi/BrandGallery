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


<div class="swiper-gallery">
    <div class="swiper-wrapper">
        <?php foreach ($attachment_ids as $attachment_id) : ?>
            <div class="swiper-slide">
                <?php echo wp_get_attachment_image($attachment_id, 'woocommerce_single', false, array('class' => 'img-fluid')); ?>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>


