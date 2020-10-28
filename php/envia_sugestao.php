<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_aluno = $_POST['codigo_aluno'];
		$nome_contato = $_POST['nome_contato'];
		$email_contato = $_POST['email_contato'];
		$escola_contato = $_POST['escola_contato'];
		$foto_contato = $_POST['foto_contato'];
		$titulo = $_POST['titulo'];
		$mensagem = $_POST['mensagem'];
		$data_envio = $_POST['data_envio'];
		$tipo = $_POST['tipo'];
		$sql = mysqli_query($conn,"insert into sugestao(codigo_aluno,nome_contato,email_contato,escola_contato,foto_contato,titulo,mensagem,data_envio,tipo)values('".$codigo_aluno."','".$nome_contato."','".$email_contato."','".$escola_contato."','".$foto_contato."','".$titulo."','".$mensagem."','".$data_envio."','".$tipo."')");
		
		header("location:../paginas/sucesso_envio_sugestao.php?codigo_aluno=".$codigo_aluno);

?>