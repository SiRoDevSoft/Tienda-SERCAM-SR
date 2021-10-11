<?php include '../../config/session.php'; ?>
<?php include '../../helpers/helpers.php'; ?>

<?php
  if (isset($_GET['users']) && !empty($_GET['users'])) {
      $id=(int)$_GET['users'];  
    }else{
        header('location: users.php?section');
        exit();
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
        <?php 
         $data_User=showUser($conexion, $id);
        foreach($data_User as $user): 
        ?>
         
      <h1><i class="fa fa-user"></i><?=' '.$user['firstname'].' '.$user['lastname'].' '?><i class="fa fa-angle-double-right"></i><i class="fa fa-shopping-cart"></i> Carrito </h1>
      <ol class="breadcrumb">
        <li><a href="../../home.php"><i class="fa fa-home"></i> Principal</a></li>
        <li><a href="users.php?section"><i class="fa fa-user"></i>Usuarios</a></li>
        <li class="active">Carro</li>
      </ol>
    </section>

    <!-- Main content --> 
    <section class="content">
      <?php
        include("../includes/alerts.php");
      ?>
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header with-border">
              <a href="#addnew" data-toggle="modal" id="add" data-id="<?= $user['id']; ?>" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> Nuevo</a>
              <a href="users.php?section" class="btn  btn-sm btn-flat btn-success"><i class="fa fa-external-link"></i> Usuarios</a>
            </div>
            <div class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Nombre del producto</th>
                  <th>Cantidad</th>
                  <th>Herramientas</th>
                </thead>
                <tbody>
                  <?php
                   

                  
                      $stmt = $conexion->prepare("SELECT C.id AS ID, P.name as name, C.quantity as quantity FROM cart C INNER JOIN products P ON C.product_id=P.id WHERE C.user_id=:user_id AND C.status=TRUE");
                      $stmt->execute(['user_id'=>$user['id']]);
                      foreach($stmt as $row){
                        echo "
                          <tr>
                            <td>".$row['name']."</td>
                            <td>".$row['quantity']."</td>
                            <td>
                              <button class='btn btn-success btn-sm edit btn-flat' data-id='".$row['ID']."'><i class='fa fa-edit'></i> Editar cantidad</button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='".$row['ID']."'><i class='fa fa-trash'></i> Eliminar</button>
                            </td>
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
     <?php endforeach; ?>
  </div>


</div>
<!-- ./envoltura -->
<?php include '../templates/footer.php'; ?>
<?php include './cart/cart_modal.php'; ?>
<?php include '../script/script-main.php'; ?>
<?php include '../script/script-cart.php'; ?>

</body>
</html>
