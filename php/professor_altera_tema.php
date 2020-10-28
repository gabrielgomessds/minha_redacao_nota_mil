<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Alterar tema</title>
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

  session_start();
  $email=$_SESSION['email'];
  $senha=$_SESSION['senha'];

// Conexão com o banco de dados
include 'conexao.php';
//Envia para o banco palavras acentuadas de forma correta
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
// Se o usuário clicou no botão cadastrar efetua as ações
$codigo_tema = $_POST['codigo_tema'];
$nome_tema = $_POST['nome_tema'];
$vencimento = $_POST['vencimento'];
$codigo_turma = $_POST['codigo_turma'];
$maximo_redacao = $_POST['maximo_redacao'];
$texto_motivacional = $_POST['texto_motivacional'];
$pegaData = date('Y/d/m',  strtotime($vencimento));
$marcadas = $_POST['marcadas'];
$para_escolher = $_POST['para_escolher'];
$codigo_professor = $_POST['codigo_professor'];
$turma_escolhida = $_POST['turma_escolhida'];
mysqli_query($conn,"update temas_redacao set nome_tema='$nome_tema',vencimento='$vencimento',codigo_turma='$codigo_turma',maximo_redacao = '$maximo_redacao',texto_motivacional='$texto_motivacional' where id='$codigo_tema'");
$buscaTurma = mysqli_query($conn,"select * from turmas_selecionadas where codigo_tema = '$codigo_tema'");
$sql = mysqli_query($conn,"update turmas_selecionadas set situacao = '' where codigo_tema='$codigo_tema'");

// deletar na tabela turmas especificas se o codigo for diferente de TurmasEspecificas
if($codigo_turma != 'TurmasEspecificas'){
	$sql = mysqli_query($conn,"delete from turmas_selecionadas where codigo_tema = '$codigo_tema'");

}else if($para_escolher != null and $codigo_turma = 'TurmasEspecificas'){
	foreach ($turma_escolhida as $escolhidas_turmas) {
           
		$sql = mysqli_query($conn,"insert into turmas_selecionadas (codigo_tema,codigo_turma,codigo_professor)values('".$codigo_tema."','".$escolhidas_turmas."','".$codigo_professor."')");

	}
  
	foreach ($marcadas  as $turmas_marcadas) {
		$sql = mysqli_query($conn,"update turmas_selecionadas set situacao = 'checked' where codigo_turma='$turmas_marcadas' and codigo_tema ='$codigo_tema'");
	}
}else{
foreach ($marcadas as $turmas_marcadas) {
	
	
	$sql = mysqli_query($conn,"update turmas_selecionadas set situacao = 'checked' where codigo_turma='$turmas_marcadas' and codigo_tema = '$codigo_tema'");
}
}

header("location:../paginas/sucesso_alterar_tema.php?codigo_tema=".$codigo_tema);
?>
</body>
</html>