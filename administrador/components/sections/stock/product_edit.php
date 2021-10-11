<?php
		include '../../../config/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$quantity = $_POST['quantity'];
		
			$stmt = $conexion->prepare("UPDATE products SET stock=:stock WHERE id=:id");
			$stmt->execute(['stock'=>$quantity,'id'=>$id]);

			$_SESSION['success'] = 'Producto actualizado con éxito';
		
		
	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de edición primero';
	}

	header('location: ../stock.php?section');

?>