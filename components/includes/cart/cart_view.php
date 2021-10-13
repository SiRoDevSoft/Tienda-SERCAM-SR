<!DOCTYPE html>
<html>
<?php 
    
    include("../../template/head.php");
	include '../../../administrador/config/session.php';
	include '../../../administrador/helpers/helpers.php';

    ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include("../../template/navbar.php");?>


        <div class="content-wrapper">
            <div class="container">

                <!-- Main content  col-md-offset-2"-->
                <section class="content"> 
                    <div class="row">
                        <?php include("../views/alerts.php");?>

                        <div class="col-sm-9">
                            <h1 class="page-header"><span class="glyphicon glyphicon-shopping-cart"></span> Su carro
                            </h1>
                            <div class="box box-solid">
                                <div class="box-body">
                                    <table class="table table-bordered" >
                                        <thead>
                                            <th></th>
                                            <th>Foto</th>
                                            <th>Nombre</th>
                                            <th>Precio</th>
                                            <th width="30%">Cantidad</th>
                                            <th>Subtotal</th>
                                        </thead>
                                        <tbody id="tbody">
                                        </tbody>
                                    </table>
                                </div> 
                            </div>

                            <?php if(!isset($_SESSION['user'])):?>

                            <h4>¡Hola visitante! Debe <a href='<?=$url?>/administrador/users/login_User.php?cart'>Iniciar sesión</a> para
                                acceder a su carro de compras.</h4>
                            <?php endif; ?>

                            <!-- Validation session user -->
                            <?php 
                            if(isset($_SESSION['user'])):
                                // comprobar si usuario tiene cesta de compras
                                $searchCart = searchCartUser($conexion, $user['id']);
                                foreach($searchCart as $row){
                                    $count = $row['numrows'];
                                }

                                if($count>=1):

                                ?>

                            <div class="box box-solid">
                                <div class="box-body">
                                    <h1 class="text text-center">Medios de Pagos</h1>
                                    <hr>
                                    <div class="col-md-4">
                                        <img src="<?=$url?>/assets/img/page/MERCADO-PAGO.png" alt="" width="138">
                                        <div id='paypal-button'></div>
                                    </div>

                                    <div class="col-md-8">
                                        <!-- <form action="<?=$url?>/components/includes/pages/venta.php" method="POST"> -->

                                            <div class="form-group  has-feedback">
                                                <div class="col-sm-6">
                                                    <label for=""><i class="fa fa-user"></i> :
                                                        <?=$user['firstname'].' '. $user['lastname']?></label>
                                                    <label for=""><i class="fa fa-map-marker"></i> :
                                                        <?=$user['address']?></label><br>
                                                    <label for=""><i class="fa fa-phone"></i> :
                                                        <?=$user['contact_info']?></label><br>
                                                    <div class="input-group">
                                                        <label for="descuent">Aplicar Cupón: <a onclick="coupon()"><span
                                                                    class="glyphicon glyphicon-qrcode"></span></a></label>
                                                        <div id="cardCoupon" class="has-feedback" hidden>
                                                            <input type="text" class="form-control" name="cupon">
                                                            <span
                                                                class="glyphicon glyphicon-credit-card form-control-feedback"></span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <button class="btn btn-info active userconfirm" data-id="<?=$user['id']?>" style="float:right" name="pay"><i class="fa fa-angle-double-right"></i> Comprar ahora</button>

                                            <!-- <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['id']."'><i class='fa fa-edit'></i> Editar</button> -->
                                        <!-- </form> -->
                                    </div>

                                </div>
                            </div>
                            <?php endif; 
 
                            if($count<1): ?>

                            <div class='callout callout-warning'>
                                <img src="<?=$url?>/assets/img/icons/check-alert-white.png" alt="" width="50">
                                <h3> ¡Valla! Aún no tiene productos en su carro de compras.</h3>
                            </div>
                            <div class="col-sm-3">
                                <img src="<?=$url?>/assets/img/page/men-sorprayed.png" alt="" width="150">
                            </div>
                            <div class="col-sm-9">
                                <h3> Visite nuestra <a href="../pages/tienda.php">tienda</a> de productos</h3></br>
                                <h4><span class="glyphicon glyphicon-ok-circle"></span> Lo mejor en seguridad
                                    Electrónica </h4>
                            </div>

                            <?php endif;
                                    endif;?>

                        </div>
   
                        <div class="col-sm-3">
                            <?php include("../views/carousel-side.php"); ?>
                            <br>
                            <?php include("../views/sidebar.php"); ?>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>




    <!-- Include Whatsapp -->
    <?php include('../views/whatsapp.php');?>
    <!-- footer -->
    <?php include("../../template/footer.php");?>
    <?php include("../scripts/script_main.php");?>
    <?php include("./pay_modal.php");?>


</body>


</html>