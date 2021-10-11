<?php
include '../../../config/session.php';
include '../../../helpers/helpers.php';


if(isset($_POST)){

    if(isset($_POST['id'])){
        $id =(int) $_POST['id'];
        
        // Buscamos si tiene presale activos
       $searchPresale= presaleUser($conexion,$id);

        foreach($searchPresale as $pre){
            $count=$pre['numrows'];
            if($count>0){
                // procedemos a eliminar todo registro en detalle
                // $deleteDetail=deletepresaleDetail($conexion, $pre['id']);

                // Desactivamos la preventa del usuario
                $updatepresaleUser=updatepresale($conexion, $id);

                // eliminamos el carrito de compras del usuario
                $deletecartUser = cartdeleteUser($conexion,$id);

                $_SESSION['success']="La transacción se finalizo correctamente";
                header("Location: ../../../home.php");

            }else{
                $_SESSION['error']="Usuario no identificado ";
            }


        }
       
    
    
        
    }else{
        $_SESSION['error']="Usuario no identificado ";

        header("Location:../transactions.php?section");
    }

    header("Location:../transactions.php?section");
}
?>
