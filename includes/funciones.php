<?php

    define ('TEMPLATES_URL', __DIR__ . '/templates');
    define ('FUNCIONES_URL', __DIR__ . 'funcionces.php');
    define ('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
 
    
function incluirTemplate ( string $nombre , bool $inicio = false ) {
    include TEMPLATES_URL . "/${nombre}.php";
}

function estaAutenticado ()  {
    session_start();
        

    if (!$_SESSION['login']) {
        header('Location: ../../');
    }
        
}

function debugear($variable) {

    echo "<pre>";
      var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}

//Validar tipo de contenido
function validarTipoContenido ($tipo) {

    $tipos = [ 'vendedor', 'propiedad', 'entrada' ];

    return in_array($tipo, $tipos);
}

//Muestra las notificaciones en el admin
function mostrarNotificacion ($codigo) {
   $mensaje ='';

   switch($codigo) {
        
        case 1:
            $mensaje = 'Creado Exitosamente';
        break;
        
        case 2:
            $mensaje = 'Actualizado Exitosamente';
        break;

        case 3:
             $mensaje = 'Eliminado Exitosamente';
        break;
        
        default:
        $mensaje = false;
        break;
   }
   return $mensaje;
}

function validarORedireccionar (string $url) {
    //VALIDAR URL POR ID VALIDO
    $id = $_GET['id'];
    $id = filter_var( $id , FILTER_VALIDATE_INT);

    if (!$id) {
        header( "Location: ${url}" );
    }
    return $id;
}

//limitar string 
function limitar_cadena($cadena, $limite, $sufijo){
	// Si la longitud es mayor que el límite...

    
	if(strlen($cadena) > $limite){
		// Entonces corta la cadena y ponle el sufijo
		return substr($cadena, 0, $limite) . $sufijo;
	}
	
	// Si no, entonces devuelve la cadena normal
	return $cadena;
}