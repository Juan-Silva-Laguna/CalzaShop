<?php
namespace entidadVenta;

class Venta {
    private $idVenta;
    private $cantidadVenta;
    private $idProducto;
    private $idOrden;
    private $valorTotal;

    /**
     * Get the value of idVenta
     */ 
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * Set the value of idVenta
     *
     * @return  self
     */ 
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }

    /**
     * Get the value of cantidadVenta
     */ 
    public function getCantidadVenta()
    {
        return $this->cantidadVenta;
    }

    /**
     * Set the value of cantidadVenta
     *
     * @return  self
     */ 
    public function setCantidadVenta($cantidadVenta)
    {
        $this->cantidadVenta = $cantidadVenta;
    }


    /**
     * Get the value of producto
     */ 
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set the value of producto
     *
     * @return  self
     */ 
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }


    /**
     * Get the value of idOrden
     */ 
    public function getIdOrden()
    {
        return $this->idOrden;
    }

    /**
     * Set the value of idOrden
     *
     * @return  self
     */ 
    public function setIdOrden($idOrden)
    {
        $this->idOrden = $idOrden;
    }

    /**
     * Get the value of valorTotal
     */ 
    public function getValorTotal()
    {
        return $this->valorTotal;
    }

    /**
     * Set the value of valorTotal
     *
     * @return  self
     */ 
    public function setValorTotal($valorTotal)
    {
        $this->valorTotal = $valorTotal;
    }    
}
?>

