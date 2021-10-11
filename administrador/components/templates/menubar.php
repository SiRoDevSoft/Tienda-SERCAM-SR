<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel"> 
    <br/>
      <div class="pull-left image">
        <img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="img-circle" alt="">
      </div>
      <div class="pull-left info">
        <p>
          <?= $admin['firstname'].' '.$admin['lastname']; ?>
        </p>
        <a><i class="fa fa-circle text-success"></i> Online</a>
        <br/>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
     <!-- MENU PRINCIPAL -->
    <li class="header">PRINCIPAL</li>
      <li><a href="<?=$url?>/administrador/home.php"><i class="fa fa-desktop"></i><span>Escritorio</span></a></li>
      <li class="treeview">
      <li class="header">INFORMES</li> 
         <!-- items -->
      <li class="treeview">
        <a href="#">       
      <i class="fa fa-money"></i>
          <span>Consultar ventas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li><a href="<?=$url?>/administrador/components/sections/sales.php?section">
      <i class="fa fa-shopping-cart"></i><span>Ventas</span></a></li>
      </ul>
      <!-- separar items-->
      <li class="treeview">
        <a href="#"> <i class="fa fa-id-card"></i></i> <span>Transacciones</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!--subItems  -->
        <ul class="treeview-menu">
      <li><a href="<?=$url?>/administrador/components/sections/transactions.php?section">
      <i class="fa fa-calendar"></i><span>Pagos pendientes</span></a></li>
      </ul>

      <!-- separar items-->
      <li class="treeview">
        <a href="#"> <i class="fa fa-calculator"></i> <span>Calendario</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!--subItems  -->
        <ul class="treeview-menu">
      <li><a href="<?=$url?>/administrador/components/sections/sales.php?section">
      <i class="fa fa-calendar"></i> <span>ventas por fechas</span></a></li>
      </ul>
      <!-- separar -->
      
      <li class="header">GESTIONAR</li>
      <li class="treeview">
        <a href="#">       
      <i class="fa fa-universal-access"></i>
          <span>Acceso</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
      <li><a href="<?=$url?>/administrador/components/sections/users.php?section">
      <i class="fa fa-user"></i> Usuarios</a></li>
      </ul>
      <!-- new items -->
      <li class="treeview">
        <a href="#">
        <i class="fa fa-inbox"></i>
          <span>Cartera</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=$url?>/administrador/components/sections/customers.php?section">
          <i class="fa fa-book"></i> Clientes</a></li>
        </ul>
      </li>
      <!-- separar -->
      <li class="treeview">
        <a href="#">
        <i class="fa fa-flag"></i>
          <span>Almacen</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?=$url?>/administrador/components/sections/category.php?section">
          <i class="fa fa-clipboard"></i> Categorías</a></li>
          <li><a href="<?=$url?>/administrador/components/sections/products.php?section">
          <i class="fa fa-barcode"></i> Productos</a></li>
          <li><a href="<?=$url?>/administrador/components/sections/stock.php?section">
          <i class="fa fa-exchange"></i> Stock</a></li>
        </ul>
      </li>
         <!-- separar -->
        <li class="treeview">
        <a href="#">       
      <i class="fa fa-archive"></i>
          <span>Bajas</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="<?=$url?>/administrador/components/sections/usersDrop.php?section"><i class="fa fa-circle-o"></i> Usuarios</a></li>
        <li><a href="<?=$url?>/administrador/components/sections/productDrop.php?section"><i class="fa fa-circle-o"></i> Productos</a></li>
      </ul>
      
      <li class="header">SOLICITAR</li>
      <li class="treeview.menu">
      <a href="#"><i class="fa fa-question-circle"></i> <span>Ayuda</span><small class="label pull-right bg-yellow">PDF</small></a>  
      </li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>