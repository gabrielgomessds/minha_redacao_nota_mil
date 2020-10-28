<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_tema = $_POST['codigo_tema'];
		$codigo_aluno = $_POST['codigo_aluno'];
		$codigo_turma = $_POST['codigo_turma'];
		$tema = $_POST['tema'];
		$nome_aluno = $_POST['nome_aluno'];
		$email_aluno = $_POST['email_aluno'];
		$redacao = $_POST['redacao'];
		$data_modificacao = $_POST['data_modificacao'];
		$sql = mysqli_query($conn,"insert into rascunho (codigo_tema,codigo_aluno,codigo_turma,tema_redacao,email_aluno,rascunho,data_modificacao)values('".$codigo_tema."','".$codigo_aluno."','".$codigo_turma."','".$tema."','".$email_aluno."','".$redacao."','".$data_modificacao."')");
		header ("location: ../paginas/sucesso_envio_rascunho.php?codigo_aluno=".$codigo_aluno);

?>