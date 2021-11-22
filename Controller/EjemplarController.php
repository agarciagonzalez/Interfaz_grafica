<?php
include('../Model/clsEjemplar.php');

Extract($_REQUEST);

   echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';

//$id = $_POST['id'];
//$nombre = $_POST['nombre'];

$ejemplar = new Ejemplar($id,$localizacion);


if($_POST['Registrar']){
	$result = $ejemplar->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando ejemplar");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $ejemplar->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando ejemplar");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}

}else if($_POST['Consultar']){
	$result = $ejemplar->Consultar();
	if($result){
		header("Location: ../View/actualizarEjemplar.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Usuario no existe");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}

}else if($_POST['Actualizar']){
	$result = $ejemplar->Actualizar();
	if($result){
		echo '<script type="text/javascript">
				alert("Ejemplar Actualizado con exito");
				window.location.href="../View/listarEjemplar.php";
				</script>';
		//header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Ejemplar no existe");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}

}else {
	$result = $ejemplar->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarEjemplar.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando ejemplar");
				window.location.href="../View/listarEjemplar.php";
				</script>';
}

}

?>