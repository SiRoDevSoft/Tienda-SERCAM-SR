<?php
include '../../../config/session.php';
include '../../../helpers/helpers.php';

	$output = '';

	$iva = showIva($conexion);

	foreach($iva as $row){
		$output .= "
			<option value='".$row['porcentaje']."' class='append_items'> ".$row['porcentaje']."</option>
		";
	}

	
	echo json_encode($output);
 

?>