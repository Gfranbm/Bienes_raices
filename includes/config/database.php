<?php

function conectarDb() : mysqli{
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');
    if (!$db){
        echo "Conexion Fallida";
        exit;
    }
    return $db;
}