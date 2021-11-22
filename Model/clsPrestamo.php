<?php
include('clsConexion.php');

class Prestamo{
	
	private $id;
	private $id_usuario;
	private $id_libro;
	private $fecha_prestamo;
	private $fecha_devolucion;
	private $conn;

	
	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setUsuario($id_usuario){
		$this->id_usuario = $id_usuario;
	}

	public function getUsuario(){
		return $this->id_usuario;
	}

	public function setLibro($id_libro){
		$this->id_libro = $id_libro;
	}

	public function getLibro(){
		return $this->id_libro;
	}


	public function setFechaprestamo($fecha_prestamo){
		$this->fecha_prestamo = $fecha_prestamo;
	}

	public function getFechaprestamo(){
		return $this->fecha_prestamo;
	}

	public function setFechadevolucion($fecha_devolucion){
		$this->fecha_devolucion = $fecha_devolucion;
	}

	public function getFechadevolucion(){
		return $this->fecha_devolucion;
	}

	


	public function __construct($id,$id_usuario,$id_libro,$fecha_prestamo,$fecha_devolucion){
		$this->id = $id;
		$this->id_usuario = $id_usuario;
		$this->id_libro = $id_libro;
		$this->fecha_prestamo = $fecha_prestamo;
		$this->fecha_devolucion = $fecha_devolucion;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into prestamo(id_usuario, id_libro, fecha_prestamo, fecha_devolucion) VALUES('".$this->id_usuario."','".$this->id_libro."','".$this->fecha_prestamo."','".$this->fecha_devolucion."') ";
		$result = $this->conn->EjecutarSQL($sql);
		//echo $sql;
		return $result;
	}

	
	public function Consultar(){
			$sql = "select * from prestamo where id='".$this->id."' ";
			$result = $this->conn->EjecutarSQL($sql);
			$row = $this->conn->ObtenerFilas($result);
			return $row;
	}	

	public function Eliminar(){
		$sql = "delete from prestamo where id='".$this->id."' ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Actualizar(){
		//$sql = "ubdate from usuario where id='".$this->id."' ";
		$sql = "UPDATE prestamo SET id_usuario ='".$this->id_usuario."',id_libro ='".$this->id_libro."',fecha_prestamo ='".$this->fecha_prestamo."',fecha_devolucion ='".$this->fecha_devolucion."' WHERE id = '".$this->id."'";
		$result = $this->conn->EjecutarSQL($sql);
		$row = $this->conn->ObtenerFilasAfectadas($result);
		return $row;

	}

	

}

?>