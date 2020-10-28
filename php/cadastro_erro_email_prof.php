<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Cadastro Professor</title>
<style type="text/css">
	#avi{
color:#4682B4;	


	}
	.link{
		background: #FF0000;
		color:blue;
		text-decoration: none;
	}

</style>
</head>

<body>
<?php
// Conexão com o banco de dados
include 'conexao.php';
//Envia para o banco palavras acentuadas de forma correta
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';

 
 
// Se o usuário clicou no botão cadastrar efetua as ações
$nome = $_POST['nome'];
$email = $_POST['email'];
$escola = $_POST['escola'];
$senha = $_POST['senha'];
$foto = $_POST["foto"];
$tipo = $_POST['tipo'];

//Verificando o email:
//começo
$pegaEmail = mysqli_query($conn,"SELECT * FROM professor WHERE email = '$email'");
if(mysqli_num_rows($pegaEmail) >= 1){
header ("location: ../paginas/erro_cadastro_email_prof.php?nome=".$nome."&email=".$email."&escola=".$escola."&senha=".$senha."&foto=".$caminho_imagem);
}else{
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$foto."','".$tipo."')") ;	
$sql = mysqli_query($conn,"INSERT INTO professor (nome,email,escola,senha,foto) VALUES ('".$nome."','".$email."','".$escola."','".$senha."','".$foto."')") ;

header ("location: cadastro_login.php?email=".$email."&senha=".$senha);

}
?>
</body>
</html>