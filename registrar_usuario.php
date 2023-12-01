<?php
function generarHash($contrasena) {
    return password_hash($contrasena, PASSWORD_DEFAULT);
}

function guardarUsuario($nombre, $correo, $hash) {
    $archivo = 'info_usuarios.txt';
    $datos = implode(";", [$nombre, $correo, $hash])."\n";
    file_put_contents($archivo, $datos, FILE_APPEND);
}

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

$hash = generarHash($contrasena);
guardarUsuario($nombre, $correo, $hash);

echo "Usuario registrado exitosamente.";
echo "<br><br><a href='login.php'>Volver a la página de inicio de sesión</a>";
?>
