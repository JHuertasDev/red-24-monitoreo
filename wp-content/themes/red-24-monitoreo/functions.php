<?php
$apiKey = 'AIzaSyCGjC4skB05MM-2b3X1V48qeRxhTYfbTeI';
$theme_version = 28122019;

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function registrar_scripts(){
	global $apiKey;
	global $theme_version;

	wp_enqueue_script( 'maps','https://maps.googleapis.com/maps/api/js?key='.$apiKey.'&amp;ver=4.9.10&libraries=places' );
	wp_enqueue_script('maps');

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', get_template_directory_uri().'/vendor/components/jquery/jquery.min.js',false, 341, true ); // 3.4.1 Version
	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery','maps'), $theme_version, true );
	
	wp_register_style('bootstrap',get_template_directory_uri().'/vendor/twbs/bootstrap/dist/css/bootstrap.min.css',441 ,true); // 4.4.1 Version
	wp_enqueue_style('bootstrap');

	wp_register_style('style',get_template_directory_uri().'/style.css',array('bootstrap'),$theme_version);
	wp_enqueue_style('style');

}
add_action( 'wp_enqueue_scripts', 'registrar_scripts');

function menu_principal() {
	register_nav_menu('menu-principal',__( 'Menú principal' ));
}
add_action( 'init', 'menu_principal' );

?>
