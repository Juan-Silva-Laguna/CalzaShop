<?php
include_once("../entidad/orden.entidad.php");
include_once("../modelo/orden.modelo.php");


$operacion= $_POST['operacion'];
$OrdenE = new \entidadOrden\Orden();

if ($operacion == 'Creo') {
    $nombreOrden = $_POST['nombre'];
    $OrdenE->setNombre($nombreOrden);

    $descripcion = $_POST['descripcion'];
    $OrdenE->setDescripcion($descripcion);

    // Guardar la imagen y obtener el nombre de archivo
    $imagen = guardarImagen($_FILES['imagen']);
    if (strpos($imagen, 'Error') === false) {
        $OrdenE->setImagen($imagen);
    } else {
        // Manejar el error de imagen (si es necesario)
        echo $imagen; // O maneja el error de otra manera según tu lógica
        exit;
    }

    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->crearOrden();

}
else if ($operacion == 'Consultar'){
    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->mostrarOrdens();
}
else if ($operacion == 'Eliminar'){
    $idOrden= $_POST['id'];
    $OrdenE->setId($idOrden);
    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->eliminarOrden();
}
else if ($operacion == 'consultarEditar'){
    $idOrden= $_POST['id'];
    $OrdenE->setId($idOrden);
    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idOrden= $_POST['id'];
    $nombreOrden= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $OrdenE->setNombre($nombreOrden);
    $OrdenE->setDescripcion($descripcion);
    $OrdenE->setId($idOrden);

    if ($_FILES['imagen']['name'] != null) {
        $imagen = guardarImagen($_FILES['imagen']);
        $OrdenE->setImagen($imagen);
    }

    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->editarOrden();
}else if ($operacion == 'ConsultarAleatorios'){
    $OrdenM = new \modeloOrden\Orden($OrdenE);
    $mensaje = $OrdenM->mostrarOrdensAleatorios();
}

unset($OrdenE);
unset($OrdenM);

function guardarImagen($img) {
    $uploadDir = 'Imagenes/Ordens/'; // Cambia esto según tu estructura de carpetas

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
    $uploadDir = 'Imagenes/Ordens/'; // Cambia esto según tu estructura de carpetas

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