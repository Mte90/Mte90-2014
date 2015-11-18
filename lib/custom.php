<?php

/**
 * Custom functions
 */
add_action( 'wp_enqueue_scripts', function() {
	wp_deregister_style( 'font-awesome-four' );
	wp_enqueue_style( 'font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css' );

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
	    'rewrite' => array( 'slug' => 'guest-post' )
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

add_action( 'wp_head', 'guest_redirect' );

function guest_redirect() {
	if ( is_single() ) {
		$url = append_query_string( '' );
		if ( !empty( $url ) ) {
			wp_redirect( $url, 301 );
			exit;
		}
	}
}

add_filter( 'the_permalink', 'append_query_string' );

add_filter( 'the_permalink_rss', 'guest_post_permalink' );

function guest_post_permalink( $link ) {
	$id = url_to_postid( $link );
	if ( 'guest_post' === get_post_type( $id ) ) {
		return get_post_meta( $id, '_cmb_gp_link', true );
	} else {
		return $link;
	}
}

add_filter( 'addthis_post_exclude', 'addthis_post_exclude' );

function addthis_post_exclude( $display ) {
	if ( is_front_page() || is_archive() )
		$display = false;
	return $display;
}

add_action( 'wp_enqueue_scripts', function() {
	if ( !is_admin() ) {
		wp_dequeue_script( 'quicktags-min' );
		wp_deregister_script( 'quicktags-min' );
		wp_dequeue_style( 'ceceppaml-flags' );
		wp_deregister_style( 'ceceppaml-flags' );
		wp_dequeue_style( 'github-oembed' );
		wp_deregister_style( 'github-oembed' );
	}
	if ( is_front_page() || is_archive() ) {
		wp_dequeue_style( 'crayon' );
		wp_deregister_style( 'crayon' );
		wp_dequeue_style( 'dlm-page-addon-frontend' );
		wp_deregister_style( 'dlm-page-addon-frontend' );
		wp_dequeue_script( 'crayon_js' );
		wp_deregister_script( 'crayon_js' );
	}
	if ( !is_page( 183 ) ) {
		wp_dequeue_style( 'dlm-page-addon-frontend' );
		wp_deregister_style( 'dlm-page-addon-frontend' );
	}
	if ( !is_singular( array( 'dlm_download' ) ) && !is_post_type_archive( 'dlm_download' ) && !is_tax( 'dlm_download_category' ) && !is_page( 183 ) ) {
		wp_dequeue_style( 'dlm-frontend' );
	}
}, 200 );

function wpseo_disable_rel_author( $link ) {
	return false;
}

add_filter( 'wpseo_author_link', 'wpseo_disable_rel_author' );

function feed_request( $qv ) {
	if ( isset( $qv[ 'feed' ] ) && !isset( $qv[ 'post_type' ] ) ) {
		$qv[ 'post_type' ] = array( 'post', 'guest_post' );
	}
	return $qv;
}

add_filter( 'request', 'feed_request' );

remove_shortcode('wp_caption', 'img_caption_shortcode');
remove_shortcode('caption', 'img_caption_shortcode');
add_shortcode('wp_caption', 'img_caption_shortcode_width');
add_shortcode('caption', 'img_caption_shortcode_width');

function img_caption_shortcode_width( $attr, $content = null ) {
	// New-style shortcode with the caption inside the shortcode with the link and image tags.
	if ( ! isset( $attr['caption'] ) ) {
		if ( preg_match( '#((?:<a [^>]+>\s*)?<img [^>]+>(?:\s*</a>)?)(.*)#is', $content, $matches ) ) {
			$content = $matches[1];
			$attr['caption'] = trim( $matches[2] );
		}
	} elseif ( strpos( $attr['caption'], '<' ) !== false ) {
		$attr['caption'] = wp_kses( $attr['caption'], 'post' );
	}

	$atts = shortcode_atts( array(
		'id'	  => '',
		'align'	  => 'alignnone',
		'width'	  => '',
		'caption' => '',
		'class'   => '',
	), $attr, 'caption' );

	if ( ! empty( $atts['id'] ) )
		$atts['id'] = 'id="' . esc_attr( sanitize_html_class( $atts['id'] ) ) . '" ';

	$class = trim( 'wp-caption ' . $atts['align'] . ' ' . $atts['class'] );

        return '<figure ' . $atts['id'] . ' class="' . esc_attr( $class ) . '">'
		. do_shortcode( $content ) . '<figcaption class="wp-caption-text">' . $atts['caption'] . '</figcaption></figure>';
}
