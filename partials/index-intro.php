<div class="intro-section">
    <div class="container-fluid">

        <?php
        $brands = get_terms([
            'post_type' => 'product',
            'taxonomy' => 'brands',
            'hide_empty' => false,
            'number'     => 6,
        ]);
        if ($brands) {
            ?>
            <div class="grid-container">
                <?php
                $item_counter = 1;

                foreach ($brands as $brand) {
                    $brand_image = get_field('cover', $brand);
                    $is_show = get_field('is-show', $brand);

                    if ($is_show === true) {
                        ?>
                        <div class="item<?php echo $item_counter; ?>">
                            <a href="<?php echo get_term_link($brand); ?>">

                                <img src="<?php echo $brand_image; ?>" alt="<?php echo $brand->name; ?>">
                            </a>
                        </div>
                        <?php
                        $item_counter++;
                        if ($item_counter > 4) {
                            $item_counter = 1;
                        }
                    }
                }
                wp_reset_query();
                ?>
            </div>
        <?php } ?>

    </div>
</div>
