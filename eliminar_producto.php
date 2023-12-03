<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    if (isset($_SESSION['carrito'])) {
        foreach ($_SESSION['carrito'] as $key => $producto) {
            if ($producto['id'] === $id) {
                unset($_SESSION['carrito'][$key]);
                break;
            }
        }
    }
}

header('Location: gestion_productos.php');
exit();
?>
