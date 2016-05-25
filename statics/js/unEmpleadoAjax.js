

function viewBuscarUnEmpeado() {
    //alert(' buscando');
    dropContent();
    actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'unempleado', 'viewBuscarUnEmpleado', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
}
//buscarUnEmpleado();
function buscarUnEmpleado() {
    dropContent();
    //alert('buscando');
    var id =__('txtId').value;
    actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    var form = 'id=' + id ;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'buscarUnEmpleado', '_AJAX_CONTENT_', respuesta, form];
    ajaxBase(cont);
}
/*
function runScripBuscar(e){/// ojo que no funciona bien
  if(e.keyCode == 13){
    // 13 codigo ascii de la tecla enter
    buscarUnEmpleado();
  }
}
*/