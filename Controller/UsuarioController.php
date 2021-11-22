<?php
include('../Model/clsUsuario.php');

Extract($_REQUEST);

   echo '<pre>';
        print_r($_REQUEST);
    echo '</pre>';

//$id = $_POST['id'];
//$nombre = $_POST['nombre'];

$usuario = new Usuario($id,$nombre,$direccion,$telefono);


if($_POST['Registrar']){
	$result = $usuario->Guardar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro guardado con éxito");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error Guardando Usuario");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}

}else if($_POST['Eliminar']){
	$result = $usuario->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando usuario");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}

}else if($_POST['Consultar']){
	$result = $usuario->Consultar();
	if($result){
		header("Location: ../View/actualizarUsuario.php?id=".$result[0]."&nombre=".$result[1]."&direccion=".$result[2]."&telefono=".$result[3]);
	}else{
		echo '<script type="text/javascript">
				alert("Usuario no existe");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}

}else if($_POST['Actualizar']){
	$result = $usuario->Actualizar();
	if($result){
		echo '<script type="text/javascript">
				alert("Usuario Actualizado con exito");
				window.location.href="../View/listarUsuario.php";
				</script>';
		//header("Location: ../View/Usuario.php?id=".$result[0]."&nombre=".$result[1]);
	}else{
		echo '<script type="text/javascript">
				alert("Usuario no existe");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}

}else {
	$result = $usuario->Eliminar();
	if($result){
		echo '<script type="text/javascript">
				alert("Registro eliminado con éxito");
				window.location.href="../View/listarUsuario.php";
				</script>';
	}else{
		echo '<script type="text/javascript">
				alert("Error eliminando usuario");
				window.location.href="../View/listarUsuario.php";
				</script>';
}

}

?>