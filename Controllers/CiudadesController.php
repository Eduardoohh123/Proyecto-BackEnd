<?php
require_once './Modelos/Ciudades.php';

class CiudadesController {
    private $ciudadesModel;

    public function __construct($conexion) {
        $this->ciudadesModel = new Ciudades($conexion);
    }

    public function obtenerTodas() {
        try {
            $ciudades = $this->ciudadesModel->obtenerTodas();
            echo json_encode($ciudades);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function obtenerPorId($id) {
        try {
            $ciudad = $this->ciudadesModel->obtenerPorId($id);
            if ($ciudad) {
                echo json_encode($ciudad);
            } else {
                echo json_encode(['error' => 'Ciudad no encontrada']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function crear() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['nombre'])) {
                $resultado = $this->ciudadesModel->crear($data['nombre']);

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Ciudad creada correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo crear la ciudad']);
                }
            } else {
                echo json_encode(['error' => 'Datos incompletos']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function actualizar() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['id'], $data['nombre'])) {
                $resultado = $this->ciudadesModel->actualizar($data['id'], $data['nombre']);

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Ciudad actualizada correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo actualizar la ciudad']);
                }
            } else {
                echo json_encode(['error' => 'Datos incompletos']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    public function eliminar() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['id'])) {
                $resultado = $this->ciudadesModel->eliminar($data['id']);

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Ciudad eliminada correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo eliminar la ciudad']);
                }
            } else {
                echo json_encode(['error' => 'ID no proporcionado']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }
}
?>