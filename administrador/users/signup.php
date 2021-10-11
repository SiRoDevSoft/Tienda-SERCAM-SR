
<?php 
        include("../../components/template/head.php");
        include("../config/conexion.php");
        include("../config/session.php");
        include ('../helpers/helpers.php');
        
        
      
    
  if(isset($_SESSION['user'])){
    header('location: ../../components/includes/views/cart_view.php');
  }

  if(isset($_SESSION['captcha'])){
    $time = time();
    if($time >= $_SESSION['captcha']){
      unset($_SESSION['captcha']);
    }
  }


    ?>

<body class="hold-transition register-page">
    <div class="register-box">

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


            <!-- SUCCESS -->

        <?php if(isset($_SESSION['success'])):?>

        <div class='callout callout-success '>
            <img src="../assets/img/icons/check-good-white.png" alt=""  width="50">   
            <p><?=$_SESSION['success']?></p>
            
        </div>
        
        <?php unset($_SESSION['success']);
            header('Refresh: 2; url=login_User.php');
            endif; ?>

       

        <div class="register-box-body">
            <p class="login-box-msg">REGISTRO USUARIO</p>
            <form action="actions_user/register.php" method="POST">
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="firstname" placeholder="Nombre completo"
                        value="<?=(isset($_SESSION['firstname'])) ? $_SESSION['firstname'] : '' ?>" required>
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="lastname" placeholder="Apellido"
                        value="<?=(isset($_SESSION['lastname'])) ? $_SESSION['lastname'] : '' ?>" required>
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" name="email" placeholder="Correo electrónico"
                        value="<?= (isset($_SESSION['email'])) ? $_SESSION['email'] : '' ?>" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="address" placeholder="Direccion"
                        value="<?= (isset($_SESSION['address'])) ? $_SESSION['address'] : '' ?>" required>
                    <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="contact" placeholder="Telefono" 
                    value="<?= (isset($_SESSION['contact'])) ? $_SESSION['contact'] : '' ?>" required>
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="repassword"
                        placeholder="Vuelva a escribir la contraseña" required>
                    <span class="glyphicon glyphicon-edit form-control-feedback"></span>
                </div>



                <?php
                if(!isset($_SESSION['captcha'])):?>

                <div class="form-group" style="width:100%;">
                    <div class="g-recaptcha" data-sitekey="6LevO1IUAAAAAFX5PpmtEoCxwae-I8cCQrbhTfM6">

                    </div>
                </div>


                <?php endif;?>
                <hr>
                <div class="row">
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="signup">
                            <i class="glyphicon glyphicon-floppy-saved"></i> Regístrate
                        </button>
                    </div>
                </div>
            </form><br/>
            <a href="login_User.php"><i class="glyphicon glyphicon-log-out"></i> Ya tengo membresia</a><br>
            <a href="<?=$url?>/index.php"><i class="fa fa-home"></i> Casa</a>
        </div>
        
        
    </div>











    <?php include('../../components/includes/scripts/script_main.php') ?>

    <!-- footer -->
    <?php include("../../components/template/footer.php"); ?>
</body>
