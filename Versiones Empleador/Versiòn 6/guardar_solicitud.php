<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
<?php
require 'clases.php';

$universidad=$_POST['universidad'];
$universidad= utf8_decode($universidad);
$tipo_de_certificado= $_POST['tipo_de_certificado'];
$tipo_de_certificado= utf8_decode($tipo_de_certificado);
$rut_alumno=$_POST['rut_alumno'];
$estado = 'Pendiente';
$nombre_alumno = utf8_encode(alumno::obtenerNombre($rut_alumno));
$email_alumno = alumno::obtenerEmail($rut_alumno);
$id_solicitud = solicitud::conteo();
$id_solicitud = $id_solicitud + 1;
$jwt = 'Pendiente';
//$id = solicitud::conteo();

$guardar= solicitud::guardar($universidad, $tipo_de_certificado, $estado, $rut_alumno, $jwt);

/*echo"<script type=\"text/javascript\">
 alert('Se ha enviado su solicitud de $tipo_de_certificado a $nombre_alumno con rut $rut_alumno');
 window.location='Visualizar.php';
 </script>";

 id:"<?php echo $id; ?>",
 */ 
?>

<script>

$(document ).ready(function() {
    $.get("https://778d3aac.ngrok.io",{
        rut_alumno:"<?php echo $rut_alumno; ?>",
        universidad:"<?php echo $universidad; ?>", 
        tipo_de_certificado:"<?php echo $tipo_de_certificado; ?>",
        nombre_alumno:"<?php echo $nombre_alumno; ?>",
        email_alumno:"<?php echo $email_alumno; ?>" })

        alert('Se ha enviado la solicitud de "<?php echo $tipo_de_certificado; ?>" a "<?php echo $nombre_alumno; ?>" de rut "<?php echo $id_solicitud; ?>" ');
        window.location='Visualizar.php';
});

</script>