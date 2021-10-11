<?php
	include '../../../administrador/config/session.php';
	


	$output = array('error'=>false);
	$id = $_POST['id'];
	$address=(!empty($_POST['address']))? $_POST['address'] : '';
	$contact=(!empty($_POST['contact']))? $_POST['contact'] :'';

	if(isset($_SESSION['user'])){
	
            if(empty($address) || empty($contact)){
                $output['message'] = 'No se puede actualizar';
            }else{
                $stmt = $conn->prepare("UPDATE users SET address=:address, contact_info=:contact_info WHERE id=:id");
                $stmt->execute(['address'=>$address,'contact_info'=>$contact, 'id'=>$id]);

                $output['message'] = 'Actualizado';
            }
		
	}
	else{
		$output['message'] = 'No se puede actualizar';
	}
	
	echo json_encode($output);

?>