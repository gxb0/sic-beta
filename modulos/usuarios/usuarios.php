<?php
function change_password($rowid, $new_password)
{
    if ((int)$rowid === 1) return true;
    global $base_de_datos;
    $statement = $base_de_datos->prepare("UPDATE usuarios SET palabra_secreta = ? WHERE rowid = ?;");
    $new_password = password_hash($new_password, PASSWORD_DEFAULT);
    return $statement->execute([$new_password, $rowid]);
}

function comprobar_datos($nombre, $palabra_secreta)
{
    global $base_de_datos;
    $nombre = strtolower($nombre);
    $sentencia = $base_de_datos->prepare("SELECT palabra_secreta, administrador, bodeguero, vendedor, cajero FROM usuarios WHERE nombre = ?;");
    $sentencia->execute([$nombre]);
    $fila = $sentencia->fetch();
    if(!$fila){
        return false;
    }
    $palabra_secreta_encriptada = $fila["palabra_secreta"];
    if (password_verify($palabra_secreta, $palabra_secreta_encriptada)) {
        $perfil = "";

        if($fila["administrador"] == 1){
            $perfil = 1;
        }else if($fila["bodeguero"] == 1){
            $perfil = 2;
        }else if($fila["vendedor"] == 1){
            $perfil = 3;
        }else if($fila["cajero"] == 1){
            $perfil = 4;
        }

        propaga_datos_sesion($nombre, $perfil);
        return true;
    } else {
        return false;
    }

}


function usuario_existe($nombre_de_usuario)
{
    global $base_de_datos;
    $sentencia = $base_de_datos->prepare("SELECT count(nombre) AS count FROM usuarios WHERE nombre = ?;");
    $sentencia->execute([$nombre_de_usuario]);
    $fila = $sentencia->fetch();
    return ($fila["count"] >= 1);
}


function consultar_nombres_usuarios()
{
    global $base_de_datos;
    $sentencia = $base_de_datos->prepare("SELECT nombre FROM usuarios;");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function eliminar_usuario($rowid)
{
    if ((int)$rowid === 1) return false;
    global $base_de_datos;
    $sentencia = $base_de_datos->prepare("DELETE FROM usuarios WHERE rowid = ?;");
    return $sentencia->execute([$rowid]);
}

function consultar_todos_los_usuarios()
{
    global $base_de_datos;
    $sentencia = $base_de_datos->prepare("SELECT rowid, nombre, administrador, bodeguero, cajero, vendedor FROM usuarios;");
    $sentencia->execute();
    return $sentencia->fetchAll();
}

function insertar_usuario($nombre, $palabra_secreta, $perfil_usuario)
{
    if (usuario_existe($nombre)) return "El usuario ya existe";
    $nombre = strtolower($nombre);
    global $base_de_datos;
    $palabra_secreta_encriptada = password_hash($palabra_secreta, PASSWORD_DEFAULT);
    $sentencia = $base_de_datos->prepare("
		INSERT INTO usuarios
		(nombre, palabra_secreta, administrador, bodeguero, vendedor, cajero)
		VALUES
		(?,?,?,?,?,?)");

    if ($perfil_usuario == 1) {
        return $sentencia->execute([$nombre, $palabra_secreta_encriptada, 1, 0, 0, 0]);
    } else if ($perfil_usuario == 2) {
        return $sentencia->execute([$nombre, $palabra_secreta_encriptada, 0, 1, 0, 0]);
    } else if ($perfil_usuario == 3) {
        return $sentencia->execute([$nombre, $palabra_secreta_encriptada, 0, 0, 1, 0]);
    } else if ($perfil_usuario == 4) {
        return $sentencia->execute([$nombre, $palabra_secreta_encriptada, 0, 0, 0, 1]);
    }
}

function propaga_datos_sesion($nombre_de_usuario, $perfil)
{
    inicia_sesion_segura();
    $_SESSION["sesion_iniciada"] = true;
    $_SESSION["nombre_de_usuario"] = $nombre_de_usuario;
    $_SESSION["perfil"] = intval($perfil);
    $_SESSION["hora_de_inicio"] = time();
}

