<?php

require_once 'Conexion.php';

class Empleado extends Conexion {

    public function nuevoEmpleado($datos) {

        $nombre = $this->real_escape_string($datos[1]);
        $id = $this->real_escape_string($datos[0]);
        $res = $this->query("insert into empleado values('$id','$nombre','$datos[2]',"
                . "'$datos[3]','$datos[4]','$datos[5]', 1)");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }

    public function verEmplados() {
        $query = $this->query("select  empleado.id id , empleado.nombre nombre, 
            direccion direccion, telefono telefono, empleado.fecha_ingreso as'fecha de ingreso',
            cargo.nombre Cargo, empleado.sueldo
            from empleado, cargo_empleado, cargo where
            empleado.id=cargo_empleado.id_empleado and cargo_empleado.codigo_cargo = 
            cargo.codigo and cargo_empleado.estado=1;");
        return $query;
    }
     public function verEmpladosInactivos() {
        $query = $this->query("select  empleado.id id , empleado.nombre nombre, 
            direccion direccion, telefono telefono, empleado.fecha_ingreso as'fecha de ingreso',
            cargo.nombre Cargo, empleado.sueldo
            from empleado, cargo_empleado, cargo where
            empleado.id=cargo_empleado.id_empleado and cargo_empleado.codigo_cargo = 
            cargo.codigo and cargo_empleado.estado=1;");
        return $query;
    }

    public function unEmplado($id) {

        //$db= new Conexion();
        $id1 = $this->real_escape_string($id);
        $query = $this->query("select * from empleado where id= '$id1' ");

        //$db->liberar($query);
        unset($id);
        //$db->close();
        return $query;
    }

    public function actualizarEmpleado($datos) {

        //$db= new Conexion();
        $nombre = $this->real_escape_string($datos[1]);
        $idActualizar = $this->real_escape_string($datos[0]);
        $id = $this->real_escape_string($datos[6]);

        $res = $this->query("update empleado set id='$id',nombre='$nombre',direccion='$datos[2]', "
                . " telefono='$datos[3]',fecha_ingreso= '$datos[4]',sueldo='$datos[5]' "
                . " where id= '$idActualizar' ");

        unset($datos);
        //$db->close();

        return $res; //return false or true
    }

    public function cargoEmpleados() {
        $sql ="select empleado.id, empleado.nombre Empleado, cargo.nombre 'Cargo Actual', cargo.codigo as'Codigo Cargo',
(select cargo.nombre from cargo, cargo_empleado where cargo.codigo = cargo_empleado.codigo_cargo and
cargo_empleado.serial =
(select @var1 := max(serial)  from cargo_empleado where id_empleado=empleado.id and estado=0)) as'ultimo cargo'
from empleado, cargo,cargo_empleado where empleado.id=cargo_empleado.id_empleado and cargo.codigo = 
cargo_empleado.codigo_cargo and cargo_empleado.estado = 1";
        
        
        
        /*
        $sql = "select empleado.id, empleado.nombre Empleado, cargo.nombre Cargo, "
                . " cargo.codigo as'Codigo Cargo' from empleado, cargo,cargo_empleado "
                . "where empleado.id=cargo_empleado.id_empleado and cargo.codigo = cargo_empleado.codigo_cargo and "
                . " cargo_empleado.estado = 1";
       
         */
        $res = $this->query($sql);
        return $res;
    }

    function listaEmpleado() {
        $sql = $this->query("select id, nombre from empleado");
        //$this->close();
        return $sql;
    }

    function listaCargos() {
        $sql = $this->query("select codigo, nombre from cargo");
        //$this->close();
        return $sql;
    }

    function asignarCargo() {
        //$db= new Conexion();
        $idEmpleado = $this->real_escape_string($_POST['idEmpleado']);
        $cargoCodigo = $this->real_escape_string($_POST['cargoCodigo']);

        $sql = $this->query("select max(serial) as id from cargo_empleado where id_empleado='$idEmpleado' and estado=1; ");
        if ($this->rows($sql) > 0) {
            $serial = $this->recorrer($sql)[0];
            //echo $serial;
        $sql2 = $this->query("update cargo_empleado set estado=0 where serial = '$serial'  ");            
        }
        $res = $this->query("insert into cargo_empleado values(null,'$idEmpleado',$cargoCodigo, 1, null,null ) ");

        unset($idActualizar, $cargoCodigo);

        $sql ? $this->liberar($sql) : null;
        $this->close();
        return $res; //return false or true
    }

}

//3207120313
//mes de junio
//dirley
//select empleado.nombre Empleado, cargo.nombre from empleado join cargo_empleado on empleado.id=cargo_empleado.id_empleado join cargo on cargo.codigo = cargo_empleado.codigo_cargo;
