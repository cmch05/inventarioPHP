<?php

class FacturaModel extends Conexion{
    
    
    public function cliente() {
        $res = $this->query("select id value , nombre content from cliente ");
        return $res; //return false or true
    }

    public function producto() {
        $res = $this->query("select id value , nombre content from producto ");
        return $res; //return false or true
    }
    public function precioVenta($id) {
        $res = $this->query("select precio_venta precio from producto where id='$id' limit 1 ");
        return $res; //return false or true
    }
}