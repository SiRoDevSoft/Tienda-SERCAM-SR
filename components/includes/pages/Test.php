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
    
}else{
        $_SESSION['error'] = "¡Debe iniciar sessión primero!";
    
         header("Location: tienda.php");
}

    if(isset($_POST['pay'])){
    
    $searchCart = searchCartUser($conexion, $id);
        foreach($searchCart as $row){
         $count = $row['numrows'];
         }
        if($count==0){
            $_SESSION['error'] = "¡No tiene artículos por comprar!";
        
            header("Location: tienda.php");
        }else{
            $totalArticle=totalCart_User($conexion, $id);
           
            $totalBruto = 0;
        }

    }
    
// Comprobar si existe cupon de descuento   
$coupon=(!empty($_POST['cupon'])) ? $_POST['cupon'] : false;
if($coupon){
    // Buscar en la base de datos de cupones para aplicar el descuento
    $coupon="Etiqueta";
}
      
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
                        <div class="col-sm-9">
                            <div class="box box-solid">
                                <div class="box-header">
                                   <div class="title text-center" >
                                       <h3>CONFIRMACIÓN DE COMPRA</h3>
                                    </div>
                                    <p><i class="glyphicon glyphicon-map-marker"></i> Enviar a <?=$user['firstname'].' '.$user['lastname']?> - <?=$user['address']?></p> 
                                   
                                   
                                </div>
                                <div class="box-body">
                                <table class="table table-bordered" >
                                        <thead>
                                            <th>Artículo</th>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Precio Unidad</th>
                                            <th>Cantidad</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach($totalArticle as $row):
                                            $img = (!empty($row['photo'])) ? $row['photo'] : 'product.png';
                                            $subtotal = $row['price_sale'] * $row['quantity']; ?>
                                            <tr>
                                                <td><?=$row['cartid']?></td>
                                                <td><img src='<?=$url?>/administrador/assets/img/products/<?=$img?>' width='30px' height='30px'></td>
                                                <td><?=$row['name']?></td>
                                                <td>&#36; <?=number_format($row['price_sale'], 2)?></td>
                                                <td class='text-center'><?=$row['quantity']?></td>
                                                <td>&#36; <?=number_format($subtotal, 2)?></td>
                                            
                                            </tr>
                                            <?php
                                            
                                            $totalBruto += $subtotal;

                                        endforeach;
                                            $imp=($totalBruto*0.05);
			                                $total = ($totalBruto+$imp);  ?>

                                            <tr>
                                                <td colspan='5' align='right'><b>Subtotal</b></td>
                                                <td class='text-center'><b>&#36; <?=number_format($totalBruto, 2)?></b></td>
                                            <tr>
                                            <tr>
                                                <td colspan='5' align='right'><b>Importe R.E (%5)</b></td>
                                                <td class='text-center'><b>&#36;<?=number_format($imp, 2)?></b></td>
                                            <tr>
                                            <tr>
                                                <td colspan='5' align='right'><b>Total</b></td>
                                                <td class='text-center'><b>&#36; <?=number_format($total, 2)?></b></td>
                                            <tr>

                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                            <?php $productss=[
                                        'id'=>$row['cartid'],
                                        'name' => "Sistemas SERCAM-SR",
                                        'cantidad'=>1,
                                        'precio'=>$total
                                         ];
                                         
                                            $preference = new MercadoPago\Preference();

                                            $item = new MercadoPago\Item();

                                            $item->unit_price = $productss['precio'];
                                            $item->title = $productss['name'];
                                            $item->quantity = $productss['cantidad'];

                                            $preference->items = array($item);
                                            $preference->save();

                                            $preference->back_urls = array(
                                                "success" => "https://localhost//TIENDA-ONLINE/Site_WEB/components/includes/pages/venta.php",
                                                "failure" => "http://www.tu-sitio/failure",
                                                "pending" => "http://www.tu-sitio/pending"
                                            );
                                            $preference->auto_return = "approved";
                                               ?>
                   
                            <!-- Agregar boton -->
                           
                            <div class="box box-solid">
                            <div class="buttom" id="pay">                                

                                    <a href="<?=$preference->init_point?>"  role="buttom" class="btn btn-info active btn-lg"><i class="fa fa-dollar"></i> COMPRAR
                                    </a>
                               
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
                        </div>

                <!-- ******************************************************************** -->
                       <!-- <div class="col-sm-3">
                        <div class="box box-solid">
                            <div class="buttom" id="pay">
                                    <button  type="buttom" name="dataUser" data-id="<=$user['id']?>" class="btn btn-success pay">
                                        <i class="fa fa-dollar"></i> PAGAR
                                    </button>
                            </div>
                        </div>
                       </div> -->

                    </div>


                </section>



            </div>
        </div>
    </div>
    <form action="<?=$url?>/components/includes/pages/exito.php" method="POST">
        <script
        src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $preference->id; ?>">
        </script>
    </form>



    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../includes/scripts/script_main.php"); ?>
    

</body>



</html>