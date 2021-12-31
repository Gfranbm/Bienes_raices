<?php
    require '../includes/app.php';

    estaAutenticado();

    use App\Propiedad;
    use App\Vendedores;
    //implementar un metodo para obtener todas las propiedades
    $propiedades = Propiedad::all();
    $vendedores = Vendedores::all();

 //Mostrar mensaje condicional
    $resultado = $_GET['resultado'] ?? null;
   
    //asiganar id
    if($_SERVER['REQUEST_METHOD']==='POST'){
    
        $id = $_POST['id'];
        filter_var($id, FILTER_VALIDATE_INT);

        if($id){
            $tipo =$_POST['tipo'];
            if(tipodeContenido($tipo)){
                debuguear("es valido");
            }else{
                debuguear("no valido");
            }
            if($_POST['tipo'] == 'propiedad'){
                debuguear('eliminando Propiedad');
            }else{
                debuguear("eliminando vendedor");
            }

            $propiedad = Propiedad::find($id);
            $propiedad->eliminar();      
        }
    }

    
    incluirTemplate('header');
?>

    <main class="contenedor seccion">
        <h1>Administrador de Bienes Raices</h1>

        <?php if(intval($resultado) ===1): ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>

        <?php elseif(intval($resultado) ===2): ?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>

        <?php elseif(intval($resultado) ===3): ?>
            <p class="alerta exito">Anuncio Eliminado Correctamente</p>
            
        <?php endif; ?>    

        <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($propiedades as $propiedad): ?>
            <tr>
                <td> <?php echo $propiedad->id; ?> </td>
                <td> <?php echo $propiedad->titulo; ?>  </td>
                <td>  <img src="/imagenes/<?php echo $propiedad->imagen; ?> " class="imagen-tabla"></td>
                <td>$<?php echo $propiedad->precio; ?></td>
                <td>
                   <form method="POST">
                       <input  type="hidden" name="id" value="<?php echo $propiedad->id;?>">
                       <input  type="hidden" name="tipo" value="propiedad">
                       <input class="boton-rojo-block w100" type="submit" value="Eliminar">
                   </form>
                    <a href="/admin/propiedades/actualizar.php?id=<?php echo $propiedad->id;?>" 
                    class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>        
        <h2>Vendedores</h2>
        <table class="propiedades">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($vendedores as $vendedor): ?>
            <tr>
                <td> <?php echo $vendedor->id;?> </td>
                <td> <?php echo $vendedor->nombre . " " . $vendedor->apellido;?> </td>
                <td>
                   <form method="POST">
                    <input  type="hidden" name="id" value="<?php echo $vendedor->id;?>">
                    <input  type="hidden" name="tipo" value="vendedor">
                    <input class="boton-rojo-block w100" type="submit" value="Eliminar">
                   </form>
                    <a href="/admin/vendedores/actualizar.php?id=<?php echo $vendedor->id;?>" 
                    class="boton-amarillo-block">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>    
    </main>

<?php
    incluirTemplate('footer',  $inicio = true);
?>