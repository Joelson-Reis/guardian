<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/../core/Database.php';

class ScriptModel {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function inserirScript($matricula, $script) {
        error_log("Inserindo script: Matricula - " . $matricula . ", Script - " . $script);
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO scripts_gerados (matricula, script) VALUES (?, ?)");
        $stmt->bind_param("ss", $matricula, $script);

        if ($stmt->execute()) {
            error_log("Script inserido com sucesso: Matricula - " . $matricula . ", Script - " . $script);
            return true;
        } else {
            error_log("Falha ao inserir script: " . $stmt->error);
            return false;
        }
    }

    public function listarScriptsGerados() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT * FROM scripts_gerados ORDER BY data_geracao DESC");

        if ($result) {
            $scripts = $result->fetch_all(MYSQLI_ASSOC);
            error_log("Scripts listados com sucesso. Total: " . count($scripts));
            return $scripts;
        } else {
            error_log("Erro na consulta SQL: " . $conn->error);
            return [];
        }
    }
}
?>