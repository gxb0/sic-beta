<?php
if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");

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

<body id="page-top">


 <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center bg-gradient-primary text-white">
                                    <h5 class="m-0 font-weight-bold">Productos Con Stock Bajo</h5>
                                </div>
                                <div class="card-body">
                                   Aquí se muestran aquellos productos cuya cantidad es menor a la permitida

                                   <div class="form-group">
<br>
                                           <label for="familia" class="text-primary"><strong>Familia o proveedor</strong></label>
                                           <select name="familia" id="familia" class="form-control">

                                           </select>
<br>

                                           <p class="text-center"><a href="./alta-de-inventarios" class="text-center">Ingresar Alta</a></p>
                                           <div class="table-responsive">
                                                   <table class="table table-bordered table-condensed">
                                                       <thead class="table-dark">
                                                       <tr>
                                                           <th>Código</th>
                                                           <th>Nombre</th>
                                                           <th>Existencia</th>
                                                           <th>Existencia permitida</th>
                                                           <th>Familia</th>
                                                       </tr>
                                                       </thead>
                                                       <tbody id="cuerpo_tabla">

                                                       </tbody>
                                                   </table>

                                               </div>
                                       </div>

                                </div>

                            </div>



<script src="./js/productos-en-stock.js" type="text/javascript"></script>
<script src="./lib/eac.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>


<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> <!--si se quita navbar no funciona bien-->

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<link rel="stylesheet" href="./css/eac.css">

</body>
</html>