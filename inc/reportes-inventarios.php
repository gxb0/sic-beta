<?php
if (!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>
<?php if ($_SESSION["perfil"] == 3 || $_SESSION["perfil"] == 4 ) exit('<h1 class="text-center">Lo sentimos, solamente el administrador y bodeguero puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1>'); ?>

<?php
$link = new PDO('mysql:host=localhost;dbname=okventa', 'root', '');
?>
<?php foreach ($link->query('SELECT sum(precio_venta) AS total FROM inventario') as $row)?>
<?php ?>

<DOCTYPE html>
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
 <div class="card shadow mb-4">
                                <div class="card-header py-3 text-center bg-gradient-primary text-white">
                                    <h4 class="m-0 font-weight-bold">Reporte de Inventario</h4>
                                </div>
                                <div class="card-body">
                                 <div class="row justify-content-center">

                                     <div class="col-xl-3 col-md-6 mb-4">
                                         <div class="card border-left-warning shadow h-100 py-2">
                                             <div class="card-body">
                                                 <div class="row no-gutters align-items-center">
                                                     <div class="col mr-2">
                                                         <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                             Cantidad de Tipos de Productos</div>
                                                         <div class="h5 mb-0 font-weight-bold text-gray-800"><span id="total_productos"></span></div>
                                                     </div>
                                                     <div class="col-auto">
                                                         <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                                                             Valor Total del Inventario</div>
                                                         <div class="h5 mb-0 font-weight-bold text-gray-800">$<?php echo $row['total']?></span></div>

                                                     </div>
                                                     <div class="col-auto">
                                                         <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                                     </div>
                                                 </div>
                                             </div>

                                         </div>

                                     </div>

                                 </div>

                                </div>

<div class="card-header py-3 bg-gradient-warning" style="float: left">
                <h5 class="m-0 font-weight-bold text-white text-center ">Productos en Inventario</h5>
       </div>


         <div class="card-body justify-content-center">
                <div id="contenedor_tabla" class="table-responsive table-thead-dark">
                 </div>



  </div>






</div>

<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</script>


<script src="./lib/eac.js"></script>
<link rel="stylesheet" href="./css/eac.css">
<script src="./js/reportes-inventarios.js"></script>
</html>