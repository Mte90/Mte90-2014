<?php

/**
 * Custom functions
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_deregister_style( 'font-awesome-four' );
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css' );

	wp_localize_script( 'roots_scripts', 'template', array( 'path' => get_template_directory_uri() ) );
}, 200 );

function custom_excerpt_length( $length ) {
	return 30;
}

add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

// Replaces the excerpt "more" text by a link
function new_excerpt_more( $more ) {
	global $post;
	return '';
}

add_filter( 'excerpt_more', 'new_excerpt_more' );

function remove_home_class( $classes ) {
	if ( is_front_page() ) {
		$classes = array_diff( $classes, array( 'page', 'page-template-templatespage-index-php' ) );
	}
	return $classes;
}

add_filter( 'body_class', 'remove_home_class', 10, 3 );

add_action( 'init', 'cmb_initialize_cmb_meta_boxes', 9999 );

/**
 * Initialize the metabox class.
 */
function cmb_initialize_cmb_meta_boxes() {

	if ( !class_exists( 'cmb_Meta_Box' ) )
		require_once 'cmb/init.php';
}

add_filter( 'cmb_meta_boxes', 'cmb_metaboxes' );

function cmb_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = '_cmb_';

	$meta_boxes[ 'mte_metabox' ] = array(
		'id' => 'mte_metabox',
		'title' => __( 'Video', 'cmb' ),
		'pages' => array( 'post', ), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __( 'Video', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id' => $prefix . 'video',
				'type' => 'text_url',
			),
		)
	);

	$meta_boxes[ 'mte_gp_metabox' ] = array(
		'id' => 'mte_gp_metabox',
		'title' => __( 'Link', 'cmb' ),
		'pages' => array( 'guest_post', ), // Post type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __( 'Link', 'cmb' ),
				'desc' => __( '', 'cmb' ),
				'id' => $prefix . 'gp_link',
				'type' => 'text_url',
			),
		)
	);

	return $meta_boxes;
}

class YT_Widget extends WP_Widget {

	function __construct() {
		parent::__construct(
				'yt_widget', // Base ID
				__( 'Youtube Box', 'roots' ), // Name
				array( 'description' => __( 'Youtube Float Post', 'roots' ), ) // Args
		);
	}

	public function widget( $args, $instance ) {
		if ( is_single() ) {
			$video = get_post_meta( get_the_ID(), '_cmb_video', true );
			if ( !empty( $video ) ) {

				echo $args[ 'before_widget' ] . '<div class="affix fixed_box" data-spy="affix" data-offset-top="10" data-offset-bottom="200">';

				$video_url = get_post_meta( get_the_ID(), '_cmb_video', true );
				echo '<div class="videobox">' . wp_oembed_get( $video_url, array( 'width' => '' ) ) . '</div>';

				echo '</div>' . $args[ 'after_widget' ];
			}
		}
	}

	public function form( $instance ) {
		return $instance;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		return $instance;
	}

}

// class YT_Widget
// register YT_Widget widget
function register_foo_widget() {
	register_widget( 'YT_Widget' );
}

add_action( 'widgets_init', 'register_foo_widget' );

function oembed_dimensions( $html, $url, $args ) {

	// Find the height value, replace it with Media Settings value
	$height_pattern = "/height=\"[0-9]*\"/";
	$html = preg_replace( $height_pattern, "", $html );

	// Find the width value, replace it with Media Settings value
	$width_pattern = "/width=\"[0-9]*\"/";
	$html = preg_replace( $width_pattern, "", $html );

	// Now return the updated markup
	return $html;
}

// end example_custom_oembed_dimensions
add_filter( 'embed_oembed_html', 'oembed_dimensions', 10, 3 );

// Register Custom Post Type
function projects() {

	$labels = array(
		'name' => _x( 'Projects', 'Projects General Name', 'roots' ),
		'singular_name' => _x( 'Projects', 'Projects Singular Name', 'roots' ),
		'menu_name' => __( 'Projects', 'roots' ),
		'parent_item_colon' => __( 'Parent Item:', 'roots' ),
		'all_items' => __( 'All Items', 'roots' ),
		'view_item' => __( 'View Item', 'roots' ),
		'add_new_item' => __( 'Add New Item', 'roots' ),
		'add_new' => __( 'Add New', 'roots' ),
		'edit_item' => __( 'Edit Item', 'roots' ),
		'update_item' => __( 'Update Item', 'roots' ),
		'search_items' => __( 'Search Item', 'roots' ),
		'not_found' => __( 'Not found', 'roots' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'roots' ),
	);
	$args = array(
		'label' => __( 'projects', 'roots' ),
		'description' => __( 'Projects', 'roots' ),
		'labels' => $labels,
		'supports' => array( 'title', 'editor' ),
		'taxonomies' => array( 'category' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 10,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'projects', $args );
}

// Hook into the 'init' action
add_action( 'init', 'projects', 0 );

function guest_post() {

	$labels = array(
		'name' => _x( 'Guest Posts', 'Post Type General Name', 'roots' ),
		'singular_name' => _x( 'Guest Post', 'Post Type Singular Name', 'roots' ),
		'menu_name' => __( 'Guest Post', 'roots' ),
		'parent_item_colon' => __( 'Parent Item:', 'roots' ),
		'all_items' => __( 'All Items', 'roots' ),
		'view_item' => __( 'View Item', 'roots' ),
		'add_new_item' => __( 'Add New Item', 'roots' ),
		'add_new' => __( 'Add New', 'roots' ),
		'edit_item' => __( 'Edit Item', 'roots' ),
		'update_item' => __( 'Update Item', 'roots' ),
		'search_items' => __( 'Search Item', 'roots' ),
		'not_found' => __( 'Not found', 'roots' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'roots' ),
	);
	$args = array(
		'label' => __( 'guest_post', 'roots' ),
		'description' => __( 'Guest Post', 'roots' ),
		'labels' => $labels,
		'supports' => array( 'title', ),
		'taxonomies' => array( 'category' ),
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_in_admin_bar' => true,
		'menu_position' => 11,
		'can_export' => true,
		'has_archive' => true,
		'exclude_from_search' => false,
		'publicly_queryable' => true,
		'capability_type' => 'page',
	);
	register_post_type( 'guest_post', $args );
}

// Hook into the 'init' action
add_action( 'init', 'guest_post', 0 );

function append_query_string( $url ) {
	if ( 'guest_post' === get_post_type( get_the_ID() ) ) {
		return get_post_meta( get_the_ID(), '_cmb_gp_link', true );
	} else {
		return $url;
	}
}

add_filter( 'the_permalink', 'append_query_string' );