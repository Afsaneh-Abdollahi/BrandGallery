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

if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_65e9ee651005c',
        'title' => 'سرویس ها',
        'fields' => array(
            array(
                'key' => 'field_65e9ee85dc487',
                'label' => 'افزودن سرویس',
                'name' => 'services_repeater',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_65e9ee94dc488',
                        'label' => 'عنوان',
                        'name' => 'title',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_65e9eeb2dc489',
                        'label' => 'توضیحات',
                        'name' => 'description',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                    array(
                        'key' => 'field_65e9eec3dc48a',
                        'label' => 'تصویر',
                        'name' => 'img',
                        'type' => 'image',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'return_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                        'min_width' => '',
                        'min_height' => '',
                        'min_size' => '',
                        'max_width' => '',
                        'max_height' => '',
                        'max_size' => '',
                        'mime_types' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'admin-site',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_61d184ec68ee8',
        'title' => 'شبکه های اجتماعی',
        'fields' => array(
            array(
                'key' => 'field_61d185c442df3',
                'label' => 'افزودن شبکه های اجتماعی',
                'name' => 'social_media_repeater',
                'type' => 'repeater',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'collapsed' => '',
                'min' => 0,
                'max' => 0,
                'layout' => 'table',
                'button_label' => '',
                'sub_fields' => array(
                    array(
                        'key' => 'field_61d185da42df4',
                        'label' => 'آیکن',
                        'name' => 'icon',
                        'type' => 'select',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'choices' => array(
                            'fa-instagram' => 'instagram',
                            'fa-telegram' => 'telegram',
                            'fa-whatsapp' => 'whatsapp',
                        ),
                        'default_value' => array(
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                        'ui' => 0,
                        'return_format' => 'value',
                        'ajax' => 0,
                        'placeholder' => '',
                    ),
                    array(
                        'key' => 'field_61d1866742df5',
                        'label' => 'لینک',
                        'name' => 'link',
                        'type' => 'text',
                        'instructions' => '',
                        'required' => 0,
                        'conditional_logic' => 0,
                        'wrapper' => array(
                            'width' => '',
                            'class' => '',
                            'id' => '',
                        ),
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'maxlength' => '',
                    ),
                ),
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'admin-site',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));

    acf_add_local_field_group(array(
        'key' => 'group_65ea07137b918',
        'title' => 'عنوان منو فوتر',
        'fields' => array(
            array(
                'key' => 'field_65ea071de58de',
                'label' => 'عنوان',
                'name' => 'footer_menu_title',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/footer-menu1',
                ),
            ),
            array(
                array(
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/footer-menu2',
                ),
            ),
            array(
                array(
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/footer-menu3',
                ),
            ),
            array(
                array(
                    'param' => 'nav_menu',
                    'operator' => '==',
                    'value' => 'location/footer-menu4',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => 1,
        'description' => '',
    ));
endif;

