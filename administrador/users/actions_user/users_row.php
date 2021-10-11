<?php 
	include '../../config/session.php';
	include '../../helpers/helpers.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		
		$User_Search = showUser($conexion, $id);
		
		foreach ($User_Search as $row){
			echo json_encode($row);
		}
		
		
	

		
	}
?>