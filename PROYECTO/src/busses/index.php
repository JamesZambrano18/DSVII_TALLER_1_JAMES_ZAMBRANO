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
require_once BASE_PATH . 'Busses.php';
require_once BASE_PATH . 'BussesManager.php';

// Create an instance of TaskManager
$bussesManager = new BussesManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bus = new Busses($_POST);
            $bussesManager->createBus($bus);
            header('Location: ' . BASE_URL. "busses");
            exit;
        }
        $scheduleList = $bussesManager->getAllSchedules();
        require BASE_PATH . 'views/form.php'; //cambiar archivo
        break;
    case 'delete':
        $bussesManager->deleteBus($_GET['id']);
        header('Location: ' . BASE_URL. "busses");
        break;
    case 'update':
        //Obtener id y datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $bus = $bussesManager->getBusById($id);
            $scheduleList = $bussesManager->getAllSchedules();
            require BASE_PATH . 'views/edit.php';
            break;
        }

        // Actualizar datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $bus = new Busses($_POST);
            $bussesManager->updateBus($bus);
            header('Location: ' . BASE_URL . 'busses');
            exit;
        }
        break;
    default:
        $busses = $bussesManager->getAllBusses();
        require BASE_PATH . 'views/list.php'; //cambiar archivo
        break;
}
?>