<?php include ('../../../administrador/config/session.php');  ?>
<?php include ('../../../administrador/helpers/helpers.php'); ?>
<?php


	$IdProduct = (isset($_GET['product']))?(int)$_GET['product'] : null;
	// var_dump($IdProduct);
	// die();
    if(!isset($IdProduct) || empty($IdProduct)){
        $_SESSION['error']="Producto no válido";
		
        header("Location: tienda.php");

    }else{

        $producSelected= productProperty($conexion, $IdProduct);

        foreach($producSelected as $product){

            if(!empty($product)){
                //page view
                $count=0;
	            $today = date('Y-m-d');
                if($product['view']== $today){
                    // Aumentar el contador de visitas
                    $count=$count+1;
                
                }
                // Actulización de visitas al producto
                $updateView= updateViewProduct($conexion, $product['prodid'],$count, $today);

            }
			
            $img= (isset($product['photo']))? $product['photo'] : 'product.png';
        }
		if(empty($product)){
			$_SESSION['error']="Producto no válido";
			$_SESSION['status']="¡Error!";
	
			header("Location: tienda.php");
		}

    }

?>
<?php include '../../template/head.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">

<div class="wrapper">

	<?php include '../../template/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<div class="callout" id="callout" style="display:none">
	        			<button type="button" class="close"><span aria-hidden="true">&times;</span></button>
	        			<span class="message"></span>
	        		</div>
		            <div class="row">
		            	<div class="col-sm-6">
		            		<img src="<?=$url?>/administrador/assets/img/products/<?=$img?>" width="100%" class="zoom" data-magnify-src="<?=$url?>/administrador/assets/img/products/<?=$img?>">
		            		<br><br>
		            		<form class="form-inline" id="productForm">
		            			<div class="form-group">
			            			<div class="input-group col-sm-5">
			            				
			            				<span class="input-group-btn">
			            					<button type="button" id="minus" class="btn btn-default btn-flat btn-lg"><i class="fa fa-minus"></i></button>
			            				</span>
							          	<input type="text" name="quantity" id="quantity" class="form-control input-lg" value="1">
							            <span class="input-group-btn">
							                <button type="button" id="add" class="btn btn-default btn-flat btn-lg"><i class="fa fa-plus"></i>
							                </button>
							            </span>
							            <input type="hidden" value="<?=$product['prodid']?>" name="id">
							        </div>
									<?php if(!isset($_SESSION['user'])):?>
			            			<a href="<?=$url?>/administrador/users/login_User.php" type="buttom" class="btn btn-primary btn-lg btn-flat BTN"><span class="glyphicon glyphicon-share"></span> Identificate</a>
									<?php else:?>
			            			<button type="submit" class="btn btn-primary btn-lg btn-flat BTN" <?=(!isset($_SESSION['user']))? "disabled" : ""?>><i class="fa fa-shopping-cart" ></i> Añadir al carrito</button>

									<?php endif;?>

			            		</div>
		            		</form>
		            	</div>
		            	<div class="col-sm-6">
		            		<h1 class="page-header"><?=$product['prodname']?></h1>
		            		<h3><b>&#36; <?= number_format($product['price'], 2)?></b></h3>
		            		<p><b>Categoría:  </b> <a href="principal.php?view=<?=$product['catId']?>"> <span class="glyphicon glyphicon-new-window"></span></a> <h4><?=$product['catname']?></h4></p>
		            		<p><b>Descripción:</b></p>
		            		<p><?=$product['description']?></p>
		            	</div>
		            </div>
		            <br>
				    <div class="fb-comments" data-href="<?=$url?>/components/includes/product.php?product=<?=$IdProduct?>" data-numposts="10" width="100%"></div> 
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include '../views/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include '../../template/footer.php'; ?>
</div>


<?php include '../scripts/script_main.php'; ?>
<?php include '../scripts/script-product.php'; ?>
</body>
</html>