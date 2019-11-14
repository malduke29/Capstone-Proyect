<?php  

session_start();

$email = $_SESSION['email'];
$password = $_SESSION['password'];

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST ['apellido']; 
$correo = $_POST['correo'];
$universidad = $_POST['universidad']; 
$estado = $_POST['estado'];
$fecha = $_POST['fecha'];

include_once('database.php');
$Tabla = new Conexion();
$Conectar = $Tabla -> Conectar();
$Verificacion = False;

$Result = mysqli_query($Conectar, 'SELECT * from alumnos');
while ($row = mysqli_fetch_array($Result)) {
    if ($id == $row['id'] && $password == $row[''])
    {
        $id = $row['id'];
        $Nombre = $row['nombre'];
        $Apellido = $row['apellido'];
        $correo = $row['correo'];
        $universidad = $row['universidad'];
        $estado = $row['estado'];
        $fecha = $row['fecha'];
    }
    
}

?>
//

<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editar Perfil</title>
</head>
<body>
	<form method="POST" action="modificando.php">
<table>
<tr>
<td>universidad</td><td><input type="text" name="universidad" value="<?php echo $universidad; ?>" />
</tr>
<tr>
<td>id</td><td><input type="text" name="id" value="<?php echo $id; ?>" />
</tr>
<tr>
<td>estado</td><td><input type="text" name="estado" value="<?php echo $estado; ?>" />
</tr>
<tr><td></td><td><input type="submit" value="Guardar Datos" />
</table> '
	
</body>
</html>
