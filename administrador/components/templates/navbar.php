<header class="main-header">
  <!-- Logo -->
  <a href="<?=$url?>/administrador/home.php" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><img src="<?=$url?>/assets/img/Banners/logo.png" alt="" width="40"></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><img src="<?=$url?>/assets/img/Banners/logo.png" alt="" width="30"><b> SERCAM-SR</b></span>
  </a>
  <!-- Barra de navegación de encabezado: el estilo se puede encontrar en header.less -->
  <nav class="navbar navbar-static-top">
    <!-- Botón de alternancia de la barra lateral-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Navegación de palanca</span>
    </a>

    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- Cuenta de usuario: el estilo se puede encontrar en el menú desplegable. -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="user-image" alt="">
           
            <span class="hidden-xs">
                <?= $admin['firstname'].' '.$admin['lastname']; ?>
            </span>
          </a>
          <ul class="dropdown-menu">
            <!-- User image -->
            <li class="user-header">
            <img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="img-circle" alt="">
              <p>
                <?= $admin['firstname'].' '.$admin['lastname']; ?>
                <small>Miembro desde <?=date('M. Y', strtotime($admin['date'])); ?></small>
              </p>
            </li>
            <li class="user-footer">
              <div class="pull-left">
                <a href="#profile" data-toggle="modal" class="btn btn-default btn-flat" id="admin_profile">Editar</a>
              </div>
              <div class="pull-right">
                <a href="<?=$url?>/administrador/users/actions_user/logout.php" class="btn btn-default btn-flat">Salir</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
<?php 
  if(!isset($_GET['section'])){
    include('./users/actions_user/profile_modal_admin.php');
  } else{
    include('../../users/actions_user/profile_modal_admin.php');
  }
 
?>