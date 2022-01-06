<?php

function conectarDB() : mysqli {
  
    $db = new mysqli('localhost', 'root', '', 'bienes_raices');

    if (!$db) {
        echo "Error, no se pudo conectar la Base de Datos";
        exit;
    } else {
        return $db;
    }
}