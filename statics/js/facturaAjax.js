function viewNuevaFactura() {
    //alert('crando una nuevo marca');
    dropContent();
    actualizarSideBar('factura', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'factura', 'viewNuevaFactura', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
   
}

function viewVerFactura(){
    alert('crand factura  marca');
}