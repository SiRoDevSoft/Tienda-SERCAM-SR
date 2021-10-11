<?php include '../../config/session.php'; ?>
<?php include '../../helpers/helpers.php'; ?>

<?php 
  if(isset($_GET['users']) && !empty($_GET['users'])){
    $id=(int)$_GET['users'];

    $searchUser=countUsers($conexion, $id);
    $count=$searchUser[0]['numrows'];
    if($count==0){
      $_SESSION['warning']="Usuario no identificado";
      $_SESSION['status']="Usuarios";
      header("Location: customers.php?section");
    }else{
      $name=$searchUser[0]['name'];
    }

  }else{
    $_SESSION['warning']="Usuario no identificado";
    header("Location: customers.php?section");
  }
?>


<?php include '../templates/head.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include '../templates/navbar.php'; ?>
  <?php include '../templates/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <i class="fa fa-id-card"></i> Historial de Ventas de <?=$name?>
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
            <a href="customers.php?section" class="btn  btn-sm btn-flat btn-primary"><i class="fa fa-external-link"></i> Volver</a>
              <div class="pull-right">
                <form method="POST" class="form-inline" action="sales_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                  <button type="submit" disabled class="btn btn-success btn-sm btn-flat" name="print"><i class="fa fa-print"></i> Impresión</button>
                </form>
              </div>

            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Fecha</th>
                  <th>Nombre del comprador</th>
                  <th>Transacción#</th>
                  <th>Total</th>
                  <th>Detalles</th>
                </thead>
                <tbody>
                <?php
                    $query= dataSaleshowUser($conexion, $id);
                    foreach($query as $row){
                      // $stmt = $conexion->prepare("SELECT *, sales.id AS salesid FROM sales LEFT JOIN users ON users.id=sales.user_id ORDER BY sales.date_sale DESC");
                      // $stmt->execute();
                      // foreach($stmt as $row){
                      //   $stmt = $conexion->prepare("SELECT * FROM detail LEFT JOIN products ON products.id=detail.product_id WHERE detail.sales_id=:id");
                      //   $stmt->execute(['id'=>$row['salesid']]);
                        $total = $row['full_payment'];
                        // foreach($stmt as $detail){
                        //   $subtotal = $detail['price']*$detail['quantity'];
                        //   $total += $subtotal;
                        // }
                        echo "
                          <tr>
                            <td class='hidden'></td>
                            <td>".date('M d, Y', strtotime($row['date_sale']))."</td>
                            <td>".$row['firstname'].' '.$row['lastname']."</td>
                            <td>".$row['code']."</td>
                            <td>&#36; ".number_format($total, 2)."</td>
                            <td><button type='button' class='btn btn-info btn-sm btn-flat transact' data-id='".$row['idsale']."'><i class='fa fa-search'></i> Ver</button></td>
                          </tr>
                        ";
                      }
                    
                  ?>
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
<?php include '../script/script-main.php'; ?>
<?php include '../script/script-sale.php'?>
<?php include './transaction/transaction-modal.php'; ?>

</body>
</html>
