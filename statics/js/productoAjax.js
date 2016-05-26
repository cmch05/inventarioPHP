

function prueba() {
    dropContent();
    actualizarSideBar('empleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'empleado', 'ver', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
}

function viewNuevoProducto() {
    alert('crando un nuevo producto');
}
function viewNuevaMarca() {
    //alert('crando una nuevo marca');
    //alert(' buscando');
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'producto', 'viewNuevaMarca', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
}
function viewVerProductos() {
    alert('viendo  producto');
}
function viewModificarProducto() {
    alert('modificando  producto');
}
function crearActualizarMarca() {
    //alert('Creaando actualizadndo una marca ' + __('txtId').value);



    if (__('txtId').value === '' ||
            __('txtNombre').value == ''||
            __('txtDireccion').value == ''||
            __('txtTelefono').value == ''||
            __('txtEmail').value == '' ) {

        alert('Todos los campos son requeridos');
    }
    
    
}

