<?php
namespace modeloCategoria;
use PDO;

include_once("../entidad/categoria.entidad.php");
include_once("../entorno/conexion.php");
class Categoria{
    private $idCategoria;
    private $nombreCategoria;
    private $descripcion;
    private $imagen;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadCategoria\Categoria $CategoriaE)
    {
        $this->conexion = new \Conexion();
        $this->idCategoria=$CategoriaE->getId();  
        $this->nombreCategoria=$CategoriaE->getNombre();  
        $this->descripcion = $CategoriaE->getDescripcion(); 
        $this->imagen = $CategoriaE->getImagen(); 
    }

    public function crearCategoria()
    {
       $this->consulta="INSERT INTO categorias VALUES(null, '$this->nombreCategoria', '$this->descripcion', '$this->imagen')";
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

    public function mostrarCategorias()
    {
       $this->consulta="SELECT * FROM categorias";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarCategoriasAleatorios()
   {
      // Consulta para traer 3 categorías aleatorias
      $this->consulta = "
         SELECT * 
         FROM categorias 
         ORDER BY RAND() 
         LIMIT 3
      ";

      $this->resultado = $this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();

      return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
   }


    public function eliminarCategoria()
   {
      // Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM categorias WHERE id = :idCategoria";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idCategoria', $this->idCategoria, PDO::PARAM_INT);
      $stmt->execute();
      $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($categoria) {
         $imagen = $categoria['imagen'];
         
         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         // Paso 3: Eliminar el registro de la categoría
         $this->consulta = "DELETE FROM categorias WHERE id = :idCategoria";
         $this->resultado = $this->conexion->con->prepare($this->consulta);
         $this->resultado->bindParam(':idCategoria', $this->idCategoria, PDO::PARAM_INT);
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
       $this->consulta="SELECT * FROM categorias WHERE id='$this->idCategoria'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function editarCategoria()
    {
      // Paso 1: Obtener la ruta de la imagen asociada a la categoría
      $this->consulta = "SELECT imagen FROM categorias WHERE id = :idCategoria";
      $stmt = $this->conexion->con->prepare($this->consulta);
      $stmt->bindParam(':idCategoria', $this->idCategoria, PDO::PARAM_INT);
      $stmt->execute();
      $categoria = $stmt->fetch(PDO::FETCH_ASSOC);
      
      if ($categoria) {
         $imagen = $categoria['imagen'];
         
         // Paso 2: Eliminar la imagen del sistema de archivos
         if (file_exists($imagen)) {
               unlink($imagen);
         }
         
         if ($this->imagen != null) {
            $this->consulta="UPDATE categorias SET nombre='$this->nombreCategoria', descripcion='$this->descripcion', imagen='$this->imagen' WHERE id='$this->idCategoria'";
         }else{
            $this->consulta="UPDATE categorias SET nombre='$this->nombreCategoria', descripcion='$this->descripcion' WHERE id='$this->idCategoria'";
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
}

?>