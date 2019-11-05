<?php
require 'db.php';

class users{
	public $nombre;
	public $apellido;
	public $empresa;
	public $rubro;
	public $email;
	public $usuario;
	public $password;

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

class solicitud{
	public $id;
	public $universidad;
	public $tipo_de_certificado;
	public $estado;
	public $rut_alumno;

	function __construct($i, $u, $tc, $e, $r){
		$this->id = $i;
		$this->universidad = $u;
		$this->tipo_de_certificado = $tc;
		$this->estado = $e;
		$this->rut_alumno = $r;
	}

	function obtenerSolicitudes() {
		DB::init();
		$consulta = "SELECT id, universidad, tipo_de_certificado, estado, rut_alumno FROM solicitud";
		$solicitud = DB::query($consulta);
		$res = array();
	
		foreach($solicitud as $c) {
			$obj = new solicitud ($c["id"], utf8_encode($c["universidad"]), utf8_encode($c["tipo_de_certificado"]), $c["estado"], $c["rut_alumno"]);
			array_push($res, $obj);
		}
		  return $res;
		}


		function guardar($universidad, $tipo_de_certificado, $estado, $rut_alumno) {
			DB::init();
			DB::queryB("INSERT INTO solicitud (universidad,tipo_de_certificado, estado, rut_alumno)  VALUES ('$universidad', '$tipo_de_certificado', '$estado', '$rut_alumno')");
	
		}

}

?>