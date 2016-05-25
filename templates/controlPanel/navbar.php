
<div class="row">
    <div class="col-md-12">
        <nav class="navbar navbar-default" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                </button> <a class="navbar-brand" href="#menu-toggle"  id="menu-toggle">Inventario</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"> </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php require 'components/navbar/facturas.php'; ?>
                    <?php require 'components/navbar/empleados.php'; ?>
                    <?php require 'components/navbar/proveedores.php'; ?>
                    <?php require 'components/navbar/productos.php'; ?>
                    <?php require 'components/navbar/configuracion.php'; ?>
                    <li><a id="imprimir" href="#">Imprimir Reporte</a></li>
                    <li><a id="salir" href="#" onclick="goLogOut()">Salir</a></li>
                </ul>
            </div>
        </nav>
    </div>
</div>

<?php // require('navaside.php') ?>
       