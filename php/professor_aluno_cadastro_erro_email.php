<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Cadastro Aluno</title>
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
$codigo_turma = $_POST['codigo_turma'];
$senha = $_POST['senha'];
$foto = $_POST["foto"];
$tipo = $_POST['tipo'];

//Verificando o email:
//começo
$pegaEmail = mysqli_query($conn,"SELECT * FROM aluno WHERE email = '$email'");
if(mysqli_num_rows($pegaEmail) == 1){
header ("location: ../paginas/professor_erro_cadastro_aluno_email.php?nome=".$nome."&email=".$email."&escola=".$escola."&serie=".$serie."&codigo_acesso=".$codigo_acesso."&senha=".$senha."&foto=".$caminho_imagem);
}else{
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$foto."','".$tipo."')") ;	
$sql = mysqli_query($conn,"INSERT INTO aluno (nome,email,codigo_turma,senha,foto) VALUES ('".$nome."','".$email."','".$codigo_turma."','".$senha."','".$foto."')") ;

$resultado = mysqli_query($conn,"SELECT * FROM aluno") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
header ("location: ../paginas/sucesso_professor_cadastra_aluno.php?codigo_turma=".$codigo_turma);

}
}
?>
</body>
</html>