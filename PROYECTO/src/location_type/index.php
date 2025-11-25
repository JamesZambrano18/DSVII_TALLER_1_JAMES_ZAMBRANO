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
require_once BASE_PATH . 'LocationType.php';
require_once BASE_PATH . 'LocationTypeManager.php';

// Create an instance of TaskManager
$locationTypeManager = new LocationTypeManager();

$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    default:
        $locationType = $locationTypeManager->getAllLocationTypes();
        require BASE_PATH . 'views/task_list.php'; //cambiar archivo
        break;
}

echo "hello";
?>