<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
} else {
    $id = $_SESSION['id'];

    if ($id == 1) {
        header("Location: pujar-imatge.php");
        exit;
    } elseif ($id == 2) {
        header("Location: pujar-imatge-monica.php");
        exit;
    } elseif ($id == 3) {
        header("Location: pujar-imatge-ester.php");
        exit;
    } elseif ($id == 4) {
        header("Location: pujar-imatge.php");
        exit;
    } elseif ($id == 5) {
        header("Location: pujar-imatge-yolanda.php");
        exit;
    } elseif ($id == 6) {
        header("Location: pujar-imatge-silvia.php");
        exit;
    } elseif ($id == 7) {
        header("Location: pujar-imatge-mariat.php");
        exit;
    } elseif ($id == 8) {
        header("Location: pujar-imatge-esther12.php");
        exit;
    } elseif ($id == 9) {
        header("Location: pujar-imatge-montse.php");
        exit;
    } elseif ($id == 10) {
        header("Location: pujar-imatge-pamela.php");
        exit;
    } elseif ($id == 11) {
        header("Location: pujar-imatge-encarna.php");
        exit;
    } elseif ($id == 12) {
        header("Location: pujar-imatge-anna.php");
        exit;
    } elseif ($id == 13) {
        header("Location: pujar-imatge-jorgina.php");
        exit;
    } elseif ($id == 14) {
        header("Location: pujar-imatge-gloria.php");
        exit;
    } elseif ($id == 15) {
        header("Location: pujar-imatge-raquel.php");
        exit;
    } elseif ($id == 16) {
        header("Location: pujar-imatge-montseroca.php");
        exit;
    } elseif ($id == 17) {
        header("Location: pujar-imatge-nurir.php");
        exit;
    } elseif ($id == 18) {
        header("Location: pujar-imatge-gisela.php");
        exit;
    } elseif ($id == 19) {
        header("Location: pujar-imatge-raul.php");
        exit;
    } else {
        // Página de destino predeterminada si el valor de 'id' no coincide con ninguno de los casos anteriores
        header("Location: index.php");
        exit;
    }
}
?>