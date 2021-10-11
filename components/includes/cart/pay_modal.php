
<!-- Edit -->
<div class="modal fade" id="userconfirm"> 
    <div class="modal-dialog">
        <div class="modal-content" id="modal-confirm">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title"><b>Se va a generar un nuevo pedido de compra</b></h4>
              <h5 class="modal-title"><b>¿Desea continuar?</b></h5>
            </div>
            <div class="modal-body">
              <img src="<?=$url?>/assets/img/page/banner-mercado.png" alt="" >
              <form class="form-horizontal" method="POST" action="../sales/presale.php">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>
              <button type="submit" class="btn btn-primary btn-flat" name="confirm"><i class="fa fa-check-square-o"></i> CONFIRMAR</button>
              </form>
            </div>
        </div>
    </div>
</div>

 