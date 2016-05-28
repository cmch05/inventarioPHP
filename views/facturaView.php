<?php

class FacturaView {

    function viewNuevaFactura() {
        //array con campos para la vista
        //array con dos espacios, el contenido y el id y propiedad si la tiene para javascript
        //el ultimo campo es la funcion de javascript

        $campos = array(
            array('Cantidad', 'txtCantidad', 'number'),
            array('Precio', 'txtPrecio', 'number'),
            
        );
        return $campos;
    }
    
    
       function vistaSelects($modelo, $idSelected = '') {
        $db = new FacturaModel();
        $sql = '';
        $res = '';
        $onchange='';
        switch ($modelo) {
            case 'producto' :
                $sql = $db->producto();
                $id = 'cboProducto';
                $titulo = 'Seleccione un producto';
                $onchange ='onchange="precioProducto(value)"';
                break;
            case 'departamento' :
                $sql = $db->cidudad();
                $id = 'ciudad';
                $titulo = 'Seleccione una ciudad';
                break;
            case 'marca' :
                $sql = $db->marca();
                $id = 'marca';
                $titulo = 'Seleccione una Marca';
                break;
        }
        $res .= '<div class="form-group">';
        $res .= '<label for="' . $id . '">' . $titulo . '</label>';
        $res .= '<select class="form-control" id="' . $id . '" ' . $onchange . '>';
        $res .= '  <option value="" disabled selected hidden>Seleccione un Producto</option>';
        while ($row = $db->recorrer($sql)) {
            if ($idSelected != '' && $idSelected == $row['value']) {
                $res .= "<option value=" . $row['value'] . " selected>" . strtoupper($row['content']) . "</option>";
                continue;
            } else {

                $res .= "<option value=" . $row['value'] . ">" . strtoupper($row['content']) . "</option>";
            }
        }

        $res .= ' </select> </div>';
        $res .= ' <div id="departamento"> </div>';

        $db->liberar($sql);
        $db->close();
        return $res;
    }
    
    
     function vistaTabular($direccion) {
        //$db = new Conexion();
        $sql = "";
        $accion = "";
        $tituloAccion = '';
        $db = new ProductoModel();

        switch ($direccion) {
            case 'verProducto':
                $sql = $db->verProducto();
                $tituloAccion = '<td colspan="2" id="accion">Acción</td> ';
                $accion = '<td id="actualizar"><a href="#" onclick="viewActualizarProducto(this)" >Actualizar</a></td>';
                $accion .= '<td id="eliminar"><a href="#" onclick="eliminarProductoLista(this)" >Eliminar</a></td>';
                break;
            case 'verMarcas':
                $sql = $db->verMarca();
                $tituloAccion = '<td colspan="2" id="accion">Acción</td> ';
                $accion = '<td id="actualizar"><a href="#" onclick="viewActualizarMarca(this)" >Actualizar</a></td>';
                $accion .= '<td id="eliminar"><a href="#" onclick="" >Eliminar</a></td>';
                break;
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
