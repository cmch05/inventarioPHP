<?php
require('core/core.php');
//session_start();
//include('controllers/indexController.php');
//require 'templates/controlPanel/index.php';
if (isset($_SESSION['app_id'] )) {
    require 'views/indexView.php';
    
}else{
    //header('location: /templates/login/index.php');
    //require 'templates/login/index.php';
    require CONTROLLER.'loginController.php';
    //require 'views/indexView.php';
}

//require CONTROLLER.'indexController.php';