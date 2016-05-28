
<div class="row">
    <div class="col-md-4" id="itemSelect">

        <h2> <?php echo isset($titulo) ? $titulo : '' ?></h2>
        <form role="form" <?php echo isset($idActualizar) ? 'id="' . $idActualizar . '"' : '' ?> >

            <?php
            echo (isset($selects) ? $selects : '');

            if (isset($campos)) {

                for ($i = 0; $i < sizeof($campos); $i++) {
                    echo '<div class="form-group">';

                    echo '<label for="' . $campos[$i][1] . '" >';
                    echo $campos[$i][0] . ' </label>';

                    echo ' <input type="' . $campos[$i][2] . '" class="form-control"id="' . $campos[$i][1];
                    echo isset($valores) ? '" value="' . $valores[$i] . '"' : '';
                    echo '"   /> </div>';
                }
            }
            if (isset($descripcion)) {
                echo '<div class="form-group">';
                echo '<label for="' . $descripcion[0] . '"> ' . $descripcion[1] . '</label>';
                echo '<textarea class="form-control" rows="5" id="' . $descripcion[0] . '">';
                if (isset($valores)) {
                    echo array_key_exists('descripcion', $valores) ? $valores['descripcion'] : '';
                }
                echo '</textarea> </div>';
            }
            ?>

            <button type="button" class="btn btn-default col-md-4 col-md-offset-8 btn-warning "
            <?php
            if (isset($boton)) {
                echo 'id="' . $boton[0] . '"';
                echo 'onclick="' . $boton[1] . '"';
            }
            ?> >Agregar Item</button>                       
        </form>    
    </div>
    <div class="col-md-8" id="tableItems">    
            <h2 class="">Factura</h2>
   
        <table class="table table-hover  table-condensed">
            <thead><tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th  id="accion">Acción</th>

                </tr></thead>
            <tbody id="tbody">
                <tr>
                    <td> contenido</td>
                    <td>contenido dos</td>
                    <td>contenido tes</td>
                </tr>

            </tbody>
        </table>
    </div>








</div>

</div>

<?php
//http://www.tutorialrepublic.com/twitter-bootstrap-tutorial/bootstrap-forms.php 
?>