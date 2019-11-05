<?php
session_start();
$email = $_SESSION['email'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.css">
  </head>
  <body>

<!-- BARRA SUPERIOR DE OPCIONES-->

  <!-- ADMINISTRAR PERFIL-->
  <section class="usuario-contenedor">
  <div class="usuario">
  <font color="white"><?php echo $email; ?></font>
  <a href="Ingreso.php" alt="Cerrar Sesión" title="Cerrar Sesión"><img src="images/logout.png" width="35" height="35"></a>
</div>
</section>

<section class="header">
<div class="row">
<div class="col-md-1  text-right">
<a href="Visualizar.php"><img src="images/casa.png" width="50" height="50"></a>
</div>

<div class="col-md-10 text-right">  
  <img class="align-right" src="images/logo-uai.png" alt="" width="220" height="60">
  </div>
  </div>
</section>

<br><br><br>

<section class="containerEmitir">
<h1 class="h2 mb-3 font-weight-normal" align="center">Formulario para emisión de Certificados</h1><br>
<br><br>
  <form action="guardar_emision.php" method="POST">
<!-- PRIMER PARAMETRO: Tipo de Certificado -->
<select class="form-controlEmitir" name="tipo_de_certificado">
  <option>Tipo de Certificado</option>
  <option>Certificado de Título</option>
</select>

<!-- SEGUNDO PARAMETRO: Nombre del Título -->
<br><select class="form-controlEmitir" name="nombre_titulo">
  <option>Seleccione el Título</option>
  <option>Ingeniero Civil Industrial mención Tecnologías de la Información</option>
  <option>Ingeniero Civil Industrial mención Obras Civiles</option>
    <option>Ingeniero Civil Industrial mención Minería</option>
      <option>Ingeniero Civil Industrial mención Biotecnología</option>
        <option>Ingeniero Civil en Minería</option>
                <option>Ingeniero Civil en Obras Civiles</option>
                        <option>Ingeniero Civil en Biotecnología</option>
</select>

<!-- TERCER PARAMETRO: Fecha -->
<br><input type="date" name="fecha" id="inputFecha" class="form-controlEmitir" placeholder="Ingrese fecha de emisión">

<!-- CUARTO PARAMETRO: Estado: Default 'Emitido'. -->
<!-- QUINTO PARAMETRO: id_funcionario: solicitado al principio -->

<!-- SEXTO PARAMETRO: rut alumno. -->
<br><input type="id" id="inputRUT"  name="rut_alumno" class="form-controlEmitir" placeholder="RUT del alumno">



 <br><div class="form-group center" align="center">
    <input class="btn btn-outline-success" type="Submit" name="enviar" value="Emitir">
  <!--<button class="btn btn-lg btn-primary" type="submit">Registro</button> -->
  </div>
</form>

  </section>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
   
  </body>
</html>