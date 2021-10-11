<?php
	include '../../../config/session.php';

	$id = $_POST['id'];

	

	$output = array('list'=>'');

	$stmt = $conexion->prepare("SELECT S.id AS idsale, S.code as transac, S.net_pay as net, S.full_payment as total, P.id as idproduct, P.name as productname, P.price_sale as price, D.quantity as quantysale, CONCAT(U.firstname,' ',U.lastname) AS nameUser, S.date_sale AS dateSale FROM sales S INNER JOIN users U ON S.user_id=U.id INNER JOIN detail D ON D.sales_id=S.id INNER JOIN products P ON D.product_id=P.id WHERE S.id=:id and S.status=true ORDER BY S.date_sale DESC");
	$stmt->execute(['id'=>$id]);

	$total = 0;
	foreach($stmt as $row){
		$output['transaction'] = $row['transac'];
		$output['date'] = date('M d, Y', strtotime($row['dateSale']));
		$subtotal = $row['price']*$row['quantysale'];
		$total += $subtotal*1.05;
		$output['list'] .= "
			<tr class='prepend_items'>
				<td>".$row['productname']."</td>
				<td>&#36; ".number_format($row['price'], 2)."</td>
				<td>".$row['quantysale']."</td>
				<td>&#36; ".number_format($subtotal, 2)."</td>
			</tr>
		";
	}
	
	$output['total'] = '<b>&#36; '.number_format($total, 2).'<b>';
	
	echo json_encode($output);

?>