<?php


if (isset($_GET['func'])) {
    
   switch ($_GET['func']) {
       case 'logout':
        unset($_SESSION['app_id']);
        //echo require(TEMPLATES . 'login/index.php');
           header('location: /templates/login/index.php');
        break;
   } 
    
    
    
}
//unset($_SESSION['app_id']);


//echo require 'controller/loginController.php';
//header('location: ?view=index');