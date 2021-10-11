<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title"><b>Más vistos hoy</b></h3>
	  	</div>
	  	<div class="box-body">
	  		<ul id="trending">
	  		<?php
	  			$now = date('Y-m-d');
	  			
	  			$productsViews= mostViews($conexion, $now);
	  			foreach($productsViews as $row): ?>
	  				<li><a href='<?=$url?>/components/includes/pages/productos.php?product=<?=$row['id']?>'><?=$row['name']?></a></li>
	  			<?php endforeach;?>
	    	<ul>
	  	</div>
	</div>
</div>

<div class="row">
	<div class="box box-solid">
	  	<div class="box-header with-border">
	    	<h3 class="box-title">
                <b>Hazte suscriptor</b>
            </h3>
	  	</div>
	  	<div class="box-body">
	    <p>Obtenga actualizaciones gratuitas sobre los últimos productos y descuentos, directamente en su bandeja de entrada.</p>
	    	<form method="POST" action="">
		    	<div class="input-group">
	                <input type="text" class="form-control">
	                <span class="input-group-btn">
	                    <button type="button" class="btn btn-info btn-flat">
                            <i class="fa fa-envelope"></i> 
                        </button>
	                </span>
	            </div>
		    </form>
	  	</div>
	</div>
</div>

<div class="row">
	<div class='box box-solid'>
	  	<div class='box-header with-border'>
	    	<h3 class='box-title'>
                <b>Síguenos en las redes sociales</b>
            </h3>
	  	</div>
	  	<div class='box-body'>
	    	<a class="btn btn-social-icon btn-facebook"  href="https://www.facebook.com/SERCAM.SR"><i class="fa fa-facebook"></i></a>
	    	<a class="btn btn-social-icon btn-instagram"href="https://www.instagram.com/hikvision/?hl=es"><i class="fa fa-instagram"></i></a>
			<a class="btn btn-social-icon btn-whatsapp"href="https://api.whatsapp.com/send?phone=+542625455634&text=Hola%20SERCAM-SR%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20los%20productos%20en%20ofertas%21%20Gracias."><i class="fa fa-whatsapp"></i></a>
	    	
	  	</div>
	</div>
</div>