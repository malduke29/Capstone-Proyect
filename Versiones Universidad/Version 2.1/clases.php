<?php
require 'db.php';

class certificado{
	public $id;
	public $tipo_de_certificado;
	public $nombre_titulo;
	public $fecha;
	public $estado;
	public $envio_email;
	public $id_funcionario;
	public $rut_alumno;

function __construct($i, $tc, $n, $f, $e, $em, $idf, $r){
		$this->id = $i;
		$this->tipo_de_certificado = $tc;
		$this->nombre_titulo = $n;
		$this->fecha = $f;
		$this->estado = $e;
		$this->envio_email = $em;
		$this->id_funcionario = $idf;
		$this->rut_alumno = $r;
	}

	function obtenerPorRut($rut_alumno) {
	DB::init();
	$consulta = "SELECT id, tipo_de_certificado, nombre_titulo, fecha, estado, envio_email, id_funcionario, rut_alumno FROM certificado WHERE rut_alumno='$rut_alumno'";
	$certificado = DB::query($consulta);
	$res = array();

	foreach($certificado as $c) {
		$obj = new certificado ($c["id"], $c["tipo_de_certificado"], utf8_encode($c["nombre_titulo"]), $c["fecha"], $c["estado"], $c["envio_email"], $c["id_funcionario"], $c["rut_alumno"]);
		array_push($res, $obj);
	}
	  return $res;
	}


	function obtenerCertificados() {
	DB::init();
	$consulta = "SELECT id, tipo_de_certificado, nombre_titulo, fecha, estado, envio_email, id_funcionario, rut_alumno FROM certificado";
	$certificado = DB::query($consulta);
	$res = array();

	foreach($certificado as $c) {
		$obj = new certificado ($c["id"], utf8_encode($c["tipo_de_certificado"]), utf8_encode($c["nombre_titulo"]), $c["fecha"], $c["estado"], $c["envio_email"], $c["id_funcionario"], $c["rut_alumno"]);
		array_push($res, $obj);
	}
	  return $res;
    }

	function guardar($tipo_de_certificado, $nombre_titulo, $fecha, $estado, $envio_email, $id_funcionario, $rut_alumno) {
		DB::init();
		DB::queryB("INSERT INTO certificado (tipo_de_certificado, nombre_titulo, fecha, estado, envio_email, id_funcionario, rut_alumno) VALUES ('$tipo_de_certificado', '$nombre_titulo', '$fecha', '$estado', '$envio_email', '$id_funcionario', '$rut_alumno')");

	}

	function editar($id) {
		DB::init();
		DB::queryB("UPDATE certificado SET estado='Revocado' WHERE id='$id'" );

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

class alumno{
	public $id;
	public $nombre;
	public $email;
	public $password;

	static function obtenerRut($rut_alumno) {
		DB::init();
		$res = DB::queryB("SELECT * FROM alumno WHERE id='$rut_alumno'");	
		$cantidad = DB::conteo($res);
		return $cantidad;
	}

	function obtenerNombre($rut_alumno) {
		DB::init();
		$res = DB::queryB("SELECT nombre FROM alumno WHERE id='$rut_alumno'");
		$row = mysqli_fetch_assoc($res);
		return $row['nombre'];
	}

	function obtenerEmail($rut_alumno) {
		DB::init();
		$res = DB::queryB("SELECT email FROM alumno WHERE id='$rut_alumno'");
		$row = mysqli_fetch_assoc($res);
		return $row['email'];
	}

}

?>