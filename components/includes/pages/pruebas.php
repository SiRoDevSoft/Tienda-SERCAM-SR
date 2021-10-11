<?php
 include("../../template/head.php"); 
include('../../../administrador/config/session.php');
include('../../../administrador/helpers/helpers.php');

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
   

        }

    }
    
// Comprobar si existe cupon de descuento   
$coupon=(!empty($_POST['cupon'])) ? $_POST['cupon'] : false;
if($coupon){
    // Buscar en la base de datos de cupones para aplicar el descuento
    $coupon="Etiqueta";
}else{
    // $totalCart = totalCart_User($conexion, $id);
    // $totalBruto = 0;
    // foreach($totalCart as $row){
    //     $subtotal = $row['price_sale'] * $row['quantity'];
    //     $totalBruto += $subtotal;
    //     $ivaproduct=$totalBruto*1.10;
    //     $total=$ivaproduct;
    // }
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
                                        <tbody id="tbodysale">
                                           
                                        </tbody>
                                    </table>
                                    
                                </div>
                            </div>
                   
                            <!-- Agregar boton --> 
                            <div class="box box-solid">
                            <div class="buttom" id="pay">
                               <script type="text/javascript">console.log(total)</script>
                                <form action="../sales/transactions.php" method="POST">
                                    <button  type="buttom" name="dataUser" " class="btn btn-success "><i class="fa fa-c"></i> COMPRAR
                                    </button>
                                </form>
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



    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../includes/scripts/script_main.php"); ?>
    

</body>


</html>