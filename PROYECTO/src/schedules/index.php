<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the base path for includes
define('BASE_PATH', __DIR__ . '/');

// Include the configuration file
require_once BASE_PATH . 'config.php';

// Include necessary files
require_once BASE_PATH . 'Schedules.php';
require_once BASE_PATH . 'SchedulesManager.php';

// Create an instance of TaskManager
$schedulesManager = new SchedulesManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $schedule = new Schedules($_POST);
            $scheduleManager->createSchedules($schedule);
            header('Location: ' . BASE_URL. "/schedules");
            exit;
        }
        require BASE_PATH . 'views/task_form.php'; //cambiar archivo
        break;
    case 'delete':
        $scheduleManager->deleteSchedules($_GET['id']);
        header('Location: ' . BASE_URL);
        break;
    default:
        $schedule = $scheduleManager->getAllSchedules();
        require BASE_PATH . 'views/task_list.php'; //cambiar archivo
        break;
}

echo "hello";
?>