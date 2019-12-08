<?php
//conectamos con el servidor de la DB

$host ="localhost";
$user ="root";
$pass ="";
$db="empleadores";

 $con = mysqli_connect($host,$user,$pass,$db)or die("Problemas al Conectar");
 mysqli_select_db($con,$db)or die("problemas al conectar con la base de datos");

//recuperar las variables
$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$empresa=$_POST['empresa'];
//$rubro=$_POST['rubro'];
$email=$_POST['email'];
$usuario=$_POST['usuario'];
$contrasena= $_POST['password']; 

//evitar usuarios duplicados

$verificar_usuario = mysqli_query($con, "SELECT * FROM users WHERE usuario='$usuario'");
if(mysqli_num_rows($verificar_usuario)>0){
	echo'El usuario ya está registrado';
	exit; //con esto evita que se ingrese el dato duplicado
}

$verificar_email = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
if(mysqli_num_rows($verificar_email)>0){
	echo'El usuario ya está registrado';
	exit; //con esto evita que se ingrese el dato duplicado
}

//hacemos la sentencia de sql para guardar los datos

$sql="INSERT INTO users VALUES('$nombre', '$apellido', '$empresa', '$email', '$usuario', '$contrasena')";

//ejecutamos la query

$ejecutar=mysqli_query($con, $sql);
//verificamos la query
if(!$ejecutar){
	echo"hubo un error";
}else{
	echo"<script type=\"text/javascript\">alert('Se ha registrado exitosamente'); window.location='ingreso.html';</script>";
}
?>

