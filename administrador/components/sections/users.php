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
      <i class=" fa fa-users"></i> Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-home"></i> Principal</a></li>
        <li class="active">Usuarios</li>
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
                  <th>Foto</th>
                  <th>Correo electrónico</th>
                  <th>Nombre</th>
                  <th>Estado</th>
                  <th>Fecha Agregada</th>
                  <th>Herramientas</th>
                </thead>
                <tbody>
            <?php
                $type=2;
                
                $searchUsers= showUsertype($conexion, $type);

                foreach($searchUsers as $row): 

                $user=$row['id'];
                $img_User= (!empty($row['photo'])) ? '../../assets/img/user/'.$row['photo'] : '../../assets/img/user/user.png';             
                $active= (!$row['status']) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id="$user"><i class="fa fa-check-square-o"></i></a></span>` : '';
                $status_User = ($row['status']) ? '<span class="label label-success">ACTIVO</span>' : '<span class="label label-danger">No Activo</span>';
                 ?>
                          <tr>
                            <td>
                              <img src='<?=$img_User?>' class="img-circle" height='30px' width='30px'>
                              <span class='pull-right'><a href='#edit_photo' class='photo' data-toggle='modal' data-id='<?=$row['id']?>'><i class='fa fa-edit'></i></a></span>
                            </td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['firstname'].' '.$row['lastname']?></td>
                            <td> <?=$status_User .' '.$active ?></td>
                            <td><?=date('M d, Y', strtotime($row['date']))?></td>
                            <td>
                                <a href='cart.php?users=<?=$row['id']?>&section' class='btn btn-primary btn-sm btn-flat'>
                                    <i class='fa fa-search'></i> Carrito
                                </a> 
                              <button class='btn btn-info btn-sm edit btn-flat' data-id='<?=$row['id']?>'><i class='fa fa-edit'></i> </button>
                              <button class='btn btn-danger btn-sm delete btn-flat' data-id='<?=$row['id']?>'><i class='fa fa-trash'></i> </button>
                            </td>
                          </tr>
                        
                  <?php endforeach;?>
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
<?php include '../../users/users_modal.php'; ?>
<?php include '../includes/scripts.php'; ?>
<?php include '../script/script-users.php'?>


</body>
</html>
