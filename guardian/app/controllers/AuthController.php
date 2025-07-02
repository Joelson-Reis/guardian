<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../models/UsuarioModel.php';



class AuthController {
    private $usuarioModel;

    public function __construct() {
        $this->usuarioModel = new UsuarioModel();
    }

    public function mostrarFormulario() {
        require_once __DIR__ . '/../views/auth/painel.php'; 
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $user = $this->usuarioModel->buscarPorUsuario($usuario);

            if ($user && password_verify($senha, $user['senha'])) {
                session_start();
                $_SESSION['usuario'] = $usuario;
                header("Location: admin.php");
                exit();
            } else {
                header("Location: painel.php?error=1");
            }
        }
    }
}
