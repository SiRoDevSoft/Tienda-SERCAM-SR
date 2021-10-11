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
                <section class="content contact" >
                    <div class="row">

                        <div class="container">
                            <div class="col-md-12 ">
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <h3>Solicitá un asesor de SERCAM</h3>
                                    <hr class="">
                                    <form action="<?=$url?>/administrador/users/reset.php?contact" method="POST">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1" class="form-label">Nombre y
                                                Apellido</label>
                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-describedby="emailHelp" placeholder="Ingrese nombre">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="form-label">Correo Electrónico</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-describedby="emailHelp" placeholder="Ingrese Email">
                                            <small id="emailHelp" class="form-text text-muted">@example.com</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="phone" class="form-label">Teléfono</label>
                                            <input type="text" class="form-control" id="phone" name="phone"
                                                aria-describedby="emailHelp" placeholder="Ingrese Teléfono">
                                            <small id="emailHelp" class="form-text text-muted">[Sin el 0 ni el
                                                15]</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleTextarea" class="form-label">Detalle de
                                                consulta</label>
                                            <textarea class="form-control" id="exampleTextarea" rows="3"
                                                name="description"></textarea>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="check" onclick="show()">
                                            <label class="form-check-label" for="flexCheckDefault">
                                            <small class="form-text text-muted">Este formulario recoge su
                                                            nombre, dirección de correo
                                                            electrónico y otra información personal. Por favor, lea
                                                            nuestra <cite title="Source Title"><a href="">Declaración de
                                                                    Privacidad</a></cite>para información
                                                            sobre cómo proteger y administrar sus datos personales. Al
                                                            completar este formulario y
                                                            presentar su información,confirma que ha revisado y aceptado
                                                            nuestros términos de
                                                            privacidad, así como nuestros términos de cookie.
                                                        </small>
                                            </label>
                                        </div>
                                        </fieldset>
                                        <button type="submit" id="btn" disabled
                                            class="btn btn-primary">Contactarnos</button>
                                        </fieldset>
                                       
                                        <hr>

                                    </form>
                                </div>
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