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
      <i class=" fa fa-file"></i> Categorías de Productos
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
              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead> 
                  <th>Nombre de la categoría</th>
                  <th>Herramientas</th>
                </thead>
                <?php
                   
                      $stmt = $conexion->prepare("SELECT * FROM products_category WHERE status=true");
                      $stmt->execute();
                      foreach($stmt as $row): ?>
                       
                          <tr>
                            <td><?=$row['identity']?></td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='<?=$row['id']?>'><i class='fa fa-edit'></i> Editar</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?=$row['id']?>'><i class='fa fa-trash'></i> Eliminar</button>
                            </td>
                          </tr>                     
                  <?php endforeach;?>
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
<?php include '../sections/category/category_modal.php'; ?>
<?php include '../script/script-main.php'; ?>
<?php include '../script/script-category.php'?>


</body>
</html>
