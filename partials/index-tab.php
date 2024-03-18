<div class="tabs-section">
    <div class="container-fluid">
        <div class="row">
            <ul class="nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li>
                    <div class="title">
                        <h3>ساعت مچی</h3>
                    </div>
                </li>
                <?php
                $count = 0;
                $categories = get_categories(array(
                    'post_type' => 'product',
                    'taxonomy' => 'product_cat',
                    'number' => 5,
                    'hide_empty' => true,
                ));
                foreach ($categories as $cat) { ?>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?php if ($count == 0) {echo 'active';} ?>" id="pills-<?php echo $count; ?>-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-<?php echo $count; ?>" type="button" role="tab"
                                aria-controls="pills-<?php echo $count; ?>"
                                aria-selected="true"><?php echo $cat->name; ?>
                        </button>
                    </li>
                    <?php $count++;
                } ?>
            </ul>
            <div class="tab-content">
                <?php
                $count = 0;
                foreach ($categories

                         as $cat) {
                    ?>
                    <div class="tab-pane fade show <?php if ($count == 0) {echo 'active';} ?>
                        " id="pills-<?php echo $count; ?>" role="tabpanel"
                         aria-labelledby="pills-<?php echo $count; ?>-tab"
                         tabindex="0">


                        <!-- Slider main container -->
                        <div class="swiper swiper_tab">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php
                                $tab_product = array(
                                    'post_type' => 'product',
                                    'posts_per_page' => 9,
                                    'tax_query' => array(
                                        array(
                                            'taxonomy' => 'product_cat',
                                            'field' => 'slug',
                                            'terms' => array($cat->slug),
                                        ),
                                    ),
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

                            <!-- If we need pagination -->
                            <div class="swiper-pagination"></div>

                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>

                    </div>
                    <?php $count++;
                } ?>
            </div>
        </div>
    </div>
</div>
