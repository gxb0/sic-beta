<?php
if (!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>
<?php if ($_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4 ) {
exit('<h1 class="text-center">Lo sentimos, solamente el administrador y bodeguero puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1>');
?>

<?php }?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

    <body id="page-top">

        <div id="wrapper">
            <div class="container-fluid">

                <!-- Page Heading -->


                <div class="row ">

                    <div class="col-lg-3">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4 card">
                            <div class="card-header py-3 bg-gradient-primary text-white">Registrar Nuevo Producto</div>
                                <div class="col-lg-9" id="contenedor_formulario">

                                    <div class="form-group">

                                        <br>
                                        <label for="id_producto">Id del producto</label>
                                        <input data-requerido="true" class="form-control " type="text" id="id_producto"
                                               placeholder="Id del producto">
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre_producto">Nombre del producto</label>
                                        <input data-requerido="true" class="form-control" type="text" id="nombre_producto"
                                               placeholder="Nombre del producto">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_compra">Precio de compra</label>
                                        <input data-requerido="true" class="form-control" type="number" id="precio_compra"
                                               placeholder="Precio de compra">
                                    </div>
                                    <div class="form-group">
                                        <label for="precio_venta">Precio de venta</label>
                                        <input data-toggle="tooltip" title="El precio de venta no puede ser menor que el precio de compra."
                                               data-placement="top" data-requerido="true" class="form-control" type="number" id="precio_venta"
                                               placeholder="Precio de venta">
                                    </div>
                                    <div class="form-group">
                                        <p hidden="hidden" class="h5"><strong>Utilidad: </strong>$<span id="mostrar_utilidad"></span></p>
                                    </div>
                                    <div class="form-group">
                                        <label for="inventario">Inventario inicial</label>
                                        <input data-requerido="true" class="form-control" type="number" id="inventario"
                                               placeholder="Inventario inicial">
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Cantidad en stock</label>
                                        <input data-requerido="true" class="form-control" type="number" id="stock"
                                               placeholder="Cantidad mínima que puede existir">
                                    </div>
                                    <div class="form-group">
                                        <label for="stock">Familia o proveedor</label>
                                        <input data-requerido="true" class="form-control" type="text" id="familia"
                                               placeholder="Proveedor">
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div hidden="hidden" class="text-center alert alert-success">
                                                <p id="mostrar_resultados"></p>
                                            </div>
                                        </div>
                                        <div class="col-xs-6">
                                            <button id="guardar_producto" class="form-control btn btn-info">Registrar Producto</button>
                                        </div>
                                        <div class="col-xs-6" hidden="hidden">
                                            <button id="cancelar_producto_editado" class="form-control btn btn-warning">Cancelar</button>
                                        </div>
                                    </div>
                                    <br>
                                </div>



                        </div>
                    </div>
                    <!-----------------------------------------hasta aqui seccion ingreso inicio de caja----------------------------->
                    <div class="col-md-9 col-xs-5 mb-7">

                        <div class="card shadow mb-7">
                            <div class="card-header py-3  bg-gradient-success text-white">
                                <h6 class="m-0 font-weight-bold  text-white">Productos Ingresados</h6>
                            </div>
                            <div class="card-body">
                                <div class="col-xs-10 col-md-12">
                                    <div class="form-group">
                                        <input type="text" id="buscar_producto" class="form-control"
                                               placeholder="Buscar producto por id o nombre">
                                    </div>
                                    <div class="card shadow mb-7">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Ultimos Productos Registrados</h6>
                                        </div>
                                        <div class="card-body col-xl">
                                            <div class="table-responsive">
                                                <table class="table table-striped table-hover table-bordered table-condensed">
                                                    <thead>
                                                    <tr>
                                                        <th class="text-center">Código</th>
                                                        <th class="text-center">Nombre</th>
                                                        <th class="text-center">Precio de compra</th>
                                                        <th class="text-center">Precio de venta</th>
                                                        <th class="text-center">Utilidad</th>
                                                        <th class="text-center">Existencia</th>
                                                        <th class="text-center">Existencia mínima</th>
                                                        <th class="text-center">Familia</th>
                                                        <th class="text-center">Opciones</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id="cuerpo_tabla_productos">
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
<br>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="btn-group btn-group-justified">
                                                <div class="btn-group">
                                                    <button id="cargar_productos_nuevos" type="button" class="btn btn-success"><i
                                                                class="fa fa-arrow-left"></i> Productos nuevos
                                                    </button>
                                                </div>
                                                <div class="btn-group">
                                                    <button id="cargar_productos_antiguos" type="button" class="btn btn-info">Productos
                                                        anteriores <i class="fa fa-arrow-right"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                            </div>


                        </div>

                    </div>

                </div>

            </div>
            </div>
        </div>




<div id="modal_confirmar" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmar</h4>
            </div>
            <div class="modal-body">
                <p class="h5">¿Realmente deseas eliminar el producto? Esta opción no se puede deshacer.</p>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <div hidden="hidden" class="alert">
                            <span id="mostrar_resultados_eliminar"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button id="eliminar_producto" class="form-control btn btn-danger">Eliminar</button>
                    </div>
                    <div class="col-xs-6">
                        <button id="cancelar_confirmacion_eliminar" data-dismiss="modal"
                                class="form-control btn btn-warning">Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="modal_agregar_piezas" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Agregar piezas</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="numero_piezas_agregar">Ingresa el número de piezas que quieres agregar</label>
                    <input class="form-control" placeholder="Ingresa el número de piezas que quieres agregar"
                           type="number" id="numero_piezas_agregar">
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <div hidden="hidden" class="alert text-center">
                            <span id="mostrar_resultados_agregar_piezas"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button id="agregar_piezas" class="form-control btn btn-success">Agregar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="modal_dar_baja" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Dar de baja</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="numero_piezas_baja">Ingresa el número de piezas que quieres dar de baja</label>
                    <input class="form-control" placeholder="Ingresa el número de piezas que quieres dar de baja"
                           type="number" id="numero_piezas_baja">
                </div>
                <div class="form-group">
                    <label for="motivo_baja">Razón de baja</label>
                    <textarea style="resize: none;" class="form-control" placeholder="Razón de baja" type="number"
                              id="motivo_baja"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <div hidden="hidden" class="alert text-center">
                            <span id="mostrar_resultados_dar_baja"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button id="dar_baja" class="form-control btn btn-warning">Dar de baja</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="./js/inventarios.js"></script>
<script type="text/javascript" src="./lib/np.js"></script>
<script>

    // Show the progress bar
    NProgress.start();

    // Increase randomly
    var interval = setInterval(function () {
        NProgress.inc();
    }, 1000);

    // Trigger finish when page fully loaded
    jQuery(window).load(function () {
        clearInterval(interval);
        NProgress.done();
    });

    // Trigger bar when exiting the page
    jQuery(window).unload(function () {
        NProgress.start();
    });



    <script src="vendor/jquery/jquery.min.js"></script>


<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>


</script>
<script src="./lib/eac.js"></script>

<script src="./lib/eac.js"></script>
<link rel="stylesheet" href="./css/eac.css">


</body>
</html>