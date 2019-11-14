// ESTE ARCHIVO ES EL QUE DECODIFICA EL JWT 


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
  <div class="col-md-1  text-right">
  <a href="Visualizar.php"><img src="images/casa.png" width="50" height="50"></a>
  </div>

  <div class="col-md-10  text-right">
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

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
   
  </body>
</html>


<?php
require 'clases.php';
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

$id=$_POST['id'];
$jwt = solicitud::obtenerJwt($id);
$decoded = JWT::decode($jwt,'2d158cde38b7e1594286c41b3d442d1b2e926cb07c1abe94c4df1554e6c509e2', array('HS256'));

print($decoded);

?>
