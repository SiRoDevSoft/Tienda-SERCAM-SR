<?php
	include '../../config/session.php';
	include '../../helpers/helpers.php';

/*********************************************************** */
/*********************************************************** */
/*********************************************************** */
/*********************************************************** */
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		// $password = $_POST['password'];
		$address = $_POST['address'];
		$contact = $_POST['contact'];
		$curr_password = $_POST['curr_password'];

		$changes= array();

		if (password_verify($curr_password, $admin['password'])) {

			// Buscar datos del usuario a  modificar 
			$dataUser=showUser($conexion, $id);
			foreach($dataUser as $user){
				$password_User= $user['password'];
				$name_User =  $user['firstname'];
				$surname_User =  $user['lastname'];
				$email_User = $user['email'];
				$address_User = $user['address'];
				$contact_User = $user['contact_info'];
				$photo_User = $user['photo'];

			}

			

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
                $changes['pass'] = $password_User;
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
                $changes['firstname'] = $name_User;
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
                $changes['lastname']=$surname_User;
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
                $changes['email']=$email_User;
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
                $changes['address']=$address_User;
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
                $changes['contact']=$contact_User;
            }

            
            /************************************************************************* */

            $loadDate= updateUserData($conexion, $user['id'], $changes['firstname'], $changes['lastname'], $changes['email'],$changes['address'], $changes['contact'], $changes['pass']);
        
            $_SESSION['success'] = 'Cuenta actualizada con éxito';
        } else {
            $_SESSION['error'] = 'Contraseña incorrecta - Verifique correctamente';
        }

		
	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de edición de usuario primero';
	}
	
	header('location: ../../components/sections/users.php?section');


?>