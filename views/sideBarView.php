<?php

class SideBar{
    
    function index(){
        $res= array();
        $res[0]=array(APP_TITLE,'#');
        $res[1]=array(FACTURAS,'');
        $res[2]=array(EMPLEADOS,'vistaVerEmpleados()');
        $res[3]=array(PROVEEDORES,'');
        $res[4]=array(PRODUCTOS,'');
        $res[5]=array(CONFIGURACION,'');
        
        
        return $res;
    }
    function empleados(){
        
        //para devolver respuesta en formato json
        $res= array();
        $res['titulo']='Empleados';
        
        $res['value'] = array();
        //$res['value'][]='Empleados';
        $res['value'][]='Ver Empleados';
        $res['value'][]='Buscar Empleados';
        $res['value'][]='Cargo Empleado';
        $res['value'][]='Asignar Cargo';
        $res['value'][]='Crear Empleado';
        
        $res['onclick']=array();
        //$res['onclick'][]='';
        $res['onclick'][]='vistaVerEmpleados()';
        $res['onclick'][]='viewBuscarEmpleado()';
        $res['onclick'][]='viewCargoEmpleado()';
        $res['onclick'][]='viewAsignarCargo()';
        $res['onclick'][]='vistaCrearEmpleado()';
        
 
        //header('Content-type: application/json; charset=utf-8');
        ///json_encode($res, JSON_FORCE_OBJECT);
        return $res;
    }
    
    function productos(){
        
        //para devolver respuesta en formato json
        $res= array();
        $res['titulo']='Empleados';
        
        $res['value'] = array();
        //$res['value'][]='Empleados';
        $res['value'][]='Ver Empleados';
        $res['value'][]='Buscar Empleados';
        $res['value'][]='Cargo Empleado';
        $res['value'][]='Asignar Cargo';
        $res['value'][]='Crear Empleado';
        
        $res['onclick']=array();
        //$res['onclick'][]='';
        $res['onclick'][]='vistaVerEmpleados()';
        $res['onclick'][]='viewBuscarEmpleado()';
        $res['onclick'][]='viewCargoEmpleado()';
        $res['onclick'][]='viewAsignarCargo()';
        $res['onclick'][]='vistaCrearEmpleado()';
        
 
        //header('Content-type: application/json; charset=utf-8');
        ///json_encode($res, JSON_FORCE_OBJECT);
        return $res;
    }
     function unEmpleado(){
        $res= array();
        $res['titulo']='Estadisticas';
        
        $res['value'] = array();
        //$res['value'][]='Empleados';
        $res['value'][]='Productos Recibidos';
        $res['value'][]='Productos vendidos';
        $res['value'][]='Cargos Desempeñados';
        $res['value'][]='Tiempo en la empresa';
        $res['value'][]='horas trabajadas';
        $res['value'][]='Hoja de Vida';
        $res['value'][]='Bitacora';
        
        
        $res['onclick']=array();
        //$res['onclick'][]='';
        $res['onclick'][]='vistaVerEmpleados()';
        $res['onclick'][]='viewBuscarEmpleado()';
        $res['onclick'][]='viewCargoEmpleado()';
        $res['onclick'][]='viewAsignarCargo()';
        $res['onclick'][]='vistaCrearEmpleado()';
        $res['onclick'][]='vistaCrearEmpleado()';
        $res['onclick'][]='vistaCrearEmpleado()';
        return $res;
    }
    
    
    
    /*
    function sideBarContent($datosLateral){
        $res= '<div id="sidebar-wrapper" role="navigation"> <ul class="sidebar-nav">';
        $res .= '<ul class="sidebar-nav"> <li class="sidebar-brand" >';
        $res .='<a href="#"> '.$datosLateral[0][0].'</a> </li>';
        for ($index = 1; $index < count($datosLateral); $index++) {
             $res .= '<li> <a href="#" onclick="'.$datosLateral[$index][1].'">'.$datosLateral[$index][0].'</a></li>';
        }
        $res .='</ul> </div> </div>';
       
        return $res;
    }
     * */
     
}