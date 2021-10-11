<?php
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';

	$output = '';

	$cate = showCategoryProducts($conexion, null);

	foreach($cate as $row){
		$output .= "
			<option value='".$row['id']."' class='append_items'>".$row['identity']."</option>
		";
	} 

	
	echo json_encode($output);

?>