<?php
require_once 'Database.php';

class Ciudades {
    private $db;

    public function __construct($db) {
        $this->db = DataBase::conectar();
    }

    // Obtener todas las ciudades
    public function obtenerTodas() {
        $query = "SELECT * FROM ciudades";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener una ciudad por su ID
    public function obtenerPorId($id) {
        $query = "SELECT * FROM ciudades WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear una nueva ciudad
    public function crear($nombre) {
        $query = "INSERT INTO ciudades (nombre) VALUES (:nombre)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Actualizar una ciudad existente
    public function actualizar($id, $nombre) {
        $query = "UPDATE ciudades SET nombre = :nombre WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar una ciudad
    public function eliminar($id) {
        $query = "DELETE FROM ciudades WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>