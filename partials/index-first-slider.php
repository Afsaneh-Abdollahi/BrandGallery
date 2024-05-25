<div class="brands brand-section">
    <div class="container-fluid">

        <?php if (have_rows('introduction_slider' , 'option')): ?>

            <div class="swiper swiper_slider">
                <div class="swiper-wrapper">
                    <?php while (have_rows('introduction_slider', 'option')): the_row(); ?>
                        <div class="swiper-slide">
                            <a href="<?php echo get_sub_field('link'); ?>">
                                <div class="img">
                                    <img src="<?php echo get_sub_field('img'); ?>" alt="">
                                </div>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>

            </div>

        <?php endif; ?>


    </div>
</div>
