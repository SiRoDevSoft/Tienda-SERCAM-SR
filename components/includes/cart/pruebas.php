<?php
include '../../../administrador/config/session.php';
include '../../../administrador/helpers/helpers.php'; 

	//$productPay=array();

	$output = '';

	if(isset($_SESSION['user'])){

		if(isset($_SESSION['cart'])){

			foreach($_SESSION['cart'] as $row){

				$carUsercount= cartUsercount($conexion, $user['id'], $row['productid']);

				foreach($carUsercount as $crow){
					$count = $crow['numrows'];
				}

				if($count < 1){
					$insert = addCart_User($conexion, $user['id'], $row['productid'], $row['quantity']);

				}
				else{
					// actualizar el carrito de compras en caso de modificar cantidad solamente
					$updateQuantity= updateQuantityCart($conexion,$user['id'],$row['quantity'],$row['productid']);
					
				}
			}
			unset($_SESSION['cart']);

		}
 
	
			$total = 0;
			$stmt = $conexion->prepare("SELECT *, cart.id AS cartid FROM cart LEFT JOIN products ON products.id=cart.product_id WHERE user_id= :user");
			$stmt->execute(['user'=>$user['id']]);

			foreach($stmt as $row){

				$img = (!empty($row['photo'])) ? '../../../administrador/assets/img/products/'.$row['photo'] : '../../../administrador/assets/img/products/product.png';

				$subtotal = $row['price_sale']*$row['quantity'];
				$productPay['subtotal']=$subtotal;

				$total += $subtotal; 
				$productPay['total']=$total;
				$output .= "  
					<tr>
						<td><button type='button' data-id='".$row['cartid']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><img src='".$img."' width='30px' height='30px'></td>
						<td>".$row['name']."</td>
						<td>&#36; ".number_format($row['price_sale'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['cartid']."'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['cartid']."'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['cartid']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
			} 
			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total neto:</b></td>
					<td><b>&#36; ".number_format($total, 2)."</b></td>
				<tr>
			";

		

	}
	else{
		if(count($_SESSION['cart']) != 0){
			$total = 0;
			
			foreach($_SESSION['cart'] as $row){
			
				$stmt = $conexion->prepare("SELECT *, products.name AS prodname, C.name AS catname FROM products LEFT JOIN products_category C ON C.id=products.type WHERE products.id=:id");
				$stmt->execute(['id'=>$row['productid']]);

				$product = $stmt->fetch();

				$img = (!empty($row['photo'])) ? '../../../administrador/assets/img/products/'.$row['photo'] : '../../../administrador/assets/img/products/product.png';

				$subtotal = $product['price_sale']*$row['quantity'];
				$productPay['subtotal']=$subtotal;

				$total += $subtotal;
				$productPay['total']=$total;

				$output .= "
					<tr>
						<td><button type='button' data-id='".$row['productid']."' class='btn btn-danger btn-flat cart_delete'><i class='fa fa-remove'></i></button></td>
						<td><img src='".$img."' width='30px' height='30px'></td>
						<td>".$product['name']."</td>
						<td>&#36; ".number_format($product['price_sale'], 2)."</td>
						<td class='input-group'>
							<span class='input-group-btn'>
            					<button type='button' id='minus' class='btn btn-default btn-flat minus' data-id='".$row['productid']."'><i class='fa fa-minus'></i></button>
            				</span>
            				<input type='text' class='form-control' value='".$row['quantity']."' id='qty_".$row['productid']."'>
				            <span class='input-group-btn'>
				                <button type='button' id='add' class='btn btn-default btn-flat add' data-id='".$row['productid']."'><i class='fa fa-plus'></i>
				                </button>
				            </span>
						</td>
						<td>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
				
			}

			$output .= "
				<tr>
					<td colspan='5' align='right'><b>Total</b></td>
					<td><b>&#36; ".number_format($total, 2)."</b></td>
				<tr>
			";
		}else{
			$output .= "
				<tr>
					<td colspan='6' align='center'>Carrito de compras vacío</td>
				<tr>
			";
		}
		
	}
    

	
	echo json_encode($output);

?>

