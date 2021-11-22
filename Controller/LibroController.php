<?php
include('../Model/clsLibro.php');

Extract($_REQUEST);

   echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';

//$id = $_POST['id'];
//$nombre = $_POST['nombre'];

$libro = new Libro($id,$titulo,$isbn,$id_autor,$paginas,$editorial,$id_ejemplar);


if($_POST['Registrar']){
	$result = $libro->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/listarLibro.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando Libro");
				window.location.href="../View/listarLibro.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $libro->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarLibro.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando libro");
				window.location.href="../View/listarLibro.php";
				</script>';
	}

}else if($_POST['Consultar']){
	$result = $libro->Consultar();
	if($result){
		header("Location: ../View/actualizarLibro.php?id=".$result[0]."&titulo=".$result[1]."&isbn=".$result[2]."&id_autor=".$result[3]);
	}else{
		echo '<script type="text/javascript">
				alert("Libro no existe");
				window.location.href="../View/listarLibro.php";
				</script>';
	}

}else if($_POST['Actualizar']){
	$result = $libro->Actualizar();
	if($result){
		echo '<script type="text/javascript">
				alert("Libro Actualizado con exito");
				window.location.href="../View/listarLibro.php";
				</script>';
		//header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Libro no existe");
				window.location.href="../View/listarLibro.php";
				</script>';
	}

}else {
	$result = $libro->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarLibro.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando libro");
				window.location.href="../View/listarLibro.php";
				</script>';
}

}


?>