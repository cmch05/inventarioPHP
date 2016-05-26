<?php


if (isset($_GET['func'])) {
    
   switch ($_GET['func']) {
       case 'logout':
        //echo require(TEMPLATES . 'login/index.php');
           
           $salir = new LoginModel();
           
           $id = $_SESSION['app_id'];
           //$_SESSION['salida']= $id;
           $salir->bitacoraLogout($id);
           
           
           
        unset($_SESSION['app_id']);
           header('location: /templates/login/index.php');
        break;
   } 
    
    
    
}
//unset($_SESSION['app_id']);


//echo require 'controller/loginController.php';
//header('location: ?view=index');