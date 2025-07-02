<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../core/Database.php';

class SolicitacaoModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function salvarSolicitacao($matricula, $email) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO solicitacoes (matricula, email) VALUES (?, ?)");
        $stmt->bind_param("ss", $matricula, $email);
        return $stmt->execute();
    }

    public function buscarPendentes() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT * FROM solicitacoes WHERE status = 'Pendente' ORDER BY data_solicitacao DESC");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function buscarPorId($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT * FROM solicitacoes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function atualizarStatus($id, $status) {
        error_log("Atualizando status: ID - " . $id . ", Status - " . $status);
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE solicitacoes SET status = ? WHERE id = ?");
        $stmt->bind_param("si", $status, $id);
        if ($stmt->execute()) {
            error_log("Status atualizado com sucesso: ID - " . $id . ", Status - " . $status);
            return true;
        } else {
            error_log("Falha ao atualizar status: " . $stmt->error);
            return false;
        }
    }

}
?>