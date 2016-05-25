<?php

//echo $_POST['user'];
//require 'templates/login/index.php';

if (!isset($_SESSION['app_id'])) {
    if (empty($_POST['user']) and empty($_POST['pass'])) {
        require 'templates/login/index.php';
    } else {
        $db = new Conexion();
        $data = $db->real_escape_string($_POST['user']);
        //$pass = encrypt($_POST['pass']);
        $pass = $_POST['pass'];


        //$sql = $db->query("select id_usuario from usuario where (id_usuario='$data' or email='$data') and pass='$pass' limit 1");
        $sql = $db->query("select id_usuario from usuario where id_usuario='$data' and password='$pass' limit 1");
        echo "select id_usuario from usuario where id_usuario='$data'  and password='$pass' limit 1";
        if ($db->rows($sql) > 0) {
            require CONTROLLER . 'indexController.php';
            // if ($_POST['sesion']) {// esto es para guardar la sesion arreglar despues
            //ini_set('session.cookie_lifetime', time() + (60 * 60 * 24));
            ini_set('session.cookie_lifetime', time() + (30));
            // }
            $_SESSION['app_id'] = $db->recorrer($sql)[0]; // se crea la sesion con el id del usuario
            //require 'views/indexView.php';
            //echo 1;
        
            $db->liberar($sql);
        } else {
            echo 0 ;
        }
        $db->close();
    }
} else {
    //require CONTROLLER . 'indexController.php';
    //require 'views/indexView.php';
}
/*

if (!empty($_POST['user']) and ! empty($_POST['pass'])) {
    # code...
    $db = new Conexion();
    $data = $db->real_escape_string($_POST['user']);
    $pass = encrypt($_POST['pass']);

    $sql = $db->query("select id from user where (user='$data' or email='$data') and pass='$pass' limit 1");
    if ($db->rows($sql) > 0) {

        if ($_POST['sesion']) {
            //ini_set('session.cookie_lifetime', time() + (60 * 60 * 24));
            ini_set('session.cookie_lifetime', time() + (30));
        }
        $_SESSION['app_id'] = $db->recorrer($sql)[0]; // se crea la sesion con el id del usuario
        echo 1;
    } else {
        echo 0;
 
    }
    $db->liberar($sql);
    $db->close();
} else {
    echo '<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">X</button>
  <strong>Error</strong> Todos los datos deben estar llenos.
  </div>
';
}

*/