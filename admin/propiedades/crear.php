<?php 
    // Base de Datos
    require '../../includes/config/database.php';
    $db = conectarDB();
    // var_dump($db);
    
    // echo "<pre>";
    // var_dump($_POST); // Los valores que se han mandado por POST
    // var_dump($_GET); // LOs valores que se han mandado por GET. Se ven en URL.
    // echo "</pre>";

    // Informacion del Servidor,
    // echo "<pre>";
    // var_dump($_SERVER["SERVER_SOFTWARE"]);
    // var_dump($_SERVER["REQUEST_METHOD"]);
    // echo "</pre>";


    // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //     echo "<pre>";
    //     var_dump($_POST); // Los valores que se han mandado por POST
    //     var_dump($_POST["titulo"]); // Los valores que se han mandado por POST
    //     echo "</pre>";
    // }


    $titulo = $_POST["titulo"];
    $precio = $_POST["precio"];



    require '../../includes/funciones.php';
    incluirTemplate('header');
?>  





    <main class="contenedor seccion">
        <h1>Crear</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <form method="POST" class="formulario" action="/admin/propiedades/crear.php">
            <fieldset>
                <legend>Informacion General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Titulo Propiedad">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" name="imagen" accept="image/jpeg, image/png">

                <label for="descripcion">Descripcion:</label>
                <textarea id="descripcion"></textarea>
            </fieldset>
            

            <fieldset>
                <legend>Informacion Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" placeholder="Numero Habitaciones Propiedad" min="1" max="9" step="2">

                <label for="baños">Baños:</label>
                <input type="number" id="baños" placeholder="Numero Baños Propiedad" min="1" max="9" step="1">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" placeholder="Estacionamientos para Coches" min="1" max="9" step="2">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select>
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