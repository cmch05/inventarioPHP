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

    function vistaSelects($modelo, $idSelected = '') {
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
            case 'marca' :
                $sql = $db->marca();
                $id = 'marca';
                $titulo = 'Seleccione una Marca';
                break;
        }
        $res .= '<div class="form-group">';
        $res .= '<label for="' . $id . '">' . $titulo . '</label>';
        $res .= '<select class="form-control" id="' . $id . '">';

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

    public function vistaCamposProducto() {
        //array con campos para la vista
        //array con dos espacios, el contenido y el id y propiedad si la tiene para javascript
        //el ultimo campo es la funcion de javascript

        $campos = array(
            array('Codigo', 'txtId', 'text'),
            array('Nombre', 'txtNombre', 'text'),
            array('Cantidad', 'txtCantidad', 'number'),
            array('Precio de Venta', 'txtPVenta', 'number'),
            array('Precio Compra', 'txtPCompra', 'number'),
            //array('Descripcion', 'txtDescripcion', 'text'),
        );
        return $campos;
    }

    public function crearMarca() {
        $db = new ProductoModel();
        $res = '';
        $sql = $db->crearActualizarMarca();
        if ($sql) {
            $res = $this->respuesta('success', 'Exito', 'Registrado Actualizado exitosamente');
        } else {
            $res = $this->respuesta('danger', 'Error', 'No se pudo guardar el registro');
        }
        $db->close();
        return $res;
    }
    public function crearProducto() {
        $db = new ProductoModel();
        $res = '';
        $sql = $db->crearActualizarProducto();
        if ($sql) {
            $res = $this->respuesta('success', 'Exito', 'Registrado Actualizado exitosamente');
        } else {
            
            $res = $this->respuesta('danger', 'Error', 'No se pudo guardar el registro');
        }
        $db->close();
        return $res;
    }

    function vistaActualizarMarca($id) {
        //echo 'desde ver empleado';
        $db = new ProductoModel();
        $sql = $db->unaMarca($id);
        $data = $db->recorrer($sql);
        $db->liberar($sql);
        $db->close();
        return $data;
    }
    function vistaActualizarProducto($id) {
        //echo 'desde ver empleado';
        $db = new ProductoModel();
        $sql = $db->unProducto($id);
        $data = $db->recorrer($sql);
        $db->liberar($sql);
        $db->close();
        return $data;
    }

    function unaCiudad($id) {
        //echo 'desde ver empleado';
        $db = new ProductoModel();
        $sql = $db->unaCiudad($id);
        $data = $db->recorrer($sql)[0];
        //echo $data;
        $db->liberar($sql);
        $db->close();
        return $data;
    }
    function unaMarca($id) {
        //echo 'desde ver empleado';
        $db = new ProductoModel();
        $sql = $db->unaMarcaProducto($id);
        $data = $db->recorrer($sql)[0];
        //echo $data;
        $db->liberar($sql);
        $db->close();
        return $data;
    }

    //////////// util////////////////////////
    private function respuesta($tipo, $mensaje1, $mensaje2) {

        $result = '<div class= "alert alert-dismissible alert-' . $tipo . ' role="alert">';
        $result .= '<button type="button" class="close" data-dismiss="alert">X</button>';
        $result .= '<h4>' . $mensaje1 . '</h4>';
        $result .= '<p><strong>' . $mensaje2 . '</strong></p>';
        $result .= '</div>';
        return $result;
    }

    ////////////


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
                $accion .= '<td id="eliminar"><a href="#" onclick="" >Eliminar</a></td>';
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
