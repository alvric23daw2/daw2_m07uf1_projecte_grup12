<?php

session_start();
unset($_SESSION['usuari']);
header("location: login.html");

?>
