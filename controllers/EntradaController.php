<?php

namespace Controllers;

use Model\Entrada;
use Model\Vendedor;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class EntradaController {

    public static function crear (Router $router){

        $entrada = new Entrada;
        $vendedores = Vendedor::all();

        //Arreglo con mensajes de errores
        $errores = Entrada::getErrores();

        if ( $_SERVER["REQUEST_METHOD"] === 'POST') {
               
            /*Crear una nueva instancia */
            $entrada = new Entrada($_POST['entrada']);

            /* SUBIDA DE ARCHIVOS */
        
            //Generar un nombra unico
            $nombreImagen = md5(uniqid(rand(), true) ) . '.jpg';

        //Setear la imagen
        //realiza un resize a la imagen con intervention
        
        if ($_FILES['entrada']['tmp_name']['imagen']){
            $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
            //guarda nombre de la imagen
            $entrada->setImagen($nombreImagen);
        }

        //Validar
        $errores = $entrada->validar();
    
        if (empty($errores)) {

            //crear carpeta para subir imagenes
            if(!is_dir(CARPETA_IMAGENES)) {
                mkdir(CARPETA_IMAGENES);
            }

            //guarda la imagen en el servidor
            $image->save(CARPETA_IMAGENES . $nombreImagen);

            //guarda en la base de datos
            $entrada->guardar();
        }

}
        
        $router->render('entradas/crear', [
                'entrada' => $entrada,
                'vendedores' => $vendedores,
                'errores' => $errores
        ]);
    }
    
    public static function actualizar (Router $router){
        $id = validarORedireccionar('/admin');
        $entrada = Entrada::find($id);
        $vendedores = Vendedor::all();

        $errores = Entrada::getErrores();

        if ( $_SERVER["REQUEST_METHOD"] === 'POST') {

            //Asignar los atributos
            $args = $_POST['entrada'];
            $entrada->sincronizar($args);
    
            //Validación
            $errores = $entrada->validar();
    
            //Subida de Archivos
             //Generar un nombra unico
             $nombreImagen = md5(uniqid(rand(), true) ) . '.jpg';
            if ($_FILES['entrada']['tmp_name']['imagen']){
                $image = Image::make($_FILES['entrada']['tmp_name']['imagen'])->fit(800,600);
                //guarda nombre de la imagen
                $entrada->setImagen($nombreImagen);
            }
            
            //Revisar que el Array de Errores esté vacio
            if (empty($errores)) {
                if ($_FILES['entrada']['tmp_name']['imagen']){
                //Almacenar Imagen
                   $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $entrada->guardar();
    
            }
           
        }

        $router->render('entradas/actualizar',[
            'entrada' => $entrada,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar (){
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            //Validar ID
    $id = $_POST['id'];
    $id = filter_var( $id , FILTER_VALIDATE_INT);

    if ($id) {
        $tipo = $_POST['tipo'];

        if(validarTipoContenido($tipo)) {
            $entrada = Entrada::find($id);
            $entrada->eliminar();
        }

    }
}
    }

}

