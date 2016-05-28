var producto = new Array();
var precioTotal = 0;


function viewNuevaFactura() {
    //alert('crando una nuevo marca');
    dropContent();
    actualizarSideBar('factura', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var cont = ['GET', 'factura', 'viewNuevaFactura', '_AJAX_CONTENT_', respuesta];
    ajaxBase(cont);
    // __("cboProducto").selectedIndex = "-1";
}

function precioProducto(id) {

    var form;
    form = 'id=' + id;
    var connect;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            __('txtPrecio').value = connect.responseText;
            //res = connect.responseText;
            //alert(' sacando el precio de la db ' + res);
            // return false;
        } else if (connect.readyState != 4) {
            //  __('_AJAX_ALERT_').innerHTML = respuesta(cont[4][0], cont[4][1],cont[4][2]);
        }
    }
    connect.open('POST', 'ajax.php?view=factura&mode=precioProducto', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form); //ojo llenar despeus
//return res;
}

function viewVerFactura() {
    alert('crand factura  marca');
}



function agregarProducto(event) {
    dropAlert();
    var id = __('cboProducto').value;
    var cantidad = __('txtCantidad').value;
    //var contenido = __('producto');
    var nombre = __('cboProducto').options[__('cboProducto').selectedIndex].text;//optener el nombre del option
    var precio = __('txtPrecio').value;
    var eliminar = '</td><td id="eliminar"><a href="#" onclick="eliminarProductoLista(this)"><span class="glyphicon glyphicon-trash"></span> Eliminar </a></td>';

    if (id == '') {
        __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Importante', 'Seleccione un producto Primero');
    } else {

        if (cantidad < 1) {
            __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Importante', 'Inserte una cantidad');
        } else {
            //alert(precio);
            this.precioTotal += (precio * cantidad);

            var node = document.createElement('tr');
            node.innerHTML = '<td id="' + id + '">' + nombre + '</td><td>' + cantidad + '</td><td>' + precio + eliminar;
            __('tbody').appendChild(node);
            __('precioTotal').innerHTML = this.precioTotal + ' COP';
            __("cboProducto").selectedIndex = "";
            __('txtCantidad').value = 0;
        }
    }

    for (var i = 0; i < this.producto.length; i++) {
        // alert(this.producto[i].id + ' ' + this.producto[i].cantidad);
    }

}

function eliminarProductoLista(event) {
    event = event || window.event; // IE
    var padre = event.parentNode.parentNode;
    var cantidad = event.parentNode.parentNode.getElementsByTagName('td')[1].innerHTML;
    var precio = event.parentNode.parentNode.getElementsByTagName('td')[2].innerHTML;

    this.precioTotal -= precio * cantidad;
    __('precioTotal').innerHTML = this.precioTotal + ' COP';
    padre.remove();
}
function guardarFactura() {
    dropAlert();
    var tabla, rows, id, precio, cantidad;
    tabla = __('tbody').childNodes;

    if (this.precioTotal != 0 && tabla.length != 0) {
        for (var i = 0; i < tabla.length; i++) {

            rows = tabla[i].childNodes;
            rows = tabla[i].childNodes;
            id = rows[0].getAttribute('id');
            cantidad = rows[1].innerHTML;
            precio = rows[2].innerHTML;

            //alert(cantidad);
            this.producto.push({'id': id, 'cantidad': cantidad, 'precio': (precio * cantidad)});
           // alert(this.producto[0].id)
        }
        enviarJSON(this.producto);
    } else {
        __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Importante', 'Agregue primero productos a la factura');
    }

}

function enviarJSON(json) {
    var form = 'JSON=' +JSON.stringify(json);
    var connect;
    //alert(form);
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            var res = connect.responseText;
            if(connect.responseText == 1){
            __('_AJAX_ALERT_').innerHTML = respuesta('success', 'Factura Creada', 'La factura fue creada con exito');
                borrarTabla();
        }else if(connect.responseText == 0){
            __('_AJAX_ALERT_').innerHTML = respuesta('danger', 'Error ', 'No se pudo crear la factura');
  
        }

        } else if (connect.readyState != 4) {
           // alert(connect.responseText);
            __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Esperando.. ', 'Esperando respuesta del servidor');
        }
    }
    connect.open('POST', 'ajax.php?view=factura&mode=guardarFactura', true);
    //connect.setRequestHeader("Content-type", "application/json")
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form); //ojo llenar despeus

}
function borrarTabla(){
    while(__('tbody').firstChild){
         __('tbody').removeChild(__('tbody').firstChild);
         __('precioTotal').innerHTML ='';
    }
}





function myFunction(contenido) {
    var node = document.createElement("LI");
    var textnode = document.createTextNode("Water");
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
}

