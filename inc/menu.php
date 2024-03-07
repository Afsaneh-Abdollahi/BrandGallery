<?php
function register_my_menus() {
    register_nav_menus(
      array(
        'header-menu' => __( 'Header Menu' ),
        'footer-menu1' => __( 'Footer Menu 1' ),
        'footer-menu2' => __( 'Footer Menu 2' ),
        'footer-menu3' => __( 'Footer Menu 3' ),
        'footer-menu4' => __( 'Footer Menu 4' ),
      )
    );
  }
  add_action( 'init', 'register_my_menus' );
