<?php

class ProductoModel extends Conexion {

    public function cidudad() {
        $res = $this->query("select codigo value , nombre content from ciudad ");
        return $res; //return false or true
    }

    public function departamento() {
        $res = $this->query("select codigo value , nombre content from departamento ");
        return $res; //return false or true
    }

    public function marca() {
        $res = $this->query("select codigo value , nombre content from marca ");
        return $res; //return false or true
    }

    public function verProducto() {
        $res = $this->query("select producto.id Id , producto.nombre Nombre, marca.nombre Marca 
            ,producto.cantidad Cantidad, producto.precio_venta as 'Precio de Venta', 
            producto.precio_compra as'Precio de Ventas' , producto.descripcion Descripción
            from producto inner join marca on marca.codigo=producto.marca ");
        return $res; //return false or true
    }
    public function verMarca() {
        $res = $this->query("select marca.codigo Codigo, marca.nombre Nombre , ciudad.nombre Ciudad 
            ,direccion Dirección , telefono Telefono, email 'Correo Electronico'
            from marca inner join ciudad on marca.ciudad=ciudad.codigo ");
        return $res; //return false or true
    }
    public function insertarProducto() {
        $res = $this->query("select codigo value , nombre content from marca ");
        return $res; //return false or true
    }
    
    
       public function unaMarca($id) {

        //$db= new Conexion();
        $id1 = $this->real_escape_string($id);
        
         $query = $this->query("select codigo, nombre,  direccion, telefono, email "
                . " from marca where codigo= '$id1' limit 1");
        
        
        unset($id);
        return $query;
    }
       public function unProducto($id) {

        //$db= new Conexion();
        $id1 = $this->real_escape_string($id);          
        $query = $this->query("select id, nombre,  cantidad, precio_venta, precio_compra, descripcion  "
                . " from producto where id= '$id1' limit 1");
        
        unset($id);
        return $query;
    }
    public function unaCiudad($id){
          $id1 = $this->real_escape_string($id);
        $query = $this->query("select ciudad  from marca where codigo= '$id1' limit 1 ");
        unset($id);
        return $query;
    }
    public function unaMarcaProducto($id){
          $id1 = $this->real_escape_string($id);
        $query = $this->query("select marca  from producto where id= '$id1' limit 1 ");
        unset($id);
        return $query;
    }
    
    public function crearActualizarMarca() {
        $identificador = $_POST['identificador'];
        $sql='';
        
         $id = $this->real_escape_string($_POST['id']);
         $nombre = strtoupper($this->real_escape_string($_POST['nombre']));
         $ciudad = strtoupper($this->real_escape_string($_POST['ciudad']));
         $telefono = strtoupper($this->real_escape_string($_POST['telefono']));
         $correo = strtoupper($this->real_escape_string($_POST['correo']));
         $direccion = strtoupper($this->real_escape_string($_POST['direccion']));
         
        if($identificador=='crear'){
        $sql = $this->query("insert into marca values('$id','$nombre',null,'$ciudad', "
                . " '$direccion', '$telefono','$correo',null   )");
          echo "insert into marca values('$id','$nombre',null,'$ciudad', "
                . " '$direccion', '$telefono','$correo',null  ) ";           
        }
        elseif($identificador=='actualizar'){
            $idActualizar = $_POST['idActualizar'];
            
            $sql =$this->query("update marca set codigo='$id',nombre='$nombre', ciudad='$ciudad',"
                    . " telefono= '$telefono', email= '$correo' , direccion='$direccion' "
                    . "where codigo='$idActualizar' ");
            
        }
         
        return $sql; //return false or true
    }
    public function crearActualizarProducto() {
        $identificador = $_POST['identificador'];
        $sql='';
        
         $id = $this->real_escape_string($_POST['id']);
         $nombre = strtoupper($this->real_escape_string($_POST['nombre']));
         $marca = strtoupper($this->real_escape_string($_POST['marca']));
         $cantidad = strtoupper($this->real_escape_string($_POST['cantidad']));
         $pVenta = strtoupper($this->real_escape_string($_POST['pVenta']));
         $pCompra = strtoupper($this->real_escape_string($_POST['pCompra']));
         $descripcion = strtoupper($this->real_escape_string($_POST['descripcion']));
         
        if($identificador=='crear'){
        $sql = $this->query("insert into producto(id, nombre, cantidad, marca, precio_venta"
                . ", precio_compra, descripcion) values('$id','$nombre','$cantidad','$marca', "
                . "'$pVenta','$pCompra','$descripcion')");  
        
        }
        elseif($identificador=='actualizar'){
            $idActualizar = $_POST['idActualizar'];
            
            $sql =$this->query("update producto set id='$id',nombre='$nombre', cantidad='$cantidad',"
                    . " precio_venta= '$pVenta', precio_compra= '$pCompra' , descripcion='$descripcion', "
                    . "marca='$marca' "
                    . "where id='$idActualizar' ");
            
            echo"update producto set id='$id',nombre='$nombre', cantidad='$cantidad',"
                    . " precio_venta= '$pVenta', precio_compra= '$pCompra' , descripcion='$descripcion', "
                    . "marca='$marca' "
                    . "where id='$idActualizar' ";
            
        }
         
        return $sql; //return false or true
    }
    
    

}
