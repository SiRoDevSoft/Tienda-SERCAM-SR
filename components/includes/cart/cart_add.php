<?php
include '../../../administrador/config/session.php';
include '../../../administrador/helpers/helpers.php'; 


	
	$output = array('error'=>false);

	$id = $_POST['id'];
	$quantity = $_POST['quantity'];

	if(isset($_SESSION['user'])){

		$id_user = $user['id'];  

		// Buscamos en la base de datos si existe usuario con articulos agregados
		$countCart = cartUsercount($conexion, $id_user, $id);

		foreach($countCart as $row){

			$count=$row['numrows'];
		}

		if($count < 1){

			try{
				$add_cart = addCart_User($conexion,$id_user, $id, $quantity);
				
				$output['message'] = 'Artículo agregado al carrito';
				
			}
			catch(Exception $e){
				$output['error'] = true;
				$output['message'] = $e->getMessage();
			}
		}
		else{
			$output['error'] = true;
			$output['message'] = 'Producto ya se en encuentra en su carrito de compras';
		}
	}
	else{
		if(!isset($_SESSION['cart'])){

			$_SESSION['cart'] = array();
		}

		$exist = array();

		foreach($_SESSION['cart'] as $row){
			array_push($exist, $row['productid']);
		}

		if(in_array($id, $exist)){
			$output['error'] = true;
			$output['message'] = 'Producto ya en el carrito';
		}
		else{
			$data['productid'] = $id;
			$data['quantity'] = $quantity;

			if(array_push($_SESSION['cart'], $data)){
				$output['message'] = 'Artículo agregado al carrito';
			}
			else{
				$output['error'] = true;
				$output['message'] = 'No se puede agregar un artículo al carrito';
			}
		}

	}


	echo json_encode($output);

?>