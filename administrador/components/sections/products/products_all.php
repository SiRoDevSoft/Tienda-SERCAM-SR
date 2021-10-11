<?php
	include '../../../config/session.php';

	$output = '';



	$stmt = $conexion->prepare("SELECT * FROM products where status=true and stock>0");
	$stmt->execute();
	foreach($stmt as $row){
		$output .= "
			<option value='".$row['id']."' class='append_items'>".$row['name']."</option>
		";
	}


	echo json_encode($output);

?>