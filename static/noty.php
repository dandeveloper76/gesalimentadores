<?php

// Configuración del correo electrónico
$to = "websonlinetotal@gmail.com"; // Coloca aquí la dirección de correo electrónico a la que quieres enviar las notificaciones
$subject = "Error en la página web";
$headers = "From: websonlinetotal@gmail.com"; // Coloca aquí tu dirección de correo electrónico

// Función para comprobar la página web y enviar notificaciones de errores
function checkWebsite($url) {
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_exec($curl);
  $responseCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
  curl_close($curl);

  if ($responseCode === 200) {
    echo "La página $url está funcionando correctamente.\n";
  } else {
    $errorType = getErrorType($responseCode);
    echo "Se ha producido un error en la página $url. Tipo de error: $errorType\n";
    sendEmail($errorType);
  }
}

// Función para obtener el tipo de error basado en el código de respuesta
function getErrorType($responseCode) {
  if ($responseCode === 404) {
    return "Error 404 - Página no encontrada";
  } elseif ($responseCode >= 500 && $responseCode <= 599) {
    return "Error $responseCode - Error interno del servidor";
  } else {
    return "Error desconocido";
  }
}

// Función para enviar el correo electrónico
function sendEmail($errorType) {
  global $to, $subject, $headers;
  $message = "Se ha producido un error en la página web.\nTipo de error: $errorType";
  if (mail($to, $subject, $message, $headers)) {
    echo "Correo enviado con éxito.\n";
  } else {
    echo "Error al enviar el correo.\n";
  }
}

// URL de la página web a verificar
$websiteURL = "http://gesalimentadores.gatigosmontblanc.es";

// Intervalo de tiempo en segundos para revisar la página web (ejemplo: cada 5 minutos)
$interval = 5 * 60;

// Bucle infinito para comprobar la página web y enviar notificaciones
while (true) {
  checkWebsite($websiteURL);
  sleep($interval);
}
?>
