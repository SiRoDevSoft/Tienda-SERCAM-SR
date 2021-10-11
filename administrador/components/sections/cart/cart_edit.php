<?php
	include '../../../config/session.php';
	
// var_dump($_POST);
// die();
	if(isset($_POST['edit'])){
		$userid = $_POST['userid'];
		$cartid = $_POST['cartid'];
		$quantity = $_POST['quantity'];

		

		
			$stmt = $conexion->prepare("UPDATE cart SET quantity=:quantity WHERE id=:id and status=true");
			$stmt->execute(['quantity'=>$quantity, 'id'=>$cartid]);

			$_SESSION['success'] = 'Cantidad actualizada con éxito';
		
		

		header('location: ../cart.php?section&user='.$userid);
	}

?>