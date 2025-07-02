<?php
session_start();
require_once __DIR__ . '/../app/core/Database.php';
require_once __DIR__ . '/../app/controllers/AdminController.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$controller = new AdminController();

if (isset($_GET['action']) && $_GET['action'] === 'cadastro_usuario') {
    // Rota para exibir o formulário de cadastro de usuário
    $controller->cadastrarUsuario();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'], $_POST['status'])) {
    // Rota para atualizar o status da solicitação
    $controller->atualizarStatus($_POST['id'], $_POST['status']); // Correção aqui
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['usuario'], $_POST['senha'], $_POST['email'], $_POST['matricula'])) {
    // Rota para processar o cadastro de um novo usuário
    $controller->cadastrarUsuario();
} else {
    // Rota padrão para mostrar o painel de administração
    $controller->mostrarPainel();
}
?>