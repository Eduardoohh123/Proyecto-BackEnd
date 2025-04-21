<?php
require_once 'Database.php';

class Servicios {
    public $db;

    public function __construct($db) {
        $this->db = DataBase::conectar();
    }

    // Obtener todos los servicios
    public function obtenerTodos() {
        $query = "SELECT * FROM servicios";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un servicio por su ID
    public function obtenerPorId($id) {
        $query = "SELECT * FROM servicios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo servicio
    public function crear($nombre, $costo, $duracion, $descripcion, $tipo, $minIntegrantes, $maxIntegrantes) {
        $query = "INSERT INTO servicios (Nombre, Costo, Duracion, Descripcion, Tipo, `Min integrantes`, `Max integrantes`) 
                  VALUES (:nombre, :costo, :duracion, :descripcion, :tipo, :minIntegrantes, :maxIntegrantes)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':costo', $costo, PDO::PARAM_STR);
        $stmt->bindParam(':duracion', $duracion, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':minIntegrantes', $minIntegrantes, PDO::PARAM_INT);
        $stmt->bindParam(':maxIntegrantes', $maxIntegrantes, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Actualizar un servicio existente
    public function actualizar($id, $nombre, $costo, $duracion, $descripcion, $tipo, $minIntegrantes, $maxIntegrantes) {
        $query = "UPDATE servicios SET Nombre = :nombre, Costo = :costo, Duracion = :duracion, Descripcion = :descripcion, 
                  Tipo = :tipo, `Min integrantes` = :minIntegrantes, `Max integrantes` = :maxIntegrantes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':costo', $costo, PDO::PARAM_STR);
        $stmt->bindParam(':duracion', $duracion, PDO::PARAM_STR);
        $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
        $stmt->bindParam(':tipo', $tipo, PDO::PARAM_STR);
        $stmt->bindParam(':minIntegrantes', $minIntegrantes, PDO::PARAM_INT);
        $stmt->bindParam(':maxIntegrantes', $maxIntegrantes, PDO::PARAM_INT);
        return $stmt->execute();
    }

    // Eliminar un servicio
    public function eliminar($id) {
        $query = "DELETE FROM servicios WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>