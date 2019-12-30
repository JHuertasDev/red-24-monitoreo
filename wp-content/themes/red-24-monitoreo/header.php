<?php
wp_deregister_script( 'jquery' );
wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
wp_enqueue_script( 'jquery' );

wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', '', 19, true );

$whitelist = array(
    '127.0.0.1',
    '::1'
);
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
        <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
        <meta name="description" content="">
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]>
            <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
            <script>window.html5 || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"><\/script>')</script>
        <![endif]-->
		
		<?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>