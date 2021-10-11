<?php
include '../../../config/session.php';
include '../../../helpers/helpers.php';


if(isset($_POST)){

    if(isset($_POST['id'])){
        $id =(int) $_POST['id'];
        $code=$_POST['code'];
        
        // Buscamos si tiene presale activos
       $searchPresale= presaleUser($conexion,$id);

        foreach($searchPresale as $pre){
            $count=$pre['numrows'];

            if($count>0){
                // procedemos a confirmar la venta
                $dataPresale=ShowpresaleUsers($conexion, $pre['id']);

                $net_pay=0;
                $total=0;
                foreach ($dataPresale as $row) {
                    $idPre= $row['idpresale'];
                    $stat_trans= $row['transac'];
                    $datePre=$row['presaleDate'];
                    $subtotal= $row['subtotal'];
                    $namePro= $row['nameproduct'];
                    $quantProdu= $row['quantity'];
                    $net_pay+=$subtotal;
                    $tax=$net_pay*0.05;
                    $total += $subtotal*1.05;
                }
                // $iva=number_format($tax, 2);
                // $totalPay=number_format($total, 2);
                
                if(!empty($code)&& !empty($net_pay) && !empty($tax) && !empty($total) && !empty($datePre)){
                 // Insertamos un nuevo registro en la base de datos de sales
                 $query=createSale($conexion,$id,$code, $net_pay,$tax, $total, $datePre); 

                    // AHORA BUSCAMOS ESTE NUEVO REGISTRO Y INTRODUCIMOS SUS DETALLES
                    $searchsale=salealeUser($conexion,$id,$code);
                    foreach ($searchsale as $info) {
                        $count=$info['numrows'];
                        if($count>0){
                            $idSale=$info['id'];
                            $productPresale=showdetailpresale($conexion, $id);
                            foreach($productPresale as $rows){
                                $productId=$rows['productID'];
                                $qty=$rows['quantityProduct'];

                                $inserSale= detailsale($conexion, $idSale,$productId,$qty);


                            }
                            
                            // Desactivamos la preventa del usuario
                              $updatepresaleUser=updatepresale($conexion, $id);

                            // eliminamos el carrito de compras del usuario
                             $deletecartUser = cartdeleteUser($conexion,$id);

                             $_SESSION['success']="La transacción se finalizo correctamente";
                             header("Location: ../../../home.php");


    
                        }else{
                            $_SESSION['error']="No se pudo concreatar la transacción";
                        }

                    }


                }else{
                    var_dump($id,$code,$net_pay,$tax,$total,$datePre);
                    die("Algo salio mal en la validación");
                }


            }else{
                $_SESSION['error']="Usuario no tiene presale";
            }


        }
       
    
    
        
    }else{
        $_SESSION['error']="No existe postid";

        header("Location:../transactions.php?section");
    }

    header("Location:../transactions.php?section");
}
?>
