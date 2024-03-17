<?php get_header(); ?>

<?php
global $header_class, $header_image, $header_title, $header_description, $has_background_image;

$post_image = get_the_post_thumbnail_url();
$post_title = get_the_title();
$post_excerpt = get_the_excerpt();
$post = get_post();
$post_type = $post->post_type;
$post_categories = get_the_category();
$args = array(
    'post_type' => $post_type,
);

?>

<main class="main blog single">
    <div class="container-fluid">
        <div class="breadcrumb">
            <?php
            if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
            ?>
        </div>

        <div class="row">
            <div class="col-lg-8 content">
                <div class="theiaStickySidebar">
                    <div class="single_content">
                        <?php if ($post_image) { ?>
                            <div class="banner_img img">
                                <img class="img-fluid" src="<?php echo $post_image; ?>"
                                     alt="<?php echo $post_title; ?>">
                            </div>
                        <?php } ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <h1><?php echo $post_title; ?></h1>
                        </div>

                        <div class="info_box">
                            <ul>
                                <li><i class="fas fa-calendar"></i> تاریخ انتشار:
                                    <span><?php echo get_the_date(); ?></span></li>
                                <li><i class="fas fa-refresh"></i> تاریخ به روز رسانی:
                                    <span><?php echo the_modified_time('Y/m/d'); ?></span></li>
                                <li>
                                    <i class="fas fa-comments"></i>تعداد دیدگاه :
                                    <span><?php echo comments_number(); ?></span>
                                </li>
                                <li>
                                    <i class="fas fa-eye"></i>تعداد بازدید :
                                    <span><?php if (function_exists('the_views')) {
                                            the_views();
                                        } ?></span></li>
                            </ul>
                        </div>

                        <div class="paragraph">
                            <?php echo the_content(); ?>
                        </div>


                        <div class="navigate_posts">
                            <div class="navigate_box prev">
                                <div>
                                    <span>قبلی</span>
                                    <p><?php previous_post_link(); ?></p>
                                </div>
                            </div>
                            <div class="navigate_box next">
                                <div>
                                    <span>بعدی</span>
                                    <p><?php next_post_link(); ?></p>
                                </div>
                            </div>
                        </div>


                        <div class="blue_bg posts">
                            <div class="d-flex align-items-center">
                                <i class="icon-file-text"></i>
                                <p>حتما در <?php bloginfo('name'); ?> بخوانید:</p>
                            </div>
                            <?php
                            $post = get_post();
                            $post_type = $post->post_type;
                            $related = get_posts(
                                array(
                                    'post_type' => $post_type,
                                    'category__in' => wp_get_post_categories($post->ID),
                                    'numberposts' => 3,
                                    'post__not_in' => array($post->ID)
                                )
                            );
                            if ($related) {
                                ?>
                                <ul>
                                    <?php foreach ($related as $post) { ?>
                                        <li><a href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
                                        </li>
                                    <?php }
                                    wp_reset_query(); ?>
                                </ul>
                            <?php } ?>
                        </div>


                        <?php
                        $post_type = $post->post_type;
                        $related = get_posts(
                            array(
                                'post_type' => $post_type,
                                'category__in' => wp_get_post_categories($post->ID),
                                'numberposts' => 20,
                                'post__not_in' => array($post->ID)
                            )
                        );
                        if ($related) {
                            ?>
                            <div class="related_posts" id="related_posts">
                                <div class="title">
                                   <h3>مقالات مرتبط</h3>
                                </div>

                                <!-- Slider main container -->
                                <div class="swiper swiper_posts">
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper">
                                        <!-- Slides -->
                                        <?php foreach ($related as $post) {
                                            setup_postdata($post); ?>
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
                                        wp_reset_query(); ?>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
            <div class="col-lg-4 sidebar">
                <div class="theiaStickySidebar">
                    <div class="main_card in">

                        <?php
                        $category = get_terms(array(
                            'post_type' => 'post',
                            'taxonomy' => 'category',
                            'number' => 4,
                            'orderby' => 'meta_value',
                            'hide_empty' => true,
                        ));
                        if ($category):
                            ?>
                            <div class="mb-5">
                                <div class="title">دسته بندی پربازدید</div>
                                <div class="row m-0">
                                    <?php foreach ($category as $cat) {
                                        $cat_name = $cat->name;
                                        $cat_image = get_field('category_icon', $cat);
                                        ?>
                                        <div class="col-lg-6">
                                            <a href="<?php echo(get_category_link($cat)) ?>">
                                                <div class="card cat">
                                                    <img src="<?php echo $cat_image; ?>" alt="<?php echo $cat_name; ?>">
                                                    <p><?php echo $cat_name; ?></p>
                                                </div>
                                            </a>
                                        </div>
                                    <?php }
                                    wp_reset_query(); ?>
                                </div>
                            </div>
                        <?php endif; ?>


                        <?php
                        $post_type = $post->post_type;
                        $related = get_posts(
                            array(
                                'post_type' => $post_type,
                                'category__in' => wp_get_post_categories($post->ID),
                                'numberposts' => 4,
                                'post__not_in' => array($post->ID)
                            )
                        );
                        if ($related) {
                            ?>
                            <div class="mb-5">
                                <div class="title">مقالات مرتبط</div>
                                <div class="row m-0">
                                    <?php foreach ($related as $post) {
                                        setup_postdata($post); ?>
                                        <div class="col-lg-6 p-1">
                                            <a href="<?php echo the_permalink(); ?>">
                                                <div class="card related">
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
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php }
                                    wp_reset_query(); ?>
                                </div>
                            </div>
                        <?php } ?>



                        <?php if (have_rows('social_media_repeater', 'option')) { ?>
                            <div class="mb-5">
                                <div class="title">شبکه های اجتماعی</div>
                                <ul class="social">
                                    <?php while (have_rows('social_media_repeater', 'option')) : the_row(); ?>
                                        <li>
                                            <a href="<?php echo get_sub_field('link') ?>">
                                                <i class="fab <?php echo get_sub_field('icon') ?>"></i>
                                                <p><?php echo get_sub_field('title');
                                                    echo ' ';
                                                    bloginfo('name'); ?> </p>
                                            </a>
                                        </li>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <?php $sidebar_banner = get_field('sidebar_banner', 'option') ?>
                        <div class="banner">
                            <div class="img">
                                <img src="<?php echo $sidebar_banner['image'] ?>" alt="">
                                <a class="primary_btn"
                                   href="<?php echo $sidebar_banner['site_link'] ?>"><?php echo $sidebar_banner['button_title'] ?></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>


        <div class="single_comment">
            <?php
            comments_template();
            ?>
        </div>


        <?php $newsletter_setting = get_field('newsletter_setting', 'option') ?>
        <section class="sec4 newsletter_sec">
            <div class="newsletter_box"
                 style="background-image: url(<?php echo $newsletter_setting['bg_img'] ?>)">
                <div class="info">
                    <div class="title"><?php echo $newsletter_setting['title'] ?></div>
                    <p><?php echo $newsletter_setting['desc'] ?></p>
                    <?php echo do_shortcode($newsletter_setting['shortcode']) ?>

                </div>
                <img src="<?php echo $newsletter_setting['left_img'] ?>"
                     alt="<?php echo $newsletter_setting['title'] ?>" class="img-fluid">
            </div>
        </section>

    </div>
</main>


<?php get_footer(); ?>
