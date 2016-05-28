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

function precioProducto(id) {

    var form ,res;
    form = 'id=' + id;
    var connect;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
             res = connect.responseText;
            alert(' sacando el precio de la db ' + res);
            return false;
        } else if (connect.readyState != 4) {
            // __('_AJAX_ALERT_').innerHTML = respuesta(cont[4][0], cont[4][1],cont[4][2]);
        }
    }
    connect.open('POST', 'ajax.php?view=factura&mode=precioProducto', true);
    connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    connect.send(form); //ojo llenar despeus
return res;
}

function viewVerFactura() {
    alert('crand factura  marca');
}


var producto = new Array();
var precioTotal = 0;
function agregarProducto(event) {
    dropAlert();
    var id = __('producto').value;
    var cantidad = __('txtCantidad').value;
    var contenido = __('producto');
    var nombre = __('producto').options[__('producto').selectedIndex].text;//optener el nombre del option
    var precio = precioProducto(id);
    var eliminar = '</td> <td><a href="#" onclick=""><span class="glyphicon glyphicon-trash"></span> Eliminar </a></td>';
    if (cantidad < 1) {
        __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Importante', 'Inserte una cantidad');
    } else {
        //alert(precio);
        this.precioTotal += (precio * cantidad);
        this.producto.push({'id': id, 'cantidad': cantidad});
        var node = document.createElement('tr');
        node.innerHTML = '<td>' + nombre + '</td><td>' + cantidad + '</td><td>' + precio + eliminar;
        __('tbody').appendChild(node);

    }

    for (var i = 0; i < this.producto.length; i++) {
        // alert(this.producto[i].id + ' ' + this.producto[i].cantidad);
    }
}







function myFunction(contenido) {
    var node = document.createElement("LI");
    var textnode = document.createTextNode("Water");
    node.appendChild(textnode);
    document.getElementById("myList").appendChild(node);
}

