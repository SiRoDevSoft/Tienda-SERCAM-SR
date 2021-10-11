<?php
	include '../../../administrador/config/session.php';
	include '../../../administrador/helpers/helpers.php'; 

$today=date('Y-m-d');

	$totalPay=array();
	if(isset($_SESSION['user'])){

        if (isset($_POST['id']) && !empty($_POST['id'])) {
            $id_userajax=$_POST['id'];
            $id=$user['id'];
        
            if ($id_userajax==$id) {
                $totalCart = totalCart_User($conexion, $id);
                $total= 0;
                foreach ($totalCart as $row) {
                    $subtotal = $row['price_sale'] * $row['quantity'];
                    $total += $subtotal;
                }
            
                $totalPay['total']=$total*1.05;
            } else {
                $_SESSION['error']= 'Usuario no autenticado';
            }
        }else{
			$_SESSION['error']= 'Usuario no válido';
		}

		

	}else{
		$_SESSION['error'] = "Debe iniciar session primero";
	}
	echo json_encode($totalPay);
	?>