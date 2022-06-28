<?php
if (!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>

 <?php
$link = new PDO('mysql:host=localhost;dbname=okventa', 'root', '');
?>
<?php foreach ($link->query('SELECT nombre_producto AS p, total AS t, usuario AS u, numero_venta AS n, codigo_producto AS c,
DAY(fecha) as fecha FROM ventas
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
<div class="col-xl-12 col-lg-5">

                                                                <!-- Area Chart -->
  <div class="card shadow mb-2">
     <div class="card-header py-3 border-bottom-warning bg-gradient-primary">
        <h5 class="m-0 font-weight-bold text-white text-center">Ventas Realizadas en el Día</h5>
     </div>
        <div class="card-body">
          <div class="table-responsive" id="datatable">
             <table class="table table-bordered" id="dataTable" >
                <thead class="table-dark">
                   <tr>
                     <th>N° de Venta</th>
                      <th>Codigo Producto</th>
                     <th>Producto</th>
                     <th>Total</th>
                     <th>usuario</th>
                   </tr>
                </thead>
                <tfoot>
                   <tr>


                   </tr>
                </tfoot>

                     <tbody>
                        <tr>
                          <td><?php echo $row['n']?></td>
                          <td><?php echo $row['c']?></td>
                          <td><?php echo $row['p']?></td>
                          <td>$<?php echo $row['t']?></td>
                          <td><?php echo $row['u']?></td>
<?php } ?>
                        </tr>

                       </tr>


                     </tbody>
             </table>

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
<script src="js/demo/chart-area-demo.js"></script>
<script src="js/demo/chart-pie-demo.js"></script>
<link rel="stylesheet" href="./css/eac.css">


</body>
</html>