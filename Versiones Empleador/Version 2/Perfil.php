<html lang="en">
  <head>
  <style type="text/css">
    .imgRedonda {
        width:150px;
        height:150px;
        border-radius:75px;
        border:8px solid #666;
    }
  </style>
  <script type="text/javascript">
    $(document).ready(function(){
$( "#editar" ).click(function() {
 console.log(alert('El Usuario fue Editado'))
})
});
  </script>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-dark">
  <button class="navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
    <span class="navbar-toggler-icon"></span>
  </button>

<!-- BARRA SUPERIOR DE OPCIONES-->
<?
session_start();

$email = $_SESSION['email'];
$password = $_SESSION['password'];

?>
  <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
 </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actividades</a>
        <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="Solicitar.php">Solicitar Certificado</a>
          <a class="dropdown-item" href="Visualizar.html">Visualizar Certificados</a>
        </div>
      </li>
    </ul>

    <!-- ADMINISTRAR PERFIL-->
<label class="nav-item dropdown">
  <a class="nav-link dropdown-toggle mr-sm-4" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $email; ?><img class="mr-0" src="images/ibm.png" alt="" width="50" height="30"></a>
   <div class="dropdown-menu" aria-labelledby="dropdown01">
          <a class="dropdown-item" href="editar-perfil.php">Perfil</a>
          <a class="dropdown-item" href="logout.php">Cerrar Sesi�n</a>
        </div>
</label>

  </div>
</nav>
<li> <li>
</li></li>


<!-- ACTUALIZACIONES RECIENTES-->
<main role="main" class="container">
  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0"><br>Editar Perfil<br></h6>
    <br>
    <br>
<?php

    include_once('conexion.php');
    $Tabla = new Conexion();
    $Conectar = $Tabla -> Conectar();
    $Result = mysqli_query($Conectar, "SELECT * FROM test
                                WHERE ID = 1");
    while ($usuario = mysqli_fetch_array($Result))
    {
?>
    <div class="row">
      <div class="col-md-4">
        <center><img src='images/perfil-icon.jpg' class='imgRedonda' /></center>
      </div>
      <div class="col-md-4">
        <form method="POST" action="editar.php">
        Nombre:
        <br>
        <input type="text" name="Nombre" value="<?php echo $usuario['Nombre']; ?>">
        <br>
        <br>
        Empresa:
        <br>
        <input type="text" name="Empresa" value="<?php echo $usuario['Empresa']; ?>">
        <br>
        <br>
        Correo:
        <br>
        <input type="text" name="Correo" value="<?php echo $usuario['Correo']; ?>">
        <br>
        <br>

      </div>
<div class="col-md-4">
        Apellido:
        <br>
        <input type="text" name="Apellido" value="<?php echo $usuario['Apellido']; ?>">
        <br>
        <br>
        Rubro:
        <br>
        <input type="text" name="Rubro" value="<?php echo $usuario['Rubro']; ?>">
        <br>
        <br>
        <br>
        <br>
        <br>
      </div>
      <div class="col-md-4">
      </div>
      <div class="col-md-4">
        User:
        <br>
        <input type="text" name="User" value="<?php echo $usuario['User']; ?>" disabled>
        <br>
        <br>

      </div>
      <div class="col-md-4">
        Pass:
        <br>
        <input type="text" name="Pass" value="<?php echo $usuario['Pass']; ?>" pattern="[A-Za-z0-9]{6,16}" title="Un c�digo de seguridad v�lido consiste en una cadena con 6 a 16 caracteres, cada uno de los cuales es una letra o un d�gito, sin simbolos" required>
        <br>
        <br>
<?php
}
?>
      </div>
            <div class="col-md-6"></div>
            <div class="col-md-6"><button class="btn btn-danger" type="submit" id="editar">Editar</button>
</div>
</form>

<!--
    <small class="d-block text-right mt-3">
      <a href="#">All updates</a>
    </small>
  </div>

  <div class="my-3 p-3 bg-white rounded shadow-sm">
    <h6 class="border-bottom border-gray pb-2 mb-0">Suggestions</h6>
    <div class="media text-muted pt-3">
      {% include icons/placeholder.svg width="32" height="32" background="#007bff" color="#007bff" class="mr-2 rounded" %}
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="media text-muted pt-3">
      {% include icons/placeholder.svg width="32" height="32" background="#007bff" color="#007bff" class="mr-2 rounded" %}
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <div class="media text-muted pt-3">
      {% include icons/placeholder.svg width="32" height="32" background="#007bff" color="#007bff" class="mr-2 rounded" %}
      <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
        <div class="d-flex justify-content-between align-items-center w-100">
          <strong class="text-gray-dark">Full Name</strong>
          <a href="#">Follow</a>
        </div>
        <span class="d-block">@username</span>
      </div>
    </div>
    <small class="d-block text-right mt-3">
      <a href="#">All suggestions</a>
    </small>
  </div>
-->
</main>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>