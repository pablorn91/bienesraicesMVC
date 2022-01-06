<?php

namespace Model;

class Entrada extends ActiveRecord {

    protected static $tabla = 'entradas';
    protected static $columnasDB = ['id','titulo','imagen', 'creado' ,'descripcion','vendedorId'];

    public $id;
    public $titulo;
    public $imagen;
    public $creado;
    public $descripcion;
    public $vendedorId;
    
    public function __construct( $args = []) 
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->creado = date('Y/m/d');
        $this->descripcion = $args['descripcion'] ?? '';
        $this->vendedorId = $args['vendedorId'] ?? '';
        
    }

    public function validar() {
        
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un Título";
        }

        if (!$this->imagen) {
            self::$errores[] = "Debes añadir una imagen";
        }

        if (!$this->descripcion) {
            self::$errores[] = "Debes añadir una Descripción";
        }

        if (!$this->vendedorId) {
            self::$errores[] = "Elige un vendedor";
        }
        return self::$errores;
    }

}
