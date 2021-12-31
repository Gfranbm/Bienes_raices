<?php

require '../../includes/app.php';

use App\Propiedad;
use App\Vendedores;
use Intervention\Image\ImageManagerStatic as Image;

estaAutenticado();


$propiedad = new Propiedad;


//consulta par obtener todos los vendeores

$vendedores = Vendedores::all();
//Arreglo con mensaje de errores
$errores = Propiedad::getErrores();

//Se ejecuta despues de que el usuario envía el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    //Crea un nueva instacia
    $propiedad = new Propiedad($_POST['propiedad']);

        //SUBIDA DE ARCHIVOS
         //Generar nombre para las imagenes
      $nombreImagen = md5( uniqid( rand(), true)). ".jpg";
        //setear la imagen
        //realiza un resize a la imagen  con Intervention
        if($_FILES['propiedad']['tmp_name']['imagen']){
            $image =  Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600);//ancho por altura
            $propiedad->setImagen($nombreImagen);
        }

        //validar
       $errores = $propiedad->validar();

    
    if (empty($errores)) {
        //crear la carpeta de imagenes
        if(!is_dir(CARPETAS_IMAGENES)){
            mkdir(CARPETAS_IMAGENES);
        }

        //guarda la imagen en el servidor
        $image->save(CARPETAS_IMAGENES. $nombreImagen);

        //Guarda en la BD
        $propiedad->guardar(); 
         
    }
    
}

incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>
    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>

        </div>

    <?php endforeach; ?>

    <form class="formulario" method="POST" enctype="multipart/form-data"
    action="/admin//propiedades//crear.php" >
       
            <?php include '../../includes/templates/formulario_propiedades.php'; ?>
        <input type="submit" value="Crear Propiedad" class="boton boton-verde">
    </form>
</main>


<?php

incluirTemplate('footer',  $inicio = true);
?>