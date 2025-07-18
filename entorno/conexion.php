<?php
class Conexion
{
    public $con;

    public function __construct()
    {
        try {
            $this->con= new PDO('mysql:dbname=bd_inventarios_calzashop;host=localhost','root','');
        } catch (PDOException $e) {
            print_r($e);
        }
        
    }
}

// $conexion = new \Conexion();
?>