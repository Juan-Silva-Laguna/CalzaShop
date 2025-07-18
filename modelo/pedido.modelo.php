<?php
namespace modeloPedido;
use PDO;

include_once("../entidad/pedido.entidad.php");
include_once("../entorno/conexion.php");
class Pedido{
   private $idPedido;
    private $total;
    private $fecha;
    private $estado;
    private $codigo;
    private $tipoVenta;
    private $idUsuario;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadPedido\Pedido $PedidoE)
    {
        $this->conexion = new \Conexion();
        $this->idPedido=$PedidoE->getIdPedido();  
        $this->total = $PedidoE->getTotal();
        $this->fecha = $PedidoE->getFecha();
        $this->estado = $PedidoE->getEstado();
        $this->codigo = $PedidoE->getCodigo();
        $this->tipoVenta = $PedidoE->getTipoVenta();
        $this->idUsuario = $PedidoE->getIdUsuario();
    }

      public function crearOrden()
      {
         $this->consulta="INSERT INTO ordenes VALUES(null, '$this->fecha', '$this->total', '$this->codigo', '$this->tipoVenta', '$this->estado', '$this->idUsuario')";
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();

         $this->retorno = $this->conexion->con->lastInsertId();
         return $this->retorno;
      }

    public function verPedido($codigo)
    {
       $this->consulta="SELECT o.total, v.cantidad, v.valor_total AS subtotal, p.descripcion, p.nombre, p.precio_unitario AS valor, p.imagen FROM ordenes o INNER JOIN ventas v ON o.id=v.id_orden INNER JOIN productos p ON v.id_producto=p.id WHERE o.codigo='".$codigo."'";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }    

    public function mostrarPedidos()
   {
      $this->consulta="SELECT * FROM ordenes WHERE tipo_venta='online' AND estado='Solicitado'";
      $this->resultado=$this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    } 
    
    public function cantidadPedidoOnline()
   {
      $this->consulta = "SELECT COUNT(*) AS cantidad FROM ordenes WHERE tipo_venta='online' AND estado='Solicitado'";
      $this->resultado = $this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      
      // Devuelve solo la cantidad de registros
      $resultado = $this->resultado->fetch(PDO::FETCH_ASSOC);
      return $resultado['cantidad']; // Retorna la cantidad
   }

    public function accionar($id, $estado)
    {
      session_start();
      $id_usuario = $_SESSION['id'];

       $this->consulta="UPDATE ordenes SET estado='".$estado."', id_usuario='".$id_usuario."' WHERE id='".$id."'";          
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();

       
       if ($estado != 'Rechazado') {

         $this->consulta="SELECT * FROM ventas WHERE id_orden='".$id."'";          
         $this->resultado=$this->conexion->con->prepare($this->consulta);
         $this->resultado->execute();
         $ventas = $this->resultado->fetchAll(PDO::FETCH_ASSOC);

         foreach ($ventas as $key => $venta) {
            $this->consulta="UPDATE productos SET cantidad = cantidad - ".$venta['cantidad']." WHERE id = ".$venta['id_producto'];
            $this->resultado=$this->conexion->con->prepare($this->consulta);
            $this->resultado->execute();
         }
       }

       $this->retorno = $this->resultado->rowCount();
       return $this->retorno;
    } 

    public function mostrarPedidosReporte($fecha, $tipo, $vendedor)
    {
      $this->consulta = "SELECT o.*, u.nombre AS vendedor FROM ordenes o LEFT JOIN usuarios u ON o.id_usuario=u.id WHERE (o.estado='Entregado' OR o.estado='Atendido')";

      if ($fecha != '' || $fecha != null) {
         $this->consulta .= " AND o.fecha='".$fecha."'";
      }

      if ($tipo != 'todas') {
         $this->consulta .= " AND o.tipo_venta='".$tipo."'";
      }

      if ($vendedor != '') {
         $this->consulta .= " AND u.id='".$vendedor."'";
      }


       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
        return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
     } 


     public function obtenerTotaldelDia()
     {
       $this->consulta = "SELECT SUM(total) AS total_suma FROM ordenes WHERE ( estado='Entregado' OR  estado='Atendido') AND DATE(fecha) = CURDATE();";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
         return $this->resultado->fetch(PDO::FETCH_ASSOC);
      } 
}

?>