function Ajax(method,view, funcMode, from) {
    //dropContent();
    
    this.method= method;
    this.view= view;
    this.funcMode= funcMode;
    this.form= from;
    this.connect = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject('Microsoft.XMLHTTP');
}

Ajax.prototype.esperarRespuesta = function (idContent){
    this.connect.onreadystatechange = function () {
        if (this.connect.readyState == 4 && this.connect.status == 200) {
           
                __(idContent).innerHTML = this.connect.responseText; //mostramos la respuesta de php
            
        } else if (this.connect.readyState != 4) {
           // __(idContent).innerHTML = respuesta('warning', 'Procesando', 'Estamos procesando la información');
        }
    }   
}
Ajax.prototype.enviarRequest = function (){
    if (this.method=== 'POST') {
        this.connect.open(this.method, 'ajax.php?view='+this.view+'&mode='+this.funcMode, true);
        this.connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); //pasar url codificada importante
        this.connect.send(form); //metodo para mandar cosas por ajax

    } else {
        this.connect.open(this.method, 'ajax.php?view='+this.view+'&func='+this.funcMode, true);
        this.connect.send(); //metodo para mandar cosas por ajax
    }
}
Ajax.prototype.respuesta = function(clase , titulo , mensaje){
    
}
