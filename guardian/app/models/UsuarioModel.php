<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once __DIR__ . '/../core/Database.php';

class UsuarioModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function buscarPorUsuario($usuario) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE usuario = ?");
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }



    public function cadastrarUsuario($usuario, $senha, $email, $matricula) {
        $conn = $this->db->getConnection();
        $senha_hash = password_hash($senha, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO usuarios (usuario, senha, email, matricula) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $usuario, $senha_hash, $email, $matricula);
        return $stmt->execute();
    }
}