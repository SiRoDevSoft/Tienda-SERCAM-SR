<?php
	

	include ('../../config/session.php');
	include ('../../config/conexion.php');

	if(isset($_POST['signup'])){
		
        $customer=2;
        $address=$_POST['address'];
        $contact=$_POST['contact'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];

		
		$_SESSION['firstname'] = $firstname;
		$_SESSION['lastname'] = $lastname;
		$_SESSION['email'] = $email;
		$_SESSION['contact']=$contact;
		$_SESSION['address']=$address;
		
		//fields of validation

		if(!isset($_SESSION['captcha'])){
			//Por ende al registrarse entra en esta condicion
			require('../../recaptcha/src/autoload.php');	//Llama al servicio de captchas	
			//Creamos un recaptcha virtual
			$recaptcha = new \ReCaptcha\ReCaptcha('6LevO1IUAAAAAFCCiOHERRXjh3VrHa5oywciMKcw', new \ReCaptcha\RequestMethod\SocketPost());

			$respuestaUser = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

			if (!$respuestaUser->isSuccess()){
				$_SESSION['captcha'] = time() + (10*60);
		  		// $_SESSION['error'] = 'Por favor conteste recaptcha correctamente';
		  		// var_dump($_SESSION['error']);
				// die("Hasta aca llego..");
				// header('location: ../signup.php');
		  		// exit();	
		  	}	
		  	else{
		  		$_SESSION['captcha'] = time() + (10*60);
		  	}

		}

		if($password != $repassword){
        // Creamos las sessiones de error en password incorrecta
			$_SESSION['error'] = 'Las contraseñas no coinciden';
            
			// var_dump($_SESSION['error']);
			// die("Hasta aca llego..");
			header('location: ../signup.php');
		}
		else{

			 // firstname Validation 
			 if(!empty($firstname) && !is_numeric($firstname) && !preg_match("/[0-9]/", $firstname)){
				$_SESSION['firstname'] = $firstname;
				
			}elseif (!empty($firstname)){
				
				$_SESSION['warning'] = "This name is not valid ";
			}else{
				$_SESSION['error'] = "The name field must not be empty ";
			}

			 // Lastname Validation 
			 if(!empty($lastname) && !is_numeric($lastname) && !preg_match("/[0-9]/", $lastname)){
				$_SESSION['lastname'] = $lastname;
				
			}elseif (!empty($lastname)){
				
				$_SESSION['warning'] = "This lastname is not valid ";
			}else{
				$_SESSION['error'] = "The lastname field must not be empty ";
			}
	
			//Email validation
			if(!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)){
				$_SESSION['email'] = $email;

			}elseif (!empty($email)){
				
				$_SESSION['warning'] = "This email is not valid ";
			}else{
				$_SESSION['error'] = "Email must not be empty ";
			}
	
			
			//Phone validation
			if(!empty($contact)){
				$_SESSION['contact']=$contact;
			}elseif (empty($contact)){
				
				$_SESSION['warning'] = "This phone is not valid "; 
			}

			//Address validation
			if(!empty($address)){
				$_SESSION['address']=$address;
			}elseif (empty($address)){
				
				$_SESSION['warning'] = "This address is not valid "; 
			}

			// consultar en la base de datos si existe el email que se registrará

			$stmt = $conexion->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email=:email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();

			if($row['numrows'] > 0){
				$_SESSION['warning'] = 'Correo electrónico ya existe';
				// var_dump($_SESSION['error']);
				// die("Hasta aca llego..");
				header('location: ../signup.php');
			}
			else{
				$dateRegister = date('Y-m-d');

					//Password validation
					if(!empty($password) && strlen($password)>=8){  
						
						// CIFRAR LA CONTRASEÑA
							$pass_secure = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);   
							 
							//$pass_validate = true;

					}else{

						// $pass_validate = false;
						$_SESSION['warning'] = "La contraseña no cumple con los requisitos ";
						//    var_dump($_SESSION['error']);
						//    die("Hasta aca llego..");
						header('location: ../signup.php');
					}
				

				//generate code
				$set='123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code=substr(str_shuffle($set), 0, 12);


				$queryAdd = $conexion->prepare("INSERT INTO users (type, firstname, lastname, email, address, contact_info, password, activate_code, date, status) VALUES (:type, :firstname, :lastname, :email, :address, :contact_info, :password, :code, :date, :status)");
					$queryAdd->execute(['type'=>$customer, 'firstname'=>$firstname, 'lastname'=>$lastname, 'email'=>$email, 'address'=>$address, 'contact_info'=>$contact, 'password'=>$pass_secure, 'code'=>$code, 'date'=>$dateRegister, 'status'=>1]);

				unset($_SESSION['firstname']);
				unset($_SESSION['lastname']);
				unset($_SESSION['email']);
				unset($_SESSION['address']);
				unset($_SESSION['contact']);

				$_SESSION['success'] = 'Account Created successfully';
				header('location: ../signup.php');
	

			}
 
		}

	}
	else{
		$_SESSION['error'] = 'Rellene el formulario de registro primero';
		// var_dump($_SESSION['error']);
		// die("Hasta aca llego..");
		header('location: ../signup.php');
	}

?>