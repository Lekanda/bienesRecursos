<?php 
    require 'includes/funciones.php';
    incluirTemplate('header');
?>  
    <main class="contenedor seccion contenido-centrado">
        <h1>Iniciar Sesion</h1>

        <form class="formulario">
            <fieldset>
                <legend>Introduce datos de Inicio de Sesion</legend>

                <label for="email">E-mail</label>
                <input type="email" placeholder="Tu Email" id="email">

                <label for="password">Contraseña</label>
                <input type="password" placeholder="Tu contraseña" id="password">
            </fieldset>
            <input type="submit" value="Iniciar Sesion" class="boton boton-verde">
        </form>

    </main>

<?php 
    incluirTemplate('footer');
?>