<?php
namespace modeloUser;
use PDO;

include_once("../entidad/usuario.entidad.php");
include_once("../entorno/conexion.php");
class User{
    private $email;
    private $password;
    private $typeUser;
    private $nombre;
    private $celular;
    private $id;
    private $conexion;
    private $consulta;
    private $resultado;
    private $retorno;
    public function __construct(\entidadUser\User $userE)
    {
        $this->conexion = new \Conexion();
        $this->email=$userE->getEmail();  
        $this->password=$userE->getPassword();  
        $this->typeUser=$userE->getTypeUser();   
        $this->nombre=$userE->getNombre();  
        $this->celular=$userE->getCelular();   
        $this->id=$userE->getId();    
    }

    public function validate()
    {
       $this->consulta="SELECT * FROM usuarios WHERE correo='$this->email'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       if($this->resultado->rowCount()>=1){
            
           foreach ($this->resultado->fetchAll(PDO::FETCH_ASSOC) as $dato) {
            if (password_verify($this->password, $dato['clave']))  {
                session_start();
                $_SESSION['id'] = $dato['id'];
                $_SESSION['nombre'] = $dato['nombre'];
                $_SESSION['usuario'] = $dato['correo'];
                $_SESSION['rol'] = $dato['rol'];
                $this->retorno=['Bienvenido(a) '.$_SESSION['nombre'].' ','alert alert-success'];
            }
            else{
                $this->retorno=['Clave Incorrecta por favor intente nuevamente','alert alert-danger'];
            }
           }
            
       }
       else{
        $this->retorno=['Hay un error de autenticación por favor vuelva a intentarlo','alert alert-danger'];
       }
       return $this->retorno;
    }

    public function salir()
    {
       session_start();      
       $this->retorno='Hasta Pronto '.$_SESSION['nombre'];
       session_destroy();
       return $this->retorno;
    }

    public function crearUsuario()
    {
        $hash = password_hash($this->password, PASSWORD_DEFAULT);
       $this->consulta="INSERT INTO usuarios VALUES(null, '$this->nombre', '$this->email', '$this->celular', '$hash', '$this->typeUser')";
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

    public function agregarContactar($nom, $cel)
    {
       $this->consulta="INSERT INTO contactar VALUES(null, '$nom', '$cel')";
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

    public function consultarContactar()
    {
       $this->consulta="SELECT * FROM contactar";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function mostrarPerfil()
    {
        session_start();
        $id = $_SESSION['id'];
       $this->consulta="SELECT * FROM usuarios WHERE id='$id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetch(PDO::FETCH_ASSOC);
    }

    public function mostrarUsuarios()
    {
       $this->consulta="SELECT * FROM usuarios";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function actualizarDatos()
    {
        if (strpos($this->password, '$2y$10$.') === false) {
            $hash = password_hash($this->password, PASSWORD_DEFAULT);
        }else{
            $hash = $this->password;
        }
        
        $this->consulta="UPDATE usuarios SET nombre='$this->nombre', correo='$this->email', celular=$this->celular, clave='$hash', rol='$this->typeUser' WHERE id='$this->id'";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        return $this->resultado->rowCount();
    }

    public function consultarEditar()
    {
       $this->consulta="SELECT * FROM usuarios WHERE id='$this->id'";
       $this->resultado=$this->conexion->con->prepare($this->consulta);
       $this->resultado->execute();
       return $this->resultado->fetchAll(PDO::FETCH_ASSOC);
    }

    public function eliminarUsuario()
    {
        $this->consulta = "DELETE FROM usuarios WHERE id='$this->id'";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        return $this->resultado->rowCount();

    }

    
    public function eliminarContacto($id)
    {
        $this->consulta = "DELETE FROM contactar WHERE id='$id'";
        $this->resultado=$this->conexion->con->prepare($this->consulta);
        $this->resultado->execute();
        return $this->resultado->rowCount();

    }
    public function cantidadPorContactar()
    {
        $this->consulta = "SELECT COUNT(*) AS cantidad FROM contactar";
      $this->resultado = $this->conexion->con->prepare($this->consulta);
      $this->resultado->execute();
      
      // Devuelve solo la cantidad de registros
      $resultado = $this->resultado->fetch(PDO::FETCH_ASSOC);
      return $resultado['cantidad']; // Retorna la cantidad

    }

}
?>