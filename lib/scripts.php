<?php

/**
 * Enqueue scripts and stylesheets
 *
 * Enqueue stylesheets in the following order:
 * 1. /theme/assets/css/main.min.css
 *
 * Enqueue scripts in the following order:
 * 1. jquery-1.11.0.min.js via Google CDN
 * 2. /theme/assets/js/vendor/modernizr-2.7.0.min.js
 * 3. /theme/assets/js/main.min.js (in footer)
 */
function roots_scripts() {
  wp_enqueue_style( 'roots_main', get_template_directory_uri() . '/assets/css/app.css', false, 'ae99fc18498a5429c9490e2bcab38c7b' );

  // jQuery is loaded using the same method from HTML5 Boilerplate:
  // Grab Google CDN's latest jQuery with a protocol relative URL; fallback to local if offline
  // It's kept in the header instead of footer to avoid conflicts with plugins.
  if ( !is_admin() && current_theme_supports( 'jquery-cdn' ) ) {
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js', array(), null, false );
  }

  wp_register_script( 'theme_script', get_template_directory_uri() . '/assets/js/scripts.min.js', array(), '83d5a4a6b261f1726adaab3bdd6975cb', true );
  wp_register_script( 'roots_scripts', get_template_directory_uri() . '/assets/js/script.js', array('theme_script'), '83d5a4a6b261f1726adaab3bdd6975cb', true );
  wp_enqueue_script( 'modernizr' );
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'roots_scripts' );
  wp_enqueue_script( 'theme_script' );
  if ( WP_DEBUG ) {
    wp_register_script( 'livereload', '//localhost:35729/livereload.js', array(), null, false );
    wp_enqueue_script( 'livereload' );
  }
}

add_action( 'wp_enqueue_scripts', 'roots_scripts', 100 );
