
<?php
require_once __DIR__ . '/../app/core/Database.php'; 
require_once __DIR__ . '/../app/controllers/SolicitacaoController.php';

$controller = new SolicitacaoController();

// Verificar se o parâmetro 'tipo' foi passado na URL
if (isset($_GET['tipo'])) {
    $tipo = $_GET['tipo'];
    $controller->mostrarFormulario($tipo);
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->enviarSolicitacao();
} 
 