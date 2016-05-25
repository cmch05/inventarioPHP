
<form role="form" onkeypress="return runScriptLogin(event)">
    <div class="form-group">

        <label for="exampleInputEmail1">
            Email
        </label>
        <input type="text" class="form-control" id="txtid" required="" />
    </div>
    <div class="form-group">

        <label for="exampleInputPassword1">
            Contraseña
        </label>
        <input type="password" class="form-control" id="txtPass" required="" />
    </div>

    <div class="checkbox">

        <label>
            <input type="checkbox" /> Mantener sesión
        </label>
    </div> 
    <button type="button" class="btn btn-default btn-block" onclick="goLogin()">
        Enviar
    </button>
</form>
