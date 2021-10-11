<?php
	include '../../../config/session.php';

	if(isset($_POST['add'])){
		$id = $_POST['id'];
		$product = $_POST['product'];
		$quantity = $_POST['quantity'];

	

		$stmt = $conexion->prepare("SELECT *, COUNT(*) AS numrows FROM cart WHERE product_id=:id");
		$stmt->execute(['id'=>$product]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'El producto existe en el carrito';
		}
		else{
			
				$stmt = $conexion->prepare("INSERT INTO cart (user_id, product_id, quantity, status) VALUES (:user, :product, :quantity, true)");
				$stmt->execute(['user'=>$id, 'product'=>$product, 'quantity'=>$quantity]);

				$_SESSION['success'] = 'Producto agregado al carrito';
			
		}

	

		header('location: ../cart.php?section&user='.$id);
	}

?>