<?php
$directorio = 'tomarfoto/fotos/'; // Reemplaza con la ruta de tu directorio

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
<div class="jumbotron">
<table>
    <tr>
        <th class="col-md-10 p-4"><h1 class="display-4">Imatges denunciables que fem al moment</h1>
		<p class="lead">Aixi sabem tot@s el que esta passant al moment i podem començar a fer alguna cosa al respecte. En quant estigui gestionat, podem eliminar l'imatge en concret.</p>
		</th>
    </tr>
    <?php foreach ($archivos as $archivo) : ?>
        <?php if ($archivo !== '.' && $archivo !== '..') : ?>
            <tr class="p-4">
                <td><img src="<?php echo $directorio . '/' . $archivo; ?>" alt="<?php echo $archivo; ?>" width="250">
                <div style="height:10px;"></div>
                    <form method="post">
                        <input type="hidden" name="eliminar" value="<?php echo $directorio . '/' . $archivo; ?>">
                        <input class="btn btn-primary" type="submit" value="Eliminar">
                    </form>
					<hr>
                </td>
            </tr>
			
        <?php endif; ?>
    <?php endforeach; ?>
	
</table>
</div>
