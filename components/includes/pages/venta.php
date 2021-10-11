<?php
 include("../../template/head.php"); 
include('../../../administrador/config/session.php');
include('../../../administrador/helpers/helpers.php');

// Configuracion para la libreria de mercadoPago
require('../../../vendor/autoload.php');
// Credenciales de mercadoPago
require_once('../views/credentials.php');
// Llamamos a la clase de mercadoPago
MercadoPago\SDK::setAccessToken($access_token);

if(isset($_SESSION['user'])){
    $id = $user['id'];

    // if(isset($_GET['ok'])){
    //     // // AHORA BUSCAMOS ESTE NUEVO REGISTRO Y INTRODUCIMOS SUS DETALLES
    //      //$presalenew=detailnewpresale($conexion, $id);
    //     $searchnewpresale=presaleUser($conexion,$id);

    //     foreach ($searchnewpresale as $row) {
    //         $idPresale=$row['id'];
    //         // $idcart=$row['cartid'];
    //         // $idProduct=$row['proid'];
    //         // $producPresale=$row['name'];
    //         // $producQuantity=$row['quantity'];
    //         // $priceCart=$row['price_itemcart'];
    //         // $totalPresale=$row['total'];
    //     }

    //     // // // Insertams los valores en la base de datos de detalle presale
    //      $insertdetail=detailpresaleinprocess($conexion, $idPresale);
    // }


}else{
        $_SESSION['error'] = "¡Debe iniciar sessión primero!";
    
         header("Location: tienda.php");
}

    // if(isset($_POST['pay'])){
    
    // $searchCart = searchCartUser($conexion, $id);
    //     foreach($searchCart as $row){
    //      $count = $row['numrows'];
    //      }
    //     if($count==0){
    //         $_SESSION['error'] = "¡No tiene artículos por comprar!";
        
    //         header("Location: tienda.php");
   

    //     }

    // }
    
// Comprobar si existe cupon de descuento   
// $coupon=(!empty($_POST['cupon'])) ? $_POST['cupon'] : false;
// if($coupon){
//     // Buscar en la base de datos de cupones para aplicar el descuento
//     $coupon="Etiqueta";
// }else{
//     // $totalCart = totalCart_User($conexion, $id);
//     // $totalBruto = 0;
//     // foreach($totalCart as $row){
//     //     $subtotal = $row['price_sale'] * $row['quantity'];
//     //     $totalBruto += $subtotal;
//     //     $ivaproduct=$totalBruto*1.10;
//     //     $total=$ivaproduct;
//     // }
// }
      
?>
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include("../../template/navbar.php"); ?>

 
        <div class="content-wrapper">
            <div class="container">

                <!-- Main content  col-md-offset-2"-->
                <section class="content">
                    <div class="row">
           <!-- ***************************************************************** -->
                    <!-- Detalle de venta -->
                        <div class="col-sm-9 detail-sale">
                            <div class="box box-solid">
                                <div class="box-header" style="background-color: #cedee2;">
                                   <div class="title text-center" >
                                       <h3>CONFIRMACIÓN DE COMPRA</h3>
                                    </div>
                                    <p  style="color: white;text-shadow: 1px 1px grey;"><i class="glyphicon glyphicon-map-marker"></i> Enviar a <?=$user['firstname'].' '.$user['lastname']?> - <?=$user['address']?></p> 
                                   
                                   
                                </div>
                                <div class="box-body">
                                <table class="table table-bordered" >
                                        <thead>
                                            <th>Artículo</th>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Precio Unidad</th>
                                            <th>Cantidad</th>
                                            <th class="text-center">Subtotal</th>
                                        </thead>
                                        <tbody id="tbodysale">
                                           
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                             
                        </div>

                <!-- ******************************************************************** -->
                        <!-- Sidebar datos personales -->
                        <div class="col-sm-3">
                        <div class="box box-solid">
                            <div class="box-header with-border">
                                <h3 class="box-title"><span class="glyphicon glyphicon-list-alt"></span> <b>Datos Personales</b></h3>
                            </div>
                            <div class="box-body">
                                 <form method="POST" >
                                    <div class="input-group">
                                        <input type="text" id="nameUser" name="name" class="form-control"  value="<?=$user['firstname'].' '.$user['lastname']?>" disabled>
                                        <span class="input-group-btn">
                                        <a class="btn btn-default btn-flat" onclick="editname()"><i class="fa fa-user"></i> 
                                            </a>
                                        </span>
                                    </div><br>
                                    <div class="input-group">
                                        <input type="text" id="address" name="address" class="form-control" value="<?=$user['address']?>" disabled>
                                        <span class="input-group-btn">
                                            <a class="btn btn-default btn-flat" onclick="editaddress()">
                                                <i class="fa fa-map-marker"></i> 
                                            </a>
                                        </span>
                                    </div><br>
                                    <div class="input-group">
                                        <input type="text" id="contact" name="contact" class="form-control" value="<?=$user['contact_info']?>" disabled>
                                        <span class="input-group-btn">
                                            <a class="btn btn-default btn-flat" onclick="editphone()">
                                                <i class="fa fa-phone"></i> 
                                            </a>
                                        </span>
                                    </div><br>
                                    <div class="buttom" id="save" hidden>
                                         <button  type="buttom" name="dataUser" data-id="<?=$user['id']?>" class="btn btn-info save_info" onclick="save()">
                                            <i class="fa fa-share-square"></i> Guardar
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                        <div class="box-header with-border"">
                            <img src="<?=$url?>/assets/img/page/promo-mercado.png" alt="" width="100%" style="margin-bottom: 5px;">

                            <a href="#payCart" data-toggle="modal" class="btn btn-primary btn-sm btn-flat" style="width: 100%;"><i class="fa fa-plus"></i> CONFIRMAR</a>
                        </div>
                        </div>

                <!-- ******************************************************************** -->
                  

                    </div>


                </section>



            </div>
        </div>
    </div>



    <!-- footer -->
    <?php include("../../template/footer.php"); ?>

    <?php include '../sales/sale_modal.php'; ?>
    <?php include '../scripts/script_main.php'; ?>
    <?php include '../scripts/script_sale.php'; ?>
    <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
    </script>
    

</body>


</html>