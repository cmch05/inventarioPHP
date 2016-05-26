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
            $titulo ='Empleado';
            $tabla= $res->vistaTabular('buscarUnEmpleado');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'cargosTodos':
            //$datos = $_POST['id'];
            $res= new UnEmpleadoView();
            $titulo ='Cargos Desempeñados';
            $tabla= $res->vistaTabular('cargosTodos');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'horasTrabajadas':
            //$datos = $_POST['id'];
            $res= new UnEmpleadoView();
            $titulo ='Horas trabajadas';
            $tabla= $res->vistaTabular('horasTrabajadas');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'bitacora':
            //$datos = $_POST['id'];
            $res= new UnEmpleadoView();
            $titulo ='Horas trabajadas';
            
            $tabla = $res->vistaTabular('tiempoTotalOnLine');
            $tabla2 = $res->vistaTabular('bitacora');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;

        default :
            header('location: index.php');
            break;
    }
}
