<?php
namespace modeloProducto;
use PDO;

include_once("../entidad/producto.entidad.php");
include_once("../entorno/conexion.php");
class Producto{
    private $idProducto;
    private $nombreProducto;
    private $cantidadProducto;
    private $precioProducto;
    private $idCategoria;
    private $tallasProducto;
    private $coloresProducto;
    private $descuentoProducto;
    private $descripcion;
    private $imagen;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadProducto\Producto $ProductoE)
    {
        $this->conexion = new \Conexion();
        $this->idProducto=$ProductoE->getIdProducto();  
        $this->nombreProducto=$ProductoE->getNombreProducto();  
        $this->cantidadProducto=$ProductoE->getCantidadProducto();  
        $this->precioProducto=$ProductoE->getPrecioProducto();  
        $this->idCategoria=$ProductoE->getIdCategoria();  
        $this->tallasProducto=$ProductoE->getTallasProducto();  
        $this->coloresProducto=$ProductoE->getColoresProducto();  
        $this->descuentoProducto= $ProductoE->getDescuentoProducto();  
        $this->imagen = $ProductoE->getImagen(); 
        $this->descripcion = $ProductoE->getDescripcion(); 
    }

    public function reporte()
    {
       $this->consulta="SELECT cantidadProducto, precioProducto, productos.nombreProducto FROM productos WHERE cantidadProducto!=0";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);

       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
         $this->retorno=1;
    }
    else{
     $this->retorno=0;
    }
    return $this->retorno;
 }

   public function mostrarProductos()
   {
      //consulta anidada
      $this->consulta="SELECT p.*, c.nombre AS nombre_categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria ORDER BY p.cantidad ASC";
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);

    } 

    public function mostrarProductosPorCategoria($idCategoria)
   {
      //consulta anidada
      $this->consulta="SELECT p.*, c.nombre AS nombre_categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria WHERE p.id_categoria=".$idCategoria;
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);

    } 

    public function mostrarProductosDescuento()
   {
      //consulta anidada
      $this->consulta="SELECT p.*, c.nombre AS nombre_categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria WHERE p.descuento > 0";
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);

    } 

    public function mostrarProductosDescuentoAleatorios()
      {
         // Consulta para traer 3 productos aleatorios con descuento
         $this->consulta = "
            SELECT p.*, c.nombre AS nombre_categoria 
            FROM productos p 
            INNER JOIN categorias c ON c.id = p.id_categoria 
            WHERE p.descuento > 0 
            ORDER BY RAND() 
            LIMIT 3
         ";

         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         
         return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
      }


    public function crearProducto()
    {
       $this->consulta="INSERT INTO productos VALUES(null, '$this->nombreProducto', '$this->precioProducto', '$this->cantidadProducto', '$this->descuentoProducto', '$this->imagen', '$this->idCategoria', '$this->tallasProducto', '$this->coloresProducto', '$this->descripcion')";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno=1;
       }
       else{
        $this->retorno=0;
       }
       return $this->retorno;
    }

    public function ajustarStock($cant, $id)
    {
       $this->consulta="UPDATE productos SET cantidad = cantidad - ".$cant." WHERE id = ".$id;
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            $this->retorno=1;
       }
       else{
        $this->retorno=0;
       }
       return $this->retorno;
    }

    public function crearProductoAvanzado()
   {
      try {
         // Construir la consulta SQL con los valores de los atributos
         $this->consulta = "INSERT INTO productos 
                              (nombre, precio, cantidad, descuento, imagen, id_categoria, tallas, colores) 
                              VALUES 
                              (:nombre, :precio, :cantidad, :descuento, :imagen, :id_categoria, :tallas, :colores)";
         
         // Preparar la consulta
         $this->resultado = $this->conexion->con->prepare($this->consulta);
         
         // Enlazar los parámetros
         $this->resultado->bindParam(':nombre', 'ksjdnsj');
         $this->resultado->bindParam(':precio', $this->precioProducto);
         $this->resultado->bindParam(':cantidad', $this->cantidadProducto);
         $this->resultado->bindParam(':descuento', $this->descuentoProducto);
         $this->resultado->bindParam(':imagen', $this->imagen);
         $this->resultado->bindParam(':id_categoria', $this->idCategoria);
         $this->resultado->bindParam(':tallas', 'jkas sassa');
         $this->resultado->bindParam(':colores', 'sdjhshd sjhdsj');

         // Ejecutar la consulta
         $this->resultado->execute();

         // Obtener el ID del último registro insertado
         $lastId = $this->conexion->con->lastInsertId();

         // Verificar si se insertó correctamente
         if ($lastId) {
               $this->retorno = 1; // Éxito
         } else {
               $this->retorno = 0; // Sin cambios
         }
      } catch (PDOException $e) {
         // Manejar la excepción
         error_log('Error en la base de datos: ' . $e->getMessage());
         $this->retorno = 0; // O cualquier otro valor o acción que desees en caso de error
      } catch (Exception $e) {
         // Manejar cualquier otra excepción
         error_log('Error general: ' . $e->getMessage());
         $this->retorno = 0; // O cualquier otro valor o acción que desees en caso de error
      }

      return $this->retorno;
   }


    public function eliminarProducto()
    {// Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM productos WHERE id= :idProducto";

      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
      $stmt->execute();
      $productos = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($productos) {
         $imagen = $productos['imagen'];
         
         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         // Paso 3: Eliminar el registro de la categoría
         $this->consulta = "DELETE FROM productos WHERE id = :idProducto";
         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
         $this->resultado->execute();
         
         if ($this->resultado->rowCount() >= 1) {
               $this->retorno = 1;
         } else {
               $this->retorno = 0;
         }
      } else {
         // La categoría no existe
         $this->retorno = 0;
      }

      return $this->retorno;
   }

    public function consultarEditar()
    {
      $this->consulta = "SELECT productos.* FROM productos 
      INNER JOIN categorias ON productos.id_categoria = categorias.id 
      WHERE productos.id = :idProducto";
      $this->resultado = $this->conexion->con->prepare($this->consulta);
      $this->resultado->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
      $this->resultado->execute();
      return $this->resultado->fetch(PDO::FETCH_ASSOC); // Solo devuelve un registro
    }

    public function cantidadProductoAgotado()
    {
      $this->consulta="SELECT  COUNT(*) AS cantidad FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria WHERE p.cantidad <= 20";
       $this->resultado = $this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       
       // Devuelve solo la cantidad de registros
       $resultado = $this->resultado->fetch(PDO::FETCH_ASSOC);
       return $resultado['cantidad']; // Retorna la cantidad
    }

    public function editarProducto()
    {
         // Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM productos WHERE id = :idProducto";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idProducto', $this->idProducto, PDO::PARAM_INT);
      $stmt->execute();
      $productos = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($productos) {
         $imagen = $productos['imagen'];

         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         if ($this->imagen != null) {
            $this->consulta="UPDATE productos SET nombre='$this->nombreProducto', descripcion='$this->descripcion', imagen='$this->imagen',cantidad='$this->cantidadProducto',id_categoria='$this->idCategoria',tallas='$this->tallasProducto',colores='$this->coloresProducto',precio_unitario='$this->precioProducto' WHERE id='$this->idProducto'";
         }else{
            $this->consulta="UPDATE productos SET nombre='$this->nombreProducto', descripcion='$this->descripcion',cantidad='$this->cantidadProducto',id_categoria='$this->idCategoria',tallas='$this->tallasProducto',colores='$this->coloresProducto',precio_unitario='$this->precioProducto' WHERE id='$this->idProducto'";
         }
         
         $this->resultado=$this->conexion->con->prepare($this->consulta);   
         $this->resultado->execute();
         if($this->resultado->rowCount()>=1){
              $this->retorno=1;
         }
         else{
           $this->retorno=0;
         }
      }
         return $this->retorno;       
    }

    public function busquedaAvanzada($texto, $precio_max, $tallas, $colores, $id_categoria)
   {
      //consulta anidada
      $this->consulta="SELECT * FROM productos WHERE nombre LIKE '%$texto%'";

      if (isset($id_categoria) && $id_categoria != 'null') {
         $this->consulta = $this->consulta . " AND id_categoria = $id_categoria";
      }

      if ($tallas != null) {
         $isFirst = true;
         foreach ($tallas as $key => $value) {
             if ($isFirst) {
                 $this->consulta .= " AND tallas LIKE '%$value%'";
                 $isFirst = false; 
             } else {
                 $this->consulta .= " OR tallas LIKE '%$value%'";
             }
         }
      }
      
      if ($colores != null) {
         $isFirst = true;
         foreach ($colores as $key => $value) {
             if ($isFirst) {
                 $this->consulta .= " AND colores LIKE '%$value%'";
                 $isFirst = false; 
             } else {
                 $this->consulta .= " OR colores LIKE '%$value%'";
             }
         }
      }
      if ($precio_max != 200000) {
         $this->consulta = $this->consulta . " AND precio_unitario <= $precio_max";
      }


      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);

    } 

    
    public function busquedaAvanzadaDescuento($texto, $precio_max, $tallas, $colores)
   {
      //consulta anidada
      $this->consulta="SELECT * FROM productos WHERE descuento > 0 AND nombre LIKE '%$texto%'";

      if ($tallas != null) {
         $isFirst = true;
         foreach ($tallas as $key => $value) {
             if ($isFirst) {
                 $this->consulta .= " AND tallas LIKE '%$value%'";
                 $isFirst = false; 
             } else {
                 $this->consulta .= " OR tallas LIKE '%$value%'";
             }
         }
      }
      
      if ($colores != null) {
         $isFirst = true;
         foreach ($colores as $key => $value) {
             if ($isFirst) {
                 $this->consulta .= " AND colores LIKE '%$value%'";
                 $isFirst = false; 
             } else {
                 $this->consulta .= " OR colores LIKE '%$value%'";
             }
         }
      }

      if ($precio_max != 200000) {
         $this->consulta = $this->consulta . " AND precio_unitario <= $precio_max";
      }


      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);

    } 
}

?>