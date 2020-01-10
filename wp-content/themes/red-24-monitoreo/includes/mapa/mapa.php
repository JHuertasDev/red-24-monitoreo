<?php 
    class mapa{
        private $mapa;
        private $file_uri;

        public function __construct(){
            $this->mapa = get_field('ubicacion','options');
            $this->file_uri = get_template_directory_uri().'/includes/mapa';
        }   
        public function generar_mapa_html(){
            ?>
                <div class="mapa-container" data-lat="<?php echo $this->get_lat();?>" data-lng="<?php echo $this->get_lng();?>">
                    <div id="map">
                    
                    </div>
                </div>
            <?php
            $this->cargar_mapa_JS();
            $this->generar_estilo_mapa();
        }

        private function generar_estilo_mapa(){
            ?>
                <style>
                    .mapa-container, #map{
                        width: 100%;
                        height: 100%;
                    }
                </style>
            <?php
        }

        private function get_lat(){
            if(is_array($this->mapa) && array_key_exists('lat',$this->mapa)){
                return $this->mapa['lat'];
            }else{
                return false;
            }
        }

        private function get_lng(){
            if(is_array($this->mapa) && array_key_exists('lng',$this->mapa)){
                return $this->mapa['lng'];
            }else{
                return false;
            }        
        }

        private function cargar_mapa_JS(){
            wp_enqueue_script( 'maps','https://maps.googleapis.com/maps/api/js?key='.THEME_GOOGLE_API_KEY.'&amp;ver=4.9.10&libraries=places' );
	        wp_enqueue_script('maps');
            wp_register_script( 'mapa_js', $this->file_uri . '/js/mapa.js',array('jquery','maps'), 181, true ); // 1.8.1 Version
		    wp_enqueue_script( 'mapa_js' );
        }
    }