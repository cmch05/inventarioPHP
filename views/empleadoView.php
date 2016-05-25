<?php

//crear vistas
function vistaCrearEmpleado($funcion) {
    //array con campos para la vista
    //array con dos espacios, el contenido y el id y propiedad si la tiene para javascript
    //el ultimo campo es la funcion de javascript
    if ($funcion == 'nuevo') {
        $id = "nuevo";
    } elseif ($funcion == 'actualizar') {
        $id = "actualizar";
    }
    $campos = array(
        array('Identificacion', 'txtId', 'number'),
        array('Nombre', 'txtNombre', 'text'),
        array('Direccion', 'txtDireccion', 'text'),
        array('Telefono', 'txtTelefono', 'tel'),
        array('Fecha Ingreso', 'txtFecha', 'date'),
        array('sueldo', 'txtSueldo', 'number'),
        //$funcion,
        'crearActualizarEmpleado()',
        $id
    );
    return $campos;
}

function vistaTabular($direccion) {
    //$db = new Conexion();
    $sql = "";
    $accion = "";
    $db = new Empleado();
    if ($direccion == 'verEmpleado') {
        $sql = $db->verEmplados();
        $accion = '<td id="update"><a href="#" onclick="vistaActualizarEmpleados(this)" >Actualizar</a></td>';
        $accion .='<td  id="delete"><a href="#">Eliminar</a></td>';
    } elseif ($direccion == 'verCargos') {
        $sql = $db->cargoEmpleados();

        $accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
    }

    //$sql = $db->query("select * from empleado ");
    $titulo = $db->titulos($sql);
    $res = '<thead><tr>';
    for ($index = 0; $index < count($titulo); $index++) {
        $res .= '<th>' . $titulo[$index] . '</th>';
    }
    $res .='<td colspan="2" id="accion">Acción</td> </tr></thead><tbody>';

    while ($row = $db->recorrer($sql)) {
        //$res .='<tr id="'.$row[0].'">';
        for ($index = 0; $index < count($titulo); $index++) {
            $res .= '<td>' . $row[$index] . '</td>';
        }
        $res .=$accion;
        $res .='</tr>';
    }
    $db->liberar($sql);
    $db->close();
    return $res;
}

function vistaEliminarEmpleados() {
    echo 'desde ver empleado';
}

function vistaEditarEmpleado($id) {
    //echo 'desde ver empleado';
    $db = new Empleado();
    $sql = $db->unEmplado($id);
    $data = $db->recorrer($sql);
    $db->liberar($sql);
    $db->close();
    return $data;
}

function viewAsignarCargo() {
    $db = new Empleado();
    $sql1 = $db->listaCargos();
    $sql2 = $db->listaEmpleado();
    $idEmpleado = null;
    $cargoCodigo = null;
    if (isset($_POST['idEmpleado'], $_POST['cargoCodigo'])) {
        $idEmpleado = $_POST['idEmpleado'];
        $cargoCodigo = $_POST['cargoCodigo'];
    }
    $empleado = '';
    $cargo = '';
    while ($row = $db->recorrer($sql2)) {
        if ($idEmpleado != null && $idEmpleado == $row['id']) {
            $empleado .= "<option value=" . $row['id'] . " selected>" . strtoupper($row['nombre']) . "</option>";
            continue;
        } else {

            $empleado .= "<option value=" . $row['id'] . ">" . strtoupper($row['nombre']) . "</option>";
        }
    }

    while ($row = $db->recorrer($sql1)) {
        
        if ($cargoCodigo != null && $cargoCodigo == $row['codigo']) {
            
        $cargo .= "<option selected value=" . $row['codigo'] . ">" . strtoupper($row['nombre']) . "</option>";
            continue;
        } else {

        $cargo .= "<option value=" . $row['codigo'] . ">" . strtoupper($row['nombre']) . "</option>";
            
        }
        
        
    }

    $res = [$empleado, $cargo, 'asignarCargo(this)'];

    $db->liberar($sql1);
    $db->liberar($sql2);

    $db->close();
    return $res;
}
