<div class="products-section">
    <div class="container-fluid">
        <div class="title text-center">
            <h3>پرفروش ترین محصولات</h3>
        </div>
        <div class="swiper swiper_tab">
            <div class="swiper-wrapper">
                <?php
                $tab_product = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                    'order' => 'DESC',
                );
                $show_tab_content = new WP_Query($tab_product);
                while ($show_tab_content->have_posts()) : $show_tab_content->the_post();
                    ?>
                    <div class="swiper-slide">
                        <a href="<?php the_permalink(); ?>">
                            <div class="tabs-item card product-item">
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
                                            echo $product->get_price_html(); ?></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
            <div class="swiper-pagination"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>
</div>