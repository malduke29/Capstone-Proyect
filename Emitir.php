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
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

<!-- BARRA SUPERIOR DE OPCIONES-->
  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="Inicio.php">Inicio <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actividades</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="Emitir.php">Emitir Certificado</a>
          <a class="dropdown-item" href="Visualizar.php">Visualizar Certificados</a>
        </div>
      </li>
    </ul>


    <!-- ADMINISTRAR PERFIL-->
<label class="nav-item dropdown">
  <a class="nav-link dropdown-toggle mr-sm-4" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $email; ?><img class="mr-0" src="logo_uai.png" alt="" width="155" height="45"></a>
   <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="Ingreso.php">Cerrar Sesión</a>
        </div>
</label>

  </div>
</nav>
<li> <li>
</li></li>

<br><br><br>

<section class="container">
<h1 class="h3 mb-3 font-weight-normal" align="center">Formulario para emisión de Certificados</h1><br>
  <form action="guardar_emision.php" method="POST">

<!-- PRIMER PARAMETRO: Tipo de Certificado -->
<select class="form-control" name="tipo_de_certificado">
  <option>Tipo de Certificado</option>
  <option>Certificado de Título</option>
</select>

<!-- SEGUNDO PARAMETRO: Nombre del Título -->
<br><select class="form-control" name="nombre_titulo">
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
<br><input type="date" name="fecha" id="inputFecha" class="form-control" placeholder="Ingrese fecha de emisión">

<!-- CUARTO PARAMETRO: Estado: Default será Emitido. -->
<!-- QUINTO PARAMETRO: id_funcionario: solicitado al principio -->

<!-- SEXTO PARAMETRO: rut alumno. -->
<br><input type="id" id="inputRUT" name="rut_alumno" class="form-control" placeholder="RUT del alumno">



 <br><div class="form-group center" align="center">
    <input type="Submit" name="enviar" value="Emitir">
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