<?php
session_start();

$usuari = trim($_POST['usuari']);
$contra = trim($_POST['pwd']);
$correu = trim($_POST['correu']);
$rol = trim($_POST['rol']);

if (isset($_POST['enviar'])) {
    if (!empty($usuari) && !empty($contra)) {

        // Debugging statement
        var_dump($usuari, $contra, $rol);

        switch ($rol) {
            case 'administrador': // Changed from 'admin'
                if ($contra == 'fjeclot' && $rol == 'administrador') {
                    $_SESSION['usuario'] = $usuari;
                    header("location: admin_pagina.html");
                    exit;
                }
                break;
            case 'gestor':
                if ($rol == 'gestor') {
                    $_SESSION['usuario'] = $usuari;
                    header("location: encargado_pagina.html");
                    exit;
                }
                break;
            case 'cliente':
                if ($rol == 'cliente') {
                    $_SESSION['usuario'] = $usuari;
                    header("location: cliente_pagina.html");
                    exit;
                }
                break;
            default:
                echo 'Usuario no reconocido';
        }
    } else {
        echo "Completa todos los campos";
    }
}
?>