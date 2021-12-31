<?php 

    require 'includes/app.php';
        $db = conectarDb();
        

    $errores =  []; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
     
        $email = filter_var( $_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = mysqli_real_escape_string($db, $_POST['password']);

        if(!$email){
            $errores[] = "El Email es Obligatorio";
        }

        if(!$password){
            $errores[] = "La contraseña es Obligatoria";
        }

        if(empty($errores)){
            $query = "SELECT * FROM usuarios WHERE email = '${email}';";
            $resultado = mysqli_query($db, $query);

            
            if($resultado -> num_rows){
                //revisar si el pasword es correcto
                $usuario = mysqli_fetch_assoc($resultado);

                // var_dump($$usuario['password']);

                //verificar si el password si es correcto o no
                $auth = password_verify($password, $usuario['password']);

                if($auth){
                    //Usuario autenticado
                    session_start();

                    //llenar el arreglo de la sesion

                    $_SESSION['usuario'] = $usuario['email'];
                    $_SESSION['login'] = true;

                    header('location: admin/index.php');
                }else{
                    $errores[] = "El password es incorrecto";
                }
                
            }else{
                $errores[] = "El usuario no existe";
            }
        }
      
    }




    incluirTemplate('header'); 
?>

<main class="contenedor seccion">
    <h1>Iniciar Sesion</h1>

    <?php foreach($errores as $error):?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>

        <?php endforeach;?>

    <form method="POST" class="formulario contenido-centrado" novalidate>
        <fieldset>
            <legend>Email y Password</legend>

            <label for="email">Email:</label>
            <input type="text" id="email" placeholder="Tu email" name="email" required>

            <label for="password">Password:</label>
            <input type="password" id="password" placeholder="Tu password" name="password" required>

        </fieldset>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
    </form>
</main>


<?php 
    incluirTemplate('footer'); 
?>