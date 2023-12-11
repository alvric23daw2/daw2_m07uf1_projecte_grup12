<?php
session_start();

function formato_num($numero) {
    return number_format($numero, 2);
}

function mostrarCesta() {
    $totalPrecio = 0;
    $totalIva = 0;
    $totalProductos = 0;

    if (isset($_SESSION['cesta'])) {
        foreach ($_SESSION['cesta'] as $producto) {
            echo '<div>';
            echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" style="width: 50px; height: 50px;">';
            echo '<p>Nombre: ' . $producto['nombre'] . '</p>';
            echo '<p>Precio: $' . formato_num($producto['precio']) . '</p>';
            echo '<p>Cantidad: ' . $producto['cantidad'] . '</p>';
            echo '<a href="?eliminar=' . $producto['id'] . '">Eliminar</a>';
            echo '</div>';

            $totalProductos += $producto['cantidad'];
            $totalPrecio += $producto['precio'] * $producto['cantidad'];
            $totalIva += $producto['precio'] * $producto['cantidad'] * ($producto['iva'] / 100);
        }
    } else {
        echo '<p>La cesta está vacía.</p>';
    }

    $precioSinIva = $totalPrecio - $totalIva;

    echo '<p>Cantidad de productos: ' . $totalProductos . '</p>';
    echo '<p>Total del precio: $' . formato_num($totalPrecio) . '</p>';
    echo '<p>Total del IVA: $' . formato_num($totalIva) . '</p>';
    echo '<p>Total del precio sin IVA: $' . formato_num($precioSinIva) . '</p>';
}

function eliminarDeCesta($idEliminar) {
    if (!empty($_SESSION['cesta'])) {
        foreach ($_SESSION['cesta'] as $key => $producto) {
            if ($producto['id'] === $idEliminar) {
                unset($_SESSION['cesta'][$key]);
                break;
            }
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['eliminar'])) {
    eliminarDeCesta($_GET['eliminar']);
}

if (isset($_SESSION['cesta'])) {
    $cestaPath = 'Cesta/cesta.txt';
    $contenido = '';

    foreach ($_SESSION['cesta'] as $producto) {
        $contenido .= 'Nombre: ' . $producto['nombre'] . ', Precio: $' . formato_num($producto['precio']) . ', Cantidad: ' . $producto['cantidad'] . "\n";
    }

    file_put_contents($cestaPath, $contenido);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cesta de Compra</title>
    <style>
        body {
            margin: 20px;
        }

    </style>
</head>
<body>
    <h1>Cesta de Compra</h1>

    <?php mostrarCesta(); ?>

    <p><a href="carrito.php">Volver al Carrito</a></p>
    <a href="logout.php">Cerrar sesion</a>
</body>
</html>
