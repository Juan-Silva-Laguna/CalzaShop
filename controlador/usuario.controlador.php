<?php
include_once("../entidad/usuario.entidad.php");
include_once("../modelo/usuario.modelo.php");


$operacion= $_POST['operacion'];
$UsuarioE = new \entidadUser\User();

if ($operacion == 'Creo') {
    $nombre= $_POST['nombre'];
    $clave= $_POST['clave'];
    $rol= $_POST['rol'];
    $celular= $_POST['celular'];
    $correo= $_POST['correo'];
    $UsuarioE->setNombre($nombre);
    $UsuarioE->setPassword($clave);
    $UsuarioE->setTypeUser($rol);
    $UsuarioE->setEmail($correo);
    $UsuarioE->setCelular($celular);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->crearUsuario();
}
else if ($operacion == 'Consultar'){
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->mostrarUsuarios();
}
else if ($operacion == 'Eliminar'){
    $idUsuario= $_POST['id'];
    $UsuarioE->setId($idUsuario);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->eliminarUsuario();
}
else if ($operacion == 'consultarEditar'){
    $idUsuario= $_POST['id'];
    $UsuarioE->setId($idUsuario);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $id= $_POST['id'];
    $UsuarioE->setId($id);
    $nombre= $_POST['nombre'];
    $clave= $_POST['clave'];
    $rol= $_POST['rol'];
    $celular= $_POST['celular'];
    $correo= $_POST['correo'];
    $UsuarioE->setNombre($nombre);
    $UsuarioE->setPassword($clave);
    $UsuarioE->setTypeUser($rol);
    $UsuarioE->setEmail($correo);
    $UsuarioE->setCelular($celular);
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->actualizarDatos();
}
else if ($operacion == 'AgregarContactar') {
    $nombre= $_POST['nombre'];
    $celular= $_POST['celular'];
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->agregarContactar($nombre, $celular);
}
else if ($operacion == 'ConsultarContactar') {
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->consultarContactar();
}
else if ($operacion == 'Contactado') {
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->eliminarContacto($_POST['id']);
}
else if ($operacion == 'cantidadPorContactar') {
    $UsuarioM = new \modeloUser\User($UsuarioE);
    $mensaje = $UsuarioM->cantidadPorContactar();
}
unset($UsuarioE);
unset($UsuarioM);

echo json_encode($mensaje);
?>