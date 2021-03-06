<?php

//echo 'desde controlador empleado';


if (isset($_GET['func'])) {



//$datosLateral =$sideBar->empleados();
//require 'templates/controlPanel/components/navaside.php';

    switch ($_GET['func']) {

        case 'crear':
            $campos = vistaCrearEmpleado('nuevo');
            //$valores = null;
            echo require(TEMPLATES . 'controlPanel/components/form.php');
            break;
        case 'ver':
            $tabla = vistaTabular('verEmpleado');
            $titulo = 'Lista de empleados';

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'cargo':
            $tabla = vistaTabular('verCargos');
            $titulo = 'Lista de empleados';
            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'viewAsignarCargo':
            $lista = viewAsignarCargo();
            //$titulo = 'Lista de empleados';
            echo require(TEMPLATES . 'controlPanel/components/formReasignar.php');
            break;
        case 'sideBar':
            //echo 1;
            $sideBar = new SideBar();
            echo json_encode($sideBar->empleados());
            break;
        case 'sideBarUnEmpleado':
            //echo 1;
            $sideBar = new SideBar();
            echo json_encode($sideBar->unEmpleado());
            break;

        default :
            header('location: index.php');
            break;
    }
} elseif (isset($_GET['mode'])) {
    switch ($_GET['mode']) {

        case 'viewActualizar':
            $idActualizar = $_POST['id'];
            $campos = vistaCrearEmpleado('actualizar');
            $valores = vistaEditarEmpleado($_POST['id']);
            $accion = 'actualizar';
            echo require(TEMPLATES . 'controlPanel/components/form.php');
            break;
        case 'nuevo':
            $datos = array(
                $_POST['id'],
                strtoupper($_POST['nombre']),
                strtoupper($_POST['direccion']),
                $_POST['telefono'],
                $_POST['fecha'],
                $_POST['sueldo'],
            );

            $db = new Empleado();
            if ($db->nuevoEmpleado($datos)) {
                echo 1;
            } else {
                echo $db->errno . ' ' . $db->error;
            }
            $db->close();
            //$campos= vistaCrearEmpleado();
            //echo require(TEMPLATES . 'controlPanel/components/form.php');
            break;
        case 'actualizar':
            $datos = [
                $_POST['idActualizar'],
                strtoupper($_POST['nombre']),
                strtoupper($_POST['direccion']),
                $_POST['telefono'],
                $_POST['fecha'],
                $_POST['sueldo'],
                $_POST['id']
            ];

            $db = new Empleado();
            if ($db->actualizarEmpleado($datos)) {
                echo 1;
            } else {
                echo $db->errno . ' ' . $db->error;
                //echo 0;
            }
            $db->close();

            break;
        case 'viewAsignarCargo':
            $lista = viewAsignarCargo();
            echo require(TEMPLATES . 'controlPanel/components/formReasignar.php');
            break;
        case 'asignarCargo':
            $db = new Empleado();
            if ($db->asignarCargo()) {
                echo 1;
            } else {
                echo $db->errno . ' ' . $db->error;
            }

            break;
        case 'ver':
            //$tabla= vistaVerEmpleados();
            //$titulo ='Lista de empleados';
            //echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'eliminar':
            //$campos= vistaEliminarEmpleados();
            //echo require(TEMPLATES . 'controlPanel/components/form.php');
            break;

        default :
            header('location: index.php');
            break;
    }
}
