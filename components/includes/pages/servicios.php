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

                        <div class="col-sm-6">
                            <section>

                                <div class="box box-solid">
                                    <div class="box-header with-border">
                                        <div class="form-group">
                                            <h3 class="text-center">ENVIAR UNA SOLICITUD</h3>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <form action="<?=$url?>/administrador/users/reset.php?contact" method="POST"
                                            enctype="multipart/form-data">

                                            <div class="form-group">
                                                <label for="solicitud" class="form-label">Seleccione una Opción</label>
                                                <select class="form-select" id="option_User" name="reason">
                                                    <option selected="selected" value="-">-</option>
                                                    <option> Asesoramiento técnico</option>
                                                    <option> Baja de registro</option>
                                                    <option> Cancelación de suscripción</option>
                                                    <option> Contactar un instalador</option>
                                                    <option> Formulario Rembolso</option>
                                                    <option> Formulario Servicio Tecnico</option>
                                                    <option> Reclamo de garantía</option>                                                   
                                                </select>
                                            </div>

                                            <div class="form-group ">
                                                <label for="name" class="form-label">Nombre y apellido:</label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="name" id="name_User"
                                                        placeholder="Ingrese su nombre" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="email" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" name="email" id="email_User"
                                                    placeholder="Ingrese correo" required>
                                                <small id="emailHelp" class="form-text text-muted">@example.com</small>
                                            </div>

                                            <div class="form-group">
                                                <label for="phone" class="form-label">Teléfono de contacto</label>
                                                <input type="text" class="form-control" name="phone" id="phone_User"
                                                    placeholder="Ingrese su número de contacto" required>
                                                <small id="emailHelp" class="form-text text-muted mb-2">[sin el 0 ni el
                                                    15]</small>
                                            </div>

                                            <div class="form-group ">
                                                <label for="address" class="form-label">Dirección:</label>
                                                <div class="">
                                                    <input type="text" class="form-control" name="address"
                                                        id="address_User" placeholder="Ingrese su domicilio" required>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="exampleTextarea" class="form-label">Detalle de Servicio
                                                    Técnico</label>
                                                <textarea class="form-control" id="exampleTextarea" rows="3"
                                                    name="description">
                                                </textarea>
                                            </div>

                                            <div class="form-group">
                                                <label for="formFile" class="form-label">Cargar un Archivo</label>
                                                <input class="form-control" type="file" id="formFile" name="file">
                                                <small id="emailHelp" class="form-text text-muted">*No es
                                                    obligatorio</small>
                                            </div>

                                            <fieldset class="form-group">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" id="check"
                                                        onclick="show()">
                                                    <label class="form-check-label" for="check-Service">
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

                                            <button type="submit" id="btn" disabled class="btn btn-info">Enviar</button>
                                                                                     
                                        </form>
                                    </div>
                                </div>




                            </section>



                        </div>
                        <div class="col-sm-3">

                        </div>
                        <div class="col-sm-3">
                            <?php include("../views/sidebar.php"); ?>
                        </div>

                    </div>


                </section>
                <div class="col-sm-12">
                    <div class="col-sm-3">

                    </div>

                </div>


            </div>
        </div>
    </div>



    <!-- footer -->
    <?php include("../../template/footer.php"); ?>
    <?php include("../scripts/script_main.php"); ?>
</body>


</html>