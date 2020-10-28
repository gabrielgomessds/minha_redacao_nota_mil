<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$nome_contato = mysqli_real_escape_string($conn,$_POST['nome_contato']);
		$email_contato = mysqli_real_escape_string($conn,$_POST['email_contato']);
		$mensagem_contato = mysqli_real_escape_string($conn,$_POST['mensagem_contato']);
		$sql = mysqli_query($conn,"insert into contato (nome_contato,email_contato,mensagem_contato)values('".$nome_contato."','".$email_contato."','".$mensagem_contato."')");
		header("location:../paginas/sucesso_contato.html");
?>