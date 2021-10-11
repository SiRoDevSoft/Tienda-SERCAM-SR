<?php
		include '../../../config/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];

		
			$stmt = $conexion->prepare("UPDATE products_category SET name=:name, identity= :identity WHERE id=:id");
			$stmt->execute(['name'=>$name, 'identity'=>$name,'id'=>$id]);
			$_SESSION['success'] = 'Categoría actualizada con éxito';
		
		
		
	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de edición de categoría primero';
	}

	header('location: ../category.php?section');

?>