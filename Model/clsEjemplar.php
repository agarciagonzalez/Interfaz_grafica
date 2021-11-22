<?php
include('clsConexion.php');

class Ejemplar{
	
	private $id;
	private $localizacion;
	private $conn;

	
	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setLocalizacion($localizacion){
		$this->localizacion = $localizacion;
	}

	public function getLocalizacion(){
		return $this->localizacion;
	}


	public function __construct($id,$localizacion){
		$this->id = $id;
		$this->localizacion = $localizacion;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into ejemplar(localizacion) VALUES('".$this->localizacion."') ";
		$result = $this->conn->EjecutarSQL($sql);
		//echo $sql;
		return $result;
	}

	
	public function Consultar(){
			$sql = "select * from ejemplar where id='".$this->id."' ";
			$result = $this->conn->EjecutarSQL($sql);
			$row = $this->conn->ObtenerFilas($result);
			return $row;
	}	

	public function Eliminar(){
		$sql = "delete from ejemplar where id='".$this->id."' ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Actualizar(){
		//$sql = "ubdate from usuario where id='".$this->id."' ";
		$sql = "UPDATE ejemplar SET localizacion ='".$this->localizacion."' WHERE id = '".$this->id."'";
		$result = $this->conn->EjecutarSQL($sql);
		$row = $this->conn->ObtenerFilasAfectadas($result);
		return $row;

	}

	

}

?>