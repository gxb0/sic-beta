<?php
    if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
    if ($_SESSION["perfil"] == 2 || $_SESSION["perfil"] == 3 )//1 = admin, 2 = bodeguero, 3 = vendedor, 4 = cajero
        exit('<h1 class="text-center">Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1>');
    ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Charts</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- Begin Page Content -->
            <div class="container-fluid ">




                <!-- Page Heading -->
                <div class="row ">

                    <div class="col-lg-12 justify-content-lg-center">

                        <!-- Overflow Hidden -->
                        <div class="card mb-4 justify-content-center">
                            <div class="card-header py-3 bg-gradient-primary text-white justify-content-center">
                                <h4 class="m-0 font-weight-bold text-white justify-content-center justify-content-center">Reporte de Caja</h4>
                            </div>
                            <div class="card-body justify-content-center">
                                Elige el <code>lapso de tiempo</code> en el que quieres que se genere el reporte. Lo que veas aquí es lo mismo que aparecerá en él
                            </div>
                            <div class="row hidden-print">

                                <div class="col-xs-12 col-sm-12 col-md-4 text-center">

                                    <div class="form-group">

                                        <label for="fecha_inicio">Desde El</label>
                                        <input id="fecha_inicio" type="datetime-local" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 text-center">
                                    <div class="form-group">
                                        <label for="fecha_fin">Hasta El</label>
                                        <input id="fecha_fin" type="datetime-local" class="form-control">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <!--<p class="mb-4">Elige el lapso de tiempo en el que quieres que se genere el reporte. Lo que veas aquí es lo mismo que aparecerá en él.</a></p>-->


                <!-- Content Row -->
                <div class="row">
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Inicio de Caja</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$<span id="caja_chica"></span>

                                                <div class="h6 mb-0 text-gray-500">Dinero con que Inicio la Caja
                                                </div>

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                            Total en Ventas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">$<span id="ventas"></span></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>



                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Total de Egresos</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<span id="gastos"></span>
                                        <div class="h6 mb-0 text-gray-500">Pago a Proveedores u Otros
                                        </div>
                                    </div>
                                </div>

                                <div class="col-auto">
                                    <i class="fas fa-money-bill-wave fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total en Caja</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$<span id="total_caja"></span></div>
                                    <div class="h6 mb-0 text-gray-500">Inicio de Caja + Total de Ventas
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-cash-register fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>

            </div>
            </div>

            <div class="col-xl-12 col-lg-8">

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3" style="float: left">
                                <h6 class="m-0 font-weight-bold text-primary">Reporte General de Caja</h6>
                                <!--<div class="row hidden-print" style="float: right">
                                <div class="col-xs-12">
                                    <button class="btn btn-info form-control" id="generar_reporte" >Generar reporte <i class="fa fa-file-pdf-o"></i>
                                    </button>

                                </div>
                            </div>-->
                            </div>

                            <div class="card-body col-sm-12 col-lg-12">
                                <div id="contenedor_tabla" class="table-responsive">
                                </div>
                            </div>

                        </div>

                        <!-- Bar Chart -->

                    </div>
                    <!-- Donut Chart -->
                   <!-- <div class="row">
                        <div class="col-xs-4">
                            <h4 class="text-center" ><strong>Caja chica:</strong> $<span id="caja_chica"></span></h4>
                        </div>
                        <div class="col-xs-4">
                            <h4 class="text-center" ><strong>Gastos:</strong> $<span id="gastos"></span></h4>
                        </div>
                        <div class="col-xs-4">
                            <h4  class="text-center"><strong>Ventas:</strong> $<span id="ventas"></span></h4>
                        </div>
                        <div class="col-xs-6">
                            <h3  class="text-center"><strong>Total en caja:</strong> $<span id="total_caja"></span></h3>
                        </div>
                        <div class="col-xs-6">
                            <h3  class="text-center"><strong>Utilidad:</strong> $<span id="utilidad"></span></h3>
                        </div>
                    </div>-->
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->

                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>


        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="./js/reporte-caja.js"></script>
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>
        <script src="js/demo/chart-bar-demo.js"></script>

</body>

</html>








<!-----------------------------------ANTIGUO--------------------------------------------------->

<!--<div class="row visible-print-block">
    <h1 class="text-center">Reporte sobre caja</h1>
</div>
<div class="row hidden-print">
    <div class="col-xs-12">
        <p class="h5 text-justify">Elige el lapso de tiempo en el que quieres que se genere el reporte. Lo que veas aquí
            es lo mismo que aparecerá en él.<br>
        </p>
    </div>
</div>
<div class="row hidden-print">
    <div class="col-xs-6 text-center">
        <h4>Del</h4>
        <input id="fecha_inicio" type="datetime-local" class="form-control">
    </div>
    <div class="col-xs-6 text-center">
        <h4>Hasta</h4>
        <input id="fecha_fin" type="datetime-local" class="form-control">
    </div>
</div>
<br>

<div class="row hidden-print">
    <div class="col-xs-12">

        <button class="btn btn-info form-control" id="generar_reporte">Generar reporte <i class="fa fa-file-pdf-o"></i>
        </button>
    </div>
</div>
<div class="row"><br>
    <div class="col-xs-12">
        <div id="contenedor_tabla" class="table-responsive">
        </div>
    </div>
</div>-->
