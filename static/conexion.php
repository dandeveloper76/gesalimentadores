<?php
$host = 'rdbms.strato.de';
$username = 'dbu989005';
$password = 'Danielo2014@';
$database = 'dbs11145374';

// Crear la conexión
$mysqli = new mysqli($host, $username, $password, $database);

// Verificar si hay errores de conexión
if ($mysqli->connect_error) {
    die('Error de conexión: ' . $mysqli->connect_error);
}

// Establecer el conjunto de caracteres a utf8
$mysqli->set_charset('utf8');

// Aquí puedes realizar consultas y operaciones con la base de datos

// Cerrar la conexión al finalizar
$mysqli->close();
?>

