<?php
namespace entidadPedido;

class Pedido {
    private $idPedido;
    private $total;
    private $fecha;
    private $estado;
    private $codigo;
    private $tipoVenta;
    private $idUsuario;

    // Getters y Setters

    // idPedido
    public function getIdPedido() {
        return $this->idPedido;
    }

    public function setIdPedido($idPedido) {
        $this->idPedido = $idPedido;
    }

    // total
    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    // fecha
    public function getFecha() {
        return $this->fecha;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    // estado
    public function getEstado() {
        return $this->estado;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }

    // codigo
    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }

    // tipoVenta
    public function getTipoVenta() {
        return $this->tipoVenta;
    }

    public function setTipoVenta($tipoVenta) {
        $this->tipoVenta = $tipoVenta;
    }

    // idUsuario
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
}
?>
