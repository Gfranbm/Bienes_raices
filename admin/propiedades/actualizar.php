<?php

use App\Propiedad;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;
require '../../includes/app.php';



estaAutenticado();
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id){
    header('location: /index.php');
}

//consultar datos
//buscar id
$propiedad = Propiedad::find($id);
//consulta vendedores
$vendedores = Vendedores::all();
$errores = Propiedad::getErrores();   
//Arreglo con mensaje de errores
$errores = [];

//Se ejecuta despues de que el usuario envía el formulario  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Asignar los atributos
    $args = $_POST['propiedad'];

    $propiedad->sincronizar($args);

    //Validacion
    $errores = $propiedad->validar();
    
    //Subida de Archivos
    //Generar nombre para las imagenes
       $nombreImagen = md5( uniqid( rand(), true)). ".jpg";
        
     if($_FILES['propiedad']['tmp_name']['imagen']){
        $image =  Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//ancho por altura
        $propiedad->setImagen($nombreImagen);

    }
    
      if (empty($errores)) {     
            //guardar imagen
            if($_FILES['propiedad']['tmp_name']['imagen']){
          $image->save(CARPETAS_IMAGENES . $nombreImagen);    
        }
         $propiedad->guardar();


    }
    
}
incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Actualizar</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
    <div class="alerta error">
        <?php echo $error; ?>

    </div>

    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data">
        <?php include '../../includes/templates/formulario_propiedades.php'; ?>

        <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">
    </form>
</main>


<?php
    incluirTemplate('footer',  $inicio = true);
?>