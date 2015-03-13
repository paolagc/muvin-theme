<?php

/**
 * @package WordPress
 * @subpackage Muvin Theme
*/

function muvin_enqueue_css() {	
	//load css files

	//plugins
	wp_enqueue_style('bootstrap', get_template_directory_uri(). '/css/bootstrap.min.css', 'style');

	//custom
	wp_enqueue_style('header', get_template_directory_uri(). '/css/header.css');
	wp_enqueue_style('footer', get_template_directory_uri(). '/css/footer.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css', 'style');
}

function muvin_enqueue_scripts() {	
	//load js files
	wp_enqueue_script("jquery");
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js','jquery', '1.4.8', TRUE);
}

function muvin_setup(){

	/*
	* Navigation Menus
	*/
	register_nav_menus(
		array(
		'main'=>__('Main Menu'),
		'user'=>__('User Menu'),
		'footer'=>__('Footer Menu'),
		)
	);
	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );
	/*
	 * Enable support for Post Formats.
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );


	if ( function_exists( 'add_theme_support' ) ) { 
	    add_theme_support( 'post-thumbnails' ,array('post', 'page'));
	}
}
add_action( 'init', 'muvin_setup' );