<?php



class paginaConfiguracion{

    
    
    function __construct(){
        add_action("admin_menu", array($this,"add_theme_settings_menu"));
    }

    function theme_settings_page(){
        ?>
            <div class="wrap">
            <h1>Configuraciones del sitio</h1>
            <form method="post" action="options.php">
                <?php
                    settings_fields("general");
                    do_settings_sections("theme-options");      
                    submit_button(); 
                ?>          
            </form>
            </div>
        <?php
    }
    
    function add_theme_settings_menu(){
        add_menu_page('Configuraciones del Tema','Config. Del Tema', "manage_options", "theme-panel", array($this,"theme_settings_page"), null, 99);
        $this->crear_secciones();
        $this->crear_campos();
    }
    private function crear_secciones(){
        add_settings_section("redes", "Redes sociales", null, "theme-options");
        add_settings_section("ubicacion", "Ubicacion", null, "theme-options");
    }
    private function crear_campos(){
    
        $this->crear_campos_redes_sociales();
        
        $this->crear_campos_ubicacion();
        
    }
    
    
    private function crear_campos_ubicacion(){
        add_settings_field("twitter_url", "Twitter Profile Url", array($this,"display_twitter_element"), "theme-options", "ubicacion");
        register_setting("general", "twitter_url");
    }
    
    private function crear_campos_redes_sociales(){
        add_settings_field("facebook_url", "Facebook URL", array($this,"display_facebook_element"), "theme-options", "redes");
        add_settings_field("instagram_url", "Instagram URL", array($this,"display_instagram_element"), "theme-options", "redes");
       
        register_setting("general", "facebook_url");
        register_setting("general", "instagram_url");
    }
    
    function display_facebook_element(){
        ?>
            <input type="text" name="facebook_url" id="facebook_url" value="<?php echo get_option('facebook_url'); ?>" />
        <?php
    }
    
    function display_instagram_element(){
        ?>
            <input type="text" name="instagram_url" id="instagram_url" value="<?php echo get_option('instagram_url'); ?>" />
        <?php
    }
    
    function display_twitter_element(){
        ?>
            <input type="text" name="twitter_url" id="twitter_url" value="<?php echo get_option('twitter_url'); ?>" />
        <?php
    
    }
}

