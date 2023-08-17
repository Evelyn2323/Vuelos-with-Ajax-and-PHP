
<?php include ('conexion.php');

$pdo= new conexion();
//print_r($_POST);

if (isset($_POST['guardar'])){
    try {
        $sql = "INSERT INTO viaje (nombre_aerolinea, nvuelo, destino) VALUES ('{$_POST['nombre_aerolinea']}','{$_POST['nvuelo']}','{$_POST['destino']}')";
        $query = $pdo->prepare($sql);
        $query->execute();
        $lastInsertId = $pdo->lastInsertId();
        return $lastInsertId;
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage() . "/n";
    }
}
if (isset($_POST['actualizar'])){
    try{
        $sql="UPDATE viaje SET nombre_aerolinea ='{$_POST['nombre_aerolinea']}',nvuelo='{$_POST['nvuelo']}',destino='{$_POST['destino']}' WHERE id={$_POST['id']}";
        $query=$pdo->prepare($sql);
        $query->execute();
    }catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}
if (isset($_POST['eliminar'])){
    try{
        $sql="DELETE * FROM viaje WHERE id={$_POST['id']}";
        $query=$pdo->prepare($sql);
        $query->execute();
    }catch (Exception $e) {
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }
}

?>