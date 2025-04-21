<?php
require_once './Models/ServiciosCiudades.php';

class ServiciosCiudadesController{
    public function listar(){
        $serviciosCiudades = new ServiciosCiudades();
        echo json_encode($serviciosCiudades->getServiciosCiudades());
    }
        
}
    public function crear(){
        $serviciosCiudades = new ServiciosCiudades();
        $data = json_decode(file_get_contents("php://input"), true);
        
        if(isset($data['idServicio'], $data['idCiudad'])){
            $query = "INSERT INTO ServiciosCiudades (idServicio, idCiudad) VALUES (:idServicio, :idCiudad)";
            $stmt = $serviciosCiudades->db->prepare($query);
            $stmt->bindParam(':idServicio', $data['idServicio']);
            $stmt->bindParam(':idCiudad', $data['idCiudad']);
            
            if($stmt->execute()){
                echo json_encode(['message' => 'Registro creado exitosamente']);
            } else {
                echo json_encode(['error' => 'Error al crear el registro']);
            }
        } else {
            echo json_encode(['error' => 'Datos incompletos']);
        }
    }