<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: painel.php");
    exit();
}

$controller = new AdminController();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    $controller->atualizarStatus($_POST['id'], $_POST['status']);
} else {
    $controller->mostrarPainel();
}