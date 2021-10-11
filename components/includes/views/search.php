<!DOCTYPE html>
<html>
<?php 
        include("../../template/head.php");
        include ('../../../admin/config/data_base.php');
        include ('../../../admin/helpers/helpers.php');
        
        $id=(isset($_GET['view']))?(int)$_GET['view']:false;
    ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php  include("../../template/navbar.php"); ?>

        <div class="content-wrapper">
            <div class="container">

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                    <div class="col-ms-9">
                    <div class="jumbotron mb-5">
                        <h1 class="display-3">Resultados de la busqueda</h1>
                        <p class="lead">Total: </p>
                    </div>
                
        <!-- **********************************************************************  -->
        
        
        <div class="col-sm-3">
             <?php include('../sidebar.php');?>
        </div>
        
<!-- --------------------------------------------------------------------------- -->
                    </div>
                    </div>
        </section>
            </div>
        </div>
    </div>


           
    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../template/scripts.php"); ?>
</body>

</html>