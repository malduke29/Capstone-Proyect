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

  <!-- ADMINISTRAR PERFIL-->
<section class="usuario-contenedor">
  <div class="usuario">
  <font color="white"><?php echo $email; ?></font>
  <a href="Ingreso.php" alt="Cerrar Sesión" title="Cerrar Sesión"><img src="images/logout.png" width="35" height="35"></a>
</div>
</section>

<section class="header">
  <h1>
  <a href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img align= "left" class="mr-0 align-right" src="images/logo-uai.png" alt="" width="220" height="60"></a>
</h1>
</section>

<br><br>
<section class="container">
<h1 class="h1 mb-3 font-weight-normal" align="center">Listado de Certificados Académicos</h1><br>
</section>



<!-- BUSCADOR POR RUT-->
<ul class="nav">
<li><section class="contenedor-buscar ">
<form class="my-1" name="rut_alumno" action="Visualizar2.php" method="POST">
<input class="form-control mr-sm-2" type="text" placeholder="RUN (19.234.XXX-X)" aria-label="Search">
<input class="btn btn-outline-success" type="Submit" name="enviar" value="Buscar">
</form>  
</section></li>
<li><li><li><li><li><li><li><li><a href="Emitir.php"><input type="Submit" class="btn-Emitir" value="Emitir Certificado"/></a></li></li></li></li></li></li></li></li>

</ul>
<!-- BUSCADOR POR ESTADO
<form class="my-1" name="estado" action="Visualizar2.php" method="POST">
  <select class="custom-select my-1 mr-sm-1" id="inlineFormCustomSelectPref" name="estado">
    <option selected>Filtrar</option>
    <option value="Aceptados"><a href="">Emitidos</a></option>
    <option value="Rechazados"><a href="">Revocados</a></option>
  </select>
  </form> -->



<br>

<div class="container">
  <div class="row" align='center'>
    </div>

    <div class="row list-group list-group-horizontal-xl">
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
    <th WIDTH="120">RUT</th>
    <th>Título Académico</th>
    <th>Estado</th>
    <th> Revocar</th>
    <th>Enviar Certificado</th>
    </tr>
    </thead>
  <tbody>

<?php
require 'clases.php';
foreach(certificado::obtenerCertificados() as $c) {

  echo '<tr>';
  echo '<td>' . $c->rut_alumno . '</td>';
  echo '<td>' . $c->nombre_titulo . '</td>';
  echo '<td align="center">' . $c->estado . '</td>';

  if($c->estado=='Emitido'){
    echo  '<td align="center"> 
    <form action="Revocar.php" method="POST"> 
    <input type="hidden" name="id" value="' . $c->id . '"/> 
  <button type="submit"><img src="images/eliminar.jpeg" width="30" height="30" align="center"/></button>
    </form>
    </td>';
  }

  else{
    echo '<td align="center">
    </td>';
  }
  if($c->estado=='Emitido' && $c->envio_email=='No Enviado'){
    echo  '<td align="center">
    <form action="enviar_email.php" method="POST"> 
    <input type="hidden" name="id" value="' . $c->id . '"/>
    <input type="hidden" name="rut_alumno" value="' . $c->rut_alumno . '"/>
    <input type="hidden" name="nombre_titulo" value="' . $c->nombre_titulo . '"/> 
    <input type="hidden" name="fecha" value="' . $c->fecha . '"/>   
  <button type="submit"><img src="images/correo.png" width="30" height="30" align="center"/></button>
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
