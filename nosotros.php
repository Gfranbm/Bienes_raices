<?php 
    
    require 'includes/app.php';
    incluirTemplate('header');
 ?>



    <main class="contenedor seccion">
        <h1>Conoce Sobre Nosotros</h1>

        <div class="sobre-nosotros contenedor">
            <div class="imagen-nosotros">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp" >
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img src="/build/img/nosotros.jpg" alt="imagen nosotros" loading="lazy">

                </picture>
            </div>
            
            <div class="texto-nosotros">
                <blockquote>25 Años de Experiencia</blockquote> 
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, quas! Reprehenderit totam provident excepturi eum velit iusto necessitatibus fugit repudiandae, enim iste quam ex, incidunt soluta atque quaerat consequatur culpa.Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, quas! Reprehenderit totam provident excepturi eum velit iusto necessitatibus fugit repudiandae, enim iste quam ex, incidunt soluta atque quaerat consequatur culpa.Lorem ipsum dolor sit amet consectetur adipisicing elit Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam,
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, quas! Reprehenderit totam provident excepturi eum velit iusto necessitatibus fugit repudiandae, enim iste quam ex, incidunt soluta atque quaerat consequatur culpa.
                </p>
            </div>
        </div>
    </main>
        <section class="seccion contenedor">
            <h1>Más Sobre Nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="iconos seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dicta atque neque ut qui illo, optio autem, repellat excepturi esse, sed blanditiis explicabo aliquam eum quasi possimus asperiores laudantium officiis.</p>
            </div> 
            <div class="icono">
                <img src="build/img/icono2.svg" alt="iconos Precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dicta atque neque ut qui illo, optio autem, repellat excepturi esse, sed blanditiis explicabo aliquam eum quasi possimus asperiores laudantium officiis.</p>
            </div> 
            <div class="icono">
                <img src="build/img/icono3.svg" alt="iconos Tiempo" loading="lazy">
                <h3>A Tiempo</h3>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia dicta atque neque ut qui illo, optio autem, repellat excepturi esse, sed blanditiis explicabo aliquam eum quasi possimus asperiores laudantium officiis.</p>
            </div> 
        </section>
        
   
        <?php
            incluirTemplate('footer', $inicio=true);
        ?>