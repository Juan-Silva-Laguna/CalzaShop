<?php
namespace entidadProducto;
class Producto{
    private $idProducto;
    private $nombreProducto;
    private $cantidadProducto;
    private $precioProducto;
    private $idCategoria;
    private $tallasProducto;
    private $coloresProducto; 
    private $decuentoProducto;
    private $imagen;
    private $descripcion;


    /**
     * Get the value of idProducto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of idProducto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;

        return $this;
    }

    /**
     * Get the value of nombreProducto
     */ 
    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }

    /**
     * Set the value of nombreProducto
     *
     * @return  self
     */ 
    public function setNombreProducto($nombreProducto)
    {
        $this->nombreProducto = $nombreProducto;

        return $this;
    }

    /**
     * Get the value of cantidadProducto
     */ 
    public function getCantidadProducto()
    {
        return $this->cantidadProducto;
    }

    /**
     * Set the value of cantidadProducto
     *
     * @return  self
     */ 
    public function setCantidadProducto($cantidadProducto)
    {
        $this->cantidadProducto = $cantidadProducto;

        return $this;
    }

    /**
     * Get the value of precioProducto
     */ 
    public function getPrecioProducto()
    {
        return $this->precioProducto;
    }

    /**
     * Set the value of precioProducto
     *
     * @return  self
     */ 
    public function setPrecioProducto($precioProducto)
    {
        $this->precioProducto = $precioProducto;

        return $this;
    }

    /**
     * Get the value of idCategoria
     */ 
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }

    /**
     * Set the value of idCategoria
     *
     * @return  self
     */ 
    public function setIdCategoria($idCategoria)
    {
        $this->idCategoria = $idCategoria;

        return $this;
    }

    
    /**
     * Get the value of tallasProductos
     */ 
    public function getTallasProducto()
    {
        return $this->tallasProducto;
    }

    /**
     * Set the value of tallasProducto
     *
     * @return  self
     */ 
    public function setTallasProducto($tallasProducto)
    {
        $this->tallasProducto = $tallasProducto;

        return $this;
    } 
      /**
     * Get the value of coloresProducto
     */ 
    public function getColoresProducto()
    {
        return $this->coloresProducto;
    }

    /**
     * Set the value of coloresProducto
     *
     * @return  self
     */ 
    public function setColoresProducto($coloresProducto)
    {
        $this->coloresProducto = $coloresProducto;

        return $this;
    } 

     /**
     * Get the value of coloresProducto
     */ 
    public function getDescuentoProducto()
    {
        return $this->decuentoProducto;
    }

    /**
     * Set the value of coloresProducto
     *
     * @return  self
     */ 
    public function setDescuentoProducto($decuentoProducto)
    {
        $this->decuentoProducto = $decuentoProducto;

        return $this;
    } 

    public function getImagen()
    {
        return $this->imagen;
    }
     /**
     * Set the value of nombreCategoria
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    } 

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}

?>