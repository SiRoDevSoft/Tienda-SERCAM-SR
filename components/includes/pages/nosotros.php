<!DOCTYPE html>
<html>
<?php 
       include("../../template/head.php");
       include ('../../../administrador/config/session.php');
       include ('../../../administrador/helpers/helpers.php');
    ?>

<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

        <?php include("../../template/navbar.php"); ?>


        <div class="content-wrapper">
            <div class="container">

                <!-- Main content  col-md-offset-2"-->
                <section class="content">
                    <div class="row">

                        <div class="col-sm-8 col-md-offset-2 about">
                            <section>
                                <div class="aboutWe">
                                    <h1 class="text text-center">Acerca de nosotros</h1>
                                    <p class="lead ">
                                    SERCAM_SR es una empresa local dedicada a la distribución e implementación de sistemas integrales de seguridad electrónica, brindando a cada tipo de cliente una solución a su medida. Avalado por la experiencia de nuestra trayectoria, el espíritu comprometido de nuestro equipo y generando valor agregado en cada paso. Con el firme propósito de fortalecer la confianza de nuestros clientes y proteger sus bienes más valorados. Tenemos como misión desarrollar soluciones de sistemas de seguridad electrónica, trabajando en equipo y con vocación de venta y servicio en todas las etapas de cada proceso, con profundo respeto por el cliente y los empleados. Nuestro compromiso con el cliente es total: su satisfacción es la clave de nuestro negocio, y porque somos nacionales, estamos profundamente orgullosos de ayudar a proteger los hogares, empresas y barrios de nuestro país, invirtiendo en la seguridad de los argentinos, siempre. </p>
                                    <h2 class="text-center">Un poco de historia</h2>
                                    <p class="lead "> En 2014, SERCAM-SR fue fundado en GENERAL ALVEAR- MENDOZA
                                        apoyándose en una necesidad inmediata
                                        de poder contribuir con la sociedad con algun sistema que evite la intrusion
                                        indebida de malvivientes en los
                                        hogares. Hoy en día ofrece el Servicio de Monitoreo para hogares, comercios e
                                        industrias, comprometiéndose a
                                        brindar tranquilidad y un servicio de calidad al cliente para proteger lo más
                                        valioso: sus bienes y sus seres
                                        más queridos, las 24 horas, los 365 días del año. Equipos reconocidos mundialmente por su alta calidad, avalan la confianza de elegir sistemas de seguridad SERCAM, combinando la más avanzada tecnología con el recurso humano.</p>

                                    <h3 class="text text-center">NOS APASIONA PROTEGER LO QUE MÁS IMPORTA</h3>

                                </div>

                            </section>

                        </div>

                        <div class="col-sm-8 col-md-offset-2 about">

                            <h3 class="text-center">Nuestros canales de comunicación con el
                                Centro de Servicios al Cliente</h3>
                            <div class="img-aboutWe">
                                    <img src="<?= $url?>/assets/img/page/Lineas-Atencion.png" class="img-fluid"
                                        alt="...">    
                            </div>
                        </div>
                    </div>



                </section>

                <div class="col-sm-12">
                    <hr>
                </div>
            </div>


        </div>
    </div>




    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../../includes/scripts/script_main.php"); ?>
</body>

</html>