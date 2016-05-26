<?php

require_once 'Conexion.php';

class LoginModel extends Conexion {

    public function bitacoraLogin($id) {
        $id = $this->real_escape_string($id);

        $res = $this->query("insert into bitacora_acceso(empleado) values('$id') ");
        unset($datos);
        // $this->close();
    }

    public function bitacoraLogout($id) {
        $id = $this->real_escape_string($id);
        $sql = $this->query("select  @var1 := max(serial)  from bitacora_acceso  where empleado='$id' ");

        $serial = $this->recorrer($sql)[0];
        $res = $this->query("update bitacora_acceso set fecha_salida=now() where serial ='$serial' ");
        //$_SESSION['salida'] = "update bitacora_acceso set fecha_salida=now() where serial ='$serial' ";
        
        unset($id);
        $this->liberar($sql);
        // $this->close();
        return $res;
    }

    public function login($user, $pass) {
        $id = $this->real_escape_string($user);

        $res = $this->query("select id_usuario from empleado where id_usuario='$id' and password='$pass' limit 1");
        //unset($datos);
        // $this->close();
        return $res;
    }

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
        $res = $this->query("select  cargo.nombre Cargo ,inicio Inicio, 
            fin from empleado, cargo,cargo_empleado where empleado.id=cargo_empleado.id_empleado 
            and cargo.codigo= cargo_empleado.codigo_cargo and empleado.id ='$id'");

        unset($datos);
        //$db->close();
        return $res; //return false or true
    }

}
