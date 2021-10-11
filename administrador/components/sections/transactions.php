<?php include '../../config/session.php'; ?>
<?php include '../../helpers/helpers.php'; ?>


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
      <i class="fa fa-id-card"></i> Administración de cobros pendientes
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
              <div class="pull-right">
                <!-- <form method="POST" class="form-inline" action="sales_print.php">
                  <div class="input-group">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right col-sm-8" id="reservation" name="date_range">
                  </div>
                  <button type="submit" class="btn btn-success btn-sm btn-flat" name="print"><i class="fa fa-print"></i> Impresión</button>
                </form> -->
              </div>

            </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th class="hidden"></th>
                  <th>Fecha</th>
                  <th>Nombre del comprador</th>
                  <th>Transacción#</th>
                  <th>Cantidad</th>
                  <th>Detalles</th>
                  <th>Acción</th>
                </thead>
                <tbody>
                <?php
                $showPresale=Showpresale($conexion);
                foreach($showPresale as $row):

                  $query=totaldetailPresales($conexion,$row['user_id']);
                  $total=0;
                  foreach($query as $detail){
                    $presale=$detail['idPresale'];
                    $user=$detail['name'];
                    $quantity=$detail['quantity'];
                    $neto=$detail['net_pay'];
                    $subtotal=$detail['total'];
                    $statusPresale=$detail['transac'];
                    $datePresale = $detail['date'];
                    $total+=$subtotal;
                  }
                  $active= (!$statusPresale) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id=""><i class="fa fa-check-square-o"></i></a></span>` : '';
                  $status = ($statusPresale) ? '<span class="label label-warning">En processo</span>' : '<span class="label label-info">Finalizado</span>'; 
                  ?>
                
                  <tr>
                    <td class='hidden'></td>
                    <td><?=date('M d, Y', strtotime($row['date']))?></td>
                    <td><?=$user?></td>
                    <td><?=$status.' '.$active?></td>
                    <td>&#36; <?=number_format($total, 2)?></td>
                    
                 
                    
                    <td> <a href='detail.php?section&id=<?=$row['id']?>' class='btn btn-primary btn-sm btn-flat'><i class='fa fa-search'></i> Ver</a></td>
                    
                    <td>
                    <button class='btn btn-success btn-sm edit btn-flat' data-id='<?=$row['user_id']?>'"><i class='fa fa-edit'></i> </button>
                    <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?=$row['user_id']?>'><i class='fa fa-trash'></i></button>
                    </td>
                    
                  </tr>
               

                <?php endforeach; 







                      // $stmt = $conexion->prepare("SELECT *, P.id AS id FROM presale P INNER JOIN users U ON P.user_id=U.id ORDER BY P.date DESC");
                      // $stmt->execute();
                      // foreach($stmt as $row){
                      //   $stmt = $conexion->prepare("SELECT * FROM detail_presale D LEFT JOIN products P ON P.id=D.product_id WHERE D.presale_id=:id");
                      //   $stmt->execute(['id'=>$row['id']]);
                      //   $total = 0;
                      //   foreach($stmt as $detail){
                      //     $subtotal = $detail['price_sale']*$detail['quantity']; 
                      //     $total += $subtotal;
                      //   }
                      //   echo "
                      //     <tr>
                      //       <td class='hidden'></td>
                      //       <td>".date('M d, Y', strtotime($row['date']))."</td>
                      //       <td>".$row['firstname'].' '.$row['lastname']."</td>
                      //       <td>".$row['status']."</td>
                      //       <td>&#36; ".number_format($total, 2)."</td>
                      //       <td><button type='button' class='btn btn-info btn-sm btn-flat ' data-id='".$row['id']."'><i class='fa fa-search'></i> Ver</button></td>
                      //     </tr>
                      //   ";
                      // }
                    
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
<?php include './transaction/transaction-modal.php'; ?>
<?php include '../script/script-main.php'; ?>
<?php include '../script/script-users.php'; ?>
<?php //include './transaction/script-transaction.php'; ?>
<?php //include '../script/script-sale.php'?>



</body>
</html>
