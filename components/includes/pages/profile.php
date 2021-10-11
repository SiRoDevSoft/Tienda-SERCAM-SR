<?php 
include("../../template/head.php");
include ('../../../administrador/config/session.php');
include ('../../../administrador/helpers/helpers.php');


	if(!isset($_SESSION['user'])){
		header('location: tienda.php');
	}
?>

<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

	<?php include '../../template/navbar.php'; ?>
	 
	  <div class="content-wrapper">
	    <div class="container">

	      <!-- Main content -->
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php include('../views/alerts.php') ?>
	        		
	        		<div class="box box-solid">
	        			<div class="box-body infobox">
						<span class="pull-right">
	        				<a href="#edit" class="btn btn-success btn-flat btn-sm" data-toggle="modal"><i class="fa fa-edit"></i> Edit</a>
	        			</span>
							</br>
	        				<div class="col-sm-3 align-content-start infoimg"> 
	        					<img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="img-circle"  width="200" height="200">
	        				</div>
	        				<div class="col-sm-9 infoe">
	
	        						<div class="col-sm-5 infotitle">
	        							<h4><b>Nombre:</b></h4>
	        							<h4><b>Correo electrónico:</b></h4>
	        							<h4><b>Información de contacto: </b></h4>
	        							<h4><b>Dirección:</b></h4>
	        							<h4><b>Miembro desde:</b></h4>
	        						</div>
	        						<div class="col-sm-7 infobody">
	        							<h4><?= $user['firstname'].' '.$user['lastname']; ?></h4>
	        							<h4><?= $user['email']; ?></h4>
	        							<h4><?= (!empty($user['contact_info'])) ? $user['contact_info'] : 'N/a'; ?></h4>
	        							<h4><?= (!empty($user['address'])) ? $user['address'] : 'N/a'; ?></h4>
	        							<h4><?= date('M d, Y', strtotime($user['date'])); ?></h4>
	        						</div>
	        					
	        				</div>
	        			</div>
	        		</div>
	        		<div class="box box-solid tablePhone">
	        			<div class="box-header with-border" style="background: linear-gradient(45deg, #dedefb, #457eff);">
	        				<h4 class="box-title"><i class="fa fa-calendar"></i> <b>Historial de transacciones</b></h4>
	        			</div>
	        			<div class="box-body">
	        				<table class="table table-bordered " id="example1" style="width: 100%;">
						
	        					<thead >
	        						<th class="hidden"></th>
	        						<th>Fecha: </th>
	        						<th>Transacción: </th>
	        						<th>Total</th>
	        						<th>Detalles</th>
	        						<th>Estado</th>
									
	        					</thead>
	        					<tbody>
	        					<?php
								$query=infotransactionsUsers($conexion,$user['id']);
	        							foreach($query as $row){
											$idtransac=$row['idsale'];
											$neto=$row['net_pay'];
											$statusPresale=$row['statusSale'];
											
	        								$total = $row['full_payment'];
											$active= (!$statusPresale) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id=""><i class="fa fa-check-square-o"></i></a></span>` : '';
											$status = ($statusPresale) ? '<span class="label label-success">Finalizado</span>' : '<span class="label label-info">Pendiente</span>'; 
	        								echo "
	        									<tr>
	        										<td class='hidden'></td>
	        										<td>".date('M d, Y', strtotime($row['dateSale']))."</td>
	        										<td>".$row['code']."</td>
	        										<td>&#36; ".number_format($total, 2)."</td>
	        										<td><button class='btn btn-sm btn-flat btn-default transact' data-id='".$idtransac."'><i class='fa fa-search'></i> Ver</button></td>
													<td>".$status.' '.$active."</td>
	        									</tr>
	        								"; 
	        							}
	        					?>
	        					</tbody>
								
	        				</table>
	        			</div>
	        		</div>
	        	</div>
	        	<div class="col-sm-3">
	        		<?php include '../../includes/views/sidebar.php'; ?>
	        	</div>
	        </div>
	      </section>
	      
	    </div>
	  </div> 
  
  	<?php include '../../template/footer.php'; ?>

	  
	  <!-- Llamamos el editor modal de usuario -->
  	<?php include '../../../administrador/users/actions_user/profile_modal_user.php'; ?>
  	<?php include '../sales/transaction-modal.php'; ?>
</div>

<?php include '../scripts/script_main.php'; ?>

<!-- LEEER -->
<!-- 
	Si no llega a funcionar el modal o la informacion es porque cambie la informacion en el array transac.php en includes/sales
 -->
<?php include '../scripts/script_sale.php'; ?>


</body>
