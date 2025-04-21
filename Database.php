<?php
class DataBase{}
private static $conexion = null;
public static function conectar(){
    if (self::$conexion == null) {
        try {
            $host = 'localhost';
            $dbname = 'proyecto_backend';
            $username = 'root';
            $password = '';
  self::$conexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            self::$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$conexion->exec("SET NAMES utf8");
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
    }
    return self::$conexion;
}

function probarConexion(){
    try{
        $conexion = null;
       $conexion = new PDO('mysql:host=localhost;dbname=proyecto_backend', 'root', '');
       $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
       echo "Conexión exitosa a la base de datos.";
       } catch (PDOException $e) {
          die("Error de conexión: " . $e->getMessage());
       }
       return self::$conexion;

}
?>