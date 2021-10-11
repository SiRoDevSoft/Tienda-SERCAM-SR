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
                Lista de usuarios eliminados
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-home"></i> Principal</a></li>
                    <li><i class="fa fa-tags"></i><b>Usuarios</b></li>
                    <li class="active">Lista de usuarios</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <?php 
        include('../includes/alerts.php');
      ?>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="box">
                           
                            <div class="box-body">
                                <table id="example1" class="table table-bordered">
                                    <thead>
                                        <th>Nombre</th>
                                        <th>Foto</th>
                                        <th>Correo Electrónico</th>
                                        <th>Dirección</th>
                                        <th>Contacto</th>                                     
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php
                 
                        $date = date('Y-m-d');
                       
                        $productsView =showUsersDrop($conexion);

                        foreach($productsView as $prod) :
                            $name= $prod['firstname'].' '.$prod['lastname'];
                            $user_Img = (!empty($prod['photo'])) ? $prod['photo'] : 'user.png';
                            
                             
                            ?>

                        <tr>
                            <td><?=$name?></td>
                            <td>
                                <img src="<?=$url?>/administrador/assets/img/user/<?=$user_Img?>" height='30px' width='30px'>
                               
                            </td>
                            <td><?=$prod['email'] ?></td>
                            <td><?=$prod['address']?></td>
                            <td><?=$prod['contact_info']?></td>
                           
                            <td>
                            <button class='btn btn-success btn-sm edit btn-flat' data-id='<?=$prod['id']?>'><i class='fa fa-edit'></i> Habilitar </button>
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
    <?php include './products/userDrop-modal.php'; ?>
    <?php include '../script/script-main.php'; ?>
    <?php include '../script/script-products.php'; ?>

</body>

</html>