<?php
session_start();
//$email = $_SESSION['email'];

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
    <nav class="navbar navbar-expand-lg navbar-light bg-light"></nav>
    <section class="container">
    <form class="form-signin" action="ingresando.php" method="POST">
      <div align="center">
      <br><br>
  <img class="mb-4" src="images/logo_uai.png" alt="" width="320" height="100">
</div>

    <div class="form-group">
          <h1 class="h3 mb-3 font-weight-normal" align="center">Ingreso para Emisión de Certificados Académicos</h1><br>
          <br><br>
  <label for="inputEmail" class="sr-only">Email address</label>
  <input type="email" name="email" id="inputEmail" class="form-control-ingreso" placeholder="Email address">
    </div>

<div class="form-group">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" name="password" id="inputPassword" class="form-control-ingreso" placeholder="Password" required autofocus>
</div>
 
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recuérdame
    </label>
  </div>

<div class="form-group center" align="center">
  <input class="btn-hip btn-lg btn-primary" type="submit" name="ingresar" value="Ingresar">  
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








