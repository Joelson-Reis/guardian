<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../phpmailer/src/PHPMailer.php';
require_once __DIR__ . '/../phpmailer/src/SMTP.php';
require_once __DIR__ . '/../phpmailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    public static function enviar($destinatario, $assunto, $mensagem) {
        $mail = new PHPMailer(true);

        try {
            $mail->CharSet = 'UTF-8';
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'joelson.reis@ifpb.edu.br';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            $mail->setFrom('joelson.reis@ifpb.edu.br', 'Joelson Reis');
            $mail->addAddress($destinatario);

            $mail->isHTML(true);
            $mail->Subject = $assunto;
            $mail->Body = $mensagem;

            $mail->send();
            error_log("Email enviado com sucesso para: " . $destinatario);
            return true;
        } catch (Exception $e) {
            error_log("Erro ao enviar email: " . $mail->ErrorInfo);
            return false;
        }
    }
}
?>
