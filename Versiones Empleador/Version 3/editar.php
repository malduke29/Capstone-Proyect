<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
</head>
 
<body>
<?php
session_start();

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$Nombre = $_REQUEST['Nombre'];
$Apellido = $_REQUEST['Apellido'];
$Empresa = $_REQUEST['Empresa'];
$Rubro = $_REQUEST['Rubro'];

include_once('database.php');
$Tabla = new Conexion();
$Conectar = $Tabla -> Conectar();
$sql2 = "SELECT usuario FROM users WHERE email = '".$email."'";
$Result = mysqli_query($Conectar, $sql2);

while ($row = mysqli_fetch_array($Result)) {
	$User = $row['usuario'];
    }

$Pass = $_REQUEST['Pass'];

$sql = "UPDATE users SET nombre = '".$Nombre."', apellido = '".$Apellido."', empresa = '".$Empresa."', rubro = '".$Rubro."', email = '".$email."', usuario = '".$User."', password = '".$Pass."' WHERE email = '".$email."'";
	    mysqli_query($Conectar, $sql);

header("Refresh:0; url=editar-perfil.php");

?>
</body>
</html>

