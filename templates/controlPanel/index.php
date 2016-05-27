<!DOCTYPE html>
<html lang="en">
    <?php require('header.php'); ?>

    <body >
        <div id="wrapper">
            <?php require('components/navaside.php'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <?php //echo $_SESSION['app_id']; ?>
                    <?php require('navbar.php'); ?>
                    <?php //require('alert.php'); ?>

                    <!-- <div class="row"><div class="col-md-12"> -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="_AJAX_ALERT_"></div>
                            <div id="_AJAX_CONTENT_"></div>                         
                            <div id="contenido">
                                <?php echo isset($indexUsuario) ? $indexUsuario : false; ?>
                            </div>
                            <?php //require('content.php'); ?>
                        </div>
                        <!-- <div class="col-md-4"><?php // require 'aside.php';  ?></div> -->
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div id="_AJAX_RES_"></div>                                       
                            <?php //require('content.php'); ?>
                        </div>
                        <!-- <div class="col-md-4"><?php // require 'aside.php';  ?></div> -->
                    </div>
                    <!--</div></div> -->
                    <?php //require('footer.php'); ?>

                </div>
            </div>
        </div>
        <?php require('scrips.php'); ?>
    </body>
</html>