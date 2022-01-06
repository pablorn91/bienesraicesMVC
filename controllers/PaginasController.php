<?php

namespace Controllers;

use MVC\Router;
use Model\Entrada;
use Model\Vendedor;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController {

    public static function index(Router $router){

            $propiedades = Propiedad::get(3);
            $entradas = Entrada::get(2);
            $vendedores = Vendedor::all();
            $inicio = true;

        $router->render('paginas/index', [
            'propiedades'=> $propiedades,
            'vendedores' => $vendedores,
            'entradas' => $entradas,
            'inicio' => $inicio
        ]);
    }

    public static function nosotros(Router $router){
       $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){

        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router){

        $id = validarORedireccionar('/propiedades');
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        $entradas = Entrada::all();
        $vendedores = Vendedor::all();
        
        $router->render('paginas/blog', [
            'entradas' => $entradas,
            'vendedores' => $vendedores
        ]);
    }

    public static function entrada(Router $router){
        $id = validarORedireccionar('/');
        $entrada = Entrada::find($id);
        $vendedores = Vendedor::all();

        $router->render('paginas/entrada',[
            'entrada' => $entrada,
            'vendedores'=> $vendedores
        ]);
    }

    public static function contacto(Router $router){

            $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHPMailer
           $mail = new PHPMailer();

           //Configurar SMTP
           $mail->isSMTP();
           $mail->Host = 'smtp.mailtrap.io';
           $mail->SMTPAuth = true;
           $mail->Username = 'bbb894252431fa';
           $mail->Password = '2acd6537e4a8e7';
           $mail->SMTPSecure = 'tls';
           $mail->Port = 2525;

           //Configurar el contenido del Email
           $mail->setFrom('admin@bienesraices.com');
           $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com');
           $mail->Subject = 'Tienes un Nuevo Mensaje';

           //Habilitar HTML
           $mail->isHTML(true);
           $mail->CharSet = 'UTF-8';

           //Definir el contenido
           $contenido = '<html>';
           $contenido .= '<p>Tienes un nuevo mensaje</p>';
           $contenido .= '<p>Nombre: ' . $respuestas['nombre'] . '</p>';

           //Enviar de forma condicional algunos campos de email o teléfono
           if($respuestas['contacto'] === 'telefono') {
                 $contenido .= '<p>Eligió ser contactado por Teléfono:</p>';
                 $contenido .= '<p>Teléfono: ' . $respuestas['telefono'] . '</p>';
                 $contenido .= '<p>Fecha de Contacto: ' . $respuestas['fecha'] . '</p>';    
                 $contenido .= '<p>Hora de Contacto: ' . $respuestas['hora'] . '</p>';    

           } else {
                //Es email entonces agregamos el campo de email
                $contenido .= '<p>Eligió ser contactado por Email:</p>';
                $contenido .= '<p>Email: ' . $respuestas['email'] . '</p>';
           }
           $contenido .= '<p>Mensaje: ' . $respuestas['mensaje'] . '</p>';
           $contenido .= '<p>Vende o Compra: ' . $respuestas['tipo'] . '</p>';    
           $contenido .= '<p>Precio o Presupuesto: $' . $respuestas['precio'] . '</p>';    
           $contenido .= '<p>Prefiere ser contactado por: ' . $respuestas['contacto'] . '</p>';    
           $contenido .= '</html>';

           $mail->Body = $contenido;
           $mail->AltBody = 'Esto es texto alternativo sin HTML';

           //Enviar Email
        //    if($mail->send()) {
           if($mail->send()) {
               $mensaje = "Mensaje Enviado Correctamente";
           } else {
               $mensaje = "El mensaje no se pudo enviar";
           }

        }

        $router->render('paginas/contacto', [
            'mensaje' => $mensaje
        ]);
    }

}