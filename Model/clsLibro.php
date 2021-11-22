<?php
include('clsConexion.php');

class Libro{
	
	private $id;
	private $titulo;
	private $isbn;
	private $id_autor;
	private $paginas;
	private $editorial;
	private $id_ejemplar;
	private $conn;

	
	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setTitulo($titulo){
		$this->titulo = $titulo;
	}

	public function getTitulo(){
		return $this->titulo;
	}

	public function setIsbn($isbn){
		$this->isbn = $isbn;
	}

	public function getIsbn(){
		return $this->isbn;
	}


	public function setAutor($id_autor){
		$this->id_autor = $id_autor;
	}

	public function getAutor(){
		return $this->id_autor;
	}

	public function setPaginas($paginas){
		$this->paginas = $paginas;
	}

	public function getPaginas(){
		return $this->paginas;
	}

	public function setEditorial($editorial){
		$this->editorial = $editorial;
	}

	public function getEditorial(){
		return $this->editorial;
	}


	public function setEjemplar($id_ejemplar){
		$this->id_ejemplar = $id_ejemplar;
	}

	public function getEjemplar(){
		return $this->id_ejemplar;
	}


	


	public function __construct($id,$titulo,$isbn,$id_autor,$paginas,$editorial,$id_ejemplar){
		$this->id = $id;
		$this->titulo = $titulo;
		$this->isbn = $isbn;
		$this->id_autor = $id_autor;
		$this->paginas = $paginas;
		$this->editorial = $editorial;
		$this->id_ejemplar = $id_ejemplar;
		$this->conn = new Conexion();
		$this->conn->CrearConexion();
	}

	public function Guardar(){
		$sql = "insert into libro(titulo, isbn, id_autor, paginas, editorial, id_ejemplar) VALUES('".$this->titulo."','".$this->isbn."','".$this->id_autor."','".$this->paginas."','".$this->editorial."','".$this->id_ejemplar."') ";
		$result = $this->conn->EjecutarSQL($sql);
		//echo $sql;
		return $result;
	}

	
	public function Consultar(){
			$sql = "select * from libro where id='".$this->id."' ";
			$result = $this->conn->EjecutarSQL($sql);
			$row = $this->conn->ObtenerFilas($result);
			return $row;
	}	

	public function Eliminar(){
		$sql = "delete from libro where id='".$this->id."' ";
		$result = $this->conn->EjecutarSQL($sql);
		return $result;
	}

	public function Actualizar(){
		//$sql = "ubdate from usuario where id='".$this->id."' ";
		$sql = "UPDATE libro SET titulo ='".$this->titulo."',isbn ='".$this->isbn."',id_autor ='".$this->id_autor."',paginas ='".$this->paginas."',editorial ='".$this->editorial."',id_ejemplar ='".$this->id_ejemplar."' WHERE id = '".$this->id."'";
		$result = $this->conn->EjecutarSQL($sql);
		$row = $this->conn->ObtenerFilasAfectadas($result);
		return $row;

	}

	

}

?>