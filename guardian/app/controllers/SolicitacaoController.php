<?php
require_once __DIR__ . '/../models/SolicitacaoModel.php';

class SolicitacaoController {
    private $model;

    public function __construct() {
        $this->model = new SolicitacaoModel();
    }

    public function mostrarFormulario($tipo) {
     
        if ($tipo === 'discente') {
            require_once __DIR__ . '/../views/solicitacao/index.php';
        } else {
            require_once __DIR__ . '/../views/solicitacao/index2.php';
        }
    }


    public function enviarSolicitacao() {
     if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $matricula = trim($_POST['matricula']);
        $email = trim($_POST['email']);

        // Validação do e-mail institucional
        if (!preg_match('/^[a-zA-Z0-9._%+-]+@(academico\.ifpb\.edu\.br|ifpb\.edu\.br)$/', $email)) {
            $mensagem = "Erro: Use um e-mail institucional válido (@academico.ifpb.edu.br ou @ifpb.edu.br)";
        } else {
            // Chama o model apenas se o e-mail for válido
            $resultado = $this->model->salvarSolicitacao($matricula, $email);
            $mensagem = $resultado
                ? "Solicitação enviada com sucesso!"
                : "Erro ao enviar a solicitação.";
        }
                require_once __DIR__ . '/../views/solicitacao/index.php';
    }
}
}
