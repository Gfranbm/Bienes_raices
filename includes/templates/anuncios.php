<?php 
    //importar la base de datos

    $db = conectarDb();
    //consultar
    $query = "SELECT * FROM propiedades LIMIT ${limite};";
   
    //leer los resultado

    $resultado = mysqli_query($db, $query);
    
?>

<div class="contenedor-anuncios">
    <?php while($propiedad = mysqli_fetch_assoc($resultado)) :?>
       
            <div class="anuncio">
                <picture class="cont-img">    
                    <img  laoding="lazy" src="../../imagenes/<?php echo $propiedad['imagen']; ?>" alt="anunico">
                </picture>
                <div class="contenido-anuncio">
                    <h3><?php echo $propiedad['titulo']; ?></h3>
                    <p><?php echo $propiedad['descripcion']; ?></p>
                    <p class="precio">$<?php echo $propiedad['precio']; ?></p>

                    <ul class="iconos-caracteristicas">
                        <li>
                            <img class="icono" src="build/img/icono_wc.svg" alt="icono wc" loading="eazy">
                            <p><?php echo $propiedad['wc']; ?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_estacionamiento.svg" alt="icono estacionamiento" loading="eazy">
                            <p><?php echo $propiedad['estacionamiento']; ?></p>
                        </li>
                        <li>
                            <img class="icono" src="build/img/icono_dormitorio.svg" alt="icono habitaciones" loading="eazy">
                            <p><?php echo $propiedad['habitaciones']; ?></p>
                        </li>
                    </ul>
                    <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block"  >Ver Propiedad</a>
                </div> <!--contenido anuncios-->
            

            </div>  <!--anuncio-->
        <?php endwhile ;?>
        </div><!--contenedor anuncio-->