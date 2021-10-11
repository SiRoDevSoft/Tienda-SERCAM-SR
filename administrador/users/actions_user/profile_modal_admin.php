<!-- Add -->
<div class="modal fade" id="profile">
    <div class="modal-dialog">
        <div class="modal-content">
          	<div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
              		<span aria-hidden="true">&times;</span></button>
            	<h4 class="modal-title"><b>Perfil de administrador</b></h4>
          	</div>
          	<div class="modal-body">
  
            	<form class="form-horizontal" method="POST"  enctype="multipart/form-data" action="<?=$url?>/administrador/users/actions_user/profile_Admin_EDIT.php"> 
              <!-- [[?return=<= basename($_SERVER['PHP_SELF']); ?>]] una boludez para devolver el nombre de la pagina de administrador -->
             
          		  <div class="form-group">
                  	<label for="email" class="col-sm-4 control-label">Correo electrónico</label>

                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="email" name="email" value="<?=$admin['email']; ?>">
                      
                  	</div>
                </div>
                
                <div class="form-group">
                  	<label for="firstname" class="col-sm-4 control-label">Primer nombre</label>

                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="firstname" name="firstname" value="<?= $admin['firstname']; ?>" >
                      
                  	</div>
                </div>
                <div class="form-group">
                  	<label for="lastname" class="col-sm-4 control-label">Apellido</label>

                  	<div class="col-sm-7">
                    	<input type="text" class="form-control" id="lastname" name="lastname" value="<?= $admin['lastname']; ?>">
                      
                  	</div>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-sm-4 control-label">Foto:</label>

                    <div class="col-sm-7">
                      <input type="file" id="photo" name="photo">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_new" class="col-sm-4 control-label">Nueva Contraseña</label>
                    <div class="col-sm-7"> 
                      <input type="password" class="form-control" id="password" name="password_new">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password_confirm" class="col-sm-4 control-label">Confirmar Contraseña</label>
                    <div class="col-sm-7"> 
                      <input type="password" class="form-control" id="password" name="password_confirm">
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label for="curr_password" class="col-sm-3 control-label">contraseña actual:</label>

                    <div class="col-sm-8">
                      <input type="password" class="form-control" id="curr_password" name="curr_password" placeholder="Ingrese la contraseña actual para confirmar cambios" required>
                    </div>
                </div>
          	</div>
          	<div class="modal-footer">
            	<button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
            	<button type="submit" class="btn btn-success btn-flat" name="save"><i class="fa fa-check-square-o"></i> Guardar</button>
            	</form>
          	</div>
        </div>
    </div>
</div>