

function viewBuscarUnEmpeado() {
    //alert(' buscando');
    dropContent();
    actualizarSideBar('empleado', 'sideBar');//cambiar la sidebar
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
    var id = __('txtId').value;
    actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    var form = 'id=' + id;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'buscarUnEmpleado', '_AJAX_CONTENT_', respuesta, form];
    ajaxBase(cont);
}

function cargosDesempeñados() {

    dropContent();
    var id = __('unEmpleado').parentNode.firstChild.innerHTML;
    //alert(id);
    //alert('buscando');
    //actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    var form = 'id=' + id;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'cargosTodos', '_AJAX_RES_', respuesta, form];
    ajaxBase(cont);
}
function horasTrabajadas() {

    dropContent();
    var id = __('unEmpleado').parentNode.firstChild.innerHTML;
    //alert(id);
    //alert('buscando');
    //actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    var form = 'id=' + id;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'horasTrabajadas', '_AJAX_RES_', respuesta, form];
    ajaxBase(cont);
}
function bitacora() {

    dropContent();
    var id = __('unEmpleado').parentNode.firstChild.innerHTML;
    //alert(id);
    //alert('buscando');
    //actualizarSideBar('unempleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    var form = 'id=' + id;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'bitacora', '_AJAX_RES_', respuesta, form];
    ajaxBase(cont);
}

function tiempoEnLinea(){
    dropContent();
    var id = __('unEmpleado').parentNode.firstChild.innerHTML;
    var form = 'id=' + id;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'unempleado', 'bitacora', '_AJAX_RES_', respuesta, form];
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