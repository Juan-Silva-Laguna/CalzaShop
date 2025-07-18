<?php
include_once("../entidad/producto.entidad.php");
include_once("../modelo/producto.modelo.php");

$operacion= $_POST['operacion'];
$ProductoE = new \entidadProducto\Producto();

if ($operacion == 'Creo') {
    $nombreProducto= $_POST['nombre'];
    $precioProducto= $_POST['precio'];
    $cantidadProducto = $_POST['cantidad'];
    $categoriaProducto= $_POST['id_categoria'];
    $descuentoProducto=$_POST['descuento'];
    $descripcion=$_POST['descripcion'];

    // Guardar la imagen y obtener el nombre de archivo
    $imagen = guardarImagen($_FILES['imagen']);
    if (strpos($imagen, 'Error') === false) {
        $ProductoE->setImagen($imagen);
    } else {
        // Manejar el error de imagen (si es necesario)
        echo $imagen; // O maneja el error de otra manera según tu lógica
        exit;
    }

      $tallasProducto = $_POST['tallas'];
      $coloresProducto = $_POST['colores'];

    $ProductoE->setNombreProducto($nombreProducto);
    $ProductoE->setPrecioProducto($precioProducto);
    $ProductoE->setCantidadProducto($cantidadProducto);
    $ProductoE->setIdCategoria($categoriaProducto);
    $ProductoE->setDescuentoProducto($descuentoProducto);
    $ProductoE->settallasProducto($tallasProducto);
    $ProductoE->setcoloresProducto($coloresProducto);
    $ProductoE->setDescripcion($descripcion);
    
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->crearProducto();
}
else if ($operacion == 'Consultar'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);

    if (isset($_POST['id_categoria']) && $_POST['id_categoria'] != 'null') {
        $mensaje = $ProductoM->mostrarProductosPorCategoria($_POST['id_categoria']);
    }else{
        $mensaje = $ProductoM->mostrarProductos();
    }
}
else if ($operacion == 'Eliminar'){
    $idProducto= $_POST['id'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->eliminarProducto();
}
else if ($operacion == 'consultarEditar'){
    $idProducto= $_POST['id'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idProducto= $_POST['id'];
    $nombreProducto= $_POST['nombre'];
    $precioProducto= $_POST['precio'];
    $cantidadProducto = $_POST['cantidad'];
    $categoriaProducto= $_POST['id_categoria'];
    $descuentoProducto=$_POST['descuento'];
    $descripcion=$_POST['descripcion'];

    // Guardar la imagen y obtener el nombre de archivo
    if ($_FILES['imagen']['name'] != null) {
        $imagen = guardarImagen($_FILES['imagen']);
        $ProductoE->setImagen($imagen);
    }else{
        $ProductoE->setImagen(null);
    }

    $tallasProducto = $_POST['tallas'];
    $coloresProducto = $_POST['colores'];
    $ProductoE->setIdProducto($idProducto);
    $ProductoE->setNombreProducto($nombreProducto);
    $ProductoE->setPrecioProducto($precioProducto);
    $ProductoE->setCantidadProducto($cantidadProducto);
    $ProductoE->setIdCategoria($categoriaProducto);
    $ProductoE->setDescuentoProducto($descuentoProducto);
    $ProductoE->settallasProducto($tallasProducto);
    $ProductoE->setcoloresProducto($coloresProducto);
    $ProductoE->setDescripcion($descripcion);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->editarProducto();
    
}else if ($operacion == 'reporte'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->reporte();
}else if ($operacion == 'Vendio'){
    $cantidad= $_POST['cantidad'];
    $producto= $_POST['producto'];
    $ProductoE->setCantidadProducto($cantidad);
    $ProductoE->setIdProducto($producto);
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->venderProducto();
}else if ($operacion == 'ConsultarDescuentos'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->mostrarProductosDescuento();
}else if ($operacion == 'busqueda_avanzada'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->busquedaAvanzada($_POST['text_buscar'], $_POST['rango_precio'], isset($_POST['tallas'])?$_POST['tallas']:null, isset($_POST['colores'])?$_POST['colores']:null, $_POST['id_categoria']);
}else if ($operacion == 'busqueda_avanzada_descuentos'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->busquedaAvanzadaDescuento($_POST['text_buscar'], $_POST['rango_precio'], isset($_POST['tallas'])?$_POST['tallas']:null, isset($_POST['colores'])?$_POST['colores']:null);
}else if ($operacion == 'ConsultarDescuentosAleatorios'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->mostrarProductosDescuentoAleatorios();
}else if ($operacion == 'cantidadProductoAgotado'){
    $ProductoM = new \modeloProducto\Producto($ProductoE);
    $mensaje = $ProductoM->cantidadProductoAgotado();
}

unset($ProductoE);
unset($ProductoM);

function guardarImagen($img) {
    $uploadDir = 'Imagenes/Productos/'; // Cambia esto según tu estructura de carpetas

    // Verificar si el directorio de destino existe, si no, crearlo
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Permisos 0755 y recursivo
    }

    // Generar un nombre aleatorio de 20 caracteres alfanuméricos
    $nombreAleatorio = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nuevoNombreArchivo = $nombreAleatorio . '.' . $extension;

    $uploadFile = $uploadDir . $nuevoNombreArchivo;

    // Manejar la carga de la imagen
    if (isset($img) && $img['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($img['tmp_name'], $uploadFile)) {
            // Devolver el nombre del archivo o la ruta
            return $uploadFile;
        } else {
            // Error al mover el archivo
            return 'Error al mover la imagen.';
        }
    } else {
        // Error en la carga de la imagen
        return 'No se ha cargado ninguna imagen o ha ocurrido un error.';
    }
}

function eliminarImagen($ruta) {
    $uploadDir = 'Imagenes/Productos/'; // Cambia esto según tu estructura de carpetas

    // Verificar si el directorio de destino existe, si no, crearlo
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true); // Permisos 0755 y recursivo
    }

    // Generar un nombre aleatorio de 20 caracteres alfanuméricos
    $nombreAleatorio = bin2hex(random_bytes(10)); // 20 caracteres hexadecimales
    $extension = pathinfo($img['name'], PATHINFO_EXTENSION);
    $nuevoNombreArchivo = $nombreAleatorio . '.' . $extension;

    $uploadFile = $uploadDir . $nuevoNombreArchivo;

    // Manejar la carga de la imagen
    if (isset($img) && $img['error'] === UPLOAD_ERR_OK) {
        if (move_uploaded_file($img['tmp_name'], $uploadFile)) {
            // Devolver el nombre del archivo o la ruta
            return $uploadFile;
        } else {
            // Error al mover el archivo
            return 'Error al mover la imagen.';
        }
    } else {
        // Error en la carga de la imagen
        return 'No se ha cargado ninguna imagen o ha ocurrido un error.';
    }
}


echo json_encode($mensaje);

?>