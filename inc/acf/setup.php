<?php


add_action('init', function () {


    if (function_exists('acf_add_options_page')) {

        acf_add_options_page(array(
            'page_title' => 'Site Setting',
            'menu_title' => 'Site Setting',
            'menu_slug' => 'admin-site',
            'capability' => 'edit_posts',
            'redirect' => false
        ));
    }

});

