<div class="col-md-10 col-md-offset-1" >
    <div class="jumbotron">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <h2> <?php echo isset($titulo)?  $titulo : '' ?></h2>
                <form role="form" <?php echo isset($form) ? 'id="' . $form. '"' : '' ?> >

                    <?php
                    echo (isset($selects) ? $selects : '');

                    if (isset($campos)) {

                        for ($i = 0; $i < sizeof($campos) ; $i++) {
                            echo '<div class="form-group">';

                            echo '<label for="' . $campos[$i][1] . '">';
                            echo $campos[$i][0] . ' </label>';
                            echo' <input type="' . $campos[$i][2] . '" class="form-control"id="' . $campos[$i][1];
                            echo isset($valores) ? '" value="' . $valores[$i] . '"' : '';
                            echo '"   /> </div>';
                        }
                    }
                    ?>
                    <button type="button" class="btn btn-default btn-block"
                            <?php
                            if (isset($boton)) {
                                echo 'id="' . $boton[0] . '"';
                                echo 'onclick="' . $boton[1] . '"';
                            }
                            ?>
                            >Enviar</button>


                </form>
            </div>
        </div>
    </div>
</div>

