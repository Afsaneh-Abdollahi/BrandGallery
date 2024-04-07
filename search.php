<?php
$paged = (get_query_var('page')) ? get_query_var('page') : 1;
global $post;
global $product;
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
                        <?php
                        $post = get_post($post);
                        if ($post) {
                            $post_type = $post->post_type;
                            if ($post_type == 'post') { ?>
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
                                <?php
                            }
                            if ($post_type == 'product') { ?>
                                <div class="tabs-item card product-item">
                                    <?php
                                    global $product;
                                    if ($product->is_in_stock()) {
                                        if ($product->is_on_sale()) :
                                            echo apply_filters('woocommerce_sale_flash', '<span class="onsale">' . __('Sale!', 'woocommerce') . '</span>', $product);
                                        endif;
                                    } ?>
                                    <div class="img">
                                        <img src="<?php the_post_thumbnail_url(); ?>"
                                             alt="<?php the_title(); ?>" class="img-fluid">
                                    </div>
                                    <div class="card-body">
                                        <h4 class="h6 name">
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h4>
                                        <div class="product-price">
                                            <p class="price-section">
                                                <?php global $product;
                                                if ($product->is_in_stock()) {
                                                    echo $product->get_price_html();
                                                } else {
                                                    echo '<span class="notfound-price"><a href="tel:02144245213">ناموجود</br>جهت استعلام تماس بگیرید</a></span>';
                                                }
                                                ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
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
