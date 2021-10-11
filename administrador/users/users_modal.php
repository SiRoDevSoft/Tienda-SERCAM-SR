<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class=" fa fa-user"></i><b> Alta de usuario</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/users/actions_user/users_add.php" enctype="multipart/form-data">
              
                <div class="form-group has-feedback">
                    <label for="email" class="col-sm-3 control-label">Correo electrónico</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="email" name="email" required>
                      <i class="fa fa-envelope form-control-feedback"></i>
                    </div>
                </div>
                
                <div class="form-group has-feedback">
                    <label for="firstname" class="col-sm-3 control-label">Primer nombre</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="firstname" name="firstname" required>
                      <i class="fa fa-pencil form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="lastname" class="col-sm-3 control-label">Apellido</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="lastname" name="lastname" required>
                      <i class="fa fa-pencil form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="address" class="col-sm-3 control-label">Dirección</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="address" name="address">
                      <i class="fa fa-map-marker form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="contact" class="col-sm-3 control-label">Teléfono</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="contact" name="contact">
                      <i class="fa fa-phone form-control-feedback"></i>
                    </div>
                </div>
                
                <div class="form-group has-feedback">
                    <label for="password" class="col-sm-3 control-label">Contraseña</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="password" name="password" required>
                      <i class="fa fa-key form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="repassword" class="col-sm-3 control-label">Confirmar Contraseña</label>

                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="repassword" name="repassword" required>
                      <i class="fa fa-lock form-control-feedback"></i>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Guardar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><i class=" fa fa-edit"></i><b> Edición de usuario</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/users/actions_user/users_edit.php">
                <input type="hidden" class="userid" name="id">
                <div class="form-group has-feedback">
                    <label for="edit_email" class="col-sm-3 control-label">Correo electrónico</label>

                    <div class="col-sm-9">
                      <input type="email" class="form-control" id="edit_email" name="email">
                      <i class="fa fa-envelope form-control-feedback"></i>
                      
                    </div>
                </div>
            
                <div class="form-group has-feedback">
                    <label for="edit_firstname" class="col-sm-3 control-label">Nombre</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_firstname" name="firstname">
                      <i class="fa fa-pencil form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="edit_lastname" class="col-sm-3 control-label">Apellido</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_lastname" name="lastname">
                      <i class="fa fa-pencil form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="edit_address" class="col-sm-3 control-label">Direcciòn</label>

                    <div class="col-sm-9">
                    <input type="text" class="form-control" id="edit_address" name="address">
                    <i class="fa fa-map-marker form-control-feedback"></i>
                    
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="edit_contact" class="col-sm-3 control-label">Teléfono</label>

                    <div class="col-sm-9">
                      <input type="text" class="form-control" id="edit_contact" name="contact">
                      <i class="fa fa-phone form-control-feedback"></i>
                    </div>
                </div>
                <div class="form-group has-feedback">
                    <label for="password_new" class="col-sm-3 control-label">Nueva Contraseña</label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password_new">
                      <i class="fa fa-lock  form-control-feedback"></i>
                    </div>
                </div>

                <div class="form-group has-feedback">
                    <label for="password_confirm" class="col-sm-3 control-label">Confirmar </label>
                    <div class="col-sm-9"> 
                      <input type="password" class="form-control" id="password" name="password_confirm">
                      <i class="fa fa-lock form-control-feedback"></i>
                    </div>
                </div>
                <hr>
                
                <div class="form-group has-feedback">
                    <label for="curr_password" class="col-sm-3 control-label">Contraseña actual</label>
                    <div class="col-sm-9">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese la contraseña actual para confirmar cambios" required>
                      <i class="fa fa-key form-control-feedback"></i>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Eliminando...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/users/actions_user/users_delete.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>BORRAR USUARIO</p> 
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
              </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/users/actions_user/users_photo.php" enctype="multipart/form-data">
                <input type="hidden" class="userid" name="id">
                <div class="form-group">
                    <label for="photo" class="col-sm-3 control-label">Foto</label>

                    <div class="col-sm-9">
                      <input type="file" id="photo" name="photo" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Actualizar</button>
              </form>
            </div>
        </div>
    </div>
</div> 


<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Activando ...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="users_activate.php">
                <input type="hidden" class="userid" name="id">
                <div class="text-center">
                    <p>ACTIVAR USUARIO</p>
                    <h2 class="bold fullname"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activar</button>
              </form>
            </div>
        </div>
    </div>
</div> 


     