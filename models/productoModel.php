<?php

class ProductoModel extends Conexion{
    
    public function cidudad(){          
        $res = $this->query("select codigo value , nombre content from ciudad "  );
        return $res; //return false or true
    }
    public function departamento(){          
        $res = $this->query("select codigo value , nombre content from departamento "  );
        return $res; //return false or true
    }
    public function marca(){          
        $res = $this->query("select codigo value , nombre content from departamento "  );
        return $res; //return false or true
    }
}