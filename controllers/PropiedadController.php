<?php
namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedor;
use Model\Entrada;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController {

    public static function index(Router $router) {
       
        $propiedades = Propiedad::all();
        $vendedores = Vendedor::all();
        $entradas = Entrada::all();

        //muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null ;
        
        $router->render('/admin', [ 
            'propiedades' => $propiedades,
            'vendedores' => $vendedores,
            'entradas' => $entradas,
            'resultado' => $resultado
         ]);
    }

    public static function crear(Router $router) {

        $propiedad = new Propiedad;
        $vendedores = Vendedor::all();

        //Arreglo con mensajes de errores
        $errores = Propiedad::getErrores(); 

        if ( $_SERVER["REQUEST_METHOD"] === 'POST') {
               
                    /*Crear una nueva instancia */
                    $propiedad = new Propiedad($_POST['propiedad']);

                    /* SUBIDA DE ARCHIVOS */
                
                    //Generar un nombra unico
                    $nombreImagen = md5(uniqid(rand(), true) ) . '.jpg';

                //Setear la imagen
                //realiza un resize a la imagen con intervention
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                    $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                    //guarda nombre de la imagen
                    $propiedad->setImagen($nombreImagen);
                }

                //Validar
                $errores = $propiedad->validar();
            
                if (empty($errores)) {

                    //crear carpeta para subir imagenes
                    if(!is_dir(CARPETA_IMAGENES)) {
                        mkdir(CARPETA_IMAGENES);
                    }

                    //guarda la imagen en el servidor
                    $image->save(CARPETA_IMAGENES . $nombreImagen);

                    //guarda en la base de datos
                    $propiedad->guardar();
                }

        }

        $router->render('propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar(Router $router) {

        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);
        $vendedores = Vendedor::all();

        $errores = Propiedad::getErrores();

        if ( $_SERVER["REQUEST_METHOD"] === 'POST') {

            //Asignar los atributos
            $args = $_POST['propiedad'];
            $propiedad->sincronizar($args);
    
            //Validación
            $errores = $propiedad->validar();
    
            //Subida de Archivos
             //Generar un nombra unico
             $nombreImagen = md5(uniqid(rand(), true) ) . '.jpg';
            if ($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);
                //guarda nombre de la imagen
                $propiedad->setImagen($nombreImagen);
            }
            
            //Revisar que el Array de Errores esté vacio
            if (empty($errores)) {
                if ($_FILES['propiedad']['tmp_name']['imagen']){
                //Almacenar Imagen
                   $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                $propiedad->guardar();
    
            }
           
        }

        $router->render('propiedades/actualizar',[
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedores' => $vendedores
        ]);
    }

    public static function eliminar () {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                    //Validar ID
            $id = $_POST['id'];
            $id = filter_var( $id , FILTER_VALIDATE_INT);

            if ($id) {
                $tipo = $_POST['tipo'];

                if(validarTipoContenido($tipo)) {
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                }

            }
        }
    }
}