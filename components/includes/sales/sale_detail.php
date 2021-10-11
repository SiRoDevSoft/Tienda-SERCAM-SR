<?php
include '../../../administrador/config/session.php';
include '../../../administrador/helpers/helpers.php'; 

	//$productPay=array();

	$output = ''; 

	if(isset($_SESSION['user'])){
	
			$total = 0;
			$totalBruto = 0;
			
			$stmt = totalCart_User($conexion, $user['id']);
			
			foreach($stmt as $row){

				$img = (!empty($row['photo'])) ? '../../../administrador/assets/img/products/'.$row['photo'] : '../../../administrador/assets/img/products/product.png';

				$subtotal = $row['price_sale']*$row['quantity'];
				
				$output .= "  
					<tr>
						<td id='item'>".$row['cartid']."</td>
						<td><img src='".$img."' width='30px' height='30px'></td>
						<td>".$row['name']."</td>
						<td>&#36; ".number_format($row['price_sale'], 2)."</td>
						<td class='text-center'>".$row['quantity']."</td>
						<td id='totalitem' align='right'>&#36; ".number_format($subtotal, 2)."</td>
					</tr>
				";
				$totalBruto += $subtotal; 
				
			}
			$iva=($totalBruto*0.05);
			$total = ($totalBruto+$iva); 

				$output .= " 
				<tr>
					<td colspan='5' align='right'><b>Subtotal</b></td>
					<td align='right'><b>&#36; ".number_format($totalBruto, 2)."</b></td>
				<tr>
				<tr>
					<td colspan='5' align='right'><b>Importe R.E (%5)</b></td>
					<td align='right'><b>&#36; ".number_format($iva, 2)."</b></td>
				<tr>
				<tr style='background:#e4e4e4'> 
					<td colspan='5' align='right'><b>Total</b></td>
					<td width='15%' align='right'><b>&#36; ".number_format($total, 2)."</b></td>
				<tr>
				
			";

				

	}
	
	
	echo json_encode($output);

?>

