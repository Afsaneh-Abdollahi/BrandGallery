<?php
/**
 * Twenty Nineteen: Customizer
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function watch_customizer($wp_customize)
{


    $wp_customize->add_section(
        'site_setting',
        array(
            'title' => 'Site Setting',
            'description' => 'This is Site Setting.',
            'priority' => 15,
        )
    );
    $wp_customize->add_setting('site-logo');
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'site-img',
            array(
                'label' => 'Site Logo',
                'section' => 'site_setting',
                'settings' => 'site-logo'
            )
        )
    );

    $wp_customize->add_setting(
        'footer-about',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'footer-about',
        array(
            'label' => 'Footer About',
            'section' => 'site_setting',
            'type' => 'textarea',
        )
    );

    $wp_customize->add_setting(
        'twitter',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'twitter',
        array(
            'type' => 'text',
            'section' => 'site_setting',
            'priority' => 10,
            'label' => __('Twitter link'),

        )
    );
    $wp_customize->add_setting(
        'facebook',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'facebook',
        array(
            'type' => 'text',
            'section' => 'site_setting',
            'priority' => 10,
            'label' => __('Facebook link'),

        )
    );

    $wp_customize->add_setting(
        'gmail',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'gmail',
        array(
            'type' => 'text',
            'section' => 'site_setting',
            'priority' => 10,
            'label' => __('Gmail link'),

        )
    );

    $wp_customize->add_setting(
        'youtube',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'youtube',
        array(
            'type' => 'text',
            'section' => 'site_setting',
            'priority' => 10,
            'label' => __('Youtube link'),

        )
    );

    $wp_customize->add_setting(
        'address',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'address',
        array(
            'label' => 'Address',
            'section' => 'site_setting',
            'type' => 'textarea',
        )
    );
    $wp_customize->add_setting(
        'email',
        array(
            'default' => null,
        )
    );
    $wp_customize->add_control(
        'email',
        array(
            'type' => 'text',
            'section' => 'site_setting',
            'priority' => 10,
            'label' => __('Email link'),
        )
    );
    $wp_customize->add_setting(
        'telephone',
        array(
            'default' => '',
        )
    );
    $wp_customize->add_control(
        'telephone',
        array(
            'label' => 'Telephone',
            'section' => 'site_setting',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'support',
        array(
            'default' => '',
        )
    );
    $wp_customize->add_control(
        'support',
        array(
            'label' => 'Support',
            'section' => 'site_setting',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'mobile',
        array(
            'default' => '',
        )
    );
    $wp_customize->add_control(
        'mobile',
        array(
            'label' => 'Mobile',
            'section' => 'site_setting',
            'type' => 'text',
        )
    );

}

add_action( 'customize_register', 'watch_customizer' );