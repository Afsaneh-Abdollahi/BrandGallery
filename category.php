<?php get_header(); ?>

<main class="blog main category_page">
    <div class="container-fluid">
        <div class="breadcrumb">
            <?php
            if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
            ?>
        </div>

        <?php
        $category = get_queried_object();
        $parent_term_id = $category->term_id;
        $taxonomies = array(
            'category',
        );
        $args = array(
            'parent' => $parent_term_id,
        );
        $terms = get_terms($taxonomies, $args);


        if ($terms) {
            foreach ($terms as $subCat) {
                $the_query = new WP_Query(array(
                    'post_type' => 'post',
                    'cat' => $subCat->term_id,
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $subCat->term_id,
                        )
                    ),
                ));

                if ($the_query->have_posts()) : ?>
                    <section class="mb-5">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="cat_title m-0">
                                <?php echo $subCat->name; ?>
                            </div>
                            <a href="<?php echo get_category_link($subCat) ?>" class="outline_btn" id="loadMore">مشاهده
                                بیشتر</a>
                        </div>
                        <div class="swiper swiper_posts">
                            <!-- Additional required wrapper -->
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                <?php while ($the_query->have_posts()) : $the_query->the_post(); ?>
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
                    </section>

                <?php endif;
            }
            ?>

            <?php
        } else { ?>

            <div class="cat_title">
                <?php echo single_cat_title(); ?>
            </div>

            <?php
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
            $current_category = get_queried_object();

            $args = array(
                'post_status' => 'publish',
                'post_type' => 'post',
                'paged' => $paged,
                'posts_per_page' => 25,
                'cat' => $current_category->term_id,
                'tax_query' => array()
            );

            $query = new WP_Query($args);
            ?>

            <?php if ($query->have_posts()) : ?>
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
                                    </div>
                                </div>
                            </a>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata(); ?>
                </div>
            <?php
            endif;
            ?>

            <div class="row">
                <div class="col-lg-12">
                    <div class="pagination">
                        <?php

                        echo paginate_links(array(
                            'current' => max(1, $paged),
                            'format' => '?page=%#%',
                            'show_all' => false,
                            'type' => 'list',
                            'end_size' => 2,
                            'mid_size' => 1,
                            'prev_next' => true,
                            'prev_text' => __('<i class="icon-chevron-right"></i>'),
                            'next_text' => __('<i class="icon-chevron-left"></i>'),
                            'add_args' => false,
                            'add_fragment' => '',
                            'total' => $query->max_num_pages
                        ));
                        ?>
                    </div>
                </div>
            </div>

        <?php } ?>


    </div>
</main>

<?php get_footer(); ?>
