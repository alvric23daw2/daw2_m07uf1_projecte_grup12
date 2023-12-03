<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh; /* Para centrar verticalmente en la página */
            margin: 0;
        }

        #contenido {
            text-align: center;
        }
        #tajeta {
            border: 1px solid #ddd; /* Borde con color gris claro */
            border-radius: 8px; /* Bordes redondeados */
            padding: 16px; /* Espaciado interno */
            width: 300px; /* Ancho de la tarjeta */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra para efecto elevado */
            margin: 20px auto; /* Centrar en la página */
        }
    </style>
</head>
<body>
    <div id="contenido">
        <h1>Carrito de Compras</h1>
        <div id="tarjeta"
        <?php
            session_start();

            if (isset($_SESSION['carrito'])) {
                foreach ($_SESSION['carrito'] as $producto) {
                    echo '<div>';
                    echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" style="width: 50px; height: 50px;">';
                    echo '<p>' . $producto['nombre'] . '</p>';
                    echo '<p>Precio: $' . $producto['precio'] . '</p>';
                    echo '<p>Cantidad: ' . $producto['cantidad'] . '</p>';
                    echo '<a href="eliminar_producto.php?id=' . $producto['id'] . '">Eliminar</a>';
                    echo '</div>';
                    
                }
            } else {
                echo '<p>El carrito está vacío.</p>';
            }
        ?>
    </div>
</body>
</html>

