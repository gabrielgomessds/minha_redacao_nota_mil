<?php

require_once('class.phpmailer.php');

$mailer = new PHPMailer();
$mailer->IsSMTP();
$mailer->SMTPDebug = 1;
$mailer->Port = 465; //Indica a porta de conexão 
$mailer->Host = 'smtp.gmail.com';//Endereço do Host do SMTP 
$mailer->SMTPAuth = true; //define se haverá ou não autenticação 
$mailer->Username = 'minharedacaonotamil@gmail.com'; //Login de autenticação do SMTP
$mailer->Password = 'hulkvingadormaisforte'; //Senha de autenticação do SMTP
$mailer->FromName = 'Equipe Minha Redação'; //Nome que será exibido
$mailer->From = 'minharedacaonotamil@gmail.com'; //Obrigatório ser a mesma caixa postal configurada no remetente do SMTP
$mailer->AddAddress('gabrielgomessdasilva12@gmail.com','GABRIEL GOMES');//Destinatários
$mailer->Subject = 'Teste enviado através do PHP Mailer SMTPLW';
$mailer->Body = 'Este é um teste realizado com o PHP Mailer SMTPLW';
if(!$mailer->Send()){
echo "Message was not sent";
echo "Mailer Error: " . $mailer->ErrorInfo;
 exit; 
 }
print "E-mail enviado!"
?>