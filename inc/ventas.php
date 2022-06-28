<?php
    if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
    if ($_SESSION["perfil"] == 2)//1 = admin, 2 = bodeguero, 3 = vendedor, 4 = cajero
           exit('<h1 class="text-center">Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1>');

    ?>
<?php
$link = new PDO('mysql:host=localhost;dbname=okventa', 'root', '');
?>
<?php foreach ($link->query('SELECT sum(total) AS total,
                                            sum(numero_productos) AS productos,
                                    DAY(fecha) as mes FROM ventas 
                                    where DATE (fecha) = CURDATE()') as $row){ ?>
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
    <link rel="stylesheet" href="./css/abc.css">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>


<div class="row align-content-center">

    <!-- Area Chart -->
    <div class="col-xl-9 col-lg-11 ">
        <div class="card shadow mb-xl-5 border-bottom-primary">
            <!-- Card Header - Dropdown -->

            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <h6 class="md font-weight-bold text-primary">Consulta de Productos</h6>

            <div class="" style="display:<?php echo $_SESSION["perfil"] == 1 || $_SESSION["perfil"] == 4 ? 'block' : 'none' ;?>" >

                <button id="preparar_venta" class= "btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                                            <i class="fas fa-check"></i>
                                        </span>
                    <span class="text">Realizar venta</span>
                </button>



                <button id="cancelar_toda_la_venta" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                    <span class="text">Cancelar toda la venta</span>
                </button>


        </div>
        </div>





            <!-- codigo php -->


            <div class="form-group">
                <!--<label for="codigo_producto">Comienza a escribir o escanea el código</label>-->
                <input class="form-control" type="text" id="codigo_producto" width="830px"
                       placeholder="Comienza a escribir o escanea el código">
            </div>
            <h1 hidden="hidden"><strong>Total: </strong><span id="contenedor_total"></span></h1>


                <div class="col-xs-2 table-responsive" id="contenedor_tabla">

                </div>

        </div>
    </div>

    <div class="col-md-3 col-xs-5 mb-7">

            <div class="card bg-gradient-primary text-white mb-3" style="max-width: 18rem;">

                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    Total Recaudado del Día</div>
                                <div class="h1 mb-0 font-weight-bold text-gray-800"> <?php if($row['total'] > 0 ){ ?><p class="fs-1"> <h3>$<?php echo $row['total']?></h3></p>
                                    <?php } ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                </div>
                </div>
            </div>


        <div class="card bg-gradient-warning text-white mb-3" style="max-width: 18rem;">

            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-2">
                                Productos Vendidos en el Día</div>
                            <div class="h1 mb-0 font-weight-bold text-gray-800">

                                    <p class="fs-1"> <h3><?php echo $row['productos']?></h3></p>
                                </div>
                        </div>
                        <div class="col-auto">
                            <i class="fa fa-shopping-basket fa-2x text-gray-300"></i>
                        </div>
                    </div>

                </div>
            </div>
        </div>

  <!--<div class="card bg-gradient-warning text-black-30 mb-3" style="max-width: 18rem;">
            <div class="card border-left-warning shadow h-100 py-2">

            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total Recaudado</div>
                <h1 class="card-title text-white"></h1>
                <i class="icon-pencil primary font-large-2 float-left"></i>
                <?php if($row['productos'] == 1){ ?>

                <p class="font-weight-light text-white">Venta Realizada Hoy</p>
                <?php } ?>
                <?php if($row['productos'] > 1) { ?>
                    <p class="font-weight-light text-white">Ventas Realizadas Hoy</p>

                    <?php
                }
                ?>


                    <?php
                }
                ?>

            </div>-->


        </div>
    </div>
            </div>
        </div>
</div>
</div>
</div>
</div>

<div id="modal_procesar_venta" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-gradient-primary text-white">

                <h4 class="modal-title">Realizar venta</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times; style=</button>
            </div>
            <div class="modal-body">
                <h2><strong>Total: </strong><span id="contenedor_total_modal"></span></h2>
                <hr>
                <h2><strong>Vuelto: </strong><span id="contenedor_cambio"></span></h2>
                <hr>
                <div class="row">
                    <div class="form-group">
                        <div class="col-sm-12 col-md-12">
                            <label for="pago_usuario">El cliente paga con...</label>
                            <input placeholder="El cliente paga con..." type="number" id="pago_usuario"
                                   class="form-control">
                        </div>

                        <hr>
                        <div class="col-xs-12 col-md-12">
                            <input placeholder="Ingresar Numero de Boleta" type="number"
                                   class="form-control">
                        </div>
                        <select class="form-control" aria-label="Default select example">
                            <option selected>Tipo de Pago</option>
                            <option value="1">Efectivo</option>
                            <option value="2">Debito</option>
                            <option value="3">Credito</option>
                        </select>
                    </div>
                    <!--<div class="col-xs-12 col-md-2" style="display:none">
                        <div class="checkbox checkbox-primary checkbox-circle">
                            <input type="checkbox" id="imprimir_ticket">
                            <label for="imprimir_ticket">
                                Ticket <i class="fa fa-ticket"></i>
                            </label>
                        </div>
                    </div>-->
                </div>




            </div>
           <div class="modal-footer">
                <!--<div class="row">
                    <div class="col-xs-12">
                        <div class="alert">
                            <span hidden="hidden" id="mostrar_resultados_eliminar"></span>
                        </div>
                    </div>
                </div>-->


                <button id="realizar_venta" class="form-control btn btn-success" >Realizar venta</button>



                </div>
            </div>
        </div>

    </div>


<script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->


<!-- Page level plugins -->
<script src="vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="./js/ventas.js"></script>
<script src="./lib/eac.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<link rel="stylesheet" href="./css/eac.css">


</body>
</html>