<html>
<head>
<title>Enviando uma nova senha.....</title>
</head>
<?php
include '../php/conexao.php';
$email = $_POST['email'];
$sql = mysql_query("select * from usuario where email='".$email."'")or die(mysql_error());
if(mysql_num_rows($sql)>=1){

  
  require_once("php/PHPMailerAutoload.php");
   // Recebendo variáveis do formulário
$nome = 'Equipe do Minha Redação';
$email = $_POST['email'];
$chave = sha1(uniqid( mt_rand(), true));
$conf = mysql_query("insert into recuperacao (utilizador,confirmacao) values ('".$email."','".$chave."')")or die(mysql_error());
$msg = 'Isso aqui é um teste';

// Criando um novo e-mail
$mail = new PHPMailer();

// Parâmetros do servidor de e-mail   
$mail->isSMTP();
$mail->CharSet = 'utf-8';
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "minharedacaonotamil@gmail.com";
$mail->Password = "hulkvingadormaisforte";

// Configuração de quem está recebendo e enviado
$mail->setFrom("minharedacaonotamil.epizy.com", "Minha Redação Nota Mil - Recuperação de Senha");
$mail->addAddress($email);

// Título e corpo da mensagem
$mail->Subject = "Recuperação de senha do Minha Redação Nota Mil";
$mail->msgHTML("<html>de: {$nome}<br/>email: {$email}<br/>mensagem:<a href='http://localhost/minharedacaonotamil/recuperar_senha/nova_senha.php?utilizador=$email&confirmacao=$chave'>Link para a recuperação da senha</a></html>");
$mail->AltBody = "de: {$nome}\nemail:{\$email}\nLink de Recuperação de senha: {$msg}";

// Enviar mensagem de erro ou de sucesso
if($mail->send()) {
    $_SESSION["success"] = "Em breve, entraremos em contato com você";
   header('location:sucesso_envio_email.php');
} else {
    $_SESSION["danger"] = "Erro ao enviar mensagem " . $mail->ErrorInfo;
    echo 'Erro ao enviar o email'.$mail->ErrorInfo;
}
die();


?>
<?php
}else{
	header('location:erro_recuperar_senha.php?email='.$email);
}
?>
</html>