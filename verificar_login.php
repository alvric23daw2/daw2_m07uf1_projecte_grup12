<?php
function obtenerHash($correo, &$nombre_usuario) {
    $archivo = 'info_usuarios.txt';

    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
        foreach ($lineas as $linea) {
            list($nombre_guardado, $correo_guardado, $hash_guardado) = explode(";", $linea);
            if ($correo_guardado === $correo) {
                $nombre_usuario = $nombre_guardado;
                return $hash_guardado;
            }
        }
    }

    return null;
}

$nombre_usuario = ""; // Inicializar la variable antes de llamar a la función obtenerHash
$correo = isset($_POST['correo']) ? $_POST['correo'] : '';
$contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

$hash_guardado = obtenerHash($correo, $nombre_usuario);

if ($hash_guardado !== null && password_verify($contrasena, $hash_guardado)) {
    echo "<h1>¡Bienvenido a tu Área de Usuario, $nombre_usuario!</h1>";
    echo "<p>¿Qué te gustaría hacer?</p>";
    echo "<ul>";
    echo "<li><a href='gestionar_cuenta.php'>Gestionar mi cuenta</a></li>";
    echo "<li><a href='comprar.php'>Comprar</a></li>";
    echo "</ul>";
} else {
    echo "Contraseña incorrecta o usuario no encontrado.";
}
?>
