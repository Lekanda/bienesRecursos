<?php 
    // Base de Datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // Arreglo con mensajes de errores
    $errores = [];

    // Ejecuta el codigo despues de que el usuario envie el formulario
    



    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titulo = $_POST["titulo"];
        $precio = $_POST["precio"];
        $descripcion = $_POST["descripcion"];
        $habitaciones = $_POST["habitaciones"];
        $wc = $_POST["wc"];
        $estacionamiento = $_POST["estacionamiento"];
        $vendedorId = $_POST["vendedor"];


        // Validar que no vaya vacio
        if (!$titulo) {
            // $errores[] => añade al arreglo $errores
            $errores[] = "Debes añadir un titulo";
        }
        if (!$precio) {
            $errores[] = "Debes añadir un precio";
        }
        if (strlen($descripcion) < 20) {
            $errores[] = "Debes añadir una descripcion";
        }
        if (!$habitaciones) {
            $errores[] = "Debes añadir un numero de Habitaciones";
        }
        if (!$wc) {
            $errores[] = "Debes añadir un numero de Baños";
        }
        if (!$estacionamiento) {
            // $errores[] => añade al arreglo $errores
            $errores[] = "Debes añadir un numero de plazas de aparcamiento";
        }
        if (!$vendedorId) {
            // $errores[] => añade al arreglo $errores
            $errores[] = "Debes añadir un Identificador de vendedor";
        }
        // echo "<pre>";
        // var_dump($errores);
        // echo "</pre>";
        // exit;


        // Comprobar que no haya errores en arreglo $errores. Comprueba que este VACIO (empty).
        if (empty($errores)) {
            // Insertar en la DB
            $query = "INSERT INTO propiedades (titulo,precio,descripcion,habitaciones,wc,estacionamiento,vendedorId) VALUES ( '$titulo', '$precio','$descripcion','$habitaciones','$wc','$estacionamiento','$vendedorId')";

            $resultado = mysqli_query($db,$query);
            
            if($resultado){
                echo "Insertado correctamente";
            }
        }
        
    }

    require '../../includes/funciones.php';
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

        <form method="POST" class="formulario" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion" name="descripcion"></textarea>
            </fieldset>
            

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones"  placeholder="Numero Habitaciones 1-9" min="1" max="9" step="1">

                <label for="wc">WC:</label>
                <input type="number" id="wc" name="wc" placeholder="Numero wc Propiedad 1-9" min="1" max="9" step="1">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Estacionamientos para Coches 1-9" min="1" max="9" step="1">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">-- Seleccione --</option>
                    <option value="1">Juan</option>
                    <option value="2">Pedro</option>
                </select>
            </fieldset>

            <input type="submit" value="Crear Propiedad" class="boton boton-verde">
        </form>
    </main>

<?php 
    incluirTemplate('footer');
?>