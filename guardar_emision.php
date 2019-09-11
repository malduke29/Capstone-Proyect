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

$_SESSION['tipo_de_certificado'] = $tipo_de_certificado;
$_SESSION['nombre_titulo'] = $nombre_titulo;
$_SESSION['fecha'] = $fecha;
$_SESSION['rut_alumno'] = $rut_alumno;
$_SESSION['estado'] = $estado
//falta estado solamente pero esa es por default: 'Emitido'

$certificado = new certificado($tipo_de_certificado, $nombre_titulo, $fecha, $estado, $id_funcionario, $rut_alumno);
$certificado->guardar();

$tipo_de_certificado=$_POST['tipo_de_certificado'];
$nombre_titulo=$_POST['nombre_titulo'];

	echo"<script type=\"text/javascript\">alert('Se ha emitido un nuevo $tipo_de_certificado de $nombre_titulo a la persona con RUT $rut_alumno el día $fecha'); window.location='Inicio.php';</script>";


?>
