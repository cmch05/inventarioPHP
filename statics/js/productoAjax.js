
/*
function ajaxBase(cont) {//ojo terminar la vista   
    var connect;   
    // cont[0] = metodo
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
          
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
*/


function prueba(){
    dropContent();
    actualizarSideBar('empleado', 'sideBar');//cambiar la sidebar
    //alert('probando');
    //form = 'idEmpleado=' + idEmpleado + '&cargoCodigo=' + cargoCodigo;
    var respuesta=['warning','Procesando','Estamos procesando la informacion'];  
    var cont=['GET','empleado','ver','_AJAX_CONTENT_',respuesta];
    ajaxBase(cont);
}

