<?php
include('../config/session.php');

$_SESSION['warning']="Esta funcionalidad es para la version PRO";

if(!isset($_GET['contact'])){
    
    header("Location:login_User.php");
}else{
    header("Location:../../components/includes/pages/tienda.php");
}

?>