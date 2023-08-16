<?php
// Verificar si se recibió el ID de la notificación a eliminar
if(isset($_POST['id'])) {
    $notificationId = $_POST['id'];

    // Realizar la conexión a la base de datos
    $conn = new mysqli("rdbms.strato.de", "dbu989005", "Danielo2014@", "dbs11145374");

    // Verificar si la conexión fue exitosa
    if ($conn->connect_error) {
        die("La conexión falló: " . $conn->connect_error);
    }

    // Ejecutar la consulta para eliminar la notificación
    $sql = "DELETE FROM datos WHERE id = $notificationId";
    if ($conn->query($sql) === TRUE) {
        // Redirigir a la página de inicio
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error al eliminar la notificación: " . $conn->error;
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
} else {
    echo "No se recibió el ID de la notificación.";
}
?>
