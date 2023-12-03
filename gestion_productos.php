<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
</head>
<body>
    <h1>Gestión de Productos</h1>
    
    <!-- Formulario para agregar productos -->
    <form action="agregar_producto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <!-- Cambio en el tipo de entrada y el nombre del campo -->
        <label for="imagen">Imagen (nombre del archivo sin extensión):</label>
        <input type="text" name="imagen" required><br>

        <!-- Añadir campo para seleccionar el formato de la imagen -->
        <label for="formato">Formato de la Imagen:</label>
        <select name="formato">
            <option value="jpg">JPG</option>
            <option value="png">PNG</option>
            <!-- Agrega otros formatos si es necesario -->
        </select><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" min="0" step="0.01" required><br>

        <!-- Campo para ingresar el ID del producto manualmente -->
        <label for="id">ID del Producto:</label>
        <input type="text" name="id" required><br>

        <input type="submit" value="Agregar Producto">
    </form>

    <!-- Formulario para eliminar productos -->
    <form action="eliminar_producto.php" method="post">
        <label for="id_eliminar">ID del Producto a Eliminar:</label>
        <input type="number" name="id_eliminar" required><br>

        <input type="submit" value="Eliminar Producto">
    </form>
</body>
</html>
