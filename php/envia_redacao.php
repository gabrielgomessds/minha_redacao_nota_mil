<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_tema = $_POST['codigo_tema'];
		$codigo_aluno = $_POST['codigo_aluno'];
		$codigo_turma = $_POST['codigo_turma'];
		$tema = $_POST['tema'];
		$nome_aluno = $_POST['nome_aluno'];
        $foto_aluno = $_POST['foto_aluno'];
		$email_aluno = $_POST['email_aluno'];
		$redacao = $_POST['redacao'];
		$data_envio = $_POST['data_envio'];
		$sql = mysqli_query($conn,"insert into redacao (codigo_tema,codigo_aluno,codigo_turma,tema,nome_aluno,foto_aluno,email_aluno,redacao,data_envio)values('".$codigo_tema."','".$codigo_aluno."','".$codigo_turma."','".$tema."','".$nome_aluno."','".$foto_aluno."','".$email_aluno."','".$redacao."','".$data_envio."')");
		header ("location: ../paginas/sucesso_envio_redacao.php?codigo_aluno=".$codigo_aluno);
?>