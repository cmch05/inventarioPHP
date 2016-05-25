

//empleado scrips
function crearActualizarEmpleado(event) {

    var id, nombre, direccion, telefono, fecha, sueldo, form, mode, idActualizar;
    event = event || window.event; // IE
    var target = event.target || event.srcElement; // IE captura el elemento que disparo el evento
    //alert('enviando a emleado');
    var identificador = target.id;// identifica si es nuevo o actualizar
    //alert('actualizado un usuario nuevo');
    idActualizar = target.parentNode.getAttribute('id');
    //alert(idActualizar);
    id = __('txtId').value;
    //alert(id);
    nombre = __('txtNombre').value;
    direccion = __('txtDireccion').value;
    telefono = __('txtTelefono').value;
    fecha = __('txtFecha').value;
    sueldo = __('txtSueldo').value;
    form = 'id=' + id + '&nombre=' + nombre + '&direccion=' + direccion + '&telefono=' + telefono +
            '&fecha=' + fecha + '&sueldo=' + sueldo + '&idActualizar=' + idActualizar; // tabien se puede enviar en formato json
    if (id == '') {
        requerido('La identificación');
    } else {
        if (nombre == '') {
            requerido('el Nombre');
        } else {
            if (direccion == '') {

                requerido('La direccion');
            } else {
                if (telefono == '') {
                    requerido('El telefono');
                } else {
                    if (fecha == '') {
                        requerido('La fecha');
                    } else {
                        if (sueldo == '') {
                            requerido('El sueldo');
                        } else {
                            __('_AJAX_ALERT_').innerHTML = '';
                            //alert('Enviando datos al servidor');

                            connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
                            connect.onreadystatechange = function () {
                                if (connect.readyState == 4 && connect.status == 200) {
                                    if (connect.responseText == 1) {
                                        __('_AJAX_ALERT_').innerHTML = respuesta('success', 'Registro completado!', 'creado actualizado correctamente');
                                        //location.reload();
                                        vistaVerEmpleados();
                                    } else {
                                        __('_AJAX_ALERT_').innerHTML = respuesta('warning', connect.responseText, 'problema con el registro');
                                    }
                                } else if (connect.readyState != 4) {
                                    __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la informacion');
                                }
                            }
                            //connect.open('POST', 'ajax.php?view=empleado&mode=actualizar', true);
                            connect.open('POST', 'ajax.php?view=empleado&mode=' + identificador, true);
                            connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //pasar url codificada importante
                            connect.send(form); //metodo para mandar cosas por ajax

                        }
                    }
                }
            }
        }
    }
}

function vistaCrearEmpleado() {
    dropContent();
    var connect;
    //form = 'user=' + user + '&pass=' + pass + '&email=' + email; // tabien se puede enviar en formato json
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Registro completado!', '');
                //2 location.reload();
            } else {
                __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php
            }
        } else if (connect.readyState != 4) {
            __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }
    connect.open('GET', 'ajax.php?view=empleado&func=crear', true);
    connect.send(); //metodo para mandar cosas por ajax
}

function vistaVerEmpleados() {
    dropContent();
    actualizarSideBar('empleado', 'sideBar');
    var connect;
    //alert('ver empleados');
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Registro completado!', '');
                //2 location.reload();
            } else {
                __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php

            }
        } else if (connect.readyState != 4) {
            __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }
    connect.open('GET', 'ajax.php?view=empleado&func=ver', true);
    connect.send(); //metodo para mandar cosas por ajax
}

function vistaActualizarEmpleados(event) {
    dropContent();
    var connect;
    event = event || window.event; // IE
    var padre = event.parentNode.parentNode.firstChild.innerHTML;
    if (padre != '') {
        //alert('vas a actualizar un  empleado '+padre);
        form = 'id=' + padre; // tabien se puede enviar en formato json
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
        connect.onreadystatechange = function () {
            if (connect.readyState == 4 && connect.status == 200) {
                if (connect.responseText == 1) {
                    __('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Registro completado!', 'Estamos redireccionandote');
                    //location.reload();
                } else {
                    __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php
                }
            } else if (connect.readyState != 4) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la informacion');
            }
        }
        //connect.open('POST', 'ajax.php?view=empleado&mode=actualizar', true);
        connect.open('POST', 'ajax.php?view=empleado&mode=viewActualizar', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //pasar url codificada importante
        connect.send(form); //metodo para mandar cosas por ajax
    }
}
function viewCargoEmpleado() {
    dropContent();
    var connect;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Registro completado!', '');
                //2 location.reload();
            } else {
                __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php
            }
        } else if (connect.readyState != 4) {
            __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }
    connect.open('GET', 'ajax.php?view=empleado&func=cargo', true);
    connect.send(); //metodo para mandar cosas por ajax

}
function viewAsignarCargo(event) {//ojo terminar la vista
    dropContent();
    var connect, idEmpleado, cargoCodigo, metodo, form;
    if (event != null) {
        event = event || window.event; // IE
        idEmpleado = event.parentNode.parentNode.firstChild.innerHTML;
        cargoCodigo = event.parentNode.parentNode.getElementsByTagName('td')[3].innerHTML;
        //alert(cargoCodigo);
        form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    }
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Registro completado!', '');
                //2 location.reload();
            } else {
                __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php
            }
        } else if (connect.readyState != 4) {
            __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }
    if (event != null) {
        connect.open('POST', 'ajax.php?view=empleado&mode=viewAsignarCargo', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //pasar url codificada importante
        connect.send(form); //metodo para mandar cosas por ajax

    } else {
        connect.open('GET', 'ajax.php?view=empleado&func=viewAsignarCargo', true);
        connect.send(); //metodo para mandar cosas por ajax

    }

}
function asignarCargo(event) {
    var connect;
    var empleadoId, cargoCodigo;
    event = event || window.event; // IE
    //var target = event.target || event.srcElement; // IE captura el elemento que disparo el evento

    empleadoId = __(event.parentNode.parentNode.parentNode.getElementsByTagName('select')[0].getAttribute('id')).value;
    cargoCodigo = __(event.parentNode.parentNode.parentNode.getElementsByTagName('select')[1].getAttribute('id')).value;

    if (empleadoId != '' && cargoCodigo != '') {
        //alert(empleadoId);
        form = 'idEmpleado=' + empleadoId + '&cargoCodigo=' + cargoCodigo;
        connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
        connect.onreadystatechange = function () {
            if (connect.readyState == 4 && connect.status == 200) {
                if (connect.responseText == 1) {
                    //__('_AJAX_CONTENT_').innerHTML = respuesta('success', 'Cargo asignado satisfactoriamente!', '');
                    //location.reload
                    viewCargoEmpleado()
                } else {
                    __('_AJAX_CONTENT_').innerHTML = connect.responseText; //mostramos la respuesta de php
                }
            } else if (connect.readyState != 4) {
                __('_AJAX_CONTENT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la informacion');
            }
        }
        //connect.open('POST', 'ajax.php?view=empleado&mode=actualizar', true);
        connect.open('POST', 'ajax.php?view=empleado&mode=asignarCargo', true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //pasar url codificada importante
        connect.send(form); //metodo para mandar cosas por ajax
    }
}

function viewBuscarEmpleado() {
    dropContent();
    //esto aparecera despues de encontrar un empleado de lo contrario no OJO
    actualizarSideBar('empleado', 'sideBarUnEmpleado');
    //alert("Buscando empleado");
    
    
}






