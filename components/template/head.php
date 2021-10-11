<?php  $url="http://".$_SERVER['HTTP_HOST']."/Site_WEB" ?>
<?php // $url="http://".$_SERVER['HTTP_HOST']."/"?>

<!DOCTYPE html>
<head> 
  	<meta charset="utf-8">
  	<meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" type="image/x-icon" href="<?=$url?>/assets/img/Banners/Sercam-Favicon.png" />
  	<!-- Dile al navegador que responda al ancho de la pantalla -->
  	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  	<!-- Bootstrap 3.3.7 -->
  	<link rel="stylesheet" href="<?=$url?>/assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  	<!-- DataTables -->
    <link rel="stylesheet" href="<?=$url?>/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  	<!-- Fuente impresionante -->
  	<link rel="stylesheet" href="<?=$url?>/assets/bower_components/font-awesome/css/font-awesome.min.css">
  	<!--Estilo del tema-->
  	<link rel="stylesheet" href="<?=$url?>/assets/dist/css/AdminLTE.min.css">
  	<!-- AdminLTE Pieles. Elija una máscara de css / Pieles
       Carpeta en lugar de descargarlas todas para reducir la carga. -->
    <link rel="stylesheet" href="<?=$url?>/assets/dist/css/skins/_all-skins.min.css">
    <!-- Magnify -->
    <link rel="stylesheet" href="<?=$url?>/assets/magnify/magnify.min.css"> 
  	<!-- Fuente de Google -->
  	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

 

    <title>SERCAM-SR</title>

  	<!-- CSS personalizados -->
    <link rel="stylesheet" href="<?=$url?>/assets/css/wasathapp.css">
    <link rel="stylesheet" href="<?=$url?>/assets/css/Styles/personalice.css">
    <link rel="stylesheet" href="<?=$url?>/assets/css/Styles/styles.css">

</head>
</html>

<?php 
  $id=(isset($_GET['view']))?(int)$_GET['view'] : null; 
    if((isset($id)&& $id>6)||(isset($id) && $id<1)){
      header("Location:../../../index.php");
    }
  
   ?>