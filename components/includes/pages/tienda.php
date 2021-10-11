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

				<div class="container">
					<div class="row">
						<div class="col-md-12">

							<?php include('../../../administrador/components/includes/alerts.php') ?>

							<div class="col-md-4"></div>
						</div>
					</div>
				</div>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<div class="col-sm-9">

							<?php include("../views/carousel.php");?>

							<h2>Los productos más solicitados:</h2>

                                    <?php  $stmt = searchProductmostView($conexion);
                                           foreach ($stmt as $row) : ?>
                                    <div class='col-sm-4'>
                                        <div class='box box-solid'>
                                            <div class='box-body prod-body'>
                                                <a href="productos.php?product=<?=$row['id']?>">
                                                    <img src='<?=$url?>/administrador/assets/img/products/<?=$row['photo']?>'
                                                        width='100%' height='230px' class='thumbnail'>
                                                </a>
                                                <h4><?=$row['name']?>
                                                    
                                                    <b style="float:right" id="Like" >
                                                        <span class="glyphicon glyphicon-star-empty"></span></b>

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
						
						<div class="col-sm-3">

							<?php include("../views/sidebar.php"); ?>
							<?php include("../views/carousel-side.php"); ?>
						</div>
					</div>

				</section>

			</div>



			<!-- Include Whatsapp -->
			<?php include('../views/whatsapp.php');?>


			<!-- footer -->
			<?php include("../../template/footer.php"); ?>
			<?php include("../../includes/scripts/script_main.php"); ?>
			
</body>


</html>