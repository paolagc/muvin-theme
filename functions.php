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

/**
 * Load theme plugins
 * 
**/
function cfct_load_plugins() {
    $files = cfct_files(CFCT_PATH.'plugins');
    if (count($files)) {
        foreach ($files as $file) {
            if (file_exists(CFCT_PATH.'plugins/'.$file)) {
                include_once(CFCT_PATH.'plugins/'.$file);
            }
// child theme support
            if (file_exists(STYLESHEETPATH.'/plugins/'.$file)) {
                include_once(STYLESHEETPATH.'/plugins/'.$file);
            }
        }
    }
}

/**
 * Get a list of php files within a given path as well as files in corresponding child themes
 * 
 * @param sting $path Path to the directory to search
 * @return array Files within the path directory
 * 
**/
function muvin_files($path) {
    $files = apply_filters('cfct_files_'.$path, false);
    if ($files) {
        return $files;
    }
    $files = wp_cache_get('cfct_files_'.$path, 'cfct');
    if ($files) {
        return $files;
    }
    $files = array();
    $paths = array($path);
    if (STYLESHEETPATH.'/' != CFCT_PATH) {
        // load child theme files
        $paths[] = STYLESHEETPATH.'/'.str_replace(CFCT_PATH, '', $path);
    }
    foreach ($paths as $path) {
        if (is_dir($path) && $handle = opendir($path)) {
            while (false !== ($file = readdir($handle))) {
                $path = trailingslashit($path);
                if (is_file($path.$file) && strtolower(substr($file, -4, 4)) == ".php") {
                    $files[] = $file;
                }
            }
            closedir($handle);
        }
    }
    $files = array_unique($files);
    wp_cache_set('cfct_files_'.$path, $files, 'cfct', 3600);
    return $files;
}