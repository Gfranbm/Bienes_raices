<?php

//DIR: BUSCA LA UBICACION DEL APP Y DESPUES TEMPLATES
define('FUNCIONES', __DIR__.'funciones.php');
define('TEMPLATES_URL', __DIR__.'/templates');      
define('CARPETAS_IMAGENES', __DIR__ . '/../imagenes/');

function incluirTemplate(string $nombre, bool $inicio = false ){
   
    include TEMPLATES_URL."/${nombre}.php"; 
} 



function estaAutenticado() {
    session_start();
    
    if(!$_SESSION['login']){
        header('location: admin/');
    }
    
}

function debuguear($variable){
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

//Escapa /sanitizar el HTML
function s($html) : string{
    $s = htmlspecialchars($html);

    return $s;
}

//validar tipo de contenido
function tipodeContenido($tipo){
    $tipos = ['vendedor', 'propiedad'];
    return in_array($tipo, $tipos);
}