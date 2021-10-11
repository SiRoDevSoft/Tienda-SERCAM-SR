<?php

$output = array('error'=>false);

if(isset($_POST['id'])){
    $id = $_POST['id']; 
    $today=date('Y-m-d');

    $stmt = $conexion->prepare("SELECT C.user_id user,COUNT(*) items,C.id cartsale,(SUM(P.price_sale*C.quantity))*0.05 tax,(SUM(P.price_sale*C.quantity)) neto,(SUM(P.price_sale*C.quantity))*1.05 total FROM cart C INNER JOIN products P ON C.product_id=P.id INNER JOIN users U ON C.user_id=U.id WHERE U.id=:user_id");
	$stmt->execute(['user_id'=>$id]); 
    $cart = $stmt->fetch();
    foreach($cart as $row){
        $user=$row['user'];
        $description='productos';
        $neto=$row['neto'];
        $tax=$row['tax'];
        $total=$row['total'];


        $insert = $conexion -> prepare("INSERT INTO `sales` (`id`, `user_id`, `code`, `description`, `net_pay`, `tax`, `full_payment`, `date`, `status`) VALUES (NULL, $user, null, $description, $neto, $tax, $total, $today, 0);");
        $insert->execute();




    }
    // $user=$cart['user'];
    // // $description='Artículos comprados ('.$cart['cartsale'].')';
    // $description='productos';
    // //$neto=(double)$cart['neto'];
    // // $tax=(double)$cart['tax'];
    // // $total=(double)$cart['total'];
    // $tax=1;
    // $neto=2.0;
    // $total=3.5;

    // // Insertar datos en tabla de ventas 
    
    //     // $insert = $conexion -> prepare("INSERT INTO sales SET (user_id,description, net_pay, tax, full_payment,date, status) VALUES( $user, $description, $neto,$tax,$total,$today,false)");
    //     $insert = $conexion -> prepare("INSERT INTO `sales` (`id`, `user_id`, `code`, `description`, `net_pay`, `tax`, `full_payment`, `date`, `status`) VALUES (NULL, '$user', '', '$description', '$neto', '$tax', '$total', '$today', '0');");
    //     $insert->execute();
            
         $output['message'] = 'Actualizado';
            
}
else{
            $output['message'] = 'No se puede actualizar';

   

}


echo json_encode($output);

?>