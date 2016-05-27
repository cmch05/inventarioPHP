

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
function viewActualizarMarca(event) {
    event = event || window.event; // IE
    var id = event.parentNode.parentNode.firstChild.innerHTML;
    //alert(id);
    var form = 'id=' + id;
    //if (id != '') {
    //alert('crando una nuevo marca');
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'producto', 'viewActualizarMarca', '_AJAX_CONTENT_', respuesta, form];
    ajaxBase(cont);
    //}
}
function viewNuevoProducto() {
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'producto', 'viewNuevoProducto', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
}
function viewVerProductos() {

    //alert('viendo  producto');

    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'producto', 'viewVerProductos', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);

}

function viewActualizarProducto(event) {
    //alert('modificando  producto');
     event = event || window.event; // IE
    var id = event.parentNode.parentNode.firstChild.innerHTML;
    //alert(id);
    var form = 'id=' + id;
    //if (id != '') {
    //alert('crando una nuevo marca');
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'producto', 'viewActualizarProducto', '_AJAX_CONTENT_', respuesta, form];
    ajaxBase(cont);
}





function crearActualizarMarca(evento) {
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    var ciudad, id, nombre, direccion, telefono, correo, form, idActualizar;

     //var idActualizar = evento.parentNode.parentNode.firstChild.innerHTML;

    var event = event || window.event; // IE
    var target = event.target || event.srcElement; // IE captura el elemento que disparo el evento
    var identificador = target.id;// identifica si es nuevo o actualizar 
     idActualizar = __(identificador).parentNode.getAttribute('id');
    //alert(identificador);
    //alert(idActualizar);
    ciudad = __('ciudad').value;
    nombre = __('txtNombre').value;
    id = __('txtId').value;
    direccion = __('txtDireccion').value;
    telefono = __('txtTelefono').value;
    correo = __('txtEmail').value;

    form = 'id=' + id + '&nombre=' + nombre + '&direccion=' + direccion +
            '&telefono=' + telefono + '&correo=' + correo + '&ciudad=' + ciudad
            + '&identificador=' + identificador + '&idActualizar=' + idActualizar;

    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'producto', 'crearActualizarMarca', '_AJAX_ALERT_', respuesta, form];
    ajaxBase(cont);
    viewVerMarcas();

}
function crearActualizarProducto(evento) {
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    var marca, id, nombre, pVenta, pCompra, cantidad, descripcion, form, idActualizar;

    // var idActualizar = evento.parentNode.parentNode.firstChild.innerHTML;

    var event = event || window.event; // IE
    var target = event.target || event.srcElement; // IE captura el elemento que disparo el evento
    var identificador = target.id;// identifica si es nuevo o actualizar 
    //alert(identificador);
    var idActualizar = __(identificador).parentNode.getAttribute('id');
    //alert(idActualizar);
    id = __('txtId').value;
    nombre = __('txtNombre').value;
    marca = __('marca').value;
    cantidad = __('txtCantidad').value;
    pVenta = __('txtPVenta').value;
    pCompra = __('txtPCompra').value;
    descripcion = __('descripcion').value;

    form = 'id=' + id + '&nombre=' + nombre + '&marca=' + marca +
            '&cantidad=' + cantidad + '&pVenta=' + pVenta + '&pCompra=' + pCompra
            + '&identificador=' + identificador + '&idActualizar=' + idActualizar
            + '&descripcion=' + descripcion;

    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['POST', 'producto', 'crearActualizarProducto', '_AJAX_ALERT_', respuesta, form];
    ajaxBase(cont);
    viewVerProductos();




    if (__('txtId').value === '' ||
            __('txtNombre').value == '' ||
            __('txtDireccion').value == '' ||
            __('txtTelefono').value == '' ||
            __('txtEmail').value == '') {

    }
    //alert('creando actualizado producto');

}

function viewVerMarcas() {
    //alert('viendo marcas');
    dropContent();
    actualizarSideBar('producto', 'sideBar');//cambiar la sidebar
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'producto', 'viewVerMarcas', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
}