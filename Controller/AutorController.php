<?php
include('../Model/clsAutor.php');

Extract($_REQUEST);

   echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';

//$id = $_POST['id'];
//$nombre = $_POST['nombre'];

$autor = new Autor($id,$nombre);


if($_POST['Registrar']){
	$result = $autor->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/listarAutor.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando autor");
				window.location.href="../View/listarAutor.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $autor->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarAutor.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando autor");
				window.location.href="../View/listarAutor.php";
				</script>';
	}

}else if($_POST['Consultar']){
	$result = $autor->Consultar();
	if($result){
		header("Location: ../View/actualizarAutor.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Usuario no existe");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}

}else if($_POST['Actualizar']){
	$result = $autor->Actualizar();
	if($result){
		echo '<script type="text/javascript">
				alert("Autor Actualizado con exito");
				window.location.href="../View/listarAutor.php";
				</script>';
		//header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Autor no existe");
				window.location.href="../View/listarAutor.php";
				</script>';
	}

}else {
	$result = $autor->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarAutor.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando autor");
				window.location.href="../View/listarAutor.php";
				</script>';
}

}

?>