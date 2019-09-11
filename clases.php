<?php
require 'db.php';

class certificado{
	public $id;
	public $tipo_de_certificado;
	public $nombre_titulo;
	public $fecha;
	public $estado;
	public $id_funcionario;
	public $rut_alumno;

function __construct($tc, $n, $f, $e, $idf, $r){
		$this->tipo_de_certificado = $tc;
		$this->nombre_titulo = $n;
		$this->fecha = $f;
		$this->estado = $e;
		$this->id_funcionario = $idf;
		$this->rut_alumno = $r;
	}

	function obtenerPorRut($rut_alumno) {
	DB::init();
	$consulta = "SELECT id, tipo_de_certificado, nombre_titulo, fecha, estado, id_funcionario, rut_alumno FROM certificado WHERE rut_alumno='$rut_alumno'";
	$certificado = DB::query($consulta);
	$res = array();

	foreach($certificado as $c) {
		$obj = new certificado ($c["id"], $c["tipo_de_certificado"], utf8_encode($c["nombre_titulo"]), $c["fecha"], $c["estado"], $c["id_funcionario"], $c["rut_alumno"]);
		array_push($res, $obj);
	}
	  return $res;
    }


	function obtenerCertificados() {
	DB::init();
	$consulta = "SELECT tipo_de_certificado, nombre_titulo, fecha, estado, id_funcionario, rut_alumno FROM certificado";
	$certificado = DB::query($consulta);
	$res = array();

	foreach($certificado as $c) {
		$obj = new certificado (utf8_encode($c["tipo_de_certificado"]), utf8_encode($c["nombre_titulo"]), $c["fecha"], $c["estado"], $c["id_funcionario"], $c["rut_alumno"]);
		array_push($res, $obj);
	}
	  return $res;
    }

	function guardar() {
		DB::init();
		
		DB::queryB("INSERT INTO certificado (tipo_de_certificado, nombre_titulo, fecha, estado, id_funcionario, rut_alumno) VALUES ('$this->tipo_de_certificado', '$this->nombre_titulo', '$this->fecha', '$this->estado', '$this->id_funcionario', '$this->rut_alumno')");

	}

	}

class funcionario{
	public $id;
	public $nombre;
	public $apellido;
	public $email;
	public $password;

	static function obtenerPorEmail($email) {
		DB::init();
		$res = DB::queryB("SELECT * FROM funcionario WHERE email='$email'");	
		$id = DB::conteo($res);
		return $id;
	}

}

?>