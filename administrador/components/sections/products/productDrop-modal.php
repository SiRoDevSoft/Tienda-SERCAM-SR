
<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title text-center"><b>Alta de producto</b></h4>
            </div>
            <div class="modal-body">
              <form class="form-horizontal" method="POST" action="<?=$url?>/administrador/components/sections/products/highProduct.php">
                <input type="hidden" class="prodid" name="id">
                
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-success btn-flat" name="update"><i class="fa fa-check-square-o"></i> Habilitar</button>
              </form>
            </div>
        </div>
    </div>
</div>
