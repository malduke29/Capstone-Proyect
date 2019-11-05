<?php
session_start();

$usuario = $_POST['email'];
$pass = $_POST['password'];

$_SESSION['email'] = $usuario;
$_SESSION['password'] = $pass;

include_once('database.php');
$Tabla = new Conexion();
$Conectar = $Tabla -> Conectar();
$Verificacion = False;

$Result = mysqli_query($Conectar, 'SELECT * from funcionario');
while ($row = mysqli_fetch_array($Result)) {
    if ($usuario == $row['email'] && $pass == $row['password'])
    {
        $Verificacion = True;
    }
    
}

if ($Verificacion == False)
{
    ?>
<script type="text/javascript">
  alert("Usuario no registrado o Usuario y Contraseña no Coinciden"); window.location='Ingreso.php';
</script>
<?php
header("Refresh: 1; URL=../admin/index.php");
}

else
{
	echo"<script type=\"text/javascript\">alert('Se ha iniciado sesión exitosamente'); window.location='Visualizar.php';</script>";
}
?>
