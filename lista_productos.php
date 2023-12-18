<?php
$archivo_productos = "productos/productos.txt";
$productos = file($archivo_productos, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cantidades = $_POST['cantidades'];

    $cesta_contenido = "";

    foreach ($productos as $producto) {
        list($id, $nombre, $imagen, $precio, $disponibilidad) = explode(":", $producto);

        $cantidad = isset($cantidades[$id]) ? intval($cantidades[$id]) : 0;

        if ($cantidad > 0) {
            $cesta_contenido .= "$id:$nombre:$imagen:$precio:$cantidad\n";
        }
    }

    if (!empty($cesta_contenido)) {
        file_put_contents("cesta/cesta.txt", $cesta_contenido);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <style>
        .producto {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 200px;
            display: inline-block;
        }

        .producto img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <h2>Lista de Productos</h2>
    <form method="post" action="">
        <?php
        foreach ($productos as $producto) {
            list($id, $nombre, $imagen, $precio, $disponibilidad) = explode(":", $producto);
            ?>
            <div class="producto">
                <img src="<?php echo $imagen; ?>" alt="<?php echo $nombre; ?>">
                <p><strong><?php echo $nombre; ?></strong></p>
                <p>Precio: <?php echo $precio; ?></p>
                <p>Disponibilidad: <?php echo $disponibilidad; ?></p>
                <label for="cantidad_<?php echo $id; ?>">Cantidad:</label>
                <input type="number" id="cantidad_<?php echo $id; ?>" name="cantidades[<?php echo $id; ?>]" min="0" max="<?php echo $disponibilidad; ?>" value="0">
            </div>
            <?php
        }
        ?>
        <input type="submit" value="Agregar a la Cesta">
        <a href='cesta.php'>Ver Cesta</a>
        <a href='login.php'>Login</a>
    </form>
</body>
</html>
