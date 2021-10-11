<?php
	include ('../../config/session.php');
    include ('../../helpers/helpers.php');

   

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!empty($_POST)) { //sino se encuentra vacio
          
            //Email validation
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                

                //search in database email user
                $search= loginuserEmail($conexion, $email);
                
                if (!empty($search)) {
                    foreach ($search as $user) {
                        if (!empty($user)) {
                            if ($user['status']) {  //Comprobamos si el usuario esta habilitado
                            
                                // Comprobar la contraseña con la funcion de VERIFY(pass($_POST), pass(queryPDO))
                                $verify_Pass = password_verify($password, $user['password']);

                                //Comprobar la contraseña
                                if ($verify_Pass) {
                                    $_SESSION['email']=$user['email'];
                                    $_SESSION['name'] = $user['firstname'];
                                    $_SESSION['surname'] = $user['lastname'];

                                    //utilizar una session para guardar los datos del usuario logueado
                                    if ((int)$user['type']===1) {
                                        $_SESSION['admin']=$user['id'];
                                        header("Location:../../home.php");
                                        $_SESSION['success']="<h5>Bienvenido ".$_SESSION['name'].' '. $_SESSION['surname']."</h5>";
                                        $_SESSION['status']="Inicio Exitoso!";
                                        die();
                                    } else {
                                        $_SESSION['user'] =$user['id'];
                                    
                                        header("Location:../../../components/includes/pages/tienda.php");
                                        die();
                                    }
                                } else {
                                    $_SESSION['warning']="Contraseña incorrecta";

                                    header("Location:../login_User.php");
                                }
                            } else {
                                //notificar el error
                                $_SESSION['warning']="Usuario inhabilitado";

                                header("Location:../login_User.php");
                            }
                        } else {
                            //notificar el error
                            $_SESSION['error']="Usuario no encontrado";

                            header("Location:../login_User.php");
                        }
                    }
                }else{
                    $_SESSION['warning']="Correo Electronico Incorrecto";

                    header("Location:../login_User.php");
                }
            } elseif (!empty($email)) {
                $_SESSION['warning'] = "Este email no es válido ";
                header("Location:../login_User.php");
            } else {
                $_SESSION['error'] = "El campo email no puede estar vacío";
                header("Location:../login_User.php");
            }
        } else {
            $_SESSION['error']="DATOS INCORRECTOS";

            header("Location:../login_User.php");
        }
    }else{
        $_SESSION['error']="DATOS INCORRECTOS";

        header("Location:../login_User.php");
    }

	

?>