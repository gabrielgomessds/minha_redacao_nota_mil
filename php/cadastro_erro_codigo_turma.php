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
$codigo_acesso = $_POST['codigo_acesso'];
$senha = $_POST['senha'];
$foto = $_POST["foto"];
$tipo = $_POST['tipo'];

//Verificando o email:
//começo
$pegaCodigo = mysqli_query($conn,"SELECT * FROM turma WHERE codigo_acesso = '$codigo_acesso'");
if(mysqli_num_rows($pegaCodigo) == 0){
header ("location: ../paginas/erro_codigo_turma.php?nome=".$nome."&email=".$email."&senha=".$senha."&foto=".$foto);
}else{
$pegaTurma = mysqli_fetch_assoc($pegaCodigo);
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$foto."','".$tipo."')") ;
$sql = mysqli_query($conn,"INSERT INTO aluno (nome,email,codigo_turma,senha,foto) VALUES ('".$nome."','".$email."','".$pegaTurma['id']."','".$senha."','".$foto."')") ;
$resultado = mysqli_query($conn,"SELECT * FROM aluno") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
	header ("location: cadastro_login.php?email=".$email."&senha=".$senha);
}}
?>
</body>
</html>