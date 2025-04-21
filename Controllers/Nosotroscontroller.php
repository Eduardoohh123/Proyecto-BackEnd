<?php
require_once './Modelos/Nosotros.php';

class NosotrosController {
    private $nosotrosModel;

    public function __construct($conexion) {
        $this->nosotrosModel = new Nosotros($conexion);
    }

    // Método para obtener toda la información de la tabla "Nosotros"
    public function obtenerInformacion() {
        try {
            $informacion = $this->nosotrosModel->obtenerInformacion();
            echo json_encode($informacion);
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para crear un nuevo registro en la tabla "Nosotros"
    public function crear() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['mision'], $data['vision'], $data['equipo'], $data['jerarquia'])) {
                $resultado = $this->nosotrosModel->crear(
                    $data['mision'],
                    $data['vision'],
                    $data['equipo'],
                    $data['jerarquia']
                );

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Registro creado correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo crear el registro']);
                }
            } else {
                echo json_encode(['error' => 'Datos incompletos']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para actualizar un registro existente en la tabla "Nosotros"
    public function actualizar() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['id'], $data['mision'], $data['vision'], $data['equipo'], $data['jerarquia'])) {
                $resultado = $this->nosotrosModel->actualizar(
                    $data['id'],
                    $data['mision'],
                    $data['vision'],
                    $data['equipo'],
                    $data['jerarquia']
                );

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Información actualizada correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo actualizar la información']);
                }
            } else {
                echo json_encode(['error' => 'Datos incompletos']);
            }
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    }

    // Método para eliminar un registro de la tabla "Nosotros"
    public function eliminar() {
        try {
            $data = json_decode(file_get_contents("php://input"), true);

            if (isset($data['id'])) {
                $resultado = $this->nosotrosModel->eliminar($data['id']);

                if ($resultado) {
                    echo json_encode(['mensaje' => 'Registro eliminado correctamente']);
                } else {
                    echo json_encode(['error' => 'No se pudo eliminar el registro']);
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