<?php
require_once 'Database.php';

class Nosotros {
    private $db;

    public function __construct($db) {
        $this->db = DataBase::conectar();
    }

    // Obtener toda la información de la tabla "Nosotros"
    public function obtenerInformacion() {
        $query = "SELECT * FROM nosotros";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Crear un nuevo registro en la tabla "Nosotros"
    public function crear($mision, $vision, $equipo, $jerarquia) {
        $query = "INSERT INTO nosotros (mision, vision, equipo, jerarquia) VALUES (:mision, :vision, :equipo, :jerarquia)";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':mision', $mision, PDO::PARAM_STR);
        $stmt->bindParam(':vision', $vision, PDO::PARAM_STR);
        $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
        $stmt->bindParam(':jerarquia', $jerarquia, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Actualizar un registro existente en la tabla "Nosotros"
    public function actualizar($id, $mision, $vision, $equipo, $jerarquia) {
        $query = "UPDATE nosotros SET mision = :mision, vision = :vision, equipo = :equipo, jerarquia = :jerarquia WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':mision', $mision, PDO::PARAM_STR);
        $stmt->bindParam(':vision', $vision, PDO::PARAM_STR);
        $stmt->bindParam(':equipo', $equipo, PDO::PARAM_STR);
        $stmt->bindParam(':jerarquia', $jerarquia, PDO::PARAM_STR);
        return $stmt->execute();
    }

    // Eliminar un registro de la tabla "Nosotros"
    public function eliminar($id) {
        $query = "DELETE FROM nosotros WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
?>