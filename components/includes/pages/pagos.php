<!DOCTYPE html>
<html>
<?php 
        include("../../template/head.php");
        include ('../../../administrador/config/session.php');
        include ('../../../administrador/helpers/helpers.php');
        // Configuracion para la libreria de mercadoPago
        require('../../../vendor/autoload.php');
        // Credenciales de mercadoPago
        require_once('../views/credentials.php');


        // Llamamos a la clase de mercadoPago
        MercadoPago\SDK::setAccessToken($access_token);

        $productss=[
            'name' => 'Teclado ',
            'cantidad'=>5,
            'precio'=>1200
 
        ];

       
            $preference = new MercadoPago\Preference();
            $item = new MercadoPago\Item();

            $item->unit_price = $productss['precio'];
            $item->title = $product['name'];
            $item->quantity = $product['cantidad'];

            $preference->items = array($item);
            $preference->save();

    ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include("../../template/navbar.php"); ?>

 
        <div class="content-wrapper">
            <div class="container">

                <!-- Main content  col-md-offset-2"-->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-9">
                            <?php include("../views/carousel.php"); ?>
                        </div>


                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-3">
                            <?php include("../views/sidebar.php"); ?>
                        </div>

                        <div class="col-sm-12">
                            <div class="jumbotron">
                                <h1 class="text text-center">Medios de Pagos</h1>

                                <p class="lead">contactate con nosotros</p>
                                <p class="lead">
                                    <a class="btn btn-info active btn-lg"
                                        href="<?=$preference->init_point?>" role="button">Contactar</a>
                                </p>
                            </div>
                        </div>
                       

                    </div>


                </section>



            </div>
        </div>
    </div>



    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../includes/scripts/script_main.php"); ?>
    
<script
  src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js"
  data-preference-id="<?php echo $preference->id; ?>">
</script>

</body>


</html>