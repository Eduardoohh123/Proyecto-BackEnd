<?php
// Habilitar CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Incluir la clase Database y los controladores
require_once './Database.php';
require_once './Controllers/CiudadesController.php';
require_once './Controllers/NosotrosController.php';
require_once './Controllers/ServiciosController.php';

// Crear la conexión a la base de datos
$db = new Database();
$conexion = $db->conectar();

// Instanciar los controladores
$ciudadesController = new CiudadesController($conexion);
$nosotrosController = new NosotrosController($conexion);
$serviciosController = new ServiciosController($conexion);

// Obtener la ruta solicitada
$request = $_GET['api'] ?? '';

switch ($request) {
    case 'ciudades':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ciudadesController->obtenerTodas();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ciudadesController->crear();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $ciudadesController->actualizar();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $ciudadesController->eliminar();
        } else {
            echo json_encode(["error" => "Método no permitido."]);
        }
        break;

    case 'nosotros':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $nosotrosController->obtenerInformacion();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nosotrosController->crear();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $nosotrosController->actualizar();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $nosotrosController->eliminar();
        } else {
            echo json_encode(["error" => "Método no permitido."]);
        }
        break;

    case 'servicios':
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $serviciosController->listar();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $serviciosController->crear();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'PUT') {
            $serviciosController->actualizar();
        } elseif ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
            $serviciosController->eliminar();
        } else {
            echo json_encode(["error" => "Método no permitido."]);
        }
        break;

    default:
        // Si la ruta no coincide con ninguna de las anteriores, devolver un error 404
        http_response_code(404);
        echo json_encode(["error" => "Ruta no encontrada."]);
        break;
}
?>