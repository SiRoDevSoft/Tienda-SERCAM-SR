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
      <i class=" fa fa-archive"></i> Almacén de productos
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-home"></i> Principal</a></li>
        <li>Productos</li>
        <li class="active"><b>Categorias </b></li>
        </ol>
    </section> 

    <!-- Main content -->
    <section class="content">

      <?php include('../includes/alerts.php');?>


      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnewProduct" data-toggle="modal" class="btn btn-info btn-sm btn-flat"  id="addproduct"><i class="fa fa-plus"></i> Nuevo producto</a>
              <!-- <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a> -->
            </div>
            <div class="box-body">
                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Foto</th>
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        <th>Stock</th>
                                        <th>Cantidad</th>
                                        <th>Herramientas</th>
                                    </thead>
                                    <tbody>
                                        <?php
                 
                        $date = date('Y-m-d');
                       
                        $productsView = showProductbyCategory($conexion, null); 

                        foreach($productsView as $prod) :
                            $prod_Img = (!empty($prod['photo'])) ? $prod['photo'] : 'product.png';
                            
                             $active= (!$prod['status']) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id=""><i class="fa fa-check-square-o"></i></a></span>` : '';
                            $status_prod = ($prod['stock']>0) ? '<span class="label label-success">En Stock</span>' : '<span class="label label-danger">Sin Stock</span>';
                            ?>

                        <tr>
                            <td><?=$prod['name']?></td>
                            <td>
                                <img src="<?=$url?>/administrador/assets/img/products/<?=$prod_Img?>" height='40px' width='40px'>
                            </td>
                            <td>
                                <a href='#description' data-toggle='modal'class='btn btn-info btn-sm btn-flat desc' data-id='<?=$prod['id']?>'>
                                <i class='fa fa-search'></i> Ver </a>
                            </td>
                            <td>&#36; <?=number_format($prod['price_sale'], 2)?></td>
                            <td><?=$status_prod .' '.$active ?></td>
                            <td><?=$prod['stock']?></td>
                            <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='<?=$prod['id']?>'"><i class='fa fa-edit'></i> </button>
                            <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?=$prod['id']?>'><i class='fa fa-trash'></i></button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
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
<?php include '../sections/stock/stock_modal.php'; ?>
<?php include '../script/script-main.php'; ?>
<?php include '../script/script-products.php'?>


</body>
</html>
