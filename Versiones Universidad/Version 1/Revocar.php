<?php
require 'clases.php';
$id=$_POST['id'];
$editar= certificado::editar($id);

echo"<script type=\"text/javascript\">alert('Se ha editado el certificado de id $id'); window.location='Visualizar.php';</script>";


?>