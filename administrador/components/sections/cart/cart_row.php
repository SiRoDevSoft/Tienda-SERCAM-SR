<?php 
	include '../../../config/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
	

		$stmt = $conexion->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE cart.id=:id and cart.status=true");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		// $stmt = $conexion->prepare("SELECT * FROM users WHERE id=:id and status=true");
		// $stmt->execute(['id'=>$id]);
		// $row = $stmt->fetch();
	

		echo json_encode($row);
	} 
?>