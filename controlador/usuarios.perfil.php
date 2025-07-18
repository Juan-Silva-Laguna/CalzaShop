<?php
require_once('../modelo/usuario.modelo.php');
require_once('../entidad/usuario.entidad.php');

$user= $_POST['user'];
$userE = new \entidadUser\User();
$userE->setEmail($user);
$userM = new \modeloUser\User($userE);
$mensaje = $userM->mostrarPerfil();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>