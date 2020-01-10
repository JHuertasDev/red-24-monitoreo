<?php

include_once( get_theme_file_path( "includes/galeria/galeria.php" ) );
include_once( get_theme_file_path( "includes/mapa/mapa.php" ) );


define('THEME_VERSION', '28122019' );
define('THEME_GOOGLE_API_KEY', 'AIzaSyCxm9ZRPoQy_84MgDzFmB3XR2oYKv4f_iQ' );
//mi api AIzaSyDIOyFgK3LvkZG6EJDEzlAaNJdqBH1Derk
define('THEME_TEMPLATE_DIRECTORY_URI',get_template_directory_uri());
define('THEME_STYLESHEET_DIRECTORY_URI', get_template_directory_uri().'/css' );
define('THEME_JAVASCRIPT_DIRECTORY_URI', THEME_TEMPLATE_DIRECTORY_URI.'/js' );
define('THEME_JAVASCRIPT_PLUGINS_DIRECTORY_URI', THEME_TEMPLATE_DIRECTORY_URI.'/js/plugins' );


remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function registrar_scripts(){

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', THEME_TEMPLATE_DIRECTORY_URI.'/vendor/components/jquery/jquery.min.js',false, 341, true ); // 3.4.1 Version
	wp_enqueue_script( 'jquery' );	

	//Styles
	wp_register_style('bootstrap',THEME_TEMPLATE_DIRECTORY_URI.'/vendor/twbs/bootstrap/dist/css/bootstrap.min.css',441); // 4.4.1 Version
	wp_enqueue_style('bootstrap');

	wp_enqueue_style('style',THEME_TEMPLATE_DIRECTORY_URI.'/style.css',false,THEME_VERSION ); 
	wp_enqueue_style('menu',THEME_STYLESHEET_DIRECTORY_URI.'/menu.css',false,THEME_VERSION ); 

	//Plugins

	wp_register_script( 'imgCoverEffect', THEME_JAVASCRIPT_PLUGINS_DIRECTORY_URI . '/imgCoverEffect/imgCoverEffect.min.js',array('jquery'), 21, true ); // 0.2.1 Version
	wp_enqueue_script( 'imgCoverEffect' ); 
	
	wp_enqueue_script( 'main', THEME_JAVASCRIPT_DIRECTORY_URI . '/main.js', array('jquery','imgCoverEffect'),THEME_VERSION , true );
}
add_action( 'wp_enqueue_scripts', 'registrar_scripts');

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
function my_acf_google_map_api( $api ){
	
	$api['key'] = THEME_GOOGLE_API_KEY;
	
	return $api;
	
}

add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');
function configurar_ACF(){

	if( function_exists('acf_add_options_page') ) {
		$option_page = acf_add_options_page(array(
			'page_title'    => __('Configuraciones generales del tema'),
			'menu_title'    => __('Config. Generales'),
			'menu_slug'     => 'theme-general-settings',
			'capability'    => 'edit_posts',
			'redirect'      => false
		));	
	}
}
function inicializar() {
	register_nav_menu('menu-principal',__( 'Menú principal' ));

	configurar_ACF();
}
add_action( 'init', 'inicializar' );
add_theme_support( 'custom-logo' );

