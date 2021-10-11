<!DOCTYPE html>
<html>
<?php 
        include("../../template/head.php");
        include ('../../../administrador/config/session.php');
        include ('../../../administrador/helpers/helpers.php');
       
  
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
                                <h1 class="text text-center">Manual de Uso de sistemas de seguridad</h1>
                                <p class="lead">Contactate con nosotros</p>
                                <p class="lead">
                                    <a class="btn btn-info active btn-lg"
                                        href="<?=$url?>/components/includes/pages/contacto.php" role="button">Contactar</a>
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
    <?php include("../scripts/script_main.php"); ?>
</body>


</html>