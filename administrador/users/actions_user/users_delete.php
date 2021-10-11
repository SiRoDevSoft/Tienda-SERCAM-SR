<?php
	include '../../config/session.php';
	include '../../helpers/helpers.php';

	if(isset($_POST['delete'])){
		
		$id = (isset($_POST['id'])) ? (int)($_POST['id']) : null;
		
		 if(isset($id)){
			 $update_User= delete_User($conexion, $id);
			 $_SESSION['success'] = "El usuario ha sido eliminado con éxito";
			 $_SESSION['status'] = "Baja de Usuario";
		 }else{
			header('location: ../../components/sections/users.php?section');
			$_SESSION['error'] = "No existe usuario";
			$_SESSION['status'] = "Usuario indefinido";
		 }

	}
	else{
		$_SESSION['error'] = 'Seleccionar usuario para eliminar primero';
		$_SESSION['status'] = "Usuario indefinido";
	}
	
	header('location: ../../components/sections/users.php?section');
	
?>