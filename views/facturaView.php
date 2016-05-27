<?php

class FacturaView {

    function viewNuevaFactura() {
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

}
