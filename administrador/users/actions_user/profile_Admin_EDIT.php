<?php
	include ('../../config/session.php');
    include ('../../helpers/helpers.php');


	if (isset($_POST['save'])){

		$email = $_POST['email'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$curr_password = $_POST['curr_password'];

		$changes= array();

		// Verificar si es el usuario correcto para realizar cambios
        if (password_verify($curr_password, $admin['password'])) {

			/******************************************************************* */

			// Comprobar cambios de contraseña
            if (isset($_POST['password_new']) && !empty($_POST['password_new'])) {

                $password_new = $_POST['password_new'];
                $password_confirm = $_POST['password_confirm'];


                if (!isset($password_confirm) || empty($password_confirm)) {

                    $_SESSION['error'] = 'Debe confirmar la contraseña';
					
                }

                if ($password_new === $password_confirm) {

					if(strlen($password_new)>=8){

						// CIFRAR LA CONTRASEÑA
						$pass_new = password_hash($password_new, PASSWORD_BCRYPT, ['cost'=>4]);
						$changes['pass']=$pass_new;
						

					}else{
						$_SESSION['warning'] = 'La contraseña no cumple con los requisitos';
						$_SESSION['status'] = "Advertencia";
						
					}

                
                } else {
                    $_SESSION['error'] = 'Las contraseñas no coinciden';
					
                }
            }else{
				
				$changes['pass'] = $admin['password'];

			}
			
			/******************************************************************* */

			// Comprobar cambios en el campo email
			if($email != $admin['email']){
				//Email validation
				if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){

					$email_new=$email;
					$changes['email']=$email_new;

				}elseif (!empty($email)){
					
					$_SESSION['warning'] = "Este email no es valido ";
					
				}else{
					$_SESSION['warning'] = "El campo email no debe estar vacio";
					
				}

			}else{
				// $email_new=null;
				$changes['email']=$admin['email'];
			}

			/******************************************************************* */

			// Comprobar cambios en el campo nombre
			if($firstname !== $admin['firstname']){

				//validation firstname
				if(!empty($firstname) && !is_numeric($firstname) && !preg_match("/[0-9]/", $firstname)){

					$firstname_new = $firstname;
					$changes['firstname']=$firstname_new;
					
				}elseif (!empty($firstname)){
					
					$_SESSION['warning'] = "El nombre no es valido ";
					
				}else{
					$_SESSION['warning'] = "El campo nombre no debe estar vacio ";
					
				}

			}else{
				// $firstname_new=null;
				$changes['firstname'] = $admin['firstname'];
			}

			/******************************************************************* */

			// Comprobar cambios en el campo apellido
			if($lastname!==$admin['lastname']){

				//validation lastname
				if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){
					$lastname_new = $lastname;
					$changes['lastname']=$lastname_new;
					
				}elseif (!empty($lastname)){
					
					$_SESSION['warning'] = "El apellido no es valido";
					
				}else{
					$_SESSION['warning'] = "El campo apellido no debe estar vacio";
					
				}

			}else{
				// $lastname_new=null;
				$changes['lastname']=$admin['lastname'];
			}

			/******************************************************************* */

			//Comprobar cambios en el campo de imagen
			if(isset($_FILES['photo']['name'])  && !empty($_FILES['photo']['name'])){
				// var_dump($_FILES['photo']);
				// die();
				$img=(isset($_FILES['photo']['name'])) ? $_FILES['photo']['name']: "";

				$date=new DateTime();
				$nameFile=($img!="")?$date->getTimestamp()."_".$_FILES["photo"]["name"]:"user.png";
		
				$tmpImg=$_FILES["photo"]["tmp_name"];
		
				if(!empty($tmpImg)){
					
					// Creamos la imagen en la carpeta del sitio
					move_uploaded_file($tmpImg,"../../assets/img/user/".$nameFile);

					$photo_new=$nameFile;

					$changes['photo']=$photo_new;

					//Buscar en la base de datos si existe imagen y remplazar
					$imgSearch= searchPhotoAdmin($conexion, $admin['id']);

					if (isset($imgSearch['photo']) && ($imgSearch['photo']!="user.png")) {

							if(file_exists("../../assets/img/user/".$imgSearch['photo'])){

								//Si esxiste la imagen, procedemos a borrarla del sitio
								unlink("../../assets/img/user/".$imgSearch['photo']);
			
							}
					}

				}



			}else{
				// $photo_null=null;
				$changes['photo']=$admin['photo'];
			}

			/******************************************************************* */

			$loadDate= updateAdmin($conexion, $admin['id'], $changes['firstname'], $changes['lastname'], $changes['email'], $changes['photo'], $changes['pass']);
			$_SESSION['status']="Excelente!";
			$_SESSION['success'] = 'Cuenta actualizada con éxito';

			

        } else{

			$_SESSION['error'] = 'Contraseña incorrecta - Verifique correctamente';
			$_SESSION['status'] = "Error de autentificación";

			
		}
		
		
			

		
		
	}

	header('Location:../../home.php');

?>