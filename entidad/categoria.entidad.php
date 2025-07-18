<?php
namespace entidadCategoria;
class Categoria{
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombreCategoria
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    } 
/**
     * Get the value of nombreCategoria
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
}
?>