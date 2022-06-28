<?php
if (!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>
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

<div id="wrapper">
        <div class="card shadow mb-4">
                                <div class="card-header py-3 bg-gradient-primary">
                                    <h5 class="m-0 font-weight-bold text-white text-center">Ingreso de Altas de Productos</h5>
                                </div>
                                <br>

                 <div class="row">
                  <!-- Producto(s) para ingresar alta -->
                     <div class="col-xl-4 col-lg-8">
                       <div class="card shadow mb-4">
                                                 <!-- Card Header - Dropdown -->
                         <div class="card-header py-3">
                              <h6 class="m-0 font-weight-bold text-primary">Ingresar Alta</h6>
                          </div>
                                                 <!-- Card Body -->
                            <div class="card-body border-bottom-primary">
                             <p class="mb-4">
                                A continuacion debes ingresar el nombre o codigo del producto al cual ingresar el alta.
                                <br>
                                <a class="text-primary">El ingreso de codigo debe ser por cada producto</a></p>
                               <div class="col-xs-12">
                                  <input type="text" id="codigo_producto" class="form-control" placeholder="Nombre o Código del Producto">
                               </div>
                               <br>
                                    <div class="col-xs-12">
                                        <button class="form-control btn btn-primary" id="terminar_alta">Terminar alta</button>
                                    </div>
                                     <br>
                            </div>
                         </div>

                     </div>

                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4 border-bottom-primary">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Producto(s) Para Ingresar Alta</h6>
                                </div>
                                <div class="card-body">
                                    <div class="col-xs-12">

                                            <div class="table-responsive" id="contenedor_tabla">

                                            </div>
<br>
<br>
                                </div>
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
<script src="./lib/eac.js"></script>
<script src="./js/alta-de-inventarios.js"></script>
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<link rel="stylesheet" href="./css/eac.css">




</body>

</html>