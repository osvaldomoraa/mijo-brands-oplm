<?php

if ( ! function_exists('recommendations') ) {

function recommendations() {

	$labels = array(
		'name'                  => _x( 'Recommendations', 'Post Type General Name', 'oplm' ),
		'singular_name'         => _x( 'Recommendation', 'Post Type Singular Name', 'oplm' ),
		'menu_name'             => __( 'Recomendaciones', 'oplm' ),
	);
	$args = array(
		'label'                 => __( 'Recommendation', 'oplm' ),
		'description'           => __( 'Recommendations from other parents', 'oplm' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'page-attributes', 'post-formats' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-thumbs-up',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'recommendation', $args );

}
add_action( 'init', 'recommendations', 0 );

}