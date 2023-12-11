<?php
// eliminar_usuario.php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correoEliminar = isset($_POST['correoEliminar']) ? $_POST['correoEliminar'] : '';

    if (!empty($correoEliminar)) {
        $archivo = 'info_usuarios.txt';

        // Read existing user data
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES);

        // Write data back to the file excluding the user with the provided email
        $nuevasLineas = array();
        foreach ($lineas as $linea) {
            if (trim($linea) !== '') {
                $elementos = explode(", ", $linea);
                $correoGuardado = explode(': ', $elementos[1])[1];

                if ($correoGuardado !== $correoEliminar) {
                    $nuevasLineas[] = $linea;
                }
            }
        }

        // Write the updated data back to the file
        file_put_contents($archivo, implode("\n", $nuevasLineas));

        echo "Usuario con correo $correoEliminar eliminado correctamente.";
        echo "<br>";
        echo "<a href='login.php'>Volver a inicio de sesion</a>";
    } else {
        echo "Por favor, proporciona un correo electrónico válido.";
    }
}
?>
