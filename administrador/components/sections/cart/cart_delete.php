<?php
	include '../../../config/session.php';
	
	if(isset($_POST['delete'])){
		$userid = $_POST['userid'];
		$cartid = $_POST['cartid'];
		
		

		
			$stmt = $conexion->prepare("DELETE FROM cart WHERE id=:id");
			$stmt->execute(['id'=>$cartid]);

			$_SESSION['success'] = 'Producto eliminado del carrito';
		
		
		

		header('location: ../cart.php?section&user='.$userid);
	}

?>