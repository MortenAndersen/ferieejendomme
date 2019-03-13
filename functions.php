<?php

// Flytter scripts til footer
function ferieejendomme_theme_footer_enqueue_scripts() {
  remove_action( 'wp_head', 'wp_print_scripts' );
  remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
  remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
}
add_action( 'wp_enqueue_scripts', 'ferieejendomme_theme_footer_enqueue_scripts' );

// Theme jQuery fil
function ferieejendomme_theme_scripts() {
  wp_register_script( 'theme-script', get_template_directory_uri() . '/assets/js/theme.min.js', array('jquery') );
  wp_enqueue_script( 'theme-script' );
}
add_action( 'wp_enqueue_scripts', 'ferieejendomme_theme_scripts' );

// ---------------------------------------------------
if (!function_exists( 'ferieejendomme_theme_setup' )):

function ferieejendomme_theme_setup() {

	// Fjern elementer i WP
	remove_action( 'wp_head', 'feed_links_extra', 3 );
	remove_action( 'wp_head', 'feed_links' );
	remove_action( 'wp_head', 'wp_shortlink_wp_head' );
	remove_action( 'wp_head', 'rsd_link' );
	remove_action( 'wp_head', 'rest_output_link_wp_head' );
	remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
	remove_action( 'wp_head', 'wlwmanifest_link' );
	remove_action( 'wp_head', 'wp_generator' );

	// HTML5
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		) );
	// Title Tag
	add_theme_support( 'title-tag' );
	// Feed links
	add_theme_support( 'automatic-feed-links' );
	// Images
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'small-image', 400, 240, true );

	// Shortkoder i widget
	add_filter( 'widget_text', 'do_shortcode' );

	// Menu
	register_nav_menus(array(
		'main-menu' => __( 'Main Menu', 'ferieejendomme_theme' ),
	));

}

add_action( 'after_setup_theme', 'ferieejendomme_theme_setup' );

endif;

add_filter( 'get_the_archive_title', function ( $title ) {

    if( is_category() ) {

        $title = single_cat_title( '', false );

    }

    return $title;

});


// Fjener prefix til title - archive etc.
add_filter('get_the_archive_title', function ($title) {
    return preg_replace('/^\w+: /', '', $title);
});

// ---------------------------------------------------

// Widget
require get_parent_theme_file_path( '/inc/widget.php' );
// Posttype
require get_parent_theme_file_path( '/inc/theme-functions.php' );
// Posttype
require get_parent_theme_file_path( '/inc/posttype.php' );