<?php
require_once './Modelos/Servicios.php';

class ServiciosController{
    
    public function listar(){
        $servicios = new Servicios();
        echo json_encode($servicios->getServicios());
    }

    public function crear(){
        $servicios = new Servicios();
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['Nombre'], $data['Costo'], $data['Duracion'], $data['Descripcion'], $data['Tipo'], $data['Min_integrantes'], $data['Max_integrantes'])) {
            $query = "INSERT INTO Servicios (Nombre, Costo, Duracion, Descripcion, Tipo, `Min integrantes`, `Max integrantes`) 
                      VALUES (:Nombre, :Costo, :Duracion, :Descripcion, :Tipo, :Min_integrantes, :Max_integrantes)";
            $stmt = $servicios->db->prepare($query);
            $stmt->bindParam(':Nombre', $data['Nombre']);
            $stmt->bindParam(':Costo', $data['Costo']);
            $stmt->bindParam(':Duracion', $data['Duracion']);
            $stmt->bindParam(':Descripcion', $data['Descripcion']);
            $stmt->bindParam(':Tipo', $data['Tipo']);
            $stmt->bindParam(':Min_integrantes', $data['Min_integrantes']);
            $stmt->bindParam(':Max_integrantes', $data['Max_integrantes']);

            if ($stmt->execute()) {
                echo json_encode(['message' => 'Servicio creado exitosamente']);
            } else {
                echo json_encode(['error' => 'Error al crear el servicio']);
            }
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
    }

    public function actualizar(){
        $servicios = new Servicios();
        $data = json_decode(file_get_contents("php://input"), true);

        if (isset($data['id'], $data['Nombre'], $data['Costo'], $data['Duracion'], $data['Descripcion'], $data['Tipo'], $data['Min_integrantes'], $data['Max_integrantes'])) {
            $query = "UPDATE Servicios SET Nombre = :Nombre, Costo = :Costo, Duracion = :Duracion, Descripcion = :Descripcion, 
                      Tipo = :Tipo, `Min integrantes` = :Min_integrantes, `Max integrantes` = :Max_integrantes WHERE id = :id";
            $stmt = $servicios->db->prepare($query);
            $stmt->bindParam(':id', $data['id']);
            $stmt->bindParam(':Nombre', $data['Nombre']);
            $stmt->bindParam(':Costo', $data['Costo']);
            $stmt->bindParam(':Duracion', $data['Duracion']);
            $stmt->bindParam(':Descripcion', $data['Descripcion']);
            $stmt->bindParam(':Tipo', $data['Tipo']);
            $stmt->bindParam(':Min_integrantes', $data['Min_integrantes']);
            $stmt->bindParam(':Max_integrantes', $data['Max_integrantes']);

            if ($stmt->execute()) {
                echo json_encode(['message' => 'Servicio actualizado exitosamente']);
            } else {
                echo json_encode(['error' => 'Error al actualizar el servicio']);
            }
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
    }

    public function eliminar(){
        $data = json_decode(file_get_contents("php://input"), true);
        $servicios = new Servicios();

        if (isset($data['id'])) {
            $query = "DELETE FROM Servicios WHERE id = :id";
            $stmt = $servicios->db->prepare($query);
            $stmt->bindParam(':id', $data['id']);

            if ($stmt->execute()) {
                echo json_encode(['message' => 'Servicio eliminado exitosamente']);
            } else {
                echo json_encode(['error' => 'Error al eliminar el servicio']);
            }
        } else {
            echo json_encode(['error' => 'ID no proporcionado']);
        }
    }
}
?>