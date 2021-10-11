<?php
	include '../../../config/session.php';
	include '../../../helpers/helpers.php';

    if (isset($_POST['upload'])) {

        $id = $_POST['id'];

        $changes = array();

        if (isset($id)) {
            //Comprobar cambios en el campo de imagen
            if (isset($_FILES['photo']['name'])  && !empty($_FILES['photo']['name'])) {
                // var_dump($_FILES['photo']);
                // die();
                $img=(isset($_FILES['photo']['name'])) ? $_FILES['photo']['name']: "";

                $date=new DateTime();
                $nameFile=($img!="")?$date->getTimestamp()."_".$_FILES["photo"]["name"]:"product.png";
      
                $tmpImg=$_FILES["photo"]["tmp_name"];
      
                if (!empty($tmpImg)) {
                  
                  // Creamos la imagen en la carpeta del sitio
                    move_uploaded_file($tmpImg, "../../../assets/img/products/".$nameFile);

                    $changes['photo']=$nameFile;
					

                    //Buscar en la base de datos si existe imagen y remplazar
                    $imgSearch= searchProductPhoto($conexion, $id);

					foreach($imgSearch as $row){
						if (isset($row['photo']) && ($row['photo']!="product.png")) {
							
							if (file_exists("../../../assets/img/products/".$row['photo'])) {
								
								  //Si esxiste la imagen, procedemos a borrarla del sitio
								unlink("../../../assets/img/products/".$row['photo']);
							}
						}

					}


                }
            } else {
                $photoProd= searchProductPhoto($conexion, $id);
                
                $changes['photo']=$photoProd['photo'];

                $_SESSION['error'] = "La imagen no pudo ser actualizada";
                exit();
            }


            $photoImg = updateProductImg($conexion, $id, $changes['photo']);

            $_SESSION['success'] = "La imagen del producto se actualizó con éxito";
            $_SESSION['status'] = "Actualización de producto";


        } else {
            $_SESSION['error'] = "El producto no existe";
            $_SESSION['status'] = "Modificaciíon de productos";
        }


    }
     

	header('location: ../products.php?section');
?>