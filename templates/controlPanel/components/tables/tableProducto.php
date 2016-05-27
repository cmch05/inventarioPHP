<h3>
    <?php echo $titulo ?>
</h3>

<div class="row">
    <div class="col-md-12">
        <!-- <div class="table-responsive"> -->
            <table class="table table-hover table-bordered table-condensed">
                <?php echo $tabla ?>
            </table>
        </div>
   <!-- </div> -->
</div>
<?php
if (isset($tabla2)) {

    echo' <div class="row"> <div class="col-md-12"> ';
    echo '<div class="table-responsive">';
    echo '<table class="table table-hover table-bordered table-condensed">';
    echo $tabla2;
    echo ' </table> </div> </div> </div>';
}
?>

