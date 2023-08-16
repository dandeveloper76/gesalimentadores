<?php
$servername = "rdbms.strato.de"; // Cambia esto si tu servidor MySQL está en un host diferente
$username = "dbu989005"; // Cambia esto con tu nombre de usuario de MySQL
$password = "Danielo2014@"; // Cambia esto con tu contraseña de MySQL
$dbname = "dbs11145374"; // Cambia esto con el nombre de tu base de datos

// Crea una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica si hay errores en la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtén los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $phone = $_POST["phone"];
    $dni = $_POST["dni"];
	$carrer = $_POST["carrer"];
	$mascota = $_POST["mascota"];
	$edad = $_POST["edad"];
	$sexe = $_POST["sexe"];
	$rasa = $_POST["rasa"];
	$naixement = $_POST["naixement"];

    // Prepara la consulta SQL para insertar los datos en la tabla
    $sql = "INSERT INTO formulario (nombre, phone, dni, carrer, mascota, edad, sexe, rasa, naixement) VALUES ('$nombre', '$phone', '$dni', '$carrer', '$mascota', '$edad', '$sexe', '$rasa', '$naixement')";

    if ($conn->query($sql) === TRUE) {
        // Redirige a la página mostrar_datos.php con los datos en la URL
        header("Location: docu.php?nombre=$nombre&phone=$phone&dni=$dni&carrer=$carrer&mascota=$mascota&edad=$edad&sexe=$sexe&rasa=$rasa&naixement=$naixement");
        exit();
    } else {
        echo "Error al guardar los datos en MySQL: " . $conn->error;
    }
}

// Cierra la conexión a la base de datos
$conn->close();
?>
