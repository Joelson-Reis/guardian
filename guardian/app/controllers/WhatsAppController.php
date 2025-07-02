<?php
// controllers/WhatsAppController.php

require_once __DIR__ . '/../models/WhastsAppModel.php';

class WhatsAppController {
    public function enviar() {
        $destinationNumber = $_POST['destinationNumber']; 
        $messageBody = $_POST['messageBody']; 

        $whatsAppModel = new WhatsAppModel();
        $enviado = $whatsAppModel->enviarMensagem($destinationNumber, $messageBody);

        if ($enviado) {
            echo 'Mensagem enviada com sucesso!';
        } else {
            echo 'Falha ao enviar a mensagem.';
        }
    }
}

// Exemplo de uso
$controller = new WhatsAppController();
$controller->enviar();
?>