<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre']) && isset($_POST['imagen']) && isset($_POST['formato']) && isset($_POST['precio'])) {
        $nombre = $_POST['nombre'];
        $formato = $_POST['formato'];
        
        // Genera un ID único combinando el nombre del producto y el formato de la imagen
        $id = uniqid($nombre . '_' . $formato . '_');
        
        $imagen = 'IMATGES/' . $_POST['imagen'] . '.' . $formato;
        $precio = $_POST['precio'];

        $producto = array(
            'id' => $id,
            'nombre' => $nombre,
            'imagen' => $imagen,
            'precio' => $precio,
            'cantidad' => 1
        );

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }

        $_SESSION['carrito'][] = $producto;
    }
}

header('Location: gestion_productos.php');
exit();
?>
