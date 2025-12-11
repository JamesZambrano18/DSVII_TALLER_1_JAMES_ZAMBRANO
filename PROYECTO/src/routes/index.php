<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the base path for includes
define('BASE_PATH', __DIR__ . '/');

// Include the configuration file
require_once BASE_PATH . '../../config.php';

// Include necessary files
require_once '../Database.php';
require_once BASE_PATH . 'Routes.php';
require_once BASE_PATH . 'RoutesManager.php';

// Create an instance of TaskManager
$routesManager = new RoutesManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $route = new Routes($_POST);
            $routesManager->createRoutes($route);
            header('Location: ' . BASE_URL. "routes");
            exit;
        }
        $busList = $routesManager->getAllBusses();
        $locationList = $routesManager->getAllLocations();
        require BASE_PATH . 'views/form.php'; 
        break;
    case 'delete':
        $routesManager->deleteRoutes($_GET['id']);
        header('Location: ' . BASE_URL."routes");
        break;
    case 'update':
        //Obtener id y datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $route = $routesManager->getRouteById($id);
            $busList = $routesManager->getAllBusses();
            $locationList = $routesManager->getAllLocations();
            require BASE_PATH . 'views/edit.php';
            break;
        }

        // Actualizar datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $route = new Routes($_POST);
            $routesManager->updateRoute($route);
            header('Location: ' . BASE_URL . 'routes');
            exit;
        }
        break;
    default:
        $routes = $routesManager->getAllRoutes();
        require BASE_PATH . 'views/list.php'; 
        break;
}
?>