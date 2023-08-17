<?php

class Conexion extends PDO
{
    private $hostName = 'localhost';
    private $bdName = 'aerolinea';
    private $bdUser = 'root';
    private $bdPwd = '';
    
    public function __construct() {
        try {
            parent::__construct('mysql:host=' . $this->hostName . ';dbname=' . $this->bdName . ';charset=utf8', $this->bdUser, $this->bdPwd, 
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }
}

?>
