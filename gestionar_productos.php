<?php
$archivo_productos = "productos/productos.txt";
$ruta_imagenes = "img/";

if (!file_exists($archivo_productos)) {
    die("Error: El archivo de productos no existe.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["agregar_producto"])) {
    $nuevo_producto_id = $_POST["nuevo_producto_id"];
    $nuevo_producto_nombre = $_POST["nuevo_producto_nombre"];
    $nuevo_producto_imagen = $_POST["nuevo_producto_imagen"];
    $nuevo_producto_precio = $_POST["nuevo_producto_precio"];
    $nuevo_producto_disponibilidad = $_POST["nuevo_producto_disponibilidad"];
    $ruta_imagen_completa = $ruta_imagenes . $nuevo_producto_imagen;
    $nuevo_producto = "$nuevo_producto_id:$nuevo_producto_nombre:$ruta_imagen_completa:$nuevo_producto_precio:$nuevo_producto_disponibilidad";
    file_put_contents($archivo_productos, $nuevo_producto . PHP_EOL, FILE_APPEND | LOCK_EX);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["eliminar_producto"])) {
    $id_producto_eliminar = $_POST["id_producto_eliminar"];
    $productos = file($archivo_productos, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $productos_actualizados = [];
    foreach ($productos as $producto) {
        list($id, , , , ) = explode(":", $producto);
        if ($id != $id_producto_eliminar) {
            $productos_actualizados[] = $producto;
        }
    }
    file_put_contents($archivo_productos, implode(PHP_EOL, $productos_actualizados) . PHP_EOL);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Productos</title>
</head>
<body>
    <h2>Gestionar Productos</h2>

    <form method="post" action="">
        <label for="nuevo_producto_id">ID del Nuevo Producto:</label>
        <input type="text" id="nuevo_producto_id" name="nuevo_producto_id" required><br>

        <label for="nuevo_producto_nombre">Nombre del Nuevo Producto:</label>
        <input type="text" id="nuevo_producto_nombre" name="nuevo_producto_nombre" required><br>

        <label for="nuevo_producto_imagen">Nombre de la Imagen:</label>
        <input type="text" id="nuevo_producto_imagen" name="nuevo_producto_imagen" required><br>

        <label for="nuevo_producto_precio">Precio:</label>
        <input type="text" id="nuevo_producto_precio" name="nuevo_producto_precio" required><br>

        <label for="nuevo_producto_disponibilidad">Disponibilidad:</label>
        <input type="text" id="nuevo_producto_disponibilidad" name="nuevo_producto_disponibilidad" required><br>

        <input type="submit" name="agregar_producto" value="Agregar Producto">
    </form>

    <h3>Eliminar Producto</h3>
    <form method="post" action="">
        <label for="id_producto_eliminar">ID del Producto a Eliminar:</label>
        <input type="text" id="id_producto_eliminar" name="id_producto_eliminar" required>
        <input type="submit" name="eliminar_producto" value="Eliminar Producto">
    </form>

    <p><a href="login.php">Volver al inicio de sesión</a></p><br>
    
</body>
</html>
