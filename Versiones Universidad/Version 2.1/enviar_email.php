<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<?php
require 'clases.php';
$id=$_POST['id'];
$rut_alumno=$_POST['rut_alumno'];
$nombre_titulo=$_POST['nombre_titulo']; 
$fecha=$_POST['fecha'];
$nombre_alumno = utf8_encode(alumno::obtenerNombre($rut_alumno));
$email_alumno = alumno::obtenerEmail($rut_alumno);


/*
echo"<script type=\"text/javascript\">

 </script>";
 */

 
?> 

<script>

$(document ).ready(function() {
    $.get("https://cc11ce64.ngrok.io",{
        rut_alumno:"<?php echo $rut_alumno; ?>",
        nombre_titulo:"<?php echo $nombre_titulo; ?>", 
        fecha:"<?php echo $fecha; ?>", 
        nombre_alumno:"<?php echo $nombre_alumno; ?>", 
        email_alumno:"<?php echo $email_alumno; ?>" })

        alert('Se ha enviado el Certificado de Título al email "<?php echo $email_alumno; ?>" del alumn@ "<?php echo $nombre_alumno; ?>"');
        window.location='Visualizar.php';
});

</script>








