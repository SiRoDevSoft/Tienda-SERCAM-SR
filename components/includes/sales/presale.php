<?php 

include("../../../administrador/config/session.php");
include("../../../administrador/helpers/helpers.php");


if(isset($_POST)){
   $id=(isset($_POST['id']))?(int)$_POST['id'] : null;

    //   CARGAR UNA NUEVA VENTA A CONFIRMAR

    if(isset($id)){

        // Buscar en la base de datos si el usuario ya tiene una venta por confirmar
        $search=totalpresaleUser($conexion, $id);
        foreach ($search as $quanty) {
            $count=$quanty['numrows'];
            
        
            if ($count<1) {
                // INSERTAR UNA NUEVA PRESALE
                $insert=createpresale($conexion, $id);

                // // // AHORA BUSCAMOS ESTE NUEVO REGISTRO Y INTRODUCIMOS SUS DETALLES
                // $presalenew=detailnewpresale($conexion, $id);
                $searchnewpresale=presaleUser($conexion,$id);

                foreach($searchnewpresale as $detail){
                    $count=$detail['numrows'];
                    if($count>0){
                        $idPresale=$detail['id'];
                        // Buscar en el carrito de compras las unidades compradas
                        $searchCartUser=CartUser($conexion, $id);
                        foreach($searchCartUser as $Cart){
                            $prod=$Cart['product_id'];
                            $qty=$Cart['quantity'];
                            $insertdetail=detailpresaleinprocess($conexion, $idPresale,$prod,$qty);
                        }

                    }else{
                        $_SESSION['error']="No se pudo concreatar la transacción";
                    }
                }

                // foreach ($presalenew as $row) {
                //     $idPresale=$row['id_presale'];
                //     $idcart=$row['cartid'];
                //     $idProduct=$row['proid'];
                //     $producPresale=$row['name'];
                //     $producQuantity=$row['quantity'];
                //     $priceCart=$row['price_itemcart'];
                //     $totalPresale=$row['total'];
                // }

                // // // // Insertams los valores en la base de datos de detalle presale
                // // $insertdetail=detailpresaleinprocess($conexion, $idPresale, $producQuantity, $totalPresale);
               
                $_SESSION['success']="Preparando su pedido";
                header("Location: ../pages/venta.php?ok");
                exit();

            } else {
                // var_dump($count);
                // die("esto hay por aqui..");
                // redirigir a cart_view con warning de presale en proceso.
                $_SESSION['warning']="¡Espere por favor! Usted ya tiene un pedido pendiente a confirmar";
                header("Location: ../cart/cart_view.php");
            }
        }

    }else{
        $_SESSION['error']="Usuario no identificado";
        header("Location: ../cart/cart_view.php");

    }



   

}else{
    $_SESSION['error']="Usuario no identificado";
    header("Location: ../cart/cart_view.php");
}

