<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informacion basica sobre el funcionamiento de la pagina web</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2 align="center">Informacion basica sobre el funcionamiento de la pagina web</h2>
    <br>
    <div class="tex_index">
        <p>La nostra pagina web se llama MyCoche, consiste en una tienda online para comprar un coche 
        nuevo.</p>
        <p>Esta pagina consta de diferentes herramientas, que son las siguietes:</p>
        <br>
    
            <h3>1. Inicio de la aplicación:</h3>

            <p>Página de presentación con enlaces a información sobre el funcionamiento y validación de usuarios.
            Funcionalidad de información para los clientes sobre validación, cestas, pedidos y desconexión.
            Validación de usuarios con autenticación, inicio de sesión e identificación del tipo de usuario.</p>

            <h3>2. Administración de usuarios:</h3>
            
            <p>El administrador de la aplicación puede modificar sus datos y gestionar gestores y clientes.
            Creación, visualización, modificación y eliminación de gestores de la tienda.
            Creación, visualización, modificación y eliminación de clientes.
            Restricciones de acceso por tipo de usuario.</p>
            
            <h3>3. Gestión del catálogo de productos:</h3>
            
            <p>Los gestores pueden agregar, eliminar y modificar productos con características específicas.
            Visualización de la lista de productos con restricciones de acceso.</p>

            <h3>4. Gestión del área personal de los clientes:</h3>
            
            <p>Los clientes pueden ver y gestionar sus datos personales.
            Gestión de cestas con selección de productos, cantidades y resumen de compra.
            Creación de pedidos desde cestas con visualización en PDF.
            Restricciones de acceso según el tipo de usuario.</p>

            <h3>5. Gestión de tramitación de pedidos:</h3>
            
            <p>Los gestores pueden eliminar, rechazar, tramitar o finalizar pedidos con notificaciones al cliente.
            Restricciones de acceso según el tipo de usuario.
            Este resumen destaca los puntos clave del proyecto, incluyendo la gestión de usuarios, el catálogo de productos, el área personal de los clientes y la tramitación de pedidos.</p>
    </div>
    <br>
    <br>
    <?php
			date_default_timezone_set('Europe/Andorra');
			echo "<p>Data i hora: ".date('d/m/Y h:i:s')."</p>";
    ?>
    <br>
    <br>
    <a href="index.php">Volver a la pagina principal</a><br>
</body>
</html>