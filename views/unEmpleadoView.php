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
        $db = new UnEmpleadoModel();
        if ($direccion == 'buscarUnEmpleado') {
            $sql = $db->buscarUnEmpleado();
            $accion = '<td id="unEmpleado"><a href="#" onclick="viewBuscarUnEmpeado()" >Buscar otro empleado</a></td>';
            //$accion .='<td  id="delete"><a href="#">Eliminar</a></td>';
        } elseif ($direccion == 'verCargos') {
            $sql = $db->cargoEmpleados();

            $accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
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

}
