<?php
	 include ('conexion.php');
	// include '../helpers/helpers.php';
	if(!isset($_SESSION)){
		session_start();
	}

	if(isset($_SESSION['user'])){ 
		$id_User=(int)$_SESSION['user'];
		// Realizamos una consulta en la base de datos para obtener todos sus datos
		$queryUser= $conexion-> prepare("SELECT * FROM users WHERE id=:id");
		$queryUser-> execute(['id' => $id_User]);
		$user = $queryUser -> fetch();

		$userPhoto=(!empty($user['photo']))?$user['photo'] : "user.png";
	}

	if(isset($_SESSION['admin'])){
		$id_User=(int)$_SESSION['admin'];
		$stmt = $conexion->prepare("SELECT * FROM users WHERE id=:id AND status=true");
		$stmt->execute(['id'=>$id_User]);
		$admin = $stmt->fetch();

		

		
		$userPhoto=(!empty($admin['photo']))?$admin['photo'] : "user.png";
		
	}

	

?>