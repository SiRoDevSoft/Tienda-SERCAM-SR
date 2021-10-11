<?php
	include '../../../config/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		
			$stmt = $conexion->prepare("UPDATE products_category SET status = false WHERE id=$id");
			
			$stmt->execute();

			$_SESSION['success'] = 'Categoría eliminada correctamente';
		
	}
	else{
		$_SESSION['error'] = 'Seleccione la categoría para eliminar primero';
	}

	header('location: ../category.php?section');
	
?>