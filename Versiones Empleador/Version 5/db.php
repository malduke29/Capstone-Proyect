<?php
class DB {
	static $user = "root";
	static $pass = "";
	static $host= "localhost";
	static $db = "universidad";
	static $conn = null; 

	static function init() {
		DB::$conn = mysqli_connect(DB::$host, DB::$user, DB::$pass);
		mysqli_select_db(DB::$conn, DB::$db);
	}


	static function query($q) {
		
		$res = mysqli_query(DB::$conn, $q);
		$out = array();
		while($row = mysqli_fetch_assoc($res))
		{
			array_push($out, $row);
		}

		return $out; // Me está retornando un arreglo!!! //
	}


    	static function conteo($q) { // Me devuelve el numero de filas que tiene la consulta.
		$cons = mysqli_num_rows($q);
		return $cons;
    }


    static function queryB($q) { // Cuando no tiene que iterar la consulta, ya que se tiene 1 fila // Me devuelve el numero de filas que tiene la consulta.
		
		if(!DB::$conn) {
			DB::init();
		}
		$cons = mysqli_query(DB::$conn, $q);
		return $cons;
    }

    static function queryZ($q) {
		
		$res = mysqli_query(DB::$conn, $q);
		$out = array();
		while($row = mysqli_fetch_object($res))
		{
			array_push($out, $row);
		}

		return $out; // Me está retornando un arreglo!!! //
	}
}
?>