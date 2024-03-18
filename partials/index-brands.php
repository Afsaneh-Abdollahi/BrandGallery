<div class="brands brand-section">
    <div class="container-fluid">

        <?php
        $brands = get_terms([
            'post_type' => 'product',
            'taxonomy' => 'brands',
            'hide_empty' => false,
        ]);
        // Check if there are any posts to display
        if ($brands) {
            ?>

            <div class="title text-center">
                <h3>برندها</h3>
            </div>
            <!-- Slider main container -->
            <div class="swiper swiper_brands">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    <?php foreach ($brands as $brand) {
                        $brand_logo = get_field('brand_logo', $brand);
                        ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_term_link( $brand ); ?>">
                                <div class="card">
                                    <img src="<?php echo $brand_logo; ?>"
                                         alt="<?php $brand->name; ?>">
                                </div>
                            </a>
                        </div>
                    <?php }
                    wp_reset_query();
                    ?>
                </div>

                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>

                <!-- If we need navigation buttons -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>
        <?php } ?>

    </div>
</div>
