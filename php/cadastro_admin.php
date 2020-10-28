<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Cadastro</title>
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
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];

//Verificando o email:
//começo
if($tipo == 'admin'){
$pegaEmail = mysqli_query($conn,"SELECT * FROM usuario WHERE email = '$email'");
$numero = mysqli_num_rows($pegaEmail);
if($numero >= 1 ){
$caminho_imagem = "../img/icone/icone_admin_sem_foto.png" ;
header ("location: ../paginas/erro_cadastro_email_admin.php?nome_admin=".$nome."&email=".$email."&senha=".$senha."&foto=".$caminho_imagem);
	}else{
$caminho_imagem = "../img/icone/icone_admin_sem_foto.png" ;
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."','".$tipo."')") ;
$caminho_imagem = "../img/icone/icone_admin_sem_foto.png" ;
$sql = mysqli_query($conn,"INSERT INTO admin(nome_admin,email_admin,senha_admin,foto_admin) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."')") ;
}
$resultado = mysqli_query($conn,"SELECT * FROM admin") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
	header ("location: ../paginas/sucesso_cadastro_admin.php");
}
?>
<?php
}
?>
</body>
</html>