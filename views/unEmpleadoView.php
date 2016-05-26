<?php

class UnEmpleadoView {

    public function crearView() {
        $res = array(
            array('Identificacion', 'txtId', 'number'),
            'buscarUnEmpleado()',
            ''
        );
        return $res;
    }
    
    

    function vistaTabular($direccion) {
        //$db = new Conexion();
        $sql = "";
        $accion = "";
        $tituloAccion='';
        $db = new UnEmpleadoModel();
        if ($direccion == 'buscarUnEmpleado') {
            $sql = $db->buscarUnEmpleado();
            $tituloAccion ='<td colspan="2" id="accion">Acción</td> ';
            $accion = '<td id="unEmpleado"><a href="#" onclick="viewBuscarUnEmpeado()" >Buscar otro empleado</a></td>';
            //$accion .='<td  id="delete"><a href="#">Eliminar</a></td>';
        } elseif ($direccion == 'verCargos') {
            $sql = $db->cargoEmpleados();
            
            $tituloAccion ='<td colspan="2" id="accion">Acción</td> ';
            $accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
         elseif ($direccion == 'cargosTodos') {
            $sql = $db->cargosTodos();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
         elseif ($direccion == 'horasTrabajadas') {
            $sql = $db->cargosTodos();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
         elseif ($direccion == 'bitacora') {
            $sql = $db->bitacora();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
         elseif ($direccion == 'tiempoTotalOnLine') {
            $sql = $db->tiempoTotalOnLine();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
        $titulo = $db->titulos($sql);
        $res = '<thead><tr>';
        for ($index = 0; $index < count($titulo); $index++) {
            $res .= '<th>' . $titulo[$index] . '</th>';
        }
        $res .= $tituloAccion.'</tr></thead><tbody>';

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

}
