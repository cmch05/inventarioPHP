<?php

if (isset($_GET['func'])) {

    switch ($_GET['func']) {

        case 'viewNuevaFactura':
            $view = new FacturaView();
            $ciudad = $view->vistaSelects('producto');

            $boton = ['crear', 'agregarProducto()'];
            $titulo = 'Producto';
            $selects = $ciudad;
            $selects .= '';

            $campos = $view->viewNuevaFactura();
            
            echo require(TEMPLATES . 'controlPanel/components/forms/formFactura.php');
            break;
        
        
        case 'viewNuevoProducto':
            $view = new ProductoView();
            $marca = $view->vistaSelects('marca');

            $boton = ['crear', 'crearActualizarProducto()'];
            $titulo = 'Crear un Nuevo Producto';
            $selects = $marca;
            $selects .= '';
            $descripcion = array('descripcion','Descripción del Producto');
            $campos = $view->vistaCamposProducto('nuevo');

            echo require(TEMPLATES . 'controlPanel/components/forms/formProducto.php');
            break;
        case 'viewVerProductos':
            $view = new ProductoView();
            $tabla = $view->vistaTabular('verProducto');
            $titulo = 'Lista de Productos';

            echo require(TEMPLATES . 'controlPanel/components/tables/tableProducto.php');
            break;
        case 'viewVerMarcas':
            $view = new ProductoView();
            $tabla = $view->vistaTabular('verMarcas');
            $titulo = 'Lista de Marcas';

            echo require(TEMPLATES . 'controlPanel/components/tables/tableProducto.php');
            break;
        case 'sideBar':
            //echo 1;
            $sideBar = new SideBar();
            echo json_encode($sideBar->productos());
            break;


        default :
            header('location: index.php');
            break;
    }
} elseif (isset($_GET['mode'])) {
    switch ($_GET['mode']) {

        case 'precioProducto':

            $model = new FacturaModel();
            $res= $model->precioVenta($_POST['id']);           
            echo $model->recorrer($res)[0];
            $model->close();

            break;
        case 'viewActualizarMarca':
            $view = new ProductoView();
            $unaCiudad= $view->unaCiudad($_POST['id']);
            $ciudad = $view->vistaSelects('ciudad', $unaCiudad);
            $boton = ['actualizar', 'crearActualizarMarca()'];
            $titulo = 'actualizar Marca';
            $selects = $ciudad;
            $selects .= '';
            
            $campos = $view->vistaCamposMarca('nuevo');
            $valores = $view->vistaActualizarMarca($_POST['id']);
            $idActualizar =$_POST['id'];
            echo require(TEMPLATES . 'controlPanel/components/forms/formProducto.php');
            break;
        case 'crearActualizarProducto':

            $res = new ProductoView();
            echo $res->crearProducto();

            break;
        case 'viewActualizarProducto':
            $view = new ProductoView();
            $unaMarca= $view->unaMarca($_POST['id']);
            $marca = $view->vistaSelects('marca', $unaMarca);
            $boton = ['actualizar', 'crearActualizarProducto()'];
            $titulo = 'actualizar Producto';
            $selects = $marca;
            $selects .= '';
            $descripcion = array('descripcion','Descripción del Producto');//campo de descripcion
            $campos = $view->vistaCamposProducto('nuevo');
            $valores = $view->vistaActualizarProducto($_POST['id']);
            $idActualizar =$_POST['id'];
            echo require(TEMPLATES . 'controlPanel/components/forms/formProducto.php');
            break;
        case 'horasTrabajadas':
            //$datos = $_POST['id'];
            $res = new UnEmpleadoView();
            $titulo = 'Horas trabajadas';
            $tabla = $res->vistaTabular('horasTrabajadas');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;
        case 'bitacora':
            //$datos = $_POST['id'];
            $res = new UnEmpleadoView();
            $titulo = 'Horas trabajadas';

            $tabla = $res->vistaTabular('tiempoTotalOnLine');
            $tabla2 = $res->vistaTabular('bitacora');

            echo require(TEMPLATES . 'controlPanel/components/table.php');
            break;

        default :
            header('location: index.php');
            break;
    }
}
