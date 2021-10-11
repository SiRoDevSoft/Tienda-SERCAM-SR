

                // 
                // foreach($showPresale as $row):

                //   $query=totaldetailPresale($conexion,$row['user_id']);

                //   foreach($query as $detail){
                //     $presale=$detail['idPresale'];
                //     $user=$detail['name'];
                //     $quantity=$detail['quantity'];
                //     $neto=$detail['net_pay'];
                //     $total=$detail['total'];
                //     $statusPresale=$detail['transac'];
                //     $datePresale = $detail['date'];
                //   }
                  $active= (!$statusPresale) ? `<span class="pull-right"><a href="#activate" class="status" data-toggle="modal" data-id=""><i class="fa fa-check-square-o"></i></a></span>` : '';
                //   $status = ($statusPresale) ? '<span class="label label-warning">En processo</span>' : '<span class="label label-info">Finalizado</span>'; 
                  ?>
                
                  <tr>
                    <td class='hidden'></td>
                    <td><?=date('M d, Y', strtotime($row['date']))?></td>
                    <td><?=$user?></td>
                    <td><?=$status.' '.$active?></td>
                    <td>&#36; <?=number_format($total, 2)?></td>
                    
                 
                    
                    
                    
                    <td><button type='button' class='btn btn-primary btn-sm btn-flat ' data-id='".$row['id']."'><i class='fa fa-pencil'></i> Ver</button></td>
                  </tr>
               

                <php endforeach; 







                      // $stmt = $conexion->prepare("SELECT *, P.id AS id FROM presale P INNER JOIN users U ON P.user_id=U.id ORDER BY P.date DESC");
                      // $stmt->execute();
                      // foreach($stmt as $row){
                      //   $stmt = $conexion->prepare("SELECT * FROM detail_presale D LEFT JOIN products P ON P.id=D.product_id WHERE D.presale_id=:id");
                      //   $stmt->execute(['id'=>$row['id']]);
                      //   $total = 0;
                      //   foreach($stmt as $detail){
                      //     $subtotal = $detail['price_sale']*$detail['quantity']; 
                      //     $total += $subtotal;
                      //   }
                      //   echo "
                      //     <tr>
                      //       <td class='hidden'></td>
                      //       <td>".date('M d, Y', strtotime($row['date']))."</td>
                      //       <td>".$row['firstname'].' '.$row['lastname']."</td>
                      //       <td>".$row['status']."</td>
                      //       <td>&#36; ".number_format($total, 2)."</td>
                      //       <td><button type='button' class='btn btn-info btn-sm btn-flat ' data-id='".$row['id']."'><i class='fa fa-search'></i> Ver</button></td>
                      //     </tr>
                      //   ";
                      // }
                    
                  ?>