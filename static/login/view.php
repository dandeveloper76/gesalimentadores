<?php
$conexion = mysqli_connect("rdbms.strato.de", "dbu989005", "Danielo2014@", "dbs11145374");
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$query = "SELECT image FROM users WHERE id = '$id'";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    $row = mysqli_fetch_assoc($resultado);
    $imagen = $row['image'];
} else {
    die("Error al obtener los datos de la imagen: " . mysqli_error($conexion));
}

if (!empty($imagen)) {
    $imagenBase64 = base64_encode($imagen);
    echo '<img src="data:image/jpeg;base64,' . $imagenBase64 . '" alt="Imagen de usuario">';
} else {
    echo 'No se encontró ninguna imagen para el usuario.';
}


?>
