<?php
if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $tmp_name = $_FILES['image']['tmp_name'];
  $nombre_archivo = $_FILES['image']['name'];
  $ruta_destino = 'fotos/' . $nombre_archivo;
  
  if (move_uploaded_file($tmp_name, $ruta_destino)) {
    echo 'La imagen se ha guardado exitosamente.';
  } else {
    echo 'Ha ocurrido un error al mover la imagen al directorio de destino.';
  }
} else {
  echo 'Ha ocurrido un error al cargar la imagen.';
}
?>
