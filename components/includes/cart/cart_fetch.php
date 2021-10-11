<?php
	include '../../../administrador/config/session.php';
	include '../../../administrador/helpers/helpers.php'; 

	// productos cargados en el carrito de compras
	//$userId=(isset($user['id']))?(int)$user['id']:null;

	$output = array('list'=>'','count'=>0); 

	if(isset($_SESSION['user'])){

			//se conecta con la base de datos 
			$productsCart= cartFetch($conexion, $user['id']);
			

			foreach($productsCart as $row){

				$output['count']++;
				
				$img = (!empty($row['photo'])) ? '../../../administrador/assets/img/products/'.$row['photo'] : '../../../administrador/assets/img/products/product.png';

				$productname = (strlen($row['prodname']) > 30) ? substr_replace($row['prodname'], '...', 27) : $row['prodname'];
				
				$output['list'] .= "
					<li>
						<a href='../pages/productos.php?product=".$row['product_id']."'>
							<div class='pull-left'>
								<img src='$img' class='thumbnail' alt=''>
							</div>
							<h4>
		                        <b>".$row['catname']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$productname."</p>
						</a>
					</li>
				";
			}
		
	}
	else{
		// Creacion de la session del carrito de compras
		if(!isset($_SESSION['cart'])){
			$_SESSION['cart'] = array();
		}


		// Definicion del estado del carrito de compras
		if(empty($_SESSION['cart'])){
			$output['count'] = 0;
		}
		else{
			
			
			 foreach($_SESSION['cart'] as $row){

				$output['count']++;
				 
				$cartUser = countViewCart($conexion, $row['productid']);

				foreach($cartUser as $product){
					$image = (!empty($product['photo'])) ? '../../../administrador/assets/img/products/'.$product['photo'] : '../../../administrador/assets/img/products/product.png';
					$output['list'] .= "
					<li>
						<a href='../pages/productos.php?product=".$product['id']."'>
							<div class='pull-left'>
								<img src='$image' class='img-circle' alt=''>
							</div>
							<h4>
		                        <b>".$product['catname']."</b>
		                        <small>&times; ".$row['quantity']."</small>
		                    </h4>
		                    <p>".$product['prodname']."</p>
						</a>
					</li>
				";

				}
				
			}
		}
	}

	
	echo json_encode($output);

?>

