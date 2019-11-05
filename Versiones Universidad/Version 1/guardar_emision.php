
<?php
require 'clases.php';
DB::init();

session_start();
$email = $_SESSION['email'];
$id_funcionario = funcionario::obtenerPorEmail($email);

//recuperar las variables
$tipo_de_certificado=$_POST['tipo_de_certificado'];
$tipo_de_certificado= utf8_decode($tipo_de_certificado);
$nombre_titulo=$_POST['nombre_titulo'];
$nombre_titulo= utf8_decode($nombre_titulo);
$fecha=$_POST['fecha'];
$rut_alumno=$_POST['rut_alumno'];
$estado= 'Emitido';
$envio_email= 'No Enviado';


//falta estado solamente pero esa es por default: 'Emitido'

$cantidad = alumno::obtenerRut($rut_alumno);
if($cantidad==1){
  $guardar= certificado::guardar($tipo_de_certificado, $nombre_titulo, $fecha, $estado, $envio_email, $id_funcionario, $rut_alumno);
  $tipo_de_certificado=$_POST['tipo_de_certificado'];
  $nombre_titulo=$_POST['nombre_titulo'];

echo"<script type=\"text/javascript\">
 alert('Se ha emitido un nuevo $tipo_de_certificado de $nombre_titulo a la persona con RUT $rut_alumno el día $fecha');
 window.location='Visualizar.php';
 </script>";
 
 //header ("Location: https://b1c5c7ca.ngrok.io?nombre_titulo=".$nombre_titulo."&fecha=".$fecha."&rut_alumno=".$rut_alumno. "&nombre_alumno=".$nombre_alumno. "&email_alumno=".$email_alumno);
 //print "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=https://d4c51885.ngrok.io?nombre_titulo='.$nombre_titulo.'&fecha='.$fecha.'&rut_alumno='.$rut_alumno.'&nombre_alumno='.$nombre_alumno.'&email_alumno='$email_alumno'>";


}
else{
  echo"
  <script type=\"text/javascript\">
  alert('No existe alumno con rut $rut_alumno '); 
  window.location='Emitir.php?titulo='.$tipo_de_certificado.';
  </script>";
  
}



?>
 
 <!-- Optional JavaScript echo "<meta http-equiv='refresh' content='10' url="https://b1c5c7ca.ngrok.io?nombre_titulo=$nombre_titulo&fecha=$fecha&rut_alumno=$rut_alumno&nombre_alumno=$row1["nombre"]&email_alumno=$row2["email"]">"; -->
  