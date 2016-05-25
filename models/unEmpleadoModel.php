<?php

require_once 'Conexion.php';

class UnEmpleadoModel extends Conexion {

    public function buscarUnEmpleado() {

        
        $id = $this->real_escape_string($_POST['id']);
        $res = $this->query("select id, nombre from empleado where id='$id' limit 1");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }
}