<?php
    session_start();

    if (!(isset($_SESSION['usuario']) && $_SESSION['tipo'] === 'admin')) {
        header("Location: acceso_denegado.php"); 
        exit();
    }
?>



