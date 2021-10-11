<!DOCTYPE html>
<html>

<?php include './administrador/config/session.php'; ?>
<?php include './administrador/helpers/helpers.php'; ?>
<?php include './components/template/head.php'; ?>

<body class="hold-transition skin-blue layout-top-nav">
	<div class="wrapper">
<!-- ********************** -->
<!-- ********************** -->
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
		 <li class="dropdown messages-menu">

<!-- Botón de alternar menú -->
<a href="#" class="dropdown-toggle" data-toggle="dropdown">
<span class="glyphicon glyphicon-user" style="font-size:15px"></span>
	<span class="label label-success"></span>
</a>
<ul class="dropdown-menu" style="width: 5%; background:#959dbbb5">
	
	<li>
	<a href='<?=$url?>/administrador/users/login_User.php'><span class="glyphicon glyphicon-share"></span>INICIAR SESIÓN</a>
	</li>
	<li>
	<a href='<?=$url?>/administrador/users/signup.php'><i class="fa fa-edit"></i> REGISTRARSE</a>
	</li>
</ul>
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
    <svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;background: linear-gradient(to right, #fffafa, #a5b7c7);">
        <path d="M0.00,49.98 C149.99,150.00 271.49,-49.98 500.00,49.98 L500.00,0.00 L0.00,0.00 Z"
            style="stroke: none; fill:rgb(3 107 169);">
        </path>
    </svg>
</div>

<!-- ********************** -->
<!-- ********************** -->
	

		<div class="header"></div>
		<div class="headers">
			<h1 class="titleMain">SERCAM-SR</h1>
			<h2 class="slogan">Seguridad de confianza</h2>
		</div>

		<div class="content-wrapper">
			<div class="container">
				<!-- Main content -->
				<section class="content secmain">
					<div class="row">
						<div class="col-sm-12 main">
							<section>
								<div class="container-about-we">
									<div class="col-sm-12">
										<div class="col-sm-6">
											<img src="./assets/img/page/About-we2.png" alt="" class="image-about-us">
										</div>
										<div class="col-sm-6">
											<h2 class="title-head">¿Por qué elegir <b>SERCAM-SR</b> Alarmas?</h2>
											<h3><span>1</span> SERCAM-SR es seguridad 24hs 365 días.</h3>
											<p>Brindamos protección a hogares y comercios, las 24 horas del día, los 7
												días de la semana, los
												365 días del año. Contamos con una central de monitoreo de alta
												tecnología y especialistas
												altamente capacitados para otorgarle un servicio de primera calidad en
												la región de General
												Alvear, Mendoza.</p>
											<h3><span>2</span> Seguridad de confianza</h3>
											<p>Somos sinónimo de confianza y tranquilidad, gracias a nuestras soluciones
												de protección que se
												adaptan a las necesidades tanto de hogares como de empresas.</p>
										</div>

									</div>


								</div>
							</section>
						</div>
					</div>
				</section>
			</div>
		</div>
		<section class="portfolio">
			<div class="containers">
				<h2 class="title-products" id="Products">SERVICIOS AL CLIENTE</h2>
				<div class="galeria-port">
					<div class="image-port">
						<img src="./assets/img/page/Alarmas.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/principal.php?view=1">
								<p>Sistemas de Alarmas</p>
							</a>
						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Camaras.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/principal.php?view=2">
								<p>Videovigilancia</p>
							</a>
						</div>

					</div>
					<div class="image-port">
						<img src="./assets/img/page/Control-Acceso.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/principal.php?view=3">
								<p>Control de Acceso</p>
							</a>

						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Incendio.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/principal.php?view=4">
								<p>Sistemas contra Incendios</p>
							</a>
						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Servicio-Tecnico.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/servicios.php">
								<p>Servicio Técnico</p>
							</a>
						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Anti-Mascotas.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/principal.php?view=1">
								<p>Sistemas de Intrusion </p>
							</a>
						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Pagos.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="#">
								<p>Medios de Pagos</p>
							</a>
						</div>
					</div>
					<div class="image-port">
						<img src="./assets/img/page/Manual.png" alt="">
						<div class="hover-galeria">
							<img src="./assets/img/page/Cursor.png" alt="">
							<a href="<?=$url?>/components/includes/pages/descargas.php">
								<p>Manual de Uso</p>
							</a>

						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="customers">
			<div class="container">
				<h2 class="titlecustomers">¿QUÉ DICEN NUESTROS CLIENTES?</h2>
				<div class="target">
					
							<!-- items cards customers -->
							
					<div class="card_customers">
						<div class="cards">
							<img src="./assets/img/page/ianh.jpg" alt="">
								<div class="container-text-card">
								<h4>Priscila Martinez</h4>
								<p>Estamos muy satisfechos con SERCAM-SR por su
								responsabilidad y dediación para con nosotros. 100% Recomensables. Los chicos del servicio técnico
								son muy amables y prolijos. Excelente.
								</p>
								</div>
							</div>
					</div>
				</div>
					</div>
				</div>

			</div>
		</section>
		<div class="content-wrapper">
			<div class="container">
				
			<div class="title-head-end text-center text-aqua">
				<h1>Promociones todos los días</h1>
			<?php include 'components/includes/views/carousel_II.php'; ?>
			</div>
		</div>
	</div>

</body>
	<?php include 'components/template/footer.php'; ?>
	

	<?php include 'components/includes/scripts/script_main.php'; ?>



</html>