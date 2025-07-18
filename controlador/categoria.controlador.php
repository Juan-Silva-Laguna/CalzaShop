<?php
include_once("../entidad/categoria.entidad.php");
include_once("../modelo/categoria.modelo.php");


$operacion= $_POST['operacion'];
$CategoriaE = new \entidadCategoria\Categoria();

if ($operacion == 'Creo') {
    $nombreCategoria = $_POST['nombre'];
    $CategoriaE->setNombre($nombreCategoria);

    $descripcion = $_POST['descripcion'];
    $CategoriaE->setDescripcion($descripcion);

    // Guardar la imagen y obtener el nombre de archivo
    $imagen = guardarImagen($_FILES['imagen']);
    if (strpos($imagen, 'Error') === false) {
        $CategoriaE->setImagen($imagen);
    } else {
        // Manejar el error de imagen (si es necesario)
        echo $imagen; // O maneja el error de otra manera según tu lógica
        exit;
    }

    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->crearCategoria();

}
else if ($operacion == 'Consultar'){
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->mostrarCategorias();
}
else if ($operacion == 'Eliminar'){
    $idCategoria= $_POST['id'];
    $CategoriaE->setId($idCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->eliminarCategoria();
}
else if ($operacion == 'consultarEditar'){
    $idCategoria= $_POST['id'];
    $CategoriaE->setId($idCategoria);
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->consultarEditar();
}
else if ($operacion == 'Edito'){
    $idCategoria= $_POST['id'];
    $nombreCategoria= $_POST['nombre'];
    $descripcion= $_POST['descripcion'];
    $CategoriaE->setNombre($nombreCategoria);
    $CategoriaE->setDescripcion($descripcion);
    $CategoriaE->setId($idCategoria);

    if ($_FILES['imagen']['name'] != null) {
        $imagen = guardarImagen($_FILES['imagen']);
        $CategoriaE->setImagen($imagen);
    }

    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->editarCategoria();
}else if ($operacion == 'ConsultarAleatorios'){
    $CategoriaM = new \modeloCategoria\Categoria($CategoriaE);
    $mensaje = $CategoriaM->mostrarCategoriasAleatorios();
}

unset($CategoriaE);
unset($CategoriaM);

function guardarImagen($img) {
    $uploadDir = 'Imagenes/Categorias/'; // Cambia esto según tu estructura de carpetas

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
    $uploadDir = 'Imagenes/Categorias/'; // Cambia esto según tu estructura de carpetas

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