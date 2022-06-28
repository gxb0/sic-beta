<?php
if(!isset($_SESSION)) exit("<script>window.location.href = '../';</script>");
?>
<form action="/ventas" method="get">
    <input type="text" name="txtmensaje">
    <input type="submit" name="btnenviar" value="enviar mensaje">
    </form>