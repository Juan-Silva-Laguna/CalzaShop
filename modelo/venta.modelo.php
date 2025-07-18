<?php
namespace modeloVenta;
use PDO;

include_once("../entidad/venta.entidad.php");
include_once("../entorno/conexion.php");

class Venta {
   private $idVenta;
   private $cantidadVenta;
   private $idProducto;
   private $idOrden;
   private $valorTotal;

   private $conexion;
   private $consulta;
   private $resultado;
   private $retorno;

   public function __construct(\entidadVenta\Venta $VentaE)
   {
      $this->conexion = new \Conexion();
      $this->idVenta=$VentaE->getIdVenta(); 
      $this->cantidadVenta=$VentaE->getCantidadVenta();
      $this->idProducto=$VentaE->getIdProducto();
      $this->idOrden=$VentaE->getIdOrden();
      $this->valorTotal=$VentaE->getValorTotal();
   }
   
   public function agregarProducto()
   {
      $this->consulta="INSERT INTO ventas VALUES(null, '$this->idProducto', '$this->idOrden', '$this->cantidadVenta', '$this->valorTotal')";
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





   public function todo() {
      $this->consulta="SELECT ventas.id, ventas.id_orden, ventas.cantidad, ventas.valor_total, productos.id as id_producto, productos.nombre as nombre_producto FROM ventas INNER JOIN productos ON ventas.id_productos = productos.id";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function deHoy() {
      $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND  ventas.fechaVenta=(SELECT CURDATE())";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function haceUnaSemana() {
      $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND ( ventas.fechaVenta BETWEEN (SELECT CURDATE())-6 AND (SELECT CURDATE()))";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function haceUnMes() {
      $this->consulta="SELECT ventas.fechaVenta, ventas.cantidadVenta, productos.nombreProducto, productos.precioProducto FROM ventas INNER JOIN productos WHERE ventas.idProducto=productos.idProducto AND ( ventas.fechaVenta BETWEEN (SELECT CURDATE())-30 AND (SELECT CURDATE()))";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }    

   public function mostrarVentas() {
      $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
      INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
      INNER JOIN productos ON ventas.idProducto = productos.idProducto";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function filtroEmpleado() {
      $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
      INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
      INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE usuarios.nombreUsuario LIKE '%$this->responsable%'";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function filtroFecha() {
      $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
      INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
      INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE ventas.fechaVenta = '$this->fecha'";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function filtroAmbas() {
      $this->consulta="SELECT ventas.cantidadVenta, ventas.fechaVenta, productos.nombreProducto, productos.precioProducto, usuarios.nombreUsuario FROM ventas
      INNER JOIN usuarios ON ventas.numCedula = usuarios.numCedula
      INNER JOIN productos ON ventas.idProducto = productos.idProducto WHERE usuarios.nombreUsuario LIKE '%$this->responsable%' AND ventas.fechaVenta = '$this->fecha'";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function crearVenta() {
      // Verificar si la orden existe
      $this->consulta = "SELECT id FROM ordenes WHERE id = :idOrden";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idOrden', $this->idOrden, PDO::PARAM_INT);
      $stmt->execute();
      $orden = $stmt->fetch(PDO::FETCH_ASSOC);
   
      // Si la orden existe, proceder con la creación de la venta
      if ($orden) {
         // Insertar la venta
         $this->consulta = "INSERT INTO ventas (id_productos, id_orden, cantidad, valor_total) VALUES (:idProducto, :idOrden, :cantidad, :valorTotal)";
   
         $this->resultado = $this->conexion->con->prepare($this->consulta);
   
         // Corregir el uso de las propiedades sin el símbolo $
         $this->resultado->bindParam(':idProducto', $this->producto, PDO::PARAM_INT);
         $this->resultado->bindParam(':idOrden', $this->idOrden, PDO::PARAM_INT);
         $this->resultado->bindParam(':cantidad', $this->cantidadVenta, PDO::PARAM_INT); 
         $this->resultado->bindParam(':valorTotal', $this->valorTotal, PDO::PARAM_INT);  
   
         $this->resultado->execute();
   
         // Si la venta se ha insertado correctamente
         if ($this->resultado->rowCount() >= 1) {
            // Actualizar el total de la orden
            $this->consulta = "UPDATE ordenes SET total = (SELECT COALESCE(SUM(valor_total), 0) FROM ventas WHERE id_orden = :idOrden) WHERE id = :idOrden";
            $this->resultado = $this->conexion->con->prepare($this->consulta);
            $this->resultado->bindParam(':idOrden', $this->idOrden, PDO::PARAM_INT);
            $this->resultado->execute();
   
            // Verificar si se actualizó el total de la orden
            if ($this->resultado->rowCount() >= 1) {
               $this->retorno = 1; // Todo funcionó correctamente
            } else {
               $this->retorno = 0; // Error al actualizar el total de la orden
            }
         } else {
            $this->retorno = 0; // Error al insertar la venta
         }
      } else {
         $this->retorno = 0; // La orden no existe
      }
   
      return $this->retorno; // Asegurarse de devolver el resultado
   }
   
   public function editarVenta() {
       // Obtener el ID de la orden anterior antes de actualizar la venta
      $this->consulta = "SELECT id_orden FROM ventas WHERE id = :idVenta";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idVenta', $this->idVenta, PDO::PARAM_INT);
      $stmt->execute();

      $ventaAntigua = $stmt->fetch(PDO::FETCH_ASSOC);
      $idOrdenAntigua = $ventaAntigua['id_orden'];

      // Actualizar la venta
      $this->consulta = "UPDATE ventas SET id_productos = :idProducto, id_orden = :idOrden, cantidad = :cantidad, valor_total = :valorTotal WHERE id = :idVenta";
      
      $this->resultado = $this->conexion->con->prepare($this->consulta);

      $this->resultado->bindParam(':idProducto', $this->producto, PDO::PARAM_INT);
      $this->resultado->bindParam(':idOrden', $this->idOrden, PDO::PARAM_INT);
      $this->resultado->bindParam(':cantidad', $this->cantidadVenta, PDO::PARAM_INT); 
      $this->resultado->bindParam(':valorTotal', $this->valorTotal, PDO::PARAM_INT); 
      $this->resultado->bindParam(':idVenta', $this->idVenta, PDO::PARAM_INT);
      $this->resultado->execute();

      if ($this->resultado->rowCount() >= 1) {
         if ($idOrdenAntigua != $this->idOrden) {
            $this->consulta = "UPDATE ordenes SET total = (SELECT COALESCE(SUM(valor_total), 0) FROM ventas WHERE id_orden = :idOrden) WHERE id = :idOrden";

            $this->resultado = $this->conexion->con->prepare($this->consulta);
            $this->resultado->bindParam(':idOrden', $idOrdenAntigua, PDO::PARAM_INT);
            $this->resultado->execute();
         }

         // Actualizar el total de la nueva orden
         $this->consulta = "UPDATE ordenes SET total = (SELECT COALESCE(SUM(valor_total), 0) FROM ventas WHERE id_orden = :idOrden) WHERE id = :idOrden";

         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->bindParam(':idOrden', $this->idOrden, PDO::PARAM_INT);
         $this->resultado->execute();

         if ($this->resultado->rowCount() >= 1) {
            $this->retorno = 1;
         } else {
            $this->retorno = 0; 
         }
      } else {
         $this->retorno = 0;
      }

      return $this->retorno;
   }

   public function obtenerOrdenes() {
      $this->consulta="SELECT * FROM ordenes";   
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }

   public function eliminarVenta() {
      // Obtener el id_orden de la venta antes de eliminarla
      $this->consulta = "SELECT id_orden FROM ventas WHERE id = :idVenta";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idVenta', $this->idVenta, PDO::PARAM_INT);
      $stmt->execute();
      $venta = $stmt->fetch(PDO::FETCH_ASSOC);

      if ($venta) {
          $idOrden = $venta['id_orden']; // Guardar el id_orden asociado a la venta

         // Eliminar la venta
         $this->consulta = "DELETE FROM ventas WHERE id = :idVenta";
         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->bindParam(':idVenta', $this->idVenta, PDO::PARAM_INT);
         $this->resultado->execute();

         if ($this->resultado->rowCount() >= 1) {
            // Actualizar el total de la orden después de eliminar la venta
            $this->consulta = "UPDATE ordenes SET total = (SELECT COALESCE(SUM(valor_total), 0) FROM ventas WHERE id_orden = :idOrden) WHERE id = :idOrden";

            $this->resultado = $this->conexion->con->prepare($this->consulta);
            $this->resultado->bindParam(':idOrden', $idOrden, PDO::PARAM_INT);
            $this->resultado->execute();

            if ($this->resultado->rowCount() >= 1) {
               $this->retorno = 1;
            } else {
               $this->retorno = 0;
            }
         } else {
            $this->retorno = 0;
         }
      } else {
         $this->retorno = 0;
      }

      return $this->retorno;
   }
}

?>

