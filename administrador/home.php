<?php include ('./config/session.php')?>
<?php //include ('./config/conexion.php')?>
<?php include ('./helpers/helpers.php')?>


<?php 
  if(!isset($_SESSION['admin'])){
    header("Location: ../index.php");
  }

    $today=date('Y-m-d');
    $year=date('Y');

    //Search sales for date

    if(isset($_GET['year'])){
        $year = $_GET['year'];
      }

?>


<?php include('./components/templates/head.php')?>
 
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php 
    // Navegacion superior
    include('./components/templates/navbar.php');
    // Navegación lateral
    include('./components/templates/menubar.php');
    ?>

    <!-- Envoltorio de contenido. Contiene contenido de la página -->
    <div class="content-wrapper">
      <!-- Encabezado de contenido (encabezado de página) -->
      <section class="content-header">
        <h1>
          Escritorio
        </h1>
        <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-home"></i> Casa</a></li>
          <li class="active">Tablero</li>
          <li><a href="./users/actions_user/logout.php"><i class="fa fa-power-off"></i> Salir</a></li>
        </ol>
        
      </section>

      <!-- Contenido principal -->
      <section class="content">
        <?php include('./components/includes/alerts.php');?>  

        <!-- Cajas pequeñas (caja de estadísticas)-->
        <div class="row">
<!--****************************************************************************************-->
          <div class="col-lg-3 col-xs-6">
            <!-- caja pequeña -->
            <div class="small-box bg-green">
              <div class="inner">
              <?php
                $stmt= showtotalsales($conexion);

                $total = $stmt[0]['total'];
                
                ?>
                <h3>&#36;<?= number_format_short($total, 2)?></h3>
                <p>Ventas totales</p>
              </div>
              <div class="icon">
              <i class="fa fa-dollar"></i>
              </div>
              <a href="<?=$url?>/administrador/components/sections/sales.php?section" class="small-box-footer">Mas informaciòn <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
 <!--**************************************************************************************** -->
         <div class="col-lg-3 col-xs-6">
            <!-- small box Total Products-->
            <div class="small-box bg-purple">
              <div class="inner">
                <?php 
                $prow =  countProducts($conexion); ?>
                
                <h3><?=$prow[0]['numrows']?></h3>

                <p>Total de productos</p>
              </div>

              <div class="icon">
                <i class="fa fa-barcode"></i>
              </div>
              
                <a href="<?=$url?>/administrador/components/sections/products.php?section" class="small-box-footer" >Mas información <i class="fa fa-arrow-circle-right"></i></a>
             
            </div>
          </div>
          <!-- ./col -->
<!--****************************************************************************************-->          
          <div class="col-lg-3 col-xs-6">
            <!-- small box Total Users-->
            <div class="small-box bg-orange">
              <div class="inner">
                <?php  $numuser=  countUser($conexion); ?>

                <h3><?=$numuser[0]['numrows']?></h3>

                <p>Clientes totales</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <a href="<?=$url?>/administrador/components/sections/users.php?section" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
<!--****************************************************************************************-->
          <div class="col-lg-3 col-xs-6">
            <!-- small box sales today-->
            <div class="small-box bg-blue">
              <div class="inner">
                <?php
                $stmt = salesToday($conexion, $today);

                $total = 0;
                foreach($stmt as $trow){
                  $subtotal = $trow['full_payment'];
                  $total += $subtotal;
                } 
                
                ?>

                <h3>&#36; <?= number_format_short($total, 2) ?></h3>

                <p>Ventas hoy</p>
              </div>
              <div class="icon">
                <i class="fa fa-money"></i>
              </div>
              <a href="<?=$url?>/administrador/components/sections/sales.php?section" class="small-box-footer">Mas información <i class="fa fa-arrow-circle-right"></i></a>
            </div>
          </div>
           
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!--****************************************************************************************-->
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header with-border">
                <h3 class="box-title">Informe mensual de ventas</h3>
                <div class="box-tools pull-right">
                  <form class="form-inline">
                    <div class="form-group">
                      <label>Seleccione el año: </label>
                      <select class="form-control input-sm" id="select_year">
                      <?php
                        for($i=2015; $i<=2022; $i++){
                          $selected = ($i==$year)?'selected':'';
                          echo "
                            <option value='".$i."' ".$selected.">".$i."</option>
                          ";
                        }
                      ?>
                      </select>
                    </div>
                  </form>
                </div>
              </div>
              <div class="box-body">
                <div class="chart">
                  <br>
                  <div id="legend" class="text-center"></div>
                  <canvas id="barChart" style="height:350px"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>

      </section>
      <!-- columna derecha -->
    </div>
    
    
  </div>
  <?php include('../components/template/footer.php') ?>
  <!-- ./envoltura -->

  <!-- Datos del gráfico
-->
  <?php
  $months = array();
  $sales = array();
  for( $m = 1; $m <= 12; $m++ ) {
   
      $stmt = $conexion->prepare("SELECT * FROM detail LEFT JOIN sales ON sales.id=detail.sales_id LEFT JOIN products ON products.id=detail.product_id WHERE MONTH(date_sale)=:month AND YEAR(date_sale)=:year");
      $stmt->execute(['month'=>$m, 'year'=>$year]);
      $total = 0;
      foreach($stmt as $srow){
        $subtotal = $srow['full_payment'];
        $total += $subtotal;    
      }
      array_push($sales, round($total, 2));
    

    $num = str_pad( $m, 2, 0, STR_PAD_LEFT );
    $month =  date('M', mktime(0, 0, 0, $m, 1));
    array_push($months, $month);
  }

  $months = json_encode($months);
  $sales = json_encode($sales);

?>
  <!-- Datos de gráfico final -->

  <?php //$pdo->close(); ?>
 
  <?php include('./components/includes/scripts.php') ?>
  
<script>
$(function(){
  var barChartCanvas = $('#barChart').get(0).getContext('2d')
  var barChart = new Chart(barChartCanvas)
  var barChartData = {
    labels  : <?php echo $months; ?>,
    datasets: [
      {
        label               : 'VENTAS',
        fillColor           : 'rgba(60,141,188,0.9)',
        strokeColor         : 'rgba(60,141,188,0.8)',
        pointColor          : '#3b8bba',
        pointStrokeColor    : 'rgba(60,141,188,1)',
        pointHighlightFill  : '#fff',
        pointHighlightStroke: 'rgba(60,141,188,1)',
        data                : <?php echo $sales; ?>
      }
    ]
  }
  //barChartData.datasets[1].fillColor   = '#00a65a'
  //barChartData.datasets[1].strokeColor = '#00a65a'
  //barChartData.datasets[1].pointColor  = '#00a65a'
  var barChartOptions                  = {
    //Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
    scaleBeginAtZero        : true,
    //Boolean - Whether grid lines are shown across the chart
    scaleShowGridLines      : true,
    //String - Colour of the grid lines
    scaleGridLineColor      : 'rgba(0,0,0,.05)',
    //Number - Width of the grid lines
    scaleGridLineWidth      : 1,
    //Boolean - Whether to show horizontal lines (except X axis)
    scaleShowHorizontalLines: true,
    //Boolean - Whether to show vertical lines (except Y axis)
    scaleShowVerticalLines  : true,
    //Boolean - If there is a stroke on each bar
    barShowStroke           : true,
    //Number - Pixel width of the bar stroke
    barStrokeWidth          : 2,
    //Number - Spacing between each of the X value sets
    barValueSpacing         : 5,
    //Number - Spacing between data sets within X values
    barDatasetSpacing       : 1,
    //String - A legend template
    legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
    //Boolean - whether to make the chart responsive
    responsive              : true,
    maintainAspectRatio     : true
  }

  barChartOptions.datasetFill = false
  var myChart = barChart.Bar(barChartData, barChartOptions)
  document.getElementById('legend').innerHTML = myChart.generateLegend();
});
</script>

<script>

  //console.log('estoy aqui');
</script>

<script>
$(function(){
  $('#select_year').change(function(){
    window.location.href = 'home.php?year='+$(this).val();
  });
});
</script>

</body>

</html> 