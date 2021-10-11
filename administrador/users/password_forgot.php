<?php include '../config/session.php'; ?>
<?php include '../../components/template/head.php'; ?>


<body class="hold-transition login-page">
<div class="login-box">
  	<?php
      if(isset($_SESSION['error'])): ?>
       
            <div class='callout callout-danger text-center'>
                <p>"<?=$_SESSION['error']?></p> 
            </div>
        
        <?php unset($_SESSION['error']);
      endif; 
      if(isset($_SESSION['success'])): ?>
        
          <div class='callout callout-success text-center'>
            <p><?=$_SESSION['success']?></p> 
          </div>
        
        <?php unset($_SESSION['success']);
      endif; ?>

  	<div class="login-box-body">
    	<p class="text-center">Ingrese el correo electrónico asociado con la cuenta</p>

    	<form action="reset.php" method="POST">
      		<div class="form-group has-feedback">
        		<input type="email" class="form-control" name="email" placeholder="Correo electrónico" required>
        		<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      		</div>
      		<div class="row">
    			<div class="col-xs-4">
          			<button type="submit" class="btn btn-primary btn-block btn-flat" name="reset"><i class="fa fa-mail-forward"></i> Send</button>
        		</div>
      		</div>
    	</form>
      <br>
      <a href="login_User.php">Recuerdo mi contraseña</a><br>
      <a href="<?=$url?>/index.php"><i class="fa fa-home"></i> Casa</a>
  	</div>
</div>
<br/>
  <br/>
  <br/>
  
<?php include '../../components/template/footer.php' ?>
</body>
</html>