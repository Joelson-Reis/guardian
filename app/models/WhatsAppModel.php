<?php
// models/WhatsAppModel.php



class WhatsAppModel {
    public function enviarMensagem($destinationNumber, $messageBody) {
        $accountSid = 'AC664788d123cdae27aeebfff069506aef';
        $authToken = '397875623aa28cd75355b9922d89ecdb';
        $twilioNumber = 'whatsapp:+5583996754858';

       

        $url = "https://api.twilio.com/2010-04-01/Accounts/$accountSid/Messages.json";

        $data = [
            'To' => $destinationNumber,
            'From' => $twilioNumber,
            'Body' => $messageBody,
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_USERPWD, "$accountSid:$authToken");

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            error_log('Erro cURL: ' . curl_error($ch));
            return false;
        } else {
            $responseData = json_decode($response, true);
            if (isset($responseData['sid'])) {
                error_log('WhatsApp enviado com sucesso: ' . $responseData['sid']);
                return true;
            } else {
                error_log('Erro ao enviar WhatsApp: ' . json_encode($responseData));
                return false;
            }
        }

        curl_close($ch);
    }
}
?>