<?php 
  include '../../config/session.php';
  include '../../helpers/helpers.php'; 

if(isset($_GET['id']) && !empty($_GET['id'])){
  $id=$_GET['id'];
}else{
  $_SESSION['error']="Usuario no identificado";
  header("Location:transactions.php?section");
}

include '../templates/head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include '../templates/navbar.php'; ?>
  <?php include '../templates/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-id-card"></i> Detalle pago clientes
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-home"></i> Principal</a></li>
        <li class="active"><b>Ventas </b></li>
        </ol>
    </section> 

    <!-- Main content -->
    <section class="content">

      <?php include('../includes/alerts.php');?>

      <div class="row">

        <div class="col-xs-12">
          <div class="box">
          
            <div class="box-header with-border">
            <a href="transactions.php?section" class="btn  btn-sm btn-flat btn-primary"><i class="fa fa-external-link"></i> Volver</a>
              <div class="pull-right">
                <form method="POST" class="form-inline" action="sales_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                  <button type="submit" class="btn btn-success btn-sm btn-flat" disabled name="print"><i class="fa fa-print"></i> Impresión</button>
                </form>
              </div>

            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th hidden></th>
                  <th>Transacción</th>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                  
                </thead>
                <tbody>
                <?php
                               	
              $showPresale=ShowpresaleUs($conexion, $id);
              $net_pay=0;
              $total=0;
                foreach ($showPresale as $row) :
                    $idPre= $row['idpresale'];
                    $stat_trans= $row['transac'];
                    $datePre=date('M d, Y', strtotime($row['presaleDate']));
                    $subtotal= $row['priceCart'];
                    $namePro= $row['nameProduct'];
                    $quantProdu= $row['quantityProduct'];
                    $net_pay+=$subtotal;
                    $tax=$net_pay*0.05;
                    $total += $subtotal*1.05;
                
                  ?>
                 
                    <tr class='prepend_items'>
                  
                      <td><?=$idPre?></td>
                      <td><?=$row['nameProduct']?></td>
                      <td>&#36; <?=number_format($row['price'], 2)?></td>
                      <td><?=$quantProdu?></td>
                      <td>&#36; <?=number_format($subtotal, 2)?></td>
                    </tr>
                    <?php endforeach;?>
                    <tr>
                      <td colspan="4" align="right"><b>Subtotal</b></td>
                      <td><span><b>&#36;<?=number_format($net_pay, 2)?><b></span></td>
                    </tr>
                    <tr>
                      <td colspan="4" align="right"><b>Impuesto R.E (%5)</b></td>
                      <td><span><b>&#36;<?=number_format($tax, 2)?><b></span></td>
                    </tr>
                    <tr>
                      <td colspan="4" align="right" ><b>Total</b></td>
                      <td><span><b>&#36;<?=number_format($total, 2)?><b></span></td>
                  </tr>
                
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
     
  </div>
 
    

</div>
<!-- ./wrapper -->
<?php include '../templates/footer.php'; ?>
<?php include './transaction/transaction-modal.php'; ?>
<?php include '../script/script-main.php'; ?>
<?php include './transaction/script-transaction.php'; ?>
<?php //include '../script/script-sale.php'?>



</body>
</html>
