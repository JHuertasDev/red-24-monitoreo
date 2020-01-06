<?php
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

        <div id="menu-contenedor" class="text-center">
            <div class="contenedor-general">                    
                <div id="menu-logo-container" class="align-middle d-inline-block">
                    <?php 
                        the_custom_logo();
                    ?>
                </div><!-- /#menu-logo-container-->

                <div id="inner-menu-container" class="align-middle d-inline-block">
                    <?php
                        wp_nav_menu( array( 'theme_location' => 'menu-principal' ) );
                    ?>
                </div> <!-- /#inner-menu-container-->
            </div>  <!--- /contenedor-general-->
        </div> <!-- /#menu-contenedor-->
