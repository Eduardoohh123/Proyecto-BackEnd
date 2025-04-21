<?php
class Database{
public static $conexion = null;
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
}
?>