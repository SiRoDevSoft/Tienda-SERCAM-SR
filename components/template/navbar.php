<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a class="" href="<?=$url?>/index.php">
                    <img src="<?=$url?>/assets/img/Banners/fuenteBlanca.png"
                        class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|} me-2"
                        alt="" width="50" height="60">
                </a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>

            </div>

            <!-- Recopile los enlaces de navegación, formularios y otro contenido para alternar -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="<?=$url?>/index.php">INICIO</a></li> -->
                    <li><a href="<?=$url?>/components/includes/pages/tienda.php">TIENDA</a></li>
                    
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">PRODUCTOS <span
                                class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">

                            <!-- ******************************************************************* -->

                            <?php
                              
                            $categoryProducts= showCategoryProducts($conexion, null);
                                                                          
                             foreach ($categoryProducts as $category): ?>

                            <li>
                                <a class="dropdown-item"
                                    href="<?=$url?>/components/includes/pages/principal.php?view=<?=$category['id']?>">
                                    <?=strtoupper($category['identity'])?>
                                </a>
                            </li>

                            <?php endforeach;?>


                            <!-- ******************************************************************* -->
                        </ul>
                    </li>
                    <li><a href="<?=$url?>/components/includes/pages/nosotros.php">NOSOTROS</a></li>
                    <li><a href="<?=$url?>/components/includes/pages/contacto.php">CONTACTANOS</a></li>
                    <li><a href="<?=$url?>/components/includes/pages/servicios.php">SERVICIOS</a></li>
                </ul>
                <form method="POST" class="navbar-form navbar-left"
                    action="<?=$url?>/components/includes/views/search.php?view">
                    <div class="input-group">
                        <input type="text" class="form-control" id="navbar-search-input" name="keyword"
                            placeholder="Buscar producto" autocomplete="off" required>
                        <span class="input-group-btn" id="searchBtn" style="display:none;">
                            <button type="submit" class="btn btn-light btn-flat"><i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
            </div>
            <!-- /.navbar-colapso -->
            <!--Menú derecho de la barra de navegación-->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown messages-menu">

                        <!-- Botón de alternar menú -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="label label-success cart_count"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">¡Tienes <b><span class="cart_count"></span></b> artículo(s) en tu carrito!</li>
                            <li>
                                <ul class="menu" id="cart_menu" style="background-color: #e4e4e4;">
                                </ul>
                            </li>
                            <li class="footer"><a href="<?=$url?>/components/includes/cart/cart_view.php"><i class="fa fa-shopping-cart"></i>Ir al
                                    carrito</a></li>
                        </ul>
                    </li> 
            <?php if(isset($_SESSION['user'])): ?>
                    <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="user-image" alt="">
            <span class="hidden-xs"><?=$user['firstname'].' '.$user['lastname']?></span>
                   </a>
                   <ul class="dropdown-menu">
                     <!-- User image -->
                 <li class="user-header">
                       <img src="<?=$url?>/administrador/assets/img/user/<?=$userPhoto?>" class="img-circle" alt="">  
                    <p>
                         <?=$user['firstname'].' '.$user['lastname']?>
                   <small>Member since <?= date('M. Y', strtotime($user['date'])) ?> </small>
              </p> 
                </li>
                     <li class="user-footer">
               <div class="pull-left">
                <a href="<?=$url?>/components/includes/pages/profile.php" class="btn btn-default btn-flat">Perfil</a>
              </div>
            <div class="pull-right">
             <a href="<?=$url?>/administrador/users/actions_user/logout.php" class="btn btn-default btn-flat">Desconectar</a>
         </div>
        </li>
             </ul>
         </li> 
         <?php endif; ?>
                  
                    <?php 
            if(!isset($_SESSION['user'])): ?>

                    <li>
                        <a href='<?=$url?>/administrador/users/login_User.php'>INICIAR SESIÓN</a>
                    </li>
                    <li>
                        <a href='<?=$url?>/administrador/users/signup.php'>REGISTRATE</a>
                    </li>

                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

</header>
<!-- *************************************************************************************** -->
<!-- svg head -->
<div class="wave" style="width: 100%; height: 50px; overflow: hidden; margin-top:0; background:transparent">
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;background-color: #ecf0f5">
        <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
            style="stroke: none; fill:rgb(3 107 169);">
        </path>
    </svg>
</div>