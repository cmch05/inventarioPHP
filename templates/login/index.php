<!DOCTYPE html>
<html lang="en" id="html-content">
    <?php require('templates/controlPanel/header.php'); ?>

    <body >
        <div id="wrapper">
            <?php //require('components/navaside.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <?php //require('navbar.php'); ?>
                    <?php //require('alert.php'); ?>
<?php //echo $_SESSION['salida']; ?>
                    <!-- <div class="row"><div class="col-md-12"> -->
                    <div class="row">
                        <div class="col-md-6 col-md-offset-2">

                            <div id="_AJAX_CONTENT_"></div>
                            <?php require('templates/login/form.php'); ?>


                            <div id="_AJAX_ALERT_"></div>
                            <div id="_AJAX_RES_"></div>
                            <div id="contenido">
                                <?php //echo isset($indexUsuario)? $indexUsuario :false; ?>

                            </div>


                            <?php //require('content.php'); ?>
                        </div>
                        <!-- <div class="col-md-4"><?php // require 'aside.php';  ?></div> -->
                    </div>
                    <!--</div></div> -->
                    <?php //require('footer.php'); ?>

                </div>
            </div>
        </div>
        <?php require('templates/controlPanel/scrips.php'); ?>
    </body>
</html>