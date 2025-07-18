<?php
require_once('../modelo/usuario.modelo.php');
require_once('../entidad/usuario.entidad.php');
$userE = new \entidadUser\User();
$userM = new \modeloUser\User($userE);
$mensaje = $userM->salir();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>