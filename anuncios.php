<?php 
    
    require 'includes/app.php';
    incluirTemplate('header');
 ?>



    <main class="contenedor seccion">
        <h1>anuncios</h1>
        <?php
               $limite = 10;
               include 'includes/templates/anuncios.php';
        ?>
    </main>
    
    <?php
    incluirTemplate('footer', $inicio=true);
    ?>