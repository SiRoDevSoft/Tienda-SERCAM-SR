<!-- Transaction History -->
<div class="modal fade" id="transaction">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Detalles completos de la transacción</b></h4>
            </div>
            <div class="modal-body">
              <p>
                Date: <span id="date"></span>
                <span class="pull-right">Transaction#: <span id="transid"></span></span> 
              </p>
              <table class="table table-bordered">
                <thead>
                  <th>Producto</th>
                  <th>Precio</th>
                  <th>Cantidad</th>
                  <th>Subtotal</th>
                </thead>
                <tbody id="detail">
                  <tr>
                    <td colspan="3" align="right"><b>Total</b></td>
                    <td><span id="total"></span></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
        </div>
    </div>
</div>


<!-- *************************************************************** -->

<!--                      Edit Profile                                -->

<!-- *************************************************************** -->

<div class="modal fade" id="edit"> 
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><span class="glyphicon glyphicon-user"></span><b> Datos Personales</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/users/actions_user/profile_User_EDIT.php" enctype="multipart/form-data">
                <div class="form-group has-feedback">
                    <label for="firstname" class="col-sm-3 control-label">Primer nombre </label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user['firstname']; ?>">
                    <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="lastname" class="col-sm-3 control-label">Apellido</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user['lastname']; ?>">
                      <span class="glyphicon glyphicon-pencil form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="email" class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="email" name="email" value="<?= $user['email']; ?>">
                      <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="contact" class="col-sm-3 control-label">Datos de contacto</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact" value="<?= $user['contact_info']; ?>">
                      <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="address" class="col-sm-3 control-label">Direcciòn</label>
                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address" value="<?=$user['address']; ?>">
                      <span class="glyphicon glyphicon-map-marker form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Foto</label>
                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
               
                <div class="form-group has-feedback">
                    <label for="password_new" class="col-sm-3 control-label">Nueva Contraseña</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password_new">
                      <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="password_confirm" class="col-sm-3 control-label">Confirmar </label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password_confirm">
                      <span class="glyphicon glyphicon-retweet form-control-feedback"></span>
                    </div>
                </div>
                <hr>
                
                <div class="form-group has-feedback">
                    <label for="curr_password" class="col-sm-3 control-label">Contraseña actual</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese la contraseña actual para confirmar cambios" required>
                      <span class="glyphicon glyphicon-edit form-control-feedback"></span>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>