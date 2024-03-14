<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;

get_header(); ?>

<main class="blog search_page">
    <div class="container">
        <div class="row mb-3 mt-3">
            <div class="col-lg-12">
                <div class="title">
                    <?php echo sprintf(__('%s نتیجه جستجو برای ”', 'wp-blank'), $wp_query->found_posts);
                    echo get_search_query(); ?>”
                </div>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-5 ">
            <?php if (have_posts()) :
                while (have_posts()) : the_post(); ?>
                    <div class="col">
                        <div class="card">
                            <div class="img">
                                <img src="<?php echo get_the_post_thumbnail_url(); ?>"
                                     class="card-img-top"
                                     alt="<?php echo the_title(); ?>">
                            </div>
                            <div class="card-body">
                                <h5><?php echo the_title(); ?></h5>
                                <a class="outline_btn"
                                   href="<?php echo the_permalink(); ?>">ادامه</a>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </div>
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
                        'prev_text' => sprintf('<i class="icon-chevron-right"></i> %1$s', __('', 'text-domain')),
                        'next_text' => sprintf('%1$s <i class="icon-chevron-left"></i>', __('', 'text-domain')),
                        'add_args' => false,
                        'add_fragment' => '',
//                        'total' => $args->max_num_pages
                    ));
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>
