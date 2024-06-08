<div class="intro-section-two">
    <div class="container-fluid">
        <div class="title text-center">
            <h3>برندهای منتخب</h3>
        </div>
        <?php
        $brands = get_terms([
            'post_type' => 'product',
            'taxonomy' => 'brands',
            'hide_empty' => false,
        ]);
        if ($brands) {
            ?>
            <div class="swiper swiper-intro2">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($brands as $brand) {
                        $brand_image = get_field('brand_slider_img', $brand);
                        $is_show = get_field('is_show_in_brands_slider', $brand);
                        if ($is_show === true) {
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo get_term_link($brand); ?>">
                                    <div class="img">
                                        <div class="cover"><h4><?php echo $brand->name; ?></h4></div>
                                        <img src="<?php echo $brand_image; ?>" alt="<?php echo $brand->name; ?>">
                                    </div>
                                </a>
                            </div>
                            <?php
                        }
                    }
                    wp_reset_query();
                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        <?php } ?>
    </div>
</div>
