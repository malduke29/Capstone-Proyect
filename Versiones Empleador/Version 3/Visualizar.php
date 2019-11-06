<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="css/bootstrap.css">

  </head>
  <body>

  <!-- ADMINISTRAR PERFIL-->

  <section class="header">
  <div class="row">
  <div class="col-md-11  text-right">
  <label class="nav-item dropdown">
  <a class="nav-link dropdown-toggle mr-sm-4" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="mr-0" src="images/ibm.png" alt="" width="50" height="30"></a>
   <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="#">Perfil</a>
          <a class="dropdown-item" href="Ingreso.php">Cerrar Sesión</a>
        </div>
</label>
</div>
</div>
</section>

<br><br>
<section class="container">
<div class="row">
<div class="col-md-9  text-right">
<h1 class="h1 font-weight-normal" align="center">Solicitudes de Certificados</h1><br>
</div>
</div>
</section>


<div class="container">

<div class="row">
<div class="col-md-12  text-right">
<a href="Solicitar.php"><input type="Submit" class="btn-Emitir" value="Nueva Solicitud"/></a>
</div>
  </div>
<br>

  <div class="row" align='center'>
    </div>

    <div class="row list-group list-group-horizontal-xl">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
    <th>RUT</th>
    <th>Universidad</th>
    <th>Título de Certificado</th>
    <th>Estado</th>
    <th>Visualizar</th>
    </tr>
    </thead>
  <tbody>

<?php
require 'clases.php';
foreach(solicitud::obtenerSolicitudes() as $c) {

  echo '<tr>';
  echo '<td>' . $c->rut_alumno . '</td>';
  echo '<td>' . $c->universidad . '</td>';
  echo '<td>' . $c->tipo_de_certificado . '</td>';
  echo '<td align="center">' . $c->estado . '</td>';

  if($c->estado=='Autorizado'){
    echo  '<td align="center">
    <form action="jwt.php" method="POST"> 
    <input type="hidden" name="id" value="' . $c->id . '"/> 
  <button type="submit"><img src="images/lupa.png" width="30" height="30" align="center"/></button>
    </form>
    </td>';
  }
  else{
    echo '<td align="center">
    </td>';
  }
  echo '</tr>';
  }

?>
</tbody>
</table>
</div>
</div> <!-- /container -->
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>