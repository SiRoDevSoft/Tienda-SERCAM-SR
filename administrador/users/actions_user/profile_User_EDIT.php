<?php
	include ('../../config/session.php');
    include ('../../helpers/helpers.php');
  

	/********************************************************************* */

    if (isset($_POST['edit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        // $photo = $_FILES['photo']['name'];
        $curr_password = $_POST['curr_password'];
        

        $changes= array();

        // Verificar si es el usuario correcto para realizar cambios
        if (password_verify($curr_password, $user['password'])) {

            /******************************************************************* */
            // Comprobar cambios de contraseña
            if (isset($_POST['password_new']) && !empty($_POST['password_new'])) {
                $password_new = $_POST['password_new'];
                $password_confirm = $_POST['password_confirm'];


                if (!isset($password_confirm) || empty($password_confirm)) {
                    $_SESSION['error'] = 'Debe confirmar la contraseña';
                }

                if ($password_new === $password_confirm) {
                    if (strlen($password_new)>=8) {

                        // CIFRAR LA CONTRASEÑA
                        $pass_new = password_hash($password_new, PASSWORD_BCRYPT, ['cost'=>4]);
                        $changes['pass']=$pass_new;
                    } else {
                        $_SESSION['warning'] = 'La contraseña no cumple con los requisitos';
                    }
                } else {
                    $_SESSION['error'] = 'Las contraseñas no coinciden';
                }
            } else {
                $changes['pass'] = $user['password'];
            }
            
            /******************************************************************* */

            // Comprobar cambios en el campo nombre
            if ($firstname !== $user['firstname']) {

                //validation firstname
                if (!empty($firstname) && !is_numeric($firstname) && !preg_match("/[0-9]/", $firstname)) {
                    $firstname_new = $firstname;
                    $changes['firstname']=$firstname_new;
                } elseif (!empty($firstname)) {
                    $_SESSION['warning'] = "El nombre no es valido ";
                } else {
                    $_SESSION['error'] = "El campo nombre no debe estar vacio ";
                }
            } else {
                // $firstname_new=null;
                $changes['firstname'] = $user['firstname'];
            }

            /******************************************************************* */

            // Comprobar cambios en el campo apellido
            if ($lastname!==$user['lastname']) {

                //validation lastname
                if (!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)) {
                    $lastname_new = $lastname;
                    $changes['lastname']=$lastname_new;
                } elseif (!empty($lastname)) {
                    $_SESSION['warning'] = "El apellido no es valido";
                } else {
                    $_SESSION['error'] = "El campo apellido no debe estar vacio";
                }
            } else {
                // $lastname_new=null;
                $changes['lastname']=$user['lastname'];
            }

            /******************************************************************* */

            // Comprobar cambios en el campo email
            if ($email != $user['email']) {
                //Email validation
                if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $email_new=$email;
                    $changes['email']=$email_new;
                } elseif (!empty($email)) {
                    $_SESSION['warning'] = "Este email no es valido ";
                } else {
                    $_SESSION['Error'] = "El campo email no debe estar vacio";
                }
            } else {
                // $email_new=null;
                $changes['email']=$user['email'];
            }

            
            /******************************************************************* */

            // Comprobar cambios en el campo address

            if ($address != $user['address']) {

                //Address validation
                if (!empty($address) && strlen($address)>=5) {
                    $address_new=$address;
                    $changes['address']=$address_new;
                } elseif (!empty($address)) {
                    $_SESSION['warning'] = "Este Dirección no es valido ";
                } else {
                    $_SESSION['Error'] = "El campo dirección no debe estar vacio";
                }
            } else {
                $changes['address']=$user['address'];
            }

            
            /******************************************************************* */
            // Comprobar cambios en el campo contact

            if ($contact != $user['contact_info']) {

                //Contact validation
                if (!empty($contact) && strlen($contact)>=5) {
                    $conctact_new=$contact;
                    $changes['contact']=$conctact_new;
                } elseif (!empty($address)) {
                    $_SESSION['warning'] = "Esta información de contacto no es válido ";
                } else {
                    $_SESSION['Error'] = "El campo de información de contacto no debe estar vacío";
                }
            } else {
                $changes['contact']=$user['contact_info'];
            }

            
            /******************************************************************* */

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
                    $imgSearch= searchPhotoAdmin($conexion, $user['id']);
					

                    if (isset($imgSearch['photo']) && ($imgSearch['photo']!="user.png")) {
                        if (file_exists("../../assets/img/user/".$imgSearch['photo'])) {

                                //Si esxiste la imagen, procedemos a borrarla del sitio
                            unlink("../../assets/img/user/".$imgSearch['photo']);
                        }
                    }
                }
            } else {
                // $photo_null=null;
                $changes['photo']=$user['photo'];
            }

			// var_dump($changes);
			// die(); 


            $loadDate= updateUser($conexion, $user['id'], $changes['firstname'], $changes['lastname'], $changes['email'],$changes['address'], $changes['contact'], $changes['photo'], $changes['pass']);
        
            $_SESSION['success'] = 'Cuenta actualizada con éxito';
        } else {
            $_SESSION['error'] = 'Contraseña incorrecta - Verifique correctamente';
        }



    }

	header('Location:../../../components/includes/pages/profile.php');






	// 	if(password_verify($curr_password, $user['password'])){
	// 		if(!empty($photo)){
	// 			move_uploaded_file($_FILES['photo']['tmp_name'], 'images/'.$photo);
	// 			$filename = $photo;	
	// 		}
	// 		else{
	// 			$filename = $user['photo'];
	// 		}

	// 		if($password == $user['password']){
	// 			$password = $user['password'];
	// 		}
	// 		else{
	// 			$password = password_hash($password, PASSWORD_DEFAULT);
	// 		}

	// 		try{
	// 			$stmt = $conn->prepare("UPDATE users SET email=:email, password=:password, firstname=:firstname, lastname=:lastname, contact_info=:contact, address=:address, photo=:photo WHERE id=:id");
	// 			$stmt->execute(['email'=>$email, 'password'=>$password, 'firstname'=>$firstname, 'lastname'=>$lastname, 'contact'=>$contact, 'address'=>$address, 'photo'=>$filename, 'id'=>$user['id']]);

	// 			$_SESSION['success'] = 'Cuenta actualizada con éxito';
	// 		}
	// 		catch(PDOException $e){
	// 			$_SESSION['error'] = $e->getMessage();
	// 		}
			
	// 	}
	// 	else{
	// 		$_SESSION['error'] = 'Contraseña incorrecta';
	// 	}
	// }
	// else{
	// 	$_SESSION['error'] = 'Rellene el formulario de edición primero';
	// }

	// header('location: profile.php');

?>