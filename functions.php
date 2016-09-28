<?php



/* Include theme styles */
function theme_enqueue_styles() {

    wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.min.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.min.css' );
	wp_enqueue_style( 'flexslider', get_stylesheet_directory_uri() . '/css/flexslider.css' );
    wp_enqueue_style( 'theme-style', get_stylesheet_directory_uri() . '/css/style.css' );
    wp_enqueue_style( 'jquery-ui', get_stylesheet_directory_uri() . '/css/jquery-ui.css' );
	
	
	wp_enqueue_script( 'jquery', get_stylesheet_directory_uri() . '/js/jquery-3.1.0.min.js' ); 
	wp_enqueue_script( 'flexslider', get_stylesheet_directory_uri() . '/js/jquery.flexslider-min.js' ); 
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.min.js' );
	wp_enqueue_script( 'jquery-ui',   get_stylesheet_directory_uri() . '/js/jquery-ui.js', array( 'jquery' ), false, true ); 
	wp_enqueue_script( 'theme-script', get_stylesheet_directory_uri() . '/js/main.js');
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

function add_myjavascript(){  
    wp_enqueue_script( 'function.js', get_bloginfo('template_directory') . "/js/function.js", array( 'jquery' ) );  
} 

add_action( 'init', 'add_myjavascript' ); 


/* Include Nav Menu */
function theme_register_nav_menu() {
	register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'theme_register_nav_menu' );

add_action( 'wp_ajax_nopriv_autocompliteCountryName', 'autocompliteCountryName' );  
add_action( 'wp_ajax_autocompliteCountryName', 'autocompliteCountryName' ); 
add_action( 'wp_ajax_nopriv_echoSecion3firstBlock', 'echoSecion3firstBlock' );  
add_action( 'wp_ajax_echoSecion3firstBlock', 'echoSecion3firstBlock' ); 

add_action( 'wp_ajax_nopriv_echoSection5', 'echoSection5' );  
add_action( 'wp_ajax_echoSection5', 'echoSection5' ); 


$dirName = dirname(__FILE__);
$baseName = basename(realpath($dirName));
require_once ("$dirName/MyFunctions.php");


?>