<?php
$directorio = 'uploads/'; // Reemplaza con la ruta de tu directorio

if (isset($_POST['eliminar'])) {
    $archivo = $_POST['eliminar'];
    if (file_exists($archivo)) {
        unlink($archivo);
        echo "Archivo eliminado: $archivo";
		header("Refresh:2");
    } else {
        echo "El archivo no existe: $archivo";
    }
}

$archivos = scandir($directorio);
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> 
<table>
    <tr>
        <th class="col-md-10 p-4"><h1>Ara pots elimina els arxius que no vulguis</h1></th>
    </tr>
    <?php foreach ($archivos as $archivo) : ?>
        <?php if ($archivo !== '.' && $archivo !== '..') : ?>
            <tr>
                <td><img src="<?php echo $directorio . '/' . $archivo; ?>" alt="<?php echo $archivo; ?>" width="100"><hr></td>
                <td>
                    <form method="post">
                        <input type="hidden" name="eliminar" value="<?php echo $directorio . '/' . $archivo; ?>">
                        <input class="btn btn-primary" type="submit" value="Eliminar">
                    </form>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>
	
</table>
