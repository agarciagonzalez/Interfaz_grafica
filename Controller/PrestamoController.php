<?php
include('../Model/clsPrestamo.php');

Extract($_REQUEST);

   echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';

//$id = $_POST['id'];
//$nombre = $_POST['nombre'];

$prestamo = new Prestamo($id,$id_usuario,$id_libro,$fecha_prestamo,$fecha_devolucion);


if($_POST['Registrar']){
	$result = $prestamo->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando Prestamo");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $prestamo->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando prestamo");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}

}else if($_POST['Consultar']){
	$result = $prestamo->Consultar();
	if($result){
		header("Location: ../View/actualizarPrestamo.php?id=".$result[0]."&id_usuario=".$result[1]."&id_libro=".$result[2]."&fecha_prestamo=".$result[3]);
	}else{
		echo '<script type="text/javascript">
				alert("prestamo no existe");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}

}else if($_POST['Actualizar']){
	$result = $prestamo->Actualizar();
	if($result){
		echo '<script type="text/javascript">
				alert("Prestamo Actualizado con exito");
				window.location.href="../View/listarPrestamo.php";
				</script>';
		//header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Prestamo no existe");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}

}else {
	$result = $prestamo->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarPrestamo.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando prestamo");
				window.location.href="../View/listarPrestamo.php";
				</script>';
}

}


?>