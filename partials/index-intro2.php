<div class="intro-section-two">
    <div class="container-fluid">
        <div class="title text-center">
            <h3>محصولات جانبی</h3>
        </div>
        <?php
        $categories = get_categories(array(
            'post_type' => 'product',
            'taxonomy' => 'product_cat',
            'number' => 5,
            'hide_empty' => false,
        ));
        if ($categories) { ?>
            <div class="swiper swiper-intro2">
                <div class="swiper-wrapper">
                    <?php
                    foreach ($categories as $cat) {
                        $is_show = get_field('is-show', $cat);
                        $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
                        $image = wp_get_attachment_url( $thumbnail_id );
                        if ($is_show === true) {
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo get_term_link($cat); ?>">
                                    <div class="img">
                                        <div class="cover"><h4><?php echo $cat->name; ?></h4></div>
                                        <img src="<?php echo $image; ?>" alt="<?php echo $cat->name; ?>">
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
