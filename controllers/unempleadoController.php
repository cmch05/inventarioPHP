<?php

//echo 'desde controlador empleado';


if (isset($_GET['func'])) {

    switch ($_GET['func']) {

        case 'viewBuscarUnEmpleado':
            $view = new UnEmpleadoView();
            $campos = $view->crearView();

            echo require(TEMPLATES . 'controlPanel/components/form.php');
            break;
        case 'sideBar':
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

        case 'buscarUnEmpleado':
            //$datos = $_POST['id'];
            $res= new UnEmpleadoView();
            $titulo ='Lista de empleados';
            $tabla= $res->vistaTabular('buscarUnEmpleado');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
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
