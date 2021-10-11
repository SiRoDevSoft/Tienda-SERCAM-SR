<!-- Modal-->
<?php include('../../../administrador/config/session.php');?>

<div class="modal fade" id="payCart">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                  <h2 class="bold text-blue text-center"> Confirmación de Pago <?=$user['firstname']?></h2>
                  <img src="<?=$url?>/assets/img/banners/mp.png" alt="" width="100%">
            </div>
            <div class="modal-body">
              <?php
              
               $stmt = totalPay_cart($conexion,$user['id']);
	            // $stmt->execute(['user_id'=>$user['id']]); 
              // $row = $stmt->fetch();
              $totalPay=$stmt[0]['total'];
              // // Insetar datos en la tabla ventas
              // $user=(int)$row['user'];
              // $description="productos";
              // $neto=(int)$row['neto'];
              // $tax=(int)$row['tax'];
              // $total=(int)$row['total'];

              // $insert = $conexion->prepare("INSERT INTO sales (id, user_id, net_pay, tax, full_payment, status) VALUES (NULL, $user,$neto, $tax, $total,0);");
              // $insert->execute();




              $productss=[
                'name' => "Seguridad 'SERCAM-SR'",
                'cantidad'=>1,
                'precio'=>$totalPay
                 ];
                 
                    $preference = new MercadoPago\Preference();

                    $item = new MercadoPago\Item();

                    $item->unit_price = $productss['precio'];
                    $item->title = $productss['name'];
                    $item->quantity = $productss['cantidad'];

                    $preference->items = array($item);
                    $preference->save();

                    $preference->back_urls = array(
                      "success" => "https://localhost//TIENDA-ONLINE/Site_WEB/components/includes/pages/venta.php",
                      "failure" => "http://www.tu-sitio/failure",
                      "pending" => "http://www.tu-sitio/pending"
                  );
                  $preference->auto_return = "approved";

           ?>
              <h4 class="text-center"><b>Total a pagar: $<?=number_format($totalPay, 2)?></b></h4>

                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Cerrar</button>

              <a href="<?=$preference->init_point?>"  role="buttom" class="btn btn-success btn-flat"><i class="fa fa-check-square-o"></i> PAGAR </a>
            </div>
        </div>
    </div>
</div>
