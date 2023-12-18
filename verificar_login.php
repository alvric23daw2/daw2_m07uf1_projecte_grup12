<?php
session_start();

function obtenerHash($correo, &$nombre_usuario, &$rol_usuario) {
    $archivo = 'info_usuarios.txt';
    
        if (file_exists($archivo)) {
            $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
            foreach ($lineas as $linea) {
                if (trim($linea) === '') {
                    continue;
                }
    
                $elementos = explode(", ", $linea);
    
                if (count($elementos) >= 4) {
                    $nombre_guardado = explode(': ', $elementos[0])[1];
                    $correo_guardado = explode(': ', $elementos[1])[1];
                    $rol_guardado = explode(': ', $elementos[3])[1];
                    $hash_guardado = explode(': ', $elementos[2])[1];
    
                    if ($correo_guardado === $correo) {
                        $nombre_usuario = $nombre_guardado;
                        $rol_usuario = $rol_guardado;
                        return $hash_guardado;
                    }
                }
            }
        } else {
            die("El archivo $archivo no existe.");
        }
    
        return null;
    }
    

$nombre_usuario = "";
$rol_usuario = "";
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';
$rol = isset($_POST['rol']) ? $_POST['rol'] : '';

$hash_guardado = obtenerHash($correo, $nombre_usuario, $rol_usuario);



if ($hash_guardado !== null && password_verify($contrasena, $hash_guardado)) {
    if ($rol_usuario === $rol) {
    
        echo "Inicio de sesión exitoso como $rol_usuario.<br>";
        echo "<h1>¡Bienvenido a tu Área de Usuario, $nombre_usuario!</h1>";
        echo "<p>¿Qué te gustaría hacer?</p>";
        echo "<ul>";
        if ($rol === 'cliente' || $rol === 'gestor'){
            echo "<li><a href='gestionar_cuenta.php'>Gestionar mi cuenta</a></li>";
        }
        if ($rol === 'gestor'){
            echo "<li><a href='registro1.php'>Crear cuenta</a></li>";
            echo "<li><a href='gestionar_productos.php'>Gestion productos</a></li>";
        }
        if ($rol === 'admin'){
            echo "<li><a href='registro2.php'>Crear cuenta</a></li>";
            echo "<li><a href='eliminar_cuenta.php'>Eliminar cuenta</a></li>";
            echo"<h2>Eliminar Usuario</h2>";
            echo "<form action='eliminar_usuario.php' method='post'>";
            echo "<label for='correoEliminar'>Correo Electrónico:</label>";
            echo "<input type='email' name='correoEliminar' required>";
            echo "<input type='submit' value='Eliminar Usuario'>";
            echo "</form>";
        }
        echo "<li><a href='lista_productos.php'>Lista de Productos</a></li>";
        echo "</ul>";
        echo "<br>";
        echo "<a href='logout.php'>Logout</a>";
    } else {
        echo "Rol incorrecto para el usuario.<br>";
        
    }
} else {
    echo "Contraseña incorrecta o usuario no encontrado.<br>";
}
?>
