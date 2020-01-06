<?php
class Galeria{

	private $slide;
	private $file_uri;
	private $indicadores_numericos;
	private $barra_de_tiempo;
	private $duracion;

	function __construct($slide,$indicadores_numericos ,$barra_de_tiempo,$duracion){
		$this->slide = $slide;

		$this->file_uri = get_template_directory_uri().'/includes/galeria';
		$this->indicadores_numericos = $indicadores_numericos;
		$this->barra_de_tiempo  =$barra_de_tiempo;
		$this->duracion = $duracion;

		$this->setear_variables_JS($indicadores_numericos, $barra_de_tiempo, $duracion);
		$this->registrar_dependencias();
	}
	private function registrar_dependencias(){
		//SLICK JS
		wp_register_script( 'slick', $this->file_uri . '/slick/slick.min.js',array('jquery'), 181, true ); // 1.8.1 Version
		wp_enqueue_script( 'slick' );

		//SLICK CSS
		wp_enqueue_style('slick', $this->file_uri .'/slick/slick.css',181, true ); // 1.8.1 Version

		//GALERIA CSS
		wp_enqueue_style('galeria',$this->file_uri .'/css/style.css',false,THEME_VERSION ); 


	}
	private function setear_variables_JS($indicadores_numericos,$barra_de_tiempo,$duracion){
		if(is_bool($indicadores_numericos) && is_bool($barra_de_tiempo) && is_numeric($duracion)){
			?>
				<script type="text/javascript">
					const indicadores_numericos = <?php echo $indicadores_numericos; ?>;
					const duracion = <?php echo $duracion ?>;
					const barra_de_tiempo = <?php echo $barra_de_tiempo; ?>;
				</script>
			<?
		}else{
			return false;
		}
		
	}
	private function display_titulo_galeria($titulo, $clase, $etiqueta){
		if(strlen($titulo['texto'])){
			?>
				<div class="text-left">
					<div class="text-left d-inline-block shape <?php echo $clase?>-galeria cont-texto-galeria" style="background-color:<?php echo $titulo['background_color']; ?>;">
						<<?php echo $etiqueta; ?>><?php echo $titulo['texto']; ?></<?php echo $etiqueta; ?>>
					</div>
				</div>
			<?php
		}
	}
	private function mostrar_textos_galeria($titulo,$subtitulo,$pequena_descripcion){
		if(strlen($titulo['texto']) || strlen($subtitulo['texto'])){
			?>
			<div class="container-texto-galeria container-fluid h-100 w-100">
				<div class="row h-100 w-100">
					<div class="col text-center h-100 w-100">
						<div class="centrar-v"></div>
						<div class="d-inline-block align-middle">
							<?php
								$this->display_titulo_galeria($titulo,'titulo','h1');
								$this->display_titulo_galeria($subtitulo,'subtitulo','h2');
								$this->display_titulo_galeria($pequena_descripcion,'pequena-descripcion','p');
							?>
						</div>
					</div> <!-- /col -->
				</div><!-- /row -->
			</div> <!-- /container-fluid --> 
			<?php
		}
	}
	public function mostrar_imagen_fondo($imagen){
		if(array_key_exists('url', $imagen) && array_key_exists('alt',$imagen)){
			?>
				<div class="img-cover-container w-100 h-100">
					<div class="inner-imagen-cover w-100 h-100">
						<img class="img-cover" alt="<?php echo $imagen['alt'];?>" src=" <?php echo $imagen['url']; ?>"/>
					</div><!-- /inner-imagen-conver -->
				</div><!-- /img-cover-container -->
			<?php
		}
	}

	private function mostrar_linea_tiempo(){
		if($this->barra_de_tiempo == true){
		?>	
			<div class="text-center contenedor-barra-tiempo position-absolute">
				<?php
					$this->mostrar_numeros_carga();
				?>
				<div class="inner-cont-barra-tiempo position-relative">
					<div class="contenedor-indicador-carga">
						<div class="indicador-carga-fondo w-100 h-100"></div>
						<div class="indicador-carga h-100 position-absolute"></div>
					</div> <!--/contenedor-indicador-carga--->
				</div><!-- /inner-cont-barra-tiempo -->
			</div><!-- /contenedor-barra-tiempo -->
		<?
		}
		return false;
	}
	private function mostrar_numeros_carga(){
		if($this->indicadores_numericos){
			?>
				<div class="text-center container-fluid contenedor-numeros-carga">
					<div class="row">
						<div class="col">
							<?php
								$cantidad_imagenes = count($this->slide);
								for ($i = 0; $i < $cantidad_imagenes; $i++) {
									$clase = ($i == 0) ? "item-activo":"";?>
										<h2 class="indicador-imagen d-inline-block <?php echo $clase; ?>" data-numero="<?php echo $i?>"><?php echo $i+1 ?></h2>
									<?php
								}    
							?>
						</div>
					</div>
				</div>
			<?php
		}
	}
	public function mostrar_galeria(){
		?>
		<div class="position-relative">
			<div class="container-fluid container-sin-padding galeria-slick">
				<?php foreach($this->slide as $item_slide){?>
					<div class="is">
						<div class="col-12 col-sin-padding vh-100">
							<?php
								$grupo = $item_slide['grupo'];
		
								$titulo = $grupo['titulo'];
								$subtitulo = $grupo['subtitulo'];
								$pequena_descripcion = $grupo['pequena_descripcion'];
								$imagen = $grupo['imagen'];
		
								$this->mostrar_textos_galeria($titulo, $subtitulo, $pequena_descripcion);
								$this->mostrar_imagen_fondo($imagen);
								
							?>
						</div><!-- /col-12 -->
					</div><!-- /is -->
				<?php }
				?>	
			</div><!-- /container-fluid -->
			<?php 
				$this->mostrar_linea_tiempo();
				//$this->mostrar_flechas();
				$this->inicializar_script();
			?>
		</div>
		<?
		
	}
	private function inicializar_script(){
		wp_enqueue_script( 'main_galeria', $this->file_uri . '/js/main_galeria.js',array('jquery'), 1, true ); 
	}
}

