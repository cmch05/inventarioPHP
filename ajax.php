<?php

if ($_POST) {
    // solo entra en este archivo si ha sido enviado por una peticion post
    require 'core/core.php';
    //echo 'desde ajax.php';
    if (isset($_GET['view'], $_GET['mode'])) {
        unset($_GET['func']);
        
        if (file_exists(CONTROLLER.strtolower($_GET['view']).'Controller.php')) {
            include CONTROLLER.strtolower($_GET['view']).'Controller.php';
        } else {
            include CONTROLLER.'errorController.php';
        }
    } else {
        //include CONTROLLER.'indexController.php';
        require 'controllers/loginController.php';
      //echo "por defecto ".$_GET['view'];
    }
} elseif ($_GET) {
    //require('core/core.php');
    
    require 'core/core.php';
    if (isset($_GET['func'], $_GET['view'])) {
        unset($_GET['mode']);

        switch ($_GET['view']) {
            case 'empleado':
                //echo 'llego al login';
                require CONTROLLER.'empleadoController.php';
                break;
            case 'producto':
                //echo 'llego al login';
                //require('core/bin/ajax/goreg.php');
                require CONTROLLER.'productoController.php';
                break;
            case 'logout':
                //echo 1;
                require CONTROLLER.'logoutController.php';
                //require('core/bin/ajax/goreg.php');
                break;
            case 'factura':
                require CONTROLLER.'facturaController.php';
                //echo 'llego al login';
               // require('core/bin/ajax/goLostPass.php');
                break;
            case 'configuracion':
                //echo 'llego al login';
               // require('core/bin/ajax/goLostPass.php');
                break;
            case 'proveedor':
                //echo 'llego al login';
               // require('core/bin/ajax/goLostPass.php');
                break;
            case 'unempleado':
                //echo 'llego al login';
                require('controllers/unempleadoController.php');
                break;

            default:
                require 'controllers/errorController.php';
                //require 'controllers/loginController.php';
                break;
        }
    }
    else{
        require 'controllers/errorController.php';
    }
} else {
    //header('location: index.php'); //redirecciona cuando no viene por post
    require 'controllers/errorController.php';
}

