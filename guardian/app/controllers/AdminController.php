<?php
require_once __DIR__ . '/../models/SolicitacaoModel.php';
require_once __DIR__ . '/../models/UsuarioModel.php';
require_once __DIR__ . '/../core/Email.php';
require_once __DIR__ . '/../models/ScriptModel.php';
require_once __DIR__ . '/../models/WhatsAppModel.php'; 

class AdminController {
    private $solicitacaoModel;
    private $usuarioModel;
    private $scriptModel;
    private $whatsAppModel; 

    public function __construct() {
        $this->solicitacaoModel = new SolicitacaoModel();
        $this->usuarioModel = new UsuarioModel();
        $this->scriptModel = new ScriptModel();
        $this->whatsAppModel = new WhatsAppModel(); 
    }

       public function cadastrarUsuario() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $matricula = $_POST['matricula'];

            if ($this->usuarioModel->cadastrarUsuario($usuario, $senha, $email, $matricula)) {
                $mensagem = "Usuário cadastrado com sucesso!";
            } else {
                $mensagem = "Erro ao cadastrar usuário.";
            }

            require_once __DIR__ . '/../views/admin/cadastro_usuario.php';
        } else {
            require_once __DIR__ . '/../views/admin/cadastro_usuario.php';
        }
    }
 


    public function mostrarPainel() {
        $solicitacoes = $this->solicitacaoModel->buscarPendentes();
        $scripts = $this->scriptModel->listarScriptsGerados();
        require_once __DIR__ . '/../views/admin/index.php';
    }

    public function atualizarStatus($id, $status) {
        error_log("AdminController: ID recebido - " . $id . ", Status recebido - " . $status);

        if ($this->solicitacaoModel->atualizarStatus($id, $status)) {
            if ($status === "Atendida") {
                $solicitacao = $this->solicitacaoModel->buscarPorId($id);

                if ($solicitacao) {
                    $matricula = $solicitacao['matricula'];
                    $email = $solicitacao['email'];
                    $telefone = $solicitacao['telefone']; 
                    $senhaPadrao = substr($matricula, -3) . "@ifpb2025";
                    $script = "samba-tool user setpassword $matricula --newpassword=\"$senhaPadrao\" --must-change-at-next-login";

                    error_log("ID da solicitação: " . $id);
                    error_log("Status da solicitação: " . $status);
                    error_log("Matrícula: " . $matricula);
                    error_log("Script gerado: " . $script);

                    if ($this->scriptModel->inserirScript($matricula, $script)) {
                        error_log("Script inserido com sucesso via AdminController");
                        $assunto = "Status da sua solicitação: Atendida";
                        $mensagem = "<html><head><meta charset=\"UTF-8\"><title>Status da sua solicitação</title></head><body><h2>Olá, sua solicitação foi atendida!</h2><p>A solicitação com matrícula <strong>$matricula</strong> foi atendida e a nova senha foi gerado com sucesso.</p><p><strong>Senha:</strong><br>$senhaPadrao</p><p>Atenciosamente, <br>Equipe de Suporte</p></body></html>";

                        if (Email::enviar($email, $assunto, $mensagem)) {
                            error_log("Email enviado com sucesso para: " . $email);
                        } else {
                            error_log("Falha ao enviar email para: " . $email);
                        }
                    } else {
                        error_log("Falha ao inserir script via AdminController");
                    }
                }
            }
        }

        header("Location: admin.php");
        exit();
    }

}


?>
