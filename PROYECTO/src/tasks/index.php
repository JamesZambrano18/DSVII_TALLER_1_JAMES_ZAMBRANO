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
require_once BASE_PATH . 'Task.php';
require_once BASE_PATH . 'TaskManager.php';

// Create an instance of TaskManager
$taskManager = new TaskManager();

echo "hello";
?>