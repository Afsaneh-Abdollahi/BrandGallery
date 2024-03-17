<?php


/*------custom post type--------*/
function trent_register_post_type($singular, $plural, $supports, $label = '', $cat, $city, $isPublic=true)
{


    $labels = array(
        'name' => $plural,
        'singular_name' => $singular,
        'add_name' => 'Add New',
        'add_new_item' => 'Add New ' . $singular,
        'edit' => 'Edit',
        'edit_item' => 'Edit' . $singular,
        'view' => 'View' . $singular,
        'view_item' => 'View' . $singular,
        'search_term' => 'Search' . $plural,
        'parent' => 'Parent' . $singular,
        'not_found' => 'No' . $plural . 'found',
        'not_found_in_trash' => 'No' . $plural . 'in Trash',
        'menu_name' => $label,

    );

    $args = array(
        'labels' => $labels,
        'label' => $label,
        'public' => $isPublic,
        'publicly_queryable' => $isPublic,
        'exclude_from_search' => true,
        'show_in_nav_menu' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => $isPublic,
        'show_in_admin_bar' => $isPublic,
        'menu_position' => 6,
        'menu_icon' => 'dashicons-info',
        'can_export' => true,
        'delete_with_user' => false,
        'query_var' => $isPublic,
        'capability_type' => 'page',
        'map_meta_cap' => true,
        'has_archive' => true,
        'hierarchical' => true,
        'taxonomies' => array($cat, $city, 'post_tag'),

        'rewrite' => array(
            'slug' => mb_strtolower($plural),
            'with_front' => true,
            'pages' => true,
            'feeds' => false,
        ),
        'supports' => $supports
    );

    register_post_type(mb_strtolower($plural), $args );
}

function create_tax($catName, $catLabel, $singular_name, $postType)
{
    register_taxonomy(
        $catName,
        $postType,
        array(
            'hierarchical' => true,
            'public' => true,
            'show_ui' => true,
            'show_admin_column' => true,
            '_builtin' => false,
            'show_in_rest' => true,
            'rest_base' => $catLabel,
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'labels' => [
                'name' => $catLabel,
                'singular_name' => $singular_name
            ],
            'rewrite' => array(
                'slug' => $singular_name, // This controls the base slug that will display before each term
                'with_front' => false, // Don't display the category base before "/locations/"
                'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
            ),
        )
    );

}

create_tax('brands', 'برندها', 'برندها', 'product');


