<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <form role="form">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="empleado">Seleccione un empleado</label>
                            <select class="form-control" id="empleado">                       
                                <?php
                                while ($reg = mysql_fetch_array($consulta_asigatura)) {
                                    if ($reg['codigo'] == $codigo_asignatura) {
                                        echo "<option selected value=" . $reg['codigo'] . ">" . strtoupper($reg['nombre']) . "</option>";
                                        continue;
                                    }
                                    echo "<option value=" . $reg['codigo'] . ">" . strtoupper($reg['nombre']) . "</option>";
                                }
                                ?>
                            </select>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cargo">Seleccione un Cargo</label>
                                <select class="form-control" id="cargo">                       
                                    <option>4</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="empleado">Seleccione un empleado</label>
                            <select class="form-control" id="empleado">                       
                                <option>4</option>
                            </select>
                        </div>






                        <?php
                        for ($i = 0; $i < (sizeof($campos) - 2); $i++) {
                            echo '<div class="form-group">';

                            echo '<label for="' . $campos[$i][1] . '">';
                            echo $campos[$i][0] . ' </label>';
                            echo' <input type="' . $campos[$i][2] . '" class="form-control"id="' . $campos[$i][1] . '" value="' . $valores[$i] . '" /> </div>';
                        }
                        ?>
                        <button type="button" class="btn btn-default btn-block"
                                id="<?php echo $campos[sizeof($campos) - 1] ?>"
                                onclick="<?php echo $campos[sizeof($campos) - 2]; ?>"
                                >Enviar</button>
                        </form>
                    </div>
                </div>
        </div>
