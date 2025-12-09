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
require_once BASE_PATH . 'Locations.php';
require_once BASE_PATH . 'LocationsManager.php';

// Create an instance of TaskManager
$locationsManager = new LocationsManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $locations = new Locations($_POST);
            $locationsManager->createLocation($locations);
            header('Location: ' . BASE_URL. "locations");
            exit;
        }
        require BASE_PATH . 'views/form.php'; //cambiar archivo
        break;
    case 'delete':
        $locationsManager->deleteLocation($_GET['id']);
        header('Location: ' . BASE_URL."locations");
        break;
    case 'update':
        //Obtener id y datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $location = $locationsManager->getLocationById($id);
            require BASE_PATH . 'views/edit.php';
            break;
        }

        // Actualizar datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $location = new Locations($_POST);
            $locationsManager->updateLocation($location);
            header('Location: ' . BASE_URL . 'locations');
            exit;
        }
        break;
    default:
        $locations = $locationsManager->getAllLocations();
        require BASE_PATH . 'views/list.php'; //cambiar archivo
        break;
}
?>