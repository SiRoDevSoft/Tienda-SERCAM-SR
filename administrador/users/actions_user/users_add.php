<?php
	include ('../../config/session.php');
	include ('../../helpers/helpers.php');


	if(isset($_POST['add'])){
        $address=$_POST['address'];
        $contact=$_POST['contact'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		
		$validation= array();

		//fields of validation

		if($password != $repassword){
        
			$_SESSION['error'] = 'Las contraseñas no coinciden';
			$_SESSION['status'] = 'Contraseña de nuevo Usuario';

			exit();
            
		}
		else{
			 // firstname Validation 
			 if(!empty($firstname) && !is_numeric($firstname) && !preg_match("/[0-9]/", $firstname)){
				
				$validation['firstname'] = $firstname;
				$_SESSION['firstname'] = $firstname;
				
			}elseif (!empty($firstname)){
				
				$_SESSION['warning'] = "El nombre no es válido";
			}else{
				$_SESSION['error'] = "El campo nombre no debe estar vacío";
			}

			 // Lastname Validation 
			 if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){

				$validation['lastname'] = $lastname;
				$_SESSION['lastname'] = $lastname;
				
			}elseif (!empty($lastname)){
				
				$_SESSION['warning'] = "El apellido no es válido";
			}else{
				$_SESSION['error'] = "El campo apelldio no debe estar vacío";
			}
	
			//Email validation
			if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){

				$emailValidate=$email;

			}elseif (!empty($email)){
				
				$_SESSION['warning'] = "El email no es válido ";
			}else{
				$_SESSION['error'] = "El campo correo no debe estar vacío";
			}
	
			
			//Phone validation
			if(!empty($contact)){
				$validation['contact'] = $contact;
				$_SESSION['contact']=$contact;
			}elseif (empty($contact)){
				
				$_SESSION['warning'] = "El teléfono no es válido"; 
			}

			//Address validation
			if(!empty($address)){

				$validation['address'] = $address;

				$_SESSION['address']=$address;

			}elseif (empty($address)){
				
				$_SESSION['warning'] = "La dirección no es válida"; 
			}

			// consultar en la base de datos si existe el email que se registrará
			
			$stmt = verifyEmail($conexion, $emailValidate);
			foreach($stmt as $row){
				$count = $row['numrows'];
			}
			

			if($count > 0){
				$_SESSION['warning'] = 'Correo electrónico ya existe';
				exit();
			}
			else{
				
				$validation['email'] = $email;
				$_SESSION['email'] = $email;

				$dateRegister = date('Y-m-d');

					//Password validation
					if(!empty($password) && strlen($password)>=8){  
						
						// CIFRAR LA CONTRASEÑA
							$pass_secure = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);   
							 
							$validation['password'] = $pass_secure;

					}else{

						$_SESSION['warning'] = "La contraseña no cumple con los requisitos ";
						exit();
					}
				

			}
 
		}

		$newUser=  newUseradd($conexion, $validation['firstname'], $validation['lastname'], $validation['email'], $validation['address'], $validation['contact'], $validation['password'], $dateRegister);

		
		unset($_SESSION['firstname']);
		unset($_SESSION['lastname']);
		unset($_SESSION['email']);
		unset($_SESSION['address']);
		unset($_SESSION['contact']);

		$_SESSION['success'] = 'Cuenta Agregada Correctamente!';
		$_SESSION['status'] = 'Alta de Usuario';
				

	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de registro primero';
		
		
	}

	header('location: ../../components/sections/users.php?section');
?>



