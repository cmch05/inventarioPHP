<?php

class Conexion extends mysqli {

    public function __construct() {

        parent::__construct(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        $this->connect_errno ? die('Error al conectar a la base de datos') : null;
        //$this->query('SET NAMES utf8');
        $this->set_charset('utf8');
    }

    public function rows($query) {
        //return mysqli_num_rows($query);
        return mysqli_num_rows($query);
    }

    public function liberar($query) {
        return mysqli_free_result($query);
    }

    public function recorrer($query) {
        return mysqli_fetch_array($query);
    }

    public function titulos($query) {
        //return mysqli_field_count($query); retorna la cantidad de columnas
        $res = mysqli_fetch_fields($query);
        
        foreach ($res as $val){
            $resultado[]= $val->name;
        }
        return $resultado;
    }
    /*
    public function columnas($query){
        $res = mysqli_fetch_fields($query);
        $resultado=0;
        foreach ($res as $val){
            $resultado+=1;
        }
        return $resultado;
    }
*/
    
    public function posiblesCampos($query) {

        $res = mysqli_fetch_fields($query);

        foreach ($res as $val) {
            printf("Name:      %s\n", $val->name);
            printf("Table:     %s\n", $val->table);
            printf("Max. Len:  %d\n", $val->max_length);
            printf("Length:    %d\n", $val->length);
            printf("charsetnr: %d\n", $val->charsetnr);
            printf("Flags:     %d\n", $val->flags);
            printf("Type:      %d\n\n", $val->type);
        }
       // $result->free();
    }

}
