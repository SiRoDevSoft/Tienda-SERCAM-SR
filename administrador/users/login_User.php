<!DOCTYPE html>
<html>
<?php 
        include("../../components/template/head.php");
        
        include ('../helpers/helpers.php');
        include ('../config/session.php');
        

       if(isset($_GET['cart'])){
        unset($_SESSION['cart']);
        }
?>
      

<body class="hold-transition login-page">
  <div class="login-box">

   <!-- FAIL -->
   <?php
            if(isset($_SESSION['error'])):?>

        <div class='callout callout-danger '>
            <img src="../assets/img/icons/check-cross-white.png" alt=""  width="50">  
            <p><?=$_SESSION['error']?></p>
        </div>
        <?php unset($_SESSION['error']);
                endif;?>

            <!-- WARNING -->
        <?php
            if(isset($_SESSION['warning'])):?>

        <div class='callout callout-warning '>
            <img src="../assets/img/icons/check-alert-white.png" alt=""  width="50">  
            <p><?=$_SESSION['warning']?></p>
        </div>
        <?php unset($_SESSION['warning']);
                endif;?>
    
    <div class="login-box-body">
    	<p class="login-box-msg">INICIO SESIÓN</p>

    	<form action="actions_user/login.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Correo electrónico" required autocomplete="off">
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Contraseña" required autocomplete="off">
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Ingresar</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="<?=$url?>/administrador/users/password_forgot.php">Olvidé mi contraseña</a><br>
      <a href="<?=$url?>/administrador/users/signup.php" class="text-center">Registrar una nueva membresía</a><br>
      <a href="<?=$url?>/index.php"><i class="fa fa-home"></i> Casa</a>
  	</div>
 
  </div>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  <br/>
  
   
           
    <!-- footer -->
    <?php include("../../components/template/footer.php"); ?>
</body>

</html>