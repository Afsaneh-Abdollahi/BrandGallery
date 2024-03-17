<?php
/**
 * Template Name: Blog
 */
get_header(); ?>
<main class="blog main">
    <div class="container-fluid">

        <?php
        $special_post_sec1 = get_posts(array(
            'numberposts' => '5',
            'post_type' => 'post',
            'meta_value' => '',
            'meta_key' => 'special_post_sec1',
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array('key' => 'special_post_sec1',
                    'value' => array('1', '2', '3', '4', '5')
                )
            )
        ));
        if ($special_post_sec1) { ?>
            <section class="sec1">
                <ul>
                    <?php
                    foreach ($special_post_sec1 as $post) {
                        ?>
                        <li>
                            <a href="<?php echo the_permalink(); ?>">
                                <div class="img">
                                    <div class="cover">
                                    </div>
                                    <?php if (get_field('post_banner_img')) { ?>
                                        <img src="<?php echo get_field('post_banner_img'); ?>"
                                             alt="<?php echo the_title(); ?>">
                                    <?php } else { ?>
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                             alt="<?php echo the_title(); ?>">
                                    <?php } ?>
                                    <div class="info">
                                        <h1><?php echo the_title(); ?></h1>
                                    </div>
                                </div>
                            </a>
                        </li>
                    <?php } ?>
                    <div class="clearfix"></div>
                </ul>
            </section>
        <?php } ?>

        <section class="sec2">
            <div class="title">
                جدیدترین مقالات
            </div>
            <?php

            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 20,
                'offset' => 0,
                'orderby' => 'post_date',
                'order' => 'DESC',
                'post_status' => 'publish'
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
                <!-- Slider main container -->
                <div class="swiper swiper_posts">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo the_permalink(); ?>">
                                    <div class="card">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top"
                                             alt="<?php echo the_title(); ?>">
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
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            <?php endif; ?>
        </section>

        <section class="sec3">
            <div class="title">
                پرطرفدارترین/پربازدیدترین مقالات
            </div>
            <?php
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 20,
                'meta_key' => 'views',
                'orderby' => 'meta_value_num',
                'order' => 'DESC',
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) : ?>
                <!-- Slider main container -->
                <div class="swiper swiper_posts">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php while ($query->have_posts()) : $query->the_post(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo the_permalink(); ?>">
                                    <div class="card">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="card-img-top"
                                             alt="<?php echo the_title(); ?>">
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
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>
            <?php endif; ?>
        </section>

        <?php $newsletter_setting = get_field('newsletter_setting', 'option') ?>
        <section class="sec4 newsletter_sec">
            <div class="newsletter_box" style="background-image: url(<?php echo $newsletter_setting['bg_img'] ?>)">
                <div class="info">
                    <div class="title"><?php echo $newsletter_setting['title'] ?></div>
                    <p><?php echo $newsletter_setting['desc'] ?></p>
                    <?php echo do_shortcode($newsletter_setting['shortcode']) ?>

                </div>
                <img class="img-fluid" src="<?php echo $newsletter_setting['left_img'] ?>"
                     alt="<?php echo $newsletter_setting['title'] ?>" class="img-fluid">
            </div>
        </section>


        <?php
        $category = get_terms(array(
            'post_type' => 'post',
            'taxonomy' => 'category',
            'orderby' => 'meta_value',
            'hide_empty' => true,
        ));
        ?>
        <section class="sec5">
            <div class="title">
                دسته بندی
            </div>

            <?php if ($category): ?>
                <ul class="category nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-all-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-all" type="button" role="tab" aria-controls="pills-all"
                                aria-selected="true">همه
                        </button>
                    </li>
                    <?php $i = 1;
                    foreach ($category as $cat) { ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-<?php echo $i; ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-<?php echo $i; ?>" type="button" role="tab"
                                    aria-controls="pills-<?php echo $i; ?>"
                                    aria-selected="true"><?php echo $cat->name; ?>
                            </button>
                        </li>
                        <?php $i++;
                    } ?>
                </ul>

            <?php endif; ?>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-all" role="tabpanel"
                     aria-labelledby="pills-all-tab"
                     tabindex="0">

                    <?php

                    $args = array(
                        'post_type' => 'post',
                        'orderby' => 'post_date',
                        'order' => 'DESC',
                        'post_status' => 'publish'
                    );
                    $query = new WP_Query($args);
                    if ($query->have_posts()) : ?>

                        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 ">
                            <?php while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="col">
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
                            <?php endwhile;
                            wp_reset_postdata(); ?>
                        </div>

                    <?php endif; ?>

                    <div class="text-center">
                        <a class="outline_btn" id="loadMore">مشاهده بیشتر</a>
                    </div>

                </div>


                <?php $k = 1;
                foreach ($category as $cate) { ?>
                    <div class="tab-pane fade" id="pills-<?php echo $k; ?>" role="tabpanel"
                         aria-labelledby="pills-<?php echo $k; ?>-tab"
                         tabindex="0">

                        <?php
                        $the_query = new WP_Query(array(
                            'post_type' => 'post',
                            'orderby' => 'post_date',
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'cat' => $cate->term_id,

                        ));
                        // Check if there are any posts to display
                        if ($the_query->have_posts()) :
                            ?>
                            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 ">
                                <?php $j = 1;
                                while ($the_query->have_posts()) : $the_query->the_post(); ?>
                                    <div class="col">
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
                                    <?php $j++;
                                endwhile;
                                wp_reset_postdata(); ?>
                            </div>
                        <?php endif; ?>
                        <div class="text-center">
                            <a class="outline_btn" id="loadMore">مشاهده بیشتر</a>
                        </div>
                    </div>
                    <?php $k++;
                } ?>
            </div>
        </section>

        <?php
        $special_post = get_posts(array(
            'numberposts' => 20,
            'post_type' => 'post',
            'meta_value' => '',
            'meta_key' => 'special_post',
            'meta_query' => array(
                array('key' => 'special_post',
                    'value' => array(true, false)
                )
            )
        ));
        if ($special_post) { ?>
            <section class="sec6">
                <div class="title">
                    مقالات منتخب
                </div>
                <!-- Slider main container -->
                <div class="swiper swiper_posts">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <?php foreach ($special_post as $post) { ?>
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
                        <?php } ?>
                    </div>
                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>
                </div>
            </section>
        <?php } ?>


        <?php $banner_setting = get_field('site_banner_setting', 'option') ?>
        <section class="sec7 banner_sec">
            <div class="banner_box" style="background-image: url(<?php echo $banner_setting['bg_img'] ?>)">
                <div class="info">
                    <div class="logo_title">
                        <img src="<?php echo get_field('logo', 'option') ?>" alt="">
                        <div>سایت <?php bloginfo('name'); ?></div>
                    </div>
                    <a class="primary_btn" href="<?php echo $banner_setting['site_link'] ?>">ورود به سایت</a>

                </div>
                <img src="<?php echo $banner_setting['left_img'] ?>" alt="" class="img-fluid">
            </div>
        </section>

    </div>
</main>

<?php get_footer(); ?>
