<?php

require 'core/constants.php';
//echo APP_TITLE;
#estructura
require'models/Conexion.php';
//require('vendor/autoload.php');
//require('core/bin/functions/encrypt.php');
//require('core/bin/functions/users.php');
//require('core/bin/functions/emailTemplate.php');
//require('core/bin/functions/lostPassTemplate.php');
//require('core/bin/functions/sendEmail.php');


#modelos
require 'models/empleadoModel.php';
require 'models/unEmpleadoModel.php';
require 'models/loginModel.php';
require 'models/productoModel.php';
require 'models/facturaModel.php';


#vistas
require 'views/empleadoView.php';
require 'views/sideBarView.php';
require 'views/unEmpleadoView.php';
require 'views/productoView.php';
require 'views/facturaView.php';
//require 'views/indexView.php';

#templates
//require 'templates/controlPanel/index.php';