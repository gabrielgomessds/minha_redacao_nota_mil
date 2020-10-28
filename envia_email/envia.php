<?php
require 'phpmailer/PHPMailerAutoload.php';
require 'phpmailer/class.phpmailer.php';
$mail = new PHPMailer;  
$mail ->Host  =  ' ssl: //smtp.gmail.com: 465 ' ;
$mail->setFrom('minharedacaonotamil@gmail.com', 'Equipe do Minha do site');
$mail->addAddress('gabrielgomessdasilva12@gmail.com', 'Gabriel Gomes');
$mail->Subject  = 'Primeira Mensagem';
$mail->Body     = 'Aqui está a senha';
if(!$mail->send()) {
  echo 'Erro ao Enviar a mensagem.';
  echo 'ERRO: ' . $mail->ErrorInfo;
} else {
  echo 'Seu email foi enviado com sucesso!';
}
?>