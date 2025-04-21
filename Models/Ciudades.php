<?php
require_once 'Database.php';
class Ciudades{
    private $db;
    public function __construct($db){
        $this->db = DataBase::conectar();
    }
    public function getCiudades(){
        $query = "SELECT * FROM ciudades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>