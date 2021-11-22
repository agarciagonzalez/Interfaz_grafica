<?php
include('clsConexion.php');

class Usuario{
	
	private $id;
	private $nombre;
	private $direccion;
	private $telefono;
	private $conn;

	
	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getTelefono(){
		return $this->telefono;
	}


	public function __construct($id,$nombre,$direccion,$telefono){
		$this->id = $id;
		$this->nombre = $nombre;
		$this->direccion = $direccion;
		$this->telefono = $telefono;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into usuario(nombre, direccion, telefono) VALUES('".$this->nombre."','".$this->direccion."','".$this->telefono."') ";
		$result = $this->conn->EjecutarSQL($sql);
		//echo $sql;
		return $result;
	}

	
	public function Consultar(){
			$sql = "select * from usuario where id='".$this->id."' ";
			$result = $this->conn->EjecutarSQL($sql);
			$row = $this->conn->ObtenerFilas($result);
			return $row;
	}	

	public function Eliminar(){
		$sql = "delete from usuario where id='".$this->id."' ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Actualizar(){
		//$sql = "ubdate from usuario where id='".$this->id."' ";
		$sql = "UPDATE usuario SET nombre ='".$this->nombre."',direccion ='".$this->direccion."',telefono ='".$this->telefono."' WHERE id = '".$this->id."'";
		$result = $this->conn->EjecutarSQL($sql);
		$row = $this->conn->ObtenerFilasAfectadas($result);
		return $row;

	}

	

}

?>