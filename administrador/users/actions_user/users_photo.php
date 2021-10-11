<?php
	include '../../config/session.php';
	include '../../helpers/helpers.php';
	
 
    if (isset($_POST['upload'])) {

        $id=(isset($_POST['id'])) ? (int)($_POST['id']) : null;
		$changes = array();
        if (isset($id)) {
            //Comprobar cambios en el campo de imagen
            if (isset($_FILES['photo']['name'])  && !empty($_FILES['photo']['name'])) {
                // var_dump($_FILES['photo']);
                // die();
                $img=(isset($_FILES['photo']['name'])) ? $_FILES['photo']['name']: "";

                $date=new DateTime();
                $nameFile=($img!="")?$date->getTimestamp()."_".$_FILES["photo"]["name"]:"user.png";
      
                $tmpImg=$_FILES["photo"]["tmp_name"];
      
                if (!empty($tmpImg)) {
                  
                  // Creamos la imagen en la carpeta del sitio
                    move_uploaded_file($tmpImg, "../../assets/img/user/".$nameFile);

                    $photo_new=$nameFile;

                    $changes['photo']=$photo_new;

                    //Buscar en la base de datos si existe imagen y remplazar
                    $imgSearch= searchPhotoAdmin($conexion, $id);
        

                    if (isset($imgSearch['photo']) && ($imgSearch['photo']!="user.png")) {
                        if (file_exists("../../assets/img/user/".$imgSearch['photo'])) {

                              //Si esxiste la imagen, procedemos a borrarla del sitio
                            unlink("../../assets/img/user/".$imgSearch['photo']);
                        }
                    }
                }
            } else {
                $photo_User = searchPhotoAdmin($conexion, $id);
				
                $changes['photo']=$photo_User['photo'];

				$_SESSION['error'] = "La foto no pudo ser actualizada";
            }


			$photoUser = updatePhotouser($conexion, $id, $changes['photo']);

			$_SESSION['success'] = "La foto de usuario se actualizó con éxito";
			$_SESSION['status'] = "Actualizar foto de usuario";

        }else{
			

			$_SESSION['error'] = "El usuario no existe";
			$_SESSION['status'] = "Usuario no identificado";

		}
        // // var_dump($changes);
        // // die();
    }
	
	header('Location: ../../components/sections/users.php?section');
?>