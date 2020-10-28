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
$nome_turma = $_POST['nome_turma'];
$escola_turma = $_POST['escola_turma'];
$codigo_acesso = $_POST['codigo_acesso'];
$codigo_professor = $_POST['codigo_professor'];
$simbolo = $_POST['simbolo'];
$data_criacao = $_POST['data_criacao'];
$descricao = $_POST['descricao'];

//Verificando o email:
//começo
$pegaCodigo = mysqli_query($conn,"SELECT * FROM turma WHERE codigo_acesso = '$codigo_acesso'");
if(mysqli_num_rows($pegaCodigo) >= 1){
header ("location: ../paginas/codigo_acesso_repetido.php?nome_turma=".$nome_turma."&escola_turma=".$escola_turma."&codigo_acesso=".$codigo_acesso."&codigo_professor=".$codigo_professor."&simbolo=".$caminho_imagem."&data_criacao=".$data_criacao."&descricao=".$descricao);
}else{
	
$sql = mysqli_query($conn,"INSERT INTO turma (nome_turma,escola_turma,codigo_acesso,codigo_professor,simbolo,data_criacao,descricao) VALUES ('".$nome_turma."','".$escola_turma."','".$codigo_acesso."','".$codigo_professor."','".$simbolo."','".$data_criacao."','".$descricao."')") ;
$resultado = mysqli_query($conn,"SELECT * FROM turma") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
	header ("location:../paginas/professor.php ");
}}
?>
</body>
</html>