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
require_once BASE_PATH . 'Schedules.php';
require_once BASE_PATH . 'SchedulesManager.php';

// Create an instance of TaskManager
$schedulesManager = new SchedulesManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $schedules = new Schedules($_POST);
            $schedulesManager->createSchedules($schedules);
            header('Location: ' . BASE_URL. "/schedules");
            exit;
        }
        require BASE_PATH . 'views/form.php'; //cambiar archivo
        break;
    case 'delete':
        $schedulesManager->deleteSchedules($_GET['id']);
        header('Location: ' . BASE_URL);
        break;
    case 'update':
        //Obtener id y datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $schedules = $schedulesManager->getScheduleById($id);
            require BASE_PATH . 'views/edit.php';
            break;
        }

        // Actualizar datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $schedules = new schedules($_POST);
            $schedulesManager->updateSchedule($schedules);
            header('Location: ' . BASE_URL . 'schedules');
            exit;
        }
        break;
    default:
        $schedules = $schedulesManager->getAllSchedules();
        require BASE_PATH . 'views/list.php'; //cambiar archivo
        break;
}
?>