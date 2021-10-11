<!DOCTYPE html>
<html>
<?php include ('../../../administrador/config/session.php');  ?>
<?php include ('../../../administrador/helpers/helpers.php'); ?>




<?php  include("../../template/head.php");?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php  include("../../template/navbar.php"); ?>

        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-sm-12">
                            <?php  $section = showCategoryProducts($conexion,$id);

                        foreach ($section as $category) : ?>


                            <div class="jumbotron">
                                <div class="col-sm-9">

                                </div>

                                <h1 class="display-3 text-center"><?=strtoupper($category['identity'])?></h1>
                                <p class="text-center">SERCAM-SR Especialista en sistemas de Seguridad
                                </p>
                                <img src="<?=$url?>/assets/img/page/btn-angle-down.png" class="angle" width="50"
                                    id="down-angle" onclick="collapse()">
                                <!-- <button class="btn btn-default" type="button"><h2></h2></button> -->
                                <div class="body-lead lead" id="lead" hidden>
                                    <hr class="my-2">
                                    <h3 class="title-jumbo"><?=$category['title']?></h3>
                                    <p class="description-jumbo"><?=$category['description']?></p>
                                    <img src="<?=$url?>/assets/img/page/btn-angle-up.png" class="angle" width="50"
                                        id="up-angle" onclick="collapse()">
                                </div>



                            </div>
                        </div>

                        <?php endforeach; ?>
                        <hr>
                    </div>
                </section>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-9">
                                    <?php  $stmt = showProductbyCategory($conexion, $id);
                                           foreach ($stmt as $row) : ?>
                                    <div class='col-md-4'>
                                        <div class='box box-solid'>
                                            <div class='box-body prod-body'>
                                                <a href="productos.php?product=<?=$row['id']?>">
                                                    <img src='<?=$url?>/administrador/assets/img/products/<?=$row['photo']?>'
                                                        width='100%' height='230px' class='thumbnail'>
                                                </a>
                                                <h4><?=$row['name']?>
                                                    <b style="float:right" id="Empty" onclick="likeProduct()">
                                                        <span class="glyphicon glyphicon-heart-empty"></span></b>

                                                    <b style="float:right" id="Like" onclick="likeProduct()" hidden>
                                                        <span class="glyphicon glyphicon-heart"></span></b>

                                                </h4>
                                            </div>
                                            <div class='box-footer'>
                                                <h3>
                                                    <b>&#36;<?=number_format($row['price_sale'], 2)?></b>
                                                </h3>
                                                <a href="pagos.php" style="float:right">Ver medio de Pagos</a>

                                            </div>
                                        </div>

                                    </div>
                                    <?php endforeach; ?>

                                </div>

                                <div class="col-md-3">
                                    <?php include('../views/sidebar.php');?>
                                </div>

                            </div>

                        </div>

                    </div>

                    <!-- **********************************************************************  -->

            </div>
        </div>
    </div>

    <!-- Include Whatsapp -->
    <?php include('../views/whatsapp.php');?>

    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../includes/scripts/script_main.php"); ?>

</body>

</html>