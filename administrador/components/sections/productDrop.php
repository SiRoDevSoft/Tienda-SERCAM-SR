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
                Lista de productos eliminados
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-home"></i> Principal</a></li>
                    <li><i class="fa fa-tags"></i><b>Productos</b></li>
                    <li class="active">Lista de productos</li>
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
                                        <th>Descripción</th>
                                        <th>Precio</th>
                                        
                                        <th>Acción</th>
                                    </thead>
                                    <tbody>
                                        <?php
                 
                        $date = date('Y-m-d');
                       
                        $productsView = showProductDrop($conexion);

                        foreach($productsView as $prod) :
                            $prod_Img = (!empty($prod['photo'])) ? $prod['photo'] : 'product.png';
                            $counter = ($prod['date_view'] == $date) ? $prod['counter'] : 0; 
                             $active= (!$prod['status']) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id=""><i class="fa fa-check-square-o"></i></a></span>` : '';
                            $status_prod = ($prod['stock']>0) ? '<span class="label label-success">En Stock</span>' : '<span class="label label-danger">Sin Stock</span>';
                            ?>

                        <tr>
                            <td><?=$prod['name']?></td>
                            <td>
                                <img src="<?=$url?>/administrador/assets/img/products/<?=$prod_Img?>" height='30px' width='30px'>
                               
                            </td>
                            <td><?=$prod['description'] ?></td>
                            <td>&#36; <?=number_format($prod['price_sale'], 2)?></td>
                           
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
    <?php include './products/productDrop-modal.php'; ?>
    <?php include '../script/script-main.php'; ?>
    <?php include '../script/script-products.php'; ?>

</body>

</html>