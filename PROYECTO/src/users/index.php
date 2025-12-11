<?php
// Enable error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Define the base path for includes
define('BASE_PATH', __DIR__ . '/');

// Include the configuration file
require_once '../../config.php';

// Include necessary files
require_once '../Database.php';
require_once BASE_PATH . 'Users.php';
require_once BASE_PATH . 'UsersManager.php';

// Create an instance of Manager
$usersManager = new UsersManager();

// Get the action from the URL, default to 'list' if not set
$action = $_GET['action'] ?? 'list';

// Handle different actions
switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Users($_POST);
            $usersManager->createUser($user);
            header('Location: ' . BASE_URL . 'users');
            exit;
        }
        $busList = $usersManager->getAllBusses();
        require BASE_PATH . 'views/form.php';
        break;
    case 'delete':
        $usersManager->deleteUser($_GET['id']);
        header('Location: ' . BASE_URL . 'users');
        break;
    case 'update':
        //Obtener id y datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $id = $_GET['id'] ?? null;
            $user = $usersManager->getUserById($id);
            $busList = $usersManager->getAllBusses();
            $rolesList = $usersManager->getAllRoles();
            require BASE_PATH . 'views/edit.php';
            break;
        }

        // Actualizar datos del usuario
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = new Users($_POST);
            $usersManager->updateUser($user);
            header('Location: ' . BASE_URL . 'users');
            exit;
        }
        break;
    default:
        $users = $usersManager->getAllUsers();
        require BASE_PATH . 'views/list.php';
        break;
}
?>