<?php
if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
if ($_SESSION["perfil"] == 2 || $_SESSION["perfil"] == 3 )//1 = admin, 2 = bodeguero, 3 = vendedor, 4 = cajero
    exit('<h1 class="text-center">Lo sentimos, solamente el administrador puede ver esta sección<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1>');
?>
<?php
$desde = 8; # Desde las ocho de la mañana
$hasta =15; # Hasta las 10

$hora_actual = intval(date("H"));
if ($hora_actual >= $desde && $hora_actual < $hasta) {

} else {
    exit('<h1 class="text-center"> Modulo Deshabilitado por politica de Empresa:<div class="p-3 mb-2 bg-primary bg-gradient-primary text-white"</br> Recordar que el horario de ingreso de inicio de caja<br> Es de 08:00 hrs a 10:00 hrs<br><br><i class="fa fa-hand-paper-o fa-4x"></i></h1></div>');
    echo "No se permiten visitantes a esta hora del día";
}

?>

<!DOCTYPE html>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Tables</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>


    <body id="page-top">

<!-- Page Wrapper -->
        <div id="wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Inicio de Caja</h1>

                <div class="row">

                    <div class="col-lg-4">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Ingreso de Inicio de Caja del Día</h6>
                            </div>
                            <div class="card-body">
                                <p>Aqui debe ingresar la cantidad de dinero con la cual iniciar la caja hoy:
                                    <button class="bg-primary text-white">
                                    <?php
                                    $DateAndTime = date('d-m-Y', time());
                                    echo "$DateAndTime.";
                                    ?>
                                    </button>
                                </p>

                                <div class="input-group mb-3">

                                <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                         <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                            </svg></span>
                                    <input type="number" id="cantidad" class="form-control" placeholder="Cantidad de dinero a guardar para inicio de caja">
                                </div>

                                <button id="ingresar_dinero" class="form-control btn-success">
                                    Ingresar dinero a la caja
                                </button>
                            </div>
                        </div>
                    </div>
<!------------------------------------------hasta aqui seccion ingreso inicio de caja----------------------------->
                    <div class="col-lg-8">

                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Incios de Caja Ingresados del Día</h6>
                            </div>
                                    <div class="card-body">
                                        <div class="table-responsive" id="datatable">
                                            <table class="table table-bordered" id="dataTable" >
                                                <thead>
                                                <tr>
                                                    <th>Cantidad Ingresada</th>
                                                    <th>Fecha y Hora de Ingreso</th>
                                                </tr>
                                                </thead>
                                                <tfoot>
                                                <tr>


                                                </tr>
                                                </tfoot>
                                                <?php

                                                $link = new PDO('mysql:host=localhost;dbname=okventa', 'root', '');
                                                foreach ($link->query('SELECT * from caja where DATE (fecha) = CURDATE() ORDER BY fecha DESC ') as $row){





                                                ?>



                                                <?php if ($row['caja_chica'] > 0){?>


                                                <tbody>
                                                <tr>
                                                    <td><?php echo $row['caja_chica'] ?></td>
                                                    <td><?php $originalDate = $row['fecha'];
                                                        $newDate = date("d/m/Y H:i:s", strtotime($originalDate));

                                                        echo $newDate  ?></td>


                                                </tr>

                                                </tr>

                                                <?php
                                                }
                                                }
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>


                            </div>

                     </div>

                </div>

            </div>
            <!-- /.container-fluid -->
        </div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->



<!-- Page level plugins -->

<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="js/demo/datatables-demo.js"></script>
<!-- Page level custom scripts -->
                <script src="./js/caja.js"></script>
                <script src="./lib/eac.js"></script>

<script>
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth() + 1;
    day = date.getDate();
    document.getElementById("current_date").innerHTML = day + "/" + month + "/" + year;
</script>




</body>
</html>