<?php 
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		 
	
		$stmt = $conexion->prepare("SELECT * FROM products WHERE id=:id");
		$stmt->execute(['id'=>$id]);
		$row = $stmt->fetch();
		
	

		echo json_encode($row);
	}
?>