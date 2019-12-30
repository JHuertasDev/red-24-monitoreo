<?php
$apiKey = 'AIzaSyCGjC4skB05MM-2b3X1V48qeRxhTYfbTeI';

remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

function registrar_scripts(){
	global $apiKey;

	print_r($apiKey);
	wp_enqueue_script( 'maps','https://maps.googleapis.com/maps/api/js?key='.$apiKey.'&amp;ver=4.9.10&libraries=places' );
	wp_enqueue_script('maps');

	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js', array('maps'), 23, true );

    wp_localize_script( 'main', 'ajax_var', array(
        'url'    => admin_url( 'admin-ajax.php' ),
    ) );

}
add_action( 'wp_enqueue_scripts', 'registrar_scripts');

add_action('wp_ajax_nopriv_enviar_datos_mp', 'enviar_datos_mp' );
add_action('wp_ajax_enviar_datos_mp', 'enviar_datos_mp' );
function enviar_datos_mp(){
	//Enviamos el mail
	$message = '<p><b>Detalle: '.$_POST['detalle_deposito'].'</b></p>';
	$importe = '$'.$_POST['importe'];
	$message .= '<p><b>Importe: </b>'.$importe.'</p>';
	$message .= '<br>';

	$nombreYApellido .= $_POST['nombre_y_apellido'];
	$message .= '<p><b>Nombre y apellido: </b>'.$nombreYApellido.'</p>';

	$telefono .= $_POST['telefono'];
	$message .= '<p><b>Teléfono: </b>'.$telefono.'</p>';

	$direccion .= $_POST['direccion'];
	$message .= '<p><b>Dirección: </b>'.$direccion.'</p>';

	$ciudad .= $_POST['ciudad'];
	$message .= '<p><b>Ciudad: </b>'.$ciudad.'</p>';

	$email .= $_POST['mail'];
	$message .= '<p><b>Mail: </b>'.$email.'</p>';

	$para .= $_POST['para'];
	$message .= '<p><b>Para: </b>'.$para.'</p>';
	
	$telefono_r = $_POST['telefonor'];
	$message .= '<p><b>Teléfono: </b>'.$telefono_r.'</p>';

	$mensaje .= $_POST['mensaje'];
	$message .= '<p><b>Mensaje para la tarjeta: </b>'.$mensaje.'</p>';

	$metodo_pago = $_POST['metodo_pago'];
	$message .= '<p><b>Metodo de pago:	: </b>'.$metodo_pago.'</p>';

	

	$fecha_entrega = $_POST['fecha'];
	$message .= '<p><b>Fecha de entrega: </b>'.$fecha_entrega.'</p>';

	$horario = $_POST['horario'];
	$message .= '<p><b>Horario: </b>'.$horario.'</p>';
	
	$link = $_POST['link'];
	$message .= '<p><b>Enlace de pago:</b></p>';
	$message .= '<p><a href="'.$link.'" target="_blank">'.$link.'</a></p>';



	$email = $_POST['mail'];

	$headers = array('Content-Type: text/html; charset=UTF-8');

	$mail = wp_mail($email, "Datos de deposito Boulangeriepyc",$message, $headers);
	echo 1;
	die();
}


add_action('wp_ajax_nopriv_enviar_datos_deposito', 'enviar_datos_deposito' );
add_action('wp_ajax_enviar_datos_deposito', 'enviar_datos_deposito' );
function enviar_datos_deposito(){
	//Enviamos el mail
	$message = '<p><b>Detalle: '.$_POST['detalle_deposito'].'</b></p>';
	$importe = '$'.$_POST['importe'];
	$message .= '<p><b>Importe: </b>'.$importe.'</p>';
	$message .= '<br>';
	$message .= $_POST['datos_deposito'];
	$email = $_POST['mail'];
	
	$headers = array('Content-Type: text/html; charset=UTF-8');

	$mail = wp_mail($email, "Datos de deposito Boulangeriepyc",$message, $headers);
	echo 1;
	die();
}

function my_acf_init() {
	global $apiKey;
	acf_update_setting('google_api_key', $apiKey);
}
add_action('acf/init', 'my_acf_init');

if (!function_exists('remove_wp_open_sans')){
	function remove_wp_open_sans() {
		wp_deregister_style( 'open-sans' );
		wp_register_style( 'open-sans', false );
	}
	add_action('wp_enqueue_scripts', 'remove_wp_open_sans');
}

function menu_principal() {
	register_nav_menu('menu-principal',__( 'Menú principal' ));
}
add_action( 'init', 'menu_principal' );

function menu_movil() {
	register_nav_menu('menu-movil',__( 'Menú móvil' ));
}
add_action( 'init', 'menu_movil' );

wpcf7_add_form_tag('pedido', 'crearpedido', true);

function crearpedido(){
	$output = 	'<span class="wpcf7-form-control-wrap pedido" style="display: none;">'.
					'<input type="hidden" name="pedido" value="" class="wpcf7-form-control wpcf7-text" aria-invalid="false" readonly id="pedidot" />'.
				'</span>';
				
	return $output;
}
add_filter( 'wpcf7_validate_retira', 'retira_validacion', 20, 2 );
 
function retira_validacion( $result, $tag ) {

	if(isset($_POST['retira']) ){
		if($_POST['retira'] == "No, retira por -no definido."){
			$result->invalidate( $tag, "Por favor complete este campo." );
		}
	}else{
		$result->invalidate( $tag, "Por favor complete este campo." );
	}
     
    return $result;
}


wpcf7_add_form_tag('retira', 'crearretira', true);

function crearretira(){
	$output = 	'<span class="wpcf7-form-control-wrap retira" style="display: none;">'.
					'<input type="hidden" name="retira" value="" class="wpcf7-form-control wpcf7-text" aria-invalid="false" readonly id="retirat" />'.
				'</span>';
				
	return $output;
}

wpcf7_add_form_tag('link', 'crearlink', true);

function crearlink(){
	$output = 	'<span class="wpcf7-form-control-wrap link" style="display: none;">'.
					'<input type="hidden" name="link" value="" class="wpcf7-form-control wpcf7-text" aria-invalid="false" readonly id="retiral" />'.
				'</span>';
				
	return $output;
}

wpcf7_add_form_tag('fecha', 'crearfecha', true);

function crearfecha(){
	$output = 	'<span class="wpcf7-form-control-wrap fecha" style="display: none;">'.
					'<input type="hidden" name="fecha" value="" class="wpcf7-form-control wpcf7-text" aria-invalid="false" readonly id="fechaf" />'.
				'</span>';
				
	return $output;
}

add_filter( 'wpcf7_validate_fecha', 'fecha_validacion', 20, 2 );
 
function fecha_validacion( $result, $tag ) {

	if(isset($_POST['fecha']) ){
		if($_POST['fecha'] == ''){
			$result->invalidate( $tag, "Por favor complete este campo." );
		}
	}else{
		$result->invalidate( $tag, "Por favor complete este campo." );
	}
     
    return $result;
}

wpcf7_add_form_tag('hora', 'crearhora', true);

function crearhora(){
	$output = 	'<span class="wpcf7-form-control-wrap hora" style="display: none;">'.
					'<input type="hidden" name="hora" value="8:30" class="wpcf7-form-control wpcf7-text" aria-invalid="false" readonly id="horaf" />'.
				'</span>';
				
	return $output;
}

add_action( 'wp_footer', 'enviar_y_ejecutar' );

function enviar_y_ejecutar() {
	?>
	<script type="text/javascript">
	document.addEventListener( 'wpcf7mailsent', function( event ) {
		switch(event.detail.contactFormId){
			case "82":
				
				Pagar();
			break;
			case "93":
			case "94":
				Gracias();
			case "1796":
				PagarDemo();
			break;
		}
	}, false );

	document.addEventListener('wpcf7invalid', function(event){
		if($('span.wpcf7-form-control-wrap.fecha .wpcf7-not-valid-tip').length){
			var error = $('span.wpcf7-form-control-wrap.fecha .wpcf7-not-valid-tip').clone();
			$('.contenedor_error_fecha').html(error);
		}else{
			$('.contenedor_error_fecha').html('');
		}

		if($('span.wpcf7-form-control-wrap.retira .wpcf7-not-valid-tip').length){
			var error = $('span.wpcf7-form-control-wrap.retira .wpcf7-not-valid-tip').clone();
			$('.contenedor_error_retira').html(error);
		}else{
			$('.contenedor_error_retira').html('');
		}
		
	})
	</script>
	<?php
}

// Update CSS within in Admin
function admin_style() {
	wp_enqueue_style('admin-styles-bou', get_template_directory_uri().'/css/admin-style.css');
}
add_action('admin_enqueue_scripts', 'admin_style');


add_filter('wp_mail_from','yoursite_wp_mail_from');
function yoursite_wp_mail_from($content_type) {
	return 'info@boulangeriepyc.com';
}
add_filter('wp_mail_from_name','yoursite_wp_mail_from_name');
function yoursite_wp_mail_from_name($name) {
  return 'Boulangeriepyc';
}
?>