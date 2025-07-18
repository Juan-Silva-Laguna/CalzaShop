<?php
include_once("../entidad/pedido.entidad.php");
include_once("../modelo/pedido.modelo.php");
include_once("../entidad/venta.entidad.php");
include_once("../modelo/venta.modelo.php");
include_once("../modelo/producto.modelo.php");
include_once("../entidad/producto.entidad.php");

$operacion= $_POST['operacion'];

$PedidoE = new \entidadPedido\Pedido();
$VentaE = new \entidadVenta\Venta();
$ProductoE = new \entidadProducto\Producto();

if ($operacion == 'Crear') {
    try {
        // Validación de entradas
        if (!isset($_POST['total']) || !isset($_POST['productos']) || !is_array($_POST['productos'])) {
            throw new Exception('Datos de entrada inválidos.');
        }

        $total = $_POST['total'];
        $fecha = date('Y-m-d');
        $codigo = generarCodigoAlfanumerico(); // Asegúrate de que esta función esté definida
        $tipo = "online";
        $estado = "Solicitado";
        
        // Si vas a usar la sesión para obtener el id de usuario:
        session_start();
        $idUsuario = isset($_SESSION['id']) ? $_SESSION['id'] : null;  // O puedes usar una lógica más robusta

        $PedidoE->setTipoVenta($tipo);
        $PedidoE->setCodigo($codigo);
        $PedidoE->setEstado($estado);
        $PedidoE->setTotal($total);
        $PedidoE->setFecha($fecha);
        $PedidoE->setIdUsuario($idUsuario);

        // Crear Pedido en la base de datos
        $PedidoM = new \modeloPedido\Pedido($PedidoE);
        $idOrden = $PedidoM->crearOrden();

        if (!$idOrden) {
            throw new Exception('No se pudo crear la orden.');
        }

        $inc = 0;
        foreach ($_POST['productos'] as $key => $value) {
            if (!isset($value['id'], $value['cantidad'], $value['subtotal'])) {
                throw new Exception('Datos de producto incompletos.');
            }

            // Agregar productos a la orden
            $VentaE->setIdProducto($value['id']);
            $VentaE->setIdOrden($idOrden);
            $VentaE->setCantidadVenta($value['cantidad']);
            $VentaE->setValorTotal($value['subtotal']);
            $VentaM = new \modeloVenta\Venta($VentaE);
            $VentaM->agregarProducto();

            $inc++;
        }

        // Verificación de éxito
        if ($inc == count($_POST['productos'])) {
            $mensaje = ['success', 'Su pedido fue creado exitosamente, por favor envianos el mensaje de whatsapp prestablecido para poder atenderlo!', $codigo]; // Éxito
        } else {
            $mensaje = ['error', 'Su codigo de orden es '.$codigo.' pero hubo un error por favor comunicate con nosotros', $codigo]; // Error
        }
        
    } catch (\Throwable $th) {
        // Manejo de excepciones (puedes usar error_log o mostrar un mensaje de error)
        error_log($th->getMessage());  // Registro del error
        $mensaje = $th->getMessage();
    }
}
else if ($operacion == 'Consultar'){
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->mostrarPedidos();
}
else if ($operacion == 'verPedido'){
    $codigo= $_POST['codigo'];
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->verPedido($codigo);

}else if ($operacion == 'Accionar'){
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->accionar($_POST['id'], $_POST['estado']);
}else if ($operacion == 'Vender') {
    try {
        // Validación de entradas
        if (!isset($_POST['total']) || !isset($_POST['pedido']) || !is_array($_POST['pedido'])) {
            throw new Exception(['error', 'Datos de entrada inválidos.']);
        }

        $total = $_POST['total'];
        $fecha = date('Y-m-d');
        $codigo = generarCodigoAlfanumerico(9); // Asegúrate de que esta función esté definida
        $tipo = "local";
        $estado = "Entregado";
        
        // Si vas a usar la sesión para obtener el id de usuario:
        session_start();
        $idUsuario = isset($_SESSION['id']) ? $_SESSION['id'] : null;  // O puedes usar una lógica más robusta

        $PedidoE->setTipoVenta($tipo);
        $PedidoE->setCodigo($codigo);
        $PedidoE->setEstado($estado);
        $PedidoE->setTotal($total);
        $PedidoE->setFecha($fecha);
        $PedidoE->setIdUsuario($idUsuario);

        // Crear Pedido en la base de datos
        $PedidoM = new \modeloPedido\Pedido($PedidoE);
        $idOrden = $PedidoM->crearOrden();

        if (!$idOrden) {
            throw new Exception('No se pudo crear la orden.');
        }

        $inc = 0;
        foreach ($_POST['pedido'] as $key => $value) {
            if (!isset($value['id'], $value['cantidad'], $value['subtotal'])) {
                throw new Exception('Datos de producto incompletos.');
            }

            // Agregar pedido a la orden
            $VentaE->setIdProducto($value['id']);
            $VentaE->setIdOrden($idOrden);
            $VentaE->setCantidadVenta($value['cantidad']);
            $VentaE->setValorTotal($value['subtotal']);
            $VentaM = new \modeloVenta\Venta($VentaE);
            $VentaM->agregarProducto();

            $ProductoM = new \modeloProducto\Producto($ProductoE);
            $idOrden = $ProductoM->ajustarStock($value['cantidad'], $value['id']);

            $inc++;
        }

        
        // Verificación de éxito
        if ($inc == count($_POST['pedido'])) {
            $mensaje = ['success', 'La venta fue creada exitosamente: ', $codigo]; // Éxito
        } else {
            $mensaje = ['error', 'Su codigo de orden es '.$codigo.' pero hubo un error por favor comunicate con nosotros', $codigo]; // Error
        }
        
    } catch (\Throwable $th) {
        // Manejo de excepciones (puedes usar error_log o mostrar un mensaje de error)
        error_log($th->getMessage());  // Registro del error
        $mensaje = $th->getMessage();
    }
}else if ($operacion == 'ConsultarReporte') {
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->mostrarPedidosReporte($_POST['fecha'], $_POST['tipo_venta'], $_POST['vendedor']);
}else if ($operacion == 'obtenerTotaldelDia') {
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->obtenerTotaldelDia();
}
else if ($operacion == 'cantidadPedidoOnline') {
    $PedidoM = new \modeloPedido\Pedido($PedidoE);
    $mensaje = $PedidoM->cantidadPedidoOnline();
}


unset($PedidoE);
unset($PedidoM);

function generarCodigoAlfanumerico($longitud = 6) {
    // Caracteres alfanuméricos disponibles
    $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
    // Mezcla los caracteres
    $codigo = substr(str_shuffle($caracteres), 0, $longitud);
    
    return  strtoupper($codigo);
}

echo json_encode($mensaje);
?>