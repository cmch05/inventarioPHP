<?php

class FacturaModel extends Conexion {

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

    public function guardarFactura($JSON) {
        $JSON = json_decode($_POST['JSON']);
        $total = 0;
        $vendedor = $_SESSION['app_id'];
        foreach ($JSON as $producto) {
            $total += $producto->precio;
        }
        $res1 = $this->query("insert into factura(vendedor,cliente, total) values("
                . "'$vendedor', '',$total )");

        $res2 = $this->query("select max(serial) from factura where vendedor='$vendedor' limit 1 ");
        $ultimaFactura = $this->recorrer($res2)[0];

        foreach ($JSON as $producto) {
            $id = $producto->id;
            $cantidad = $producto->cantidad;
            $precio = $producto->precio;
            $res3 = $this->query("insert into factura_producto(serial_factura, codigo_producto, "
                    . "cantidad, precio) values('$ultimaFactura','$id', '$cantidad', "
                    . "'$precio') ");
            $res4 =  $this->query("update producto set cantidad = cantidad + (-$cantidad) where id='$id'");
        }

//            for ($index = 0; $index < count($JSON); $index++) {
//                echo $JSON[$index]->id;
//            }

        $this->liberar($res2);

        return $res1;
    }

}
