<?php include ('../helpers/helpers.php'); ?>
<?php include ('../config/session.php'); ?>

<?php
	if(!isset($_SESSION['user'])){
		header('location: ../../components/includes/tienda.php');
	}
?>
<?php include '../../components/template/head.php'; ?>
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../../components/template/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['warning'])):?>
	        				
						<div class='callout callout-warning '>
							<img src="../../assets/img/icons/check-alert-white.png" alt=""  width="50">  
							<p><?=$_SESSION['warning']?></p>
						</div>
	        				
	        			<?php unset($_SESSION['warning']);
						endif;
	        			?>
	        		<?php
	        			if(isset($_SESSION['error'])):?>
	        				
						<div class='callout callout-danger '>
							<img src="../../assets/img/icons/check-cross-white.png" alt=""  width="50">  
							<p><?=$_SESSION['error']?></p>
						</div>

	        				
	        			<?php unset($_SESSION['error']);
						endif;
	        			?>

	        			<?php if(isset($_SESSION['success'])): ?>
	        				
						<div class='callout callout-success '>
							<img src="../../assets/img/icons/check-good-white.png" alt=""  width="50">   
							<p><?=$_SESSION['success']?></p>
						</div>
	        			
	        			<?php	unset($_SESSION['success']);
								endif;
	        			?>
	        		
	        		<div class="box box-solid">
	        			<div class="box-body">
	        				<div class="col-sm-3 align-content-start"> 
	        					<img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="img-circle"  width="200" height="200">
	        				</div>
	        				<div class="col-sm-9">
	        					<div class="row">
								<span class="pull-right">
	        						<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        					</span>
	        						<div class="col-sm-3">
	        							<h4>Nombre:</h4>
	        							<h4>Correo electrónico:</h4>
	        							<h4>Información de contacto: </h4>
	        							<h4>Dirección:</h4>
	        							<h4>Miembro desde:</h4>
	        						</div>
	        						<div class="col-sm-8">
	        							<h4><?= $user['firstname'].' '.$user['lastname']; ?></h4>
	        							<h4><?= $user['email']; ?></h4>
	        							<h4><?= (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><?= (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4>
	        							<h4><?= date('M d, Y', strtotime($user['date'])); ?></h4>
	        						</div>
	        					</div>
	        				</div>
	        			</div>
	        		</div>
	        		<div class="box box-solid">
	        			<div class="box-header with-border">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Historial de transacciones</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered" id="example1">
	        					<thead>
	        						<th class="hidden"></th>
	        						<th>Fecha</th>
	        						<th>Transacción#</th>
	        						<th>Cantidad </th>
	        						<th>Detalles completos</th>
	        					</thead>
	        					<tbody>
	        					<?php
	        						// $conn = $pdo->open();

	        						// try{
	        						// 	$stmt = $conn->prepare("SELECT * FROM sales WHERE user_id=:user_id ORDER BY sales_date DESC");
	        						// 	$stmt->execute(['user_id'=>$user['id']]);
	        						// 	foreach($stmt as $row){
	        						// 		$stmt2 = $conn->prepare("SELECT * FROM details LEFT JOIN products ON products.id=details.product_id WHERE sales_id=:id");
	        						// 		$stmt2->execute(['id'=>$row['id']]);
	        						// 		$total = 0;
	        						// 		foreach($stmt2 as $row2){
	        						// 			$subtotal = $row2['price']*$row2['quantity'];
	        						// 			$total += $subtotal;
	        						// 		}
	        						// 		echo "
	        						// 			<tr>
	        						// 				<td class='hidden'></td>
	        						// 				<td>".date('M d, Y', strtotime($row['sales_date']))."</td>
	        						// 				<td>".$row['pay_id']."</td>
	        						// 				<td>&#36; ".number_format($total, 2)."</td>
	        						// 				<td><button class='btn btn-sm btn-flat btn-info transact' data-id='".$row['id']."'><i class='fa fa-search'></i> Ver</button></td>
	        						// 			</tr>
	        						// 		";
	        						// 	}

	        						// }
        							// catch(PDOException $e){
									// 	echo "Hay algún problema en la conexión.: " . $e->getMessage();
									// }

	        						// $pdo->close();
	        					?>
	        					</tbody>
	        				</table>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include '../../components/includes/views/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	     
	    </div>
	  </div>
  
  	<?php include '../../components/template/footer.php'; ?>

	  
	  <!-- Llamamos el editor modal de usuario -->
  	<?php include './actions_user/profile_modal_user.php'; ?>
</div>

<?php include '../../components/includes/scripts/script_main.php'; ?>


</body>
