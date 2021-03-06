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

    public function cargosTodos() {


        $id = $this->real_escape_string($_POST['id']);
        $res = $this->query("select  cargo.nombre Cargo ,inicio Inicio, 
            fin from empleado, cargo,cargo_empleado where empleado.id=cargo_empleado.id_empleado 
            and cargo.codigo= cargo_empleado.codigo_cargo and empleado.id ='$id'");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }

    public function horasTrabajadas() {


        $id = $this->real_escape_string($_POST['id']);
        $res = $this->query("select  cargo.nombre Cargo ,inicio Inicio, 
            fin from empleado, cargo,cargo_empleado where empleado.id=cargo_empleado.id_empleado 
            and cargo.codigo= cargo_empleado.codigo_cargo and empleado.id ='$id'");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }

    public function bitacora() {


        $id = $this->real_escape_string($_POST['id']);
        $res = $this->query("select fecha_ingreso as 'Fecha y hora de ingreso al sistema' ,"
                . " fecha_salida as 'Fecha y hora de salida del sistema' from bitacora_acceso  where empleado='$id' ");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }

    public function tiempoTotalOnLine() {

        $id = $this->real_escape_string($_POST['id']);
        $res = $this->query("select sec_to_time((sum( time_to_sec( timediff(fecha_salida, fecha_ingreso))) ) )
            as 'Tiempo total en el sistema' from bitacora_acceso where empleado ='$id' ");

        unset($id);
        return $res;
    }

}
