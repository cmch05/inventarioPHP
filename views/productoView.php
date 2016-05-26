<?php

class ProductoView {

    public function viewNuevaMarca() {
        $res = array(
            array('Identificacion', 'txtId', 'number'),
            'buscarUnEmpleado(null)',
            ''
        );
        return $res;
    }

    function vistaSelects($modelo, $idSelected ='') {
        $db = new ProductoModel();
        $sql = '';
        $res = '';
        switch ($modelo) {
            case 'ciudad' :
                $sql = $db->cidudad();
                $id = 'ciudad';
                $titulo = 'Seleccione una ciudad';
                break;
            case 'departamento' :
                $sql = $db->cidudad();
                $id = 'ciudad';
                $titulo = 'Seleccione una ciudad';
                break;
        }

        $res .= '<div class="form-group">';
        $res .= '<label for="' . $id . '">' . $titulo . '</label>';
        $res .= '<select class="form-control" id="' . $id . '">';

        while ($row = $db->recorrer($sql)) {
            $res .= "<option value=" . $row['value'] . ">" . strtoupper($row['content']) . "</option>";
        }
        $res .= ' </select> </div>';
        $res .= ' <div id="departamento"> </div>';

        $db->liberar($sql);
        $db->close();
        return $res;
    }

    function vistaCamposMarca() {
        //array con campos para la vista
        //array con dos espacios, el contenido y el id y propiedad si la tiene para javascript
        //el ultimo campo es la funcion de javascript
      
        $campos = array(
            array('Codigo', 'txtId', 'text'),
            array('Nombre', 'txtNombre', 'text'),
            array('Direccion', 'txtDireccion', 'text'),
            array('Telefono', 'txtTelefono', 'tel'),
            array('Correo Electronico', 'txtEmail', 'email'),
        
        );
        return $campos;
    }

    
    
    
    
    
    
    function vistaTabular($direccion) {
        //$db = new Conexion();
        $sql = "";
        $accion = "";
        $tituloAccion = '';
        $db = new UnEmpleadoModel();
        if ($direccion == 'buscarUnEmpleado') {
            $sql = $db->buscarUnEmpleado();
            $tituloAccion = '<td colspan="2" id="accion">Acción</td> ';
            $accion = '<td id="unEmpleado"><a href="#" onclick="viewBuscarUnEmpeado()" >Buscar otro empleado</a></td>';
            //$accion .='<td  id="delete"><a href="#">Eliminar</a></td>';
        } elseif ($direccion == 'verCargos') {
            $sql = $db->cargoEmpleados();

            $tituloAccion = '<td colspan="2" id="accion">Acción</td> ';
            $accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        } elseif ($direccion == 'cargosTodos') {
            $sql = $db->cargosTodos();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        } elseif ($direccion == 'horasTrabajadas') {
            $sql = $db->cargosTodos();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        } elseif ($direccion == 'bitacora') {
            $sql = $db->bitacora();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        } elseif ($direccion == 'tiempoTotalOnLine') {
            $sql = $db->tiempoTotalOnLine();

            //$accion = '<td id="update"><a href="#" onclick="viewAsignarCargo(this)" >Reasignar Cargo</a></td>';
        }
        $titulo = $db->titulos($sql);
        $res = '<thead><tr>';
        for ($index = 0; $index < count($titulo); $index++) {
            $res .= '<th>' . $titulo[$index] . '</th>';
        }
        $res .= $tituloAccion . '</tr></thead><tbody>';

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
