<?php
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';


	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		$product = deleteProduct($conexion, $id);
		$_SESSION['success'] = 'Producto eliminado exitosamente';
		$_SESSION['status'] = 'Baja de producto';
		
	}
	else{
		$_SESSION['error'] = 'Seleccione el producto para eliminar primero';
	}

	header('location: ../products.php?section');
	
?>