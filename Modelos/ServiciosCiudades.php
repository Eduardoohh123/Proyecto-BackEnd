<?php
require_once 'Database.php';
class ServiciosCiudades{
    private $db;

    public function __construct(){
        $this->db = Database::conectar();
    }

    public function getServiciosCiudades(){
        $query = "SELECT  sc.id AS ServiciosCiudadesID, s.Nombre AS Servicio, c.Nombre AS Ciudad FROM  ServiciosCiudades sc INNER JOIN  Servicios s ON sc.idServicio = s.id INNER JOIN  Ciudades c ON sc.idCiudad = c.id;";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

