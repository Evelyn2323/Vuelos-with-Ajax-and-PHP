<?php
include ('../controller/conexion.php');

class Vuelo
{
    private $id;
    private $nombre_aerolinea;
    private $nvuelo;
    private $destino;

    public function __construct( $id = null,$nombre_aerolinea=null, $nvuelo=null, $destino=null) {
        $this->id = $id;
        $this->nombre_aerolinea = $nombre_aerolinea;
        $this->nvuelo = $nvuelo;
        $this->destino = $destino;
    }

    public function guardarVuelo() {
        $pdo = new conexion();
        try {
            $sql = "INSERT INTO viaje (nombre_aerolinea, nvuelo, destino) VALUES ('$this->nombre_aerolinea', '$this->nvuelo', '$this->destino')";
            $query = $pdo->prepare($sql);
            $query->execute();
            $lastInsertId = $pdo->lastInsertId();
            return $lastInsertId;
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "/n";
        }
    }

    public function actualizarVuelo()
    {
        $pdo = new conexion();
        try {
            $sql = "UPDATE viaje SET nombre_aerolinea ='$this->nombre_aerolinea', nvuelo = '$this->nvuelo', destino = '$this->destino' WHERE id=$this->id";
            $query = $pdo->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage() . "/n";
        }
    }

    public function eliminarVuelo()
    {
        $pdo = new conexion();
        try {
            $sql = "DELETE FROM viaje WHERE id=$this->id";
            $query = $pdo->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            echo 'Excepcion :', $e->getMessage(), "\n";
        }
    }
    public function traervuelos() {
        $pdo = new conexion();
        try {
            $sql = "SELECT * FROM viaje"; // Consulta SQL corregida
            $query = $pdo->prepare($sql);
            $query->execute();
            $rta = $query->fetchAll();
            return $rta;
        } catch (Exception $e) {
            echo 'Excepcion :', $e->getMessage(), "\n";
        }
    }
    
    
    public function traervuelo($id){
        $pdo=new Conexion();
        try{
            $sql="SELECT * FROM viaje WHERE id=$id";
            $query=$pdo->prepare($sql);
            $query->execute();
            $rta=$query->fetch();
            return $rta;
        }catch (Exception $e) {
            echo 'Excepción capturada: ',  $e->getMessage(), "\n";
        }
    }
}
?>
