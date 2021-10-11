<?php
include '../../../administrador/config/session.php';
include '../../../administrador/helpers/helpers.php'; 

	$output = array('error'=>false);

	$id = $_POST['id'];
	$qty = $_POST['qty'];

	if(isset($_SESSION['user'])){
		
			$stmt = $conexion->prepare("UPDATE cart SET quantity=:quantity, status=true WHERE id=:id");
			$stmt->execute(['quantity'=>$qty, 'id'=>$id]);
			$output['message'] = 'Actualizado';
	
	}
	else{
		foreach($_SESSION['cart'] as $key => $row){
			if($row['productid'] == $id){
				$_SESSION['cart'][$key]['quantity'] = $qty;
				$output['message'] = 'Actualizado';
			}
		}
	}

	
	echo json_encode($output);

?>