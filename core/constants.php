<?php

session_start();//iniciar sesion

#constantes de Conexion
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS','0920516');
define('DB_NAME', 'inventario');

#constantes de la app
define("TEMPLATES", "templates/");
define("CONTROLLER", "controllers/");
define('APP_TITLE','PHP Avanzado');
define('APP_COPY', 'Made by Cristian guerrero, powered by PHP '.date('Y',time()).' Coffe.inc');
define('APP_URL', 'http://localhost/inventarioPHP/');


#constantes secciones
define('FACTURAS', 'Facturacion');
define('EMPLEADOS', 'Empleados');
define('PRODUCTOS', 'Productos');
define('PROVEEDORES', 'Proveedores');
define('CONFIGURACION', 'Configuración');
