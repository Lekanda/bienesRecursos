<?php

// Importar la conexion
require 'includes/config/database.php';
$db = conectarDB();

// Crear un email y password
$email = "a@a.com";
$password = "123456";



// Querypara crear el usuario
$query = "INSERT INTO usuarios (email,password) VALUES ('${email}','${password}')";
// echo $query;

// agregar a la DB
mysqli_query($db, $query);