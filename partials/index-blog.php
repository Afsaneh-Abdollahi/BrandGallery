<?php //$web_general_options = hb_get_option('web_general_group') ?>
<div class="blog">
    <div class="container-fluid">
        <?php
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => '',
        );
        $Blog = new WP_Query($args);
        if ($Blog->have_posts()) {
            ?>

            <div>
                <div class="row">
                    <div class="col text-right mr1">
                        <div class="title">
                            وبلاگ
                        </div>
                    </div>
                    <div class="col text-left">
                        <a href="<?php echo get_post_type_archive_link('blog'); ?>" class="more">مشاهده همه</a>
                    </div>
                </div>
                <!-- Slider main container -->
                <div class="swiper swiper_posts">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php
                        while ($Blog->have_posts()) {
                            $Blog->the_post();
                            ?>
                            <div class="swiper-slide">
                                <a href="<?php echo the_permalink(); ?>">
                                    <div class="card">
                                        <div class="img">
                                            <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                                 class="card-img-top"
                                                 alt="<?php echo the_title(); ?>">
                                        </div>
                                        <div class="card-body">
                                            <div class="name"><?php echo the_title(); ?></div>
                                            <ul>
                                                <li>
                                                    <i class="fas fa-comments"></i><span><?php echo comments_number(); ?></span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-eye"></i><span><?php if (function_exists('the_views')) {
                                                            the_views();
                                                        } ?></span></li>
                                            </ul>
                                            <p><?php echo the_excerpt(); ?></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php }
                        wp_reset_postdata();
                        ?>
                    </div>

                    <!-- If we need navigation buttons -->

                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
