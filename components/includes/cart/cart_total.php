<?php
	include '../../../administrador/config/session.php';
	include '../../../administrador/helpers/helpers.php'; 



	if(isset($_SESSION['user'])){
		$id=$user['id'];

		$stmt = $conexion->prepare("SELECT * FROM cart INNER JOIN products on products.id=cart.product_id WHERE user_id=:user_id");
		$stmt->execute(['user_id'=>$id]);
		$total = 0;
		foreach($stmt as $row){
			$subtotal = $row['price_sale'] * $row['quantity'];
			$total += $subtotal;
		} 

		

		echo json_encode($total);
	}
?>