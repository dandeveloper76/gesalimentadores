<?php
session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
    exit;
} else {
    $id = $_SESSION['id'];

    if ($id == 1) {
        header("Location: editresu.php?EDITAR_ID=<?php echo $crow['id']; ?>");
        exit;
    } elseif ($id == 14) {
        header("Location: editresu.php?EDITAR_ID=<?php echo $crow['id']; ?>");
        exit;
    } else {
        // Página de destino predeterminada si el valor de 'id' no coincide con ninguno de los casos anteriores
        header("Location: index.php");
        exit;
    }
}
?>