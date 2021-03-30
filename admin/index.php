<?php

// Importar la conexion de la DB
require '../includes/config/database.php';
$db = conectarDB();

//Escribir el Query
$query = "SELECT * FROM propiedades";

// Consultar la DB
$resultadoConsulta = mysqli_query($db, $query);


// Muestra mensaje condicional, si no hay lo pone como null
$resultado = $_GET['resultado'] ?? null;

// Incluye un template
require '../includes/funciones.php';
incluirTemplate('header');
?>
<main class="contenedor seccion">
    <h1>Administrador de Bienes Raices</h1>
    <?php if (intval($resultado) === 1) : ?>
            <p class="alerta exito">Anuncio Creado Correctamente</p>
        <?php elseif (intval($resultado) === 2) :?>
            <p class="alerta exito">Anuncio Actualizado Correctamente</p>
    <?php endif; ?>

    <a href="/admin/propiedades/crear.php" class="boton boton-verde">Nueva Propiedad</a>

    <table class="propiedades">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="cuerpo-tabla-propiedades">
            <!-- Mostrar los resultados -->
            <?php while ($propiedad = mysqli_fetch_assoc($resultadoConsulta)) : ?>
                <tr>
                    <td> <?php echo $propiedad['id']; ?> </td>
                    <td><?php echo $propiedad['titulo']; ?></td>

                    <td class="imagen-tabla"><img class="imagen-tabla" src="/imagenes/<?php echo $propiedad['imagen']; ?>" class="imagen-tabla"></td>

                    <td><?php echo $propiedad['precio']; ?>€</td>
                    <td>
                        <a href="#" class="boton-rojo-block">Eliminar</a>
                        <a href="propiedades/actualizar.php?id=<?php echo $propiedad['id']; ?>" class="boton-amarillo-block">Actualizar</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>

</main>

<?php

// Cerrar la conexion
mysqli_close($db);


incluirTemplate('footer');
?>