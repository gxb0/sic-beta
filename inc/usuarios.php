<?php
if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
if ($_SESSION["perfil"] !== 1)//1 = admin, 2 = bodeguero, 3 = vendedor, 4 = cajero
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
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                    role="button" aria-expanded="false" aria-controls="collapseCardExample">
                                    <h6 class="m-0 font-weight-bold text-primary">Ingresar Nuevo Usuario</h6>
                                </a>
                                <!-- Card Content - Collapse -->
                                <div class="collapse" id="collapseCardExample">
                                                <button id="nuevo" class="btn btn-info form-control">Nuevo <i class="fa fa-user-plus"></i></button>
                                    </div>
                                </div>
<div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Usuarios Agregados</h6>
                                </div>
                                <div class="card-body">
                                   <div class="row">
                                       <div class="col-xs-10 table-responsive">
                                           <table id="tabla-contenedora" class="table table-bordered table-hover table-condensed table table-sm">
                                               <thead class="table-dark">
                                               <tr class="text-center">
                                                   <th>Nombre</th>
                                                   <th>Administrador</th>
                                                   <th>Bodeguero</th>
                                                   <th>Vendedor</th>
                                                   <th>Cajero</th>

                                                   <th>Cambiar contraseña</th>
                                               </tr>
                                               </thead>
                                               <tbody>
                                               </tbody>
                                           </table>
                                       </div>
                                   </div>
                                </div>
                            </div>



<link rel="stylesheet" href="./css/abc.css">





<div id="modal_formulario" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">

                <h4 class="modal-title">Registrar usuario</h4>
                <button type="button" class="close text-white" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usuario" class="text-primary">Nombre de Usuario</label>
                    <input type="text" id="usuario" placeholder="Usuario" class="form-control">

                    <span id="mostrar_si_existe">El nombre de usuario debe tener entre <strong>4 y 12</strong><br> carácteres, puede contener letras, números (excepto al inicio) y guiones bajos <strong>(_)</strong>.</span>
                </div>
                <hr>
                <div class="form-group">
                    <label for="palabra_secreta" class="text-primary">Contraseña</label>
                    <input type="password" id="palabra_secreta" placeholder="Contraseña" class="form-control">

                    <span>La contraseña debe tener entre <strong>8 y 12</strong> carácteres, entre ellos debe haber al menos un dígito <strong>[0-9]</strong>, una letra mayúscula <strong>[A-Z]</strong> y una letra minúscula <strong>[a-z]</strong>.</span>
                </div>

                <div class="form-group">
                    <label for="palabra_secreta" class="text-primary">Confirmar contraseña</label>
                    <input type="password" id="palabra_secreta_confirm" placeholder="Contraseña" class="form-control">
                </div>
                 <hr>
                <div class="form-group">
                    <label class="text-info">Tipo de Usuario</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfilusuario" id="admin" value="1">
                        <label class="form-check-label" for="admin">Administrador</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfilusuario" id="bodeguero" value="2">
                        <label class="form-check-label" for="bodeguero">Bodeguero</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfilusuario" id="vendedor" value="3">
                        <label class="form-check-label" for="vendedor">Vendedor</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="perfilusuario" id="cajero" value="4">
                        <label class="form-check-label" for="cajero">Cajero</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-12">
                        <div hidden="hidden" class="alert">
                            <span id="mostrar_resultados">Hola</span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-6">
                        <button id="guardar_usuario" class="form-control btn btn-success">Guardar</button>
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

<div id="modal_formulario_cambiar_pass" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="modal_change_password_title">Cambiar contraseña</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="usuario">Nueva contraseña</label>
                    <input type="password" id="new_password" placeholder="Nueva contraseña" class="form-control">
                </div>
                <div class="form-group">
                    <label for="usuario">Repite la nueva contraseña</label>
                    <input type="password" id="confirm_new_password" placeholder="Confirmar contraseña" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div class="col-xs-6">
                        <button id="cambiar_pass" class="form-control btn btn-success">Cambiar</button>
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

<script src="vendor/jquery/jquery.min.js"></script>

<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</script>
<script src="./js/usuarios.js"></script>
<script src="./lib/eac.js"></script>
<link rel="stylesheet" href="./css/eac.css">


</body>
</html>