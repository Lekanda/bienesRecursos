<?php 
    /// Importar la DB
    require 'includes/config/database.php';
    $db = conectarDB();


    $errores = [];



    // Autenticar el usuario
    // Para poder coger los datos con POST se hace de esta manera.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // echo "<pre>";
        // var_dump($_POST);
        // echo "</pre>";
        $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));
        $password = mysqli_real_escape_string($db, $_POST['password']);
        // var_dump($email);
        
        if (!$email) {
            $errores[] = "El email es obligatorio o no es valido";
        }
        
        if(!$password){
            $errores[] = "El password es obligatorio o no es valido";
        }
        if (empty($errores)) {
            
        }
    }

    require 'includes/funciones.php';
    incluirTemplate('header');
?> 

    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <?php foreach ($errores as $error ): ?> 
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        

        <?php endforeach; ?>

        <form method="POST" class="formulario" novalidate>
            <fieldset>
                <legend>Introduce datos de Inicio de Sesion</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email" name="email" required>

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu contraseña" id="password" name="password" required>
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>