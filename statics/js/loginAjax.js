

function runScriptLogin(e) {
    if (e.keyCode == 13) {
        // 13 codigo ascii de la tecla enter
        goLogin();
    }
}

function goLogin() {
    var id, pass ,form;
    id = __('txtid').value;
    pass = __('txtPass').value;
      //sesion = __('session_login').checked ? true : false;
    form = 'user=' + id + '&pass=' + pass;
    var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var respuesta2 = ['danger', 'Error', 'Id o contraseña incorrectos'];
    var cont = ['POST', 'login', 'login', '_AJAX_CONTENT_', form, respuesta, respuesta2];
    ajaxBaseLogin(cont);
}

function goLogOut(){
    //alert('saliento');
     var respuesta = ['warning', 'Procesando', 'Estamos procesando la informacion'];
    var respuesta2 = ['danger', 'Error', 'Id o contraseña incorrectos'];
    var cont = ['GET', 'logout', 'logout', '_AJAX_CONTENT_','',respuesta,respuesta2];
    ajaxBaseLogin(cont);
    location.reload();
}


/*

  window.onbeforeunload = confirmExit;
  function confirmExit()
  {
    return "Ha intentado salir de esta pagina. Si ha realizado algun cambio en los campos sin hacer clic en el boton Guardar, los cambios se perderan. Seguro que desea salir de esta pagina? ";
  }


*/




function ajaxBaseLogin(cont) {//ojo terminar la vista   
    var connect;   
    // cont[0] = metodo
    connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP'); //tipos de ajax uno para todos
    connect.onreadystatechange = function () {
        if (connect.readyState == 4 && connect.status == 200) {
          if (connect.responseText == 0) {
                alert('algo ha salido mal' + connect.responseText);
                 //__('_AJAX_CONTENT_').innerHTML = connect.responseText;
                 if (cont.leng ==6){
                     __('_AJAX_CONTENT_').innerHTML = respuesta(cont[6][0], cont[6][1],cont[6][2]);
                 }
            }else{
           
              location.reload();
            }
        } else if (connect.readyState != 4) {
                      
            __('_AJAX_CONTENT_').innerHTML = respuesta(cont[5][0], cont[5][1],cont[5][2]);
        }
    }
    //alert(cont[0]);
    if (cont[0]=='POST') {
        connect.open(cont[0], 'ajax.php?view='+cont[1]+'&mode='+cont[2], true);
        connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
        connect.send(cont[4]); //ojo llenar despeus
    } else {
        connect.open(cont[0], 'ajax.php?view='+cont[1]+'&func='+cont[2], true);
        connect.send(); 
        
    }
}

function dropContentHtml() {
    while (__('html-content').firstChild) {
        __('html-content').removeChild(__('html-content').firstChild);
    }
}