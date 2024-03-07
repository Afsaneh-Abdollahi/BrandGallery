<?php get_header(); ?>

<?php
global $header_class, $header_image, $header_title, $header_description, $has_background_image;

$header_image = get_the_post_thumbnail_url();
$header_title = get_the_title();
$header_description = get_the_excerpt();
$post = get_post();
$post_type = $post->post_type;
$categories = get_the_category();
$args = array(
    'post_type' => $post_type,
);

?>



<?php get_footer(); ?>
