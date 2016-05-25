<div class="col-md-10 col-md-offset-1" >
<div class="jumbotron">
    <div class="row">
        <div class="col-md-12">
            <form role="form" <?php echo isset($idActualizar)? 'id="'.$idActualizar.'"' : '' ?> >
                <!-- onkeypress="return runScripBuscar(event)"-->
                <?php
                for ($i = 0; $i < (sizeof($campos) - 2); $i++) {
                    echo '<div class="form-group">';

                    echo '<label for="' . $campos[$i][1] . '">';
                    echo $campos[$i][0] . ' </label>';
                    echo' <input type="' . $campos[$i][2] . '" class="form-control"id="' . $campos[$i][1];
                    echo isset($valores)? '" value="' . $valores[$i].'"' :'';
                    echo '"  /> </div>';
                 
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
</div>
