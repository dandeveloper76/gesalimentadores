<?php
// Verificar si se ha enviado un archivo
if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
    $user_id = $_SESSION["user_id"]; // Obtener el ID del usuario desde la sesión

    // Directorio donde se guardarán las imágenes
    $targetDir = "uploads/";

    // Obtener el nombre y la extensión del archivo
    $fileName = basename($_FILES["image"]["name"]);
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Generar un nombre único para la imagen
    $newFileName = uniqid() . "." . $fileExt;

    // Ruta completa de la imagen en el servidor
    $targetFilePath = $targetDir . $newFileName;

    // Verificar si el archivo es una imagen válida
    $validExtensions = array("jpg", "jpeg", "png", "gif");
    if(in_array($fileExt, $validExtensions)) {
        // Mover la imagen al directorio de destino
        if(move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            // Insertar la información de la imagen en la base de datos
            $dbHost = "rdbms.strato.de";
            $dbUser = "dbu989005";
            $dbPass = "Danielo2014@";
            $dbName = "dbs11145374";

            $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
            if($conn->connect_error) {
                die("Error de conexión a la base de datos: " . $conn->connect_error);
            }

             // Verificar si el usuario existe en la tabla users
             $sql = "SELECT id FROM users WHERE id = '$user_id'";
             $result = $conn->query($sql);

             if ($result->num_rows > 0) {
    
            // Insertar la imagen en la tabla de imágenes vinculada al usuario
            $sql = "INSERT INTO images (user_id, image_path) VALUES ('$user_id', '$targetFilePath')";
            if($conn->query($sql) === TRUE) {
                echo "La imagen se ha subido correctamente.";
            } else {
                echo "Error al subir la imagen: " . $conn->error;
            }

            $conn->close();
        } else {
            echo "Error al mover el archivo.";
        }
    } else {
        echo "Formato de archivo no válido. Por favor, sube una imagen en formato JPG, JPEG, PNG o GIF.";
    }
} else {
    echo "No se ha seleccionado ninguna imagen.";
}
?>
