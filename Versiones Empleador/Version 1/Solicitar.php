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
<section class="containerEmitir">
<h1 class="h2 mb-3 font-weight-normal" align="center">Ingrese los datos para la solicitud</h1><br>
<br><br>
  <form action="guardar_solicitud.php" method="POST">

<select class="form-controlEmitir" name="universidad">
  <option>Seleccione la Universidad</option>
  <option>Universidad Adolfo Ibáñez</option>
  <option>Universidad del Desarrollo</option>
  <option>Pontificia Universidad Católica de Chile</option>
  <option>Universidad de Chile</option>
  <option>Universidad de Santiago de Chile</option>
</select>

<br><select class="form-controlEmitir" name="tipo_de_certificado">
  <option>Seleccione el tipo de Certificado</option>
  <option>Diploma</option>
  <option>TOEFL</option>
</select>

<br><select class="form-controlEmitir" name="tipo_de_certificado">
  <option>Seleccione el tipo de Certificado</option>
  <option>Diploma</option>
  <option>TOEFL</option>
</select>

<br><input type="id" id="inputRUT"  name="rut_alumno" class="form-controlEmitir" placeholder="RUN (19.234.XXX-X)">



  <br><div class="form-group center" align="center">
  <input class="btn btn-outline-success" type="Submit" name="enviar" value="Solicitar">
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