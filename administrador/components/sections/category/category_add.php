
<?php
	include '../../../config/session.php';

	if(isset($_POST['add'])){
		$name = $_POST['name'];

		$stmt = $conexion->prepare("SELECT *, COUNT(*) AS numrows FROM products_category WHERE name LIKE '%$name%' OR identity LIKE '%$name%';");
		$stmt->execute();
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Categoría ya existe';
		}
		else{
			
				$stmt = $conexion->prepare("INSERT INTO products_category (name, identity, status) VALUES (:name, :identity, true)");
				$stmt->execute(['name'=>$name, 'identity' =>$name]);

				$_SESSION['success'] = 'Categoría añadida con éxito';
			
			}
		

	
	}
	else{
		$_SESSION['error'] = 'Complete primero el formulario de categoría';
	}

	header('location: ../category.php?section');

?>