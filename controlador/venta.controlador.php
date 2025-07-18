<?php
include_once("../entidad/venta.entidad.php");
include_once("../modelo/venta.modelo.php");

$operacion = $_POST['operacion'];
$VentaE = new \entidadVenta\Venta();

switch ($operacion) {
    case 'Vendio':
        session_start();
        $cantidad= $_POST['cantidad'];
        $producto= $_POST['producto'];
        $responsable= $_SESSION['id'];
        $hoy = getdate();
        $fecha = $hoy['year'].'/'.$hoy['mon'].'/'.$hoy['mday'];
        $VentaE->setCantidadVenta($cantidad);
        $VentaE->setProducto($producto);
        $VentaE->setFecha($fecha);
        $VentaE->setResponsable($responsable);
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->venderProducto();
        break;
    case 'obtenerOrdenes':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->obtenerOrdenes();
        break;
    case 'mostrarVentas':
        $VentaM = new \modeloVenta\Venta($VentaE);
        $mensaje = $VentaM->mostrarVentas();
        break;
}

unset($VentaE);
unset($VentaM);

echo json_encode($mensaje);
?>
