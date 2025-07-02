

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/controllers/AuthController.php';




$controller = new AuthController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->login();
} else {
    $controller->mostrarFormulario();
}
?>
