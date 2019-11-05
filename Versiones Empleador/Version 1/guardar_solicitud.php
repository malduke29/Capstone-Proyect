<?php
require 'clases.php';

$universidad=$_POST['universidad'];
$universidad= utf8_decode($universidad);
$tipo_de_certificado= $_POST['tipo_de_certificado'];
$tipo_de_certificado= utf8_decode($tipo_de_certificado);
$rut_alumno=$_POST['rut_alumno'];
$estado = 'Pendiente';

$guardar= solicitud::guardar($universidad, $tipo_de_certificado, $estado, $rut_alumno);


$nombre_alumno= alumno::obtenerNombre($rut_alumno);
$email_alumno= alumno::obtenerEmail($rut_alumno);
$nombre_alumno= utf8_decode($nombre_alumno);
echo"<script type=\"text/javascript\">
 alert('Se ha enviado su solicitud de $tipo_de_certificado a $nombre_alumno con rut $rut_alumno');
 window.location='Visualizar.php';
 </script>";
  


?>