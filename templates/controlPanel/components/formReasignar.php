<div class="col-md-10 col-md-offset-1" >
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <form role="form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="empleado">Seleccione un empleado</label>
                                <select class="form-control" id="empleado">
                                    <?php echo $lista[0]; ?>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cargo">Seleccione un Cargo</label>
                                <select class="form-control" id="cargo">
                                    <?php echo $lista[1]; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" >
                            <button type="button" class="btn btn-default btn-block"
                                    onclick="<?php echo $lista[2]; ?>"
                                    >Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
