// util
function respuesta(tipo, mensaje1, mensaje2) {
    result = '<div class= "alert alert-dismissible alert-' + tipo + ' role="alert">';
    result += '<button type="button" class="close" data-dismiss="alert">X</button>';
    result += '<h4>' + mensaje1 + '</h4>';
    result += '<p><strong>' + mensaje2 + '</strong></p>';
    result += '</div>';
    return result;
}

function requerido(campo) {
    __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Importante', campo + ' es obligatorio');
}

function dropContent() {
    while (__('contenido').firstChild) {
        __('contenido').removeChild(__('contenido').firstChild);
    }
    while (__('_AJAX_RES_').firstChild) {
        __('_AJAX_RES_').removeChild(__('_AJAX_RES_').firstChild);
    }
    
}
function dropAlert() {

    while (__('_AJAX_ALERT_').firstChild) {
        __('_AJAX_ALERT_').removeChild(__('_AJAX_ALERT_').firstChild);
    }
    
}
// toggle y print

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
//ocultar el side antes de imprimir para que no quede el espacio en blanco
$("#imprimir").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
    window.print();
    $("#wrapper").toggleClass("toggled");
});

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 4000);



//scrips sidebar

function dropSideBar() {
    while (__('sidebar-wrapper').firstChild) {
        __('sidebar-wrapper').removeChild(__('sidebar-wrapper').firstChild);
    }
}
function  actualizarSideBar(view, func) {
    var connect;
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
            if (connect.responseText == 1) {
                __('_AJAX_ALERT_').innerHTML = respuesta('success', 'listo', '');
            } else {
                var response = JSON.parse(connect.responseText);//parsear la respuesta de php a json
                //__('_AJAX_ALERT_').innerHTML = connect.responseText;
                asideBarContent(response); //mostramos la respuesta de php
            }
        } else if (connect.readyState != 4) {
            // __('_AJAX_ALERT_').innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }
    connect.open('GET', 'ajax.php?view=' + view + '&func=' + func, true);
    connect.send(); //metodo para mandar cosas por ajax
}
function asideBarContent(json) {
    dropSideBar();
    var res = '';
    res += '<ul class="sidebar-nav"> <li class="sidebar-brand" >';
    res += '<a href="#">' + json.titulo + ' </a> </li>';

    var otrocount = Object.keys(json.value).length;
    for (var i = 0; i < otrocount; i++) {
        res += ' <li> <a href="#" onclick="' + json.onclick[i] + '">' + json.value[i] + '</a></li>';
    }
    res += '</ul>';
    __('sidebar-wrapper').innerHTML = res;

}

///////////////////////////////////////////
function ajaxBase(cont) {//ojo terminar la vista   
    var connect;   
    // cont[0] = metodo
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
          
                 dropAlert();
                __(cont[3]).innerHTML = connect.responseText; 
        } else if (connect.readyState != 4) {
           
            __('_AJAX_ALERT_').innerHTML = respuesta(cont[4][0], cont[4][1],cont[4][2]);
        }
    }
    if (cont[0]==='POST') {
        connect.open(cont[0], 'ajax.php?view='+cont[1]+'&mode='+cont[2], true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
        connect.send(cont[5]); //ojo llenar despeus
    } else {
        connect.open(cont[0], 'ajax.php?view='+cont[1]+'&func='+cont[2], true);
        connect.send(); 
    }
}