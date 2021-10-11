<?php 
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';

	if(isset($_POST['id'])){

		$id = $_POST['id']; 
		
		$conn = productProperty($conexion, $id);

		foreach($conn as $row){
			
			echo json_encode($row);
		}
		 
		
	}
?>