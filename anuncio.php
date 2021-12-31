<?php 
    


    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header('location: /');
    }

    require 'includes/app.php';
    $db = conectarDb();


    $query = "SELECT * FROM propiedades WHERE id = ${id};";
    
    $resultado = mysqli_query($db, $query);
    $propiedad = mysqli_fetch_assoc($resultado);
    
    
    incluirTemplate('header');
 ?>


    <main class="contenedor seccion contendio-centrado">
        <h1>  </h1>

        <picture>
            <img loading="lazy" src="imagenes/<?php echo $propiedad['imagen'];?>" alt="imagen de la propiedad">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">$<?php echo $propiedad['precio'];?></p>
            <ul class="iconos-caracteristicas">
                <li>
                    <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="eazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="eazy">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="eazy">
                    <p>4</p>
                </li>
            </ul>
            <p><?php echo $propiedad['descripcion'];?><p>
             
            
                       
                
                
            </p>
        </div>
    </main>
    
    <?php
    incluirTemplate('footer', $inicio=true);
    ?>  