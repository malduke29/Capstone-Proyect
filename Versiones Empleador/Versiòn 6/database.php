<?php

Class Conexion{
public function Conectar(){
$server = 'localhost';
$username = 'root';
$password = 'Capstone789+';
$database = 'universidad';

$conn = mysqli_connect($server,$username, $password, $database) or die ('connected failed');
   return $conn;
}
}
?>