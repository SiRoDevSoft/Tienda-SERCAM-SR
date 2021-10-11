<?php
	include '../../../config/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		
			$stmt = $conexion->prepare("UPDATE products SET status = false WHERE id=$id");
			
			$stmt->execute();

			$_SESSION['success'] = 'Producto eliminadao correctamente';
		
	}
	else{
		$_SESSION['error'] = 'Seleccione para eliminar primero';
	}

	header('location: ../stock.php?section');
	
?>