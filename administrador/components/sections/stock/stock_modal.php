<!-- addProduct -->
<div class="modal fade" id="addnewProduct">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><i class="fa fa-plus"></i><b> Agregar nuevo producto</b></h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="POST"
          action="<?=$url?>/administrador/components/sections/stock/products_add.php" enctype="multipart/form-data">
          <div class="form-group  has-feedback">
            <label for="name" class="col-sm-1 control-label">Nombre</label>

            <div class="col-sm-5">
              <input type="text" class="form-control" id="name" name="name" required>
              <i class="fa fa-pencil form-control-feedback"></i>
            </div>

            <label for="category" class="col-sm-1 control-label">Categoría</label>

            <div class="col-sm-5">
              <select class="form-control" id="category" name="category" required>
                <option value="" selected>- Seleccione -</option>
              </select>
            </div>
          </div>
          <div class="form-group has-feedback">
            <label for="price_init" class="col-sm-2 control-label">Precio Compra</label>

            <div class="col-sm-4">
              <input type="text" class="form-control" id="price" name="price" required>
              <i class="fa fa-dollar form-control-feedback"></i>
            </div>

            <label for="photo" class="col-sm-1 control-label">Foto</label>

            <div class="col-sm-5">
              <input type="file" id="photo" name="photo">
            </div> 
            
          </div>
          <!-- ********************************************* -->
          <div class="form-group  has-feedback">
            <label for="price_sale" class="col-sm-2 control-label">Precio Venta</label>

            <div class="col-sm-4">
              <input type="text" class="form-control" id="price_sale" name="price_sale" required>
              <i class="fa fa-dollar form-control-feedback"></i>
            </div>
            <label for="iva" class="col-sm-1 control-label">IVA: <i class="fa fa-percent"></i></label>

            <div class="col-sm-2">
              <select class="form-control" id="iva" name="iva" required>
                <option value="" selected></option>    
              </select>
              
            </div>
            <label for="iva" class="col-sm-1 control-label">STOCK:</label>

            <div class="col-sm-2">
            <input type="number" class="form-control" name="stock" required>
              
            </div>
 
          </div>
          <!-- ********************************************* -->

          <p><b>Descripción</b></p>
          <div class="form-group">
            <div class="col-sm-12">
              <textarea id="editor1" name="description" rows="10" cols="80" required></textarea>
            </div>

          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i
            class="fa fa-close"></i>
          Cerrar</button>
        <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"> </i> Guardar</button>
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
                  <h3 class="modal-title bold name text-center"></h3>
            </div>
            <tr>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/components/sections/stock/product_edit.php">
                <input type="hidden" class="prodid" name="id">
                <div class="form-group">
                    <label for="edit_stock" class="col-sm-5 control-label "> STOCK</label>

                    <div class="col-sm-3">
                      <input type="number" class="form-control" id="edit_stock" name="quantity">
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
              <h4 class="modal-title"><b>Eliminando ...</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/components/sections/stock/product_delete.php">
                <input type="hidden" class="prodid" name="id">
                <div class="text-center">
                    <p>BORRAR PRODUCTO</p>
                    <h2 class="bold name"></h2>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
              <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Eliminar</button>
              </form>
            </div>
        </div>
    </div>
</div>
<!-- Description -->

<div class="modal fade" id="description">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><b><span class='name'></span></b></h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-9">
          <p id="desc"></p>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn-flat pull-left" data-dismiss="modal"><i
            class="fa fa-close"></i> Cerrar</button>
      </div>
    </div>
  </div>
</div>
