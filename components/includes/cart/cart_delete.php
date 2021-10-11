<?php
	include '../../../administrador/config/session.php';
	


	$output = array('error'=>false);

	$id = $_POST['id'];


	if(isset($_SESSION['user'])){
		
			$stmt = $conexion->prepare("DELETE FROM cart WHERE id=:id");
			$stmt->execute(['id'=>$id]);
				
			$output['message'] = 'Eliminado';
				
	}
	else{

		foreach($_SESSION['cart'] as $key => $row){

			if($row['productid'] == $id){

				unset($_SESSION['cart'][$key]);
				$output['message'] = 'Eliminado';

			}
		}

	}

	
	echo json_encode($output);

?>