<?php
require_once('../modelo/usuario.modelo.php');
require_once('../entidad/usuario.entidad.php');
$user= $_POST['user'];
$password= $_POST['password'];

$userE = new \entidadUser\User();
$userE->setEmail($user);
$userE->setPassword($password);
$userM = new \modeloUser\User($userE);
$mensaje = $userM->validate();

unset($userE);
unset($userM);
echo json_encode($mensaje);
?>