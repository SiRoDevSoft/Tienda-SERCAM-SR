<?php
include('../../../administrador/config/session.php');
$today=date('Y-m-d');
$stmt = $conexion->prepare("SELECT C.user_id user,COUNT(*) items,C.id cartsale,(SUM(P.price_sale*C.quantity))*0.05 tax,(SUM(P.price_sale*C.quantity)) neto,(SUM(P.price_sale*C.quantity))*1.05 total FROM cart C INNER JOIN products P ON C.product_id=P.id INNER JOIN users U ON C.user_id=U.id WHERE U.id=:user_id");
$stmt->execute(['user_id'=>$user['id']]); 
$row = $stmt->fetch();

$user=(int)$row['user'];
$description="productos";
$neto=(int)$row['neto'];
$tax=(int)$row['tax'];
$total=(int)$row['total'];

$insert = $conexion -> prepare("INSERT INTO sales (id, user_id, net_pay, tax, full_payment, date, status) VALUES (NULL, $user,$neto, $tax, $total, $today, 0);");
$insert->execute();



var_dump($insert);
die("Datos recolectados");
