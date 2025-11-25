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
            header('Location: ' . BASE_URL. "/users");
            exit;
        }
        require BASE_PATH . 'views/task_form.php'; //cambiar archivo
        break;
    case 'delete':
        $usersManager->deleteuser($_GET['id']);
        header('Location: ' . BASE_URL);
        break;
    case 'update':
        // $usersManager->updateUser($_POST['mail'], $_POST['password'], $_POST['fname']
        //     , $_POST['lname'],$_POST['phoneNumber'], $_POST['role'],$_POST['bus'], $_GET['id']);
        // header('Location: ' . BASE_URL);
        break;
    default:
        $users = $usersManager->getAllUsers();
        require BASE_PATH . 'views/task_list.php'; //cambiar archivo
        break;
}

echo "hello";
?>