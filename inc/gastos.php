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


<div class="row">

    <div class="col-xl-4 col-lg-4">
        <div class="card shadow mb-4 border-bottom-primary">
                                <!-- Card Header - Dropdown -->
            <div class="card-header py-3 border-bottom-primary">
                 <h6 class="m-0 font-weight-bold text-primary">Formulario de Egreso</h6>
            </div>
                                <!-- Card Body -->
              <div class="card-body">
                  <div class="form-group">
                      <label for="importe">Ingresar Cantidad De Egreso</label>
                          <input data-requerido="true" type="number" id="importe" class="form-control" placeholder="Total Egreso" requerid>
                  </div>
                <div class="form-group">
                    <label for="concepto">Concepto</label>
                    <input data-requerido="true" type="text" id="concepto" class="form-control" placeholder="Pago a Proveedor, Pago Flete etc">
                </div>


                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <input data-requerido="true" type="text" id="descripcion" class="form-control"
                       placeholder="Pago por concepto de pago de flete de Cemento">
                </div>

                        <div class="form-group">
                     <label for="no_remision">Número de Factura o Boleta Si Corresponde</label>
                         <input data-requerido="false" type="text" id="no_remision" class="form-control"
                       placeholder="N° de Factura o Boleta">
                         </div>
                         <div class="col-xs-12">
                                 <button id="guardar_gasto" class="btn btn-primary form-control">
                                    Confirmar Egreso
                                 </button>
                             </div>

                                </div>

                            </div>
                        </div>
                    <div class="col-xl-8 col-lg-5">

                            <!-- Area Chart -->
                            <div class="card shadow mb-2">
                                <div class="card-header py-3 border-bottom-primary">
                                    <h6 class="m-0 font-weight-bold text-primary">Egresos Ingresados</h6>
                                </div>
                                <div class="card-body">
                    <div class="table-responsive" id="datatable">
                                                <table class="table table-bordered" id="dataTable" >
                                                    <thead class="table-dark">
                                                    <tr>
                                                        <th>Cantidad Ingresada</th>
                                                        <th>Fecha y Hora de Egreso</th>
                                                        <th>Concepto</th>
                                                        <th>N°Factura o Boleta</th>
                                                    </tr>
                                                    </thead>
                                                    <tfoot>
                                                    <tr>


                                                    </tr>
                                                    </tfoot>
                                                    <?php

                                                    $link = new PDO('mysql:host=localhost;dbname=okventa', 'root', '');
                                                    foreach ($link->query('SELECT * from gastos where DATE (fecha) = CURDATE() ORDER BY fecha DESC ') as $row){

                                                    ?>



                                                    <?php if ($row['importe'] > 0){?>


                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo $row['importe'] ?></td>
                                                        <td><?php $originalDate = $row['fecha'];
                                                            $newDate = date("d/m/Y H:i:s", strtotime($originalDate));

                                                            echo $newDate ?></td>
                                                         <td><?php echo $row['concepto'] ?></td>
                                                         <td><?php echo $row['numero_remision'] ?></td>

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

<script src="./js/gastos.js"></script>
<script src="./lib/eac.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="js/demo/chart-bar-demo.js"></script>

    </body>
    </html>


