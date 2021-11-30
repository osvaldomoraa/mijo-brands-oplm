<?php 

function init_template(){
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag' );
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
    add_theme_support(
		'custom-header',
	);
    

    register_nav_menus(
        array(
          'top_menu' => 'Principal'
        )
    );
}
add_action('after_setup_theme','init_template');

function template_styles(){
    wp_register_style('recommendation', get_template_directory_uri() . '/assets/css/recommendation.css' );
    wp_register_style('bootstrap','https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css',false,'5.1.3','all');
    wp_register_style('bootstrap-icons','https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css',false,'','all');
    wp_register_style('franklin','https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;500;600&display=swap',false,'','all');
    
    wp_enqueue_style('main-style', get_stylesheet_uri(), array('bootstrap','bootstrap-icons','franklin'),'1.0','all');

    wp_register_script( 'popperjs', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js', false,'2.10.2', true );
    wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array('popperjs'),'5.1.3', true);

    wp_enqueue_script('main-scripts', get_stylesheet_uri(), array('popperjs','bootstrap'),'1.0','all');
}
add_action('wp_enqueue_scripts','template_styles');


require_once __DIR__ . '/vendor/cmb2/init.php';

require_once __DIR__ . '/features/recommendation-types.php';
require_once __DIR__ . '/features/recommendation-fields.php';