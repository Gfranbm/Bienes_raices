<?php 
    
    require 'includes/app.php';
    incluirTemplate('header');
 ?>



    <main class="contenedor seccion contendio-centrado">
        <h1>Guía para la decoracion de tu Hogar</h1>
        
        <picture>
            <source srcset="build/img/destacada2.webp" type="image/webp">
            <source srcset="build/img/destacada2.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada2.jpg" alt="imagen de la propiedad">
        </picture>
        <p>Escrito el: <span>20/10/2021 </span>por: <span>Admin</span></p>
        <div class="resumen-propiedad">
            <p class="precio">$3,000,000</p>
        
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, consectetur molestias! Veniam beatae quibusdam quod fugiat similique magnam deserunt. Necessitatibus nisi ea numquam cumque incidunt, modi nam error a laudantium?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, consectetur molestias! Veniam beatae quibusdam quod fugiat similique magnam deserunt. Necessitatibus nisi ea numquam cumque incidunt, modi nam error a laudantium?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, consectetur molestias! Veniam beatae quibusdam quod fugiat similique magnam deserunt. Necessitatibus nisi ea numquam cumque incidunt, modi nam error a laudantium?Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, consectetur molestias! Veniam beatae quibusdam quod fugiat similique magnam deserunt. Necessitatibus nisi ea numquam cumque incidunt, modi nam error a laudantium?
                
            <p>
                Lorem ipsum dolor sit, amet consectetur adipisicing elit. Iure, consectetur molestias! Veniam beatae quibusdam quod fugiat similique magnam deserunt. Necessitatibus nisi ea numquam cumque incidunt, modi nam error a laudantium?
            </p>
            
                       
                
                
            </p>
        </div>
    </main>
   

    <?php
    incluirTemplate('footer', $inicio=true);
    ?>