/* Cerrar la sesion actual */

<?php
session_start();
session_unset($_SESSION['email']);
session_destroy();

header('location: Ingreso.php');
?>