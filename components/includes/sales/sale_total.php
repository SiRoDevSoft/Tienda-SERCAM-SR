<?php
	include '../../../administrador/config/session.php';
	include '../../../administrador/helpers/helpers.php';

    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id=$_POST['id'];

		$stmt=$conexion->prepare("SELECT (SUM(P.price_sale*C.quantity)) total FROM cart C INNER JOIN products P ON C.product_id=P.id INNER JOIN users U ON C.user_id=U.id WHERE U.id= :user_id;");
		$stmt->execute(['user_id'=>$id]); 

		$row = $stmt->fetch();

		echo json_encode($row);

    }