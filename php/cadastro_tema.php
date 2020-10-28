<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$nome_tema = $_POST['nome_tema'];
		$vencimento = $_POST['vencimento'];
		$sql = mysqli_query($conn,"insert into temas_redacao (nome_tema,vencimento)values('".$nome_tema."','".$vencimento."')");
		header ("location: ../paginas/admin.php");

?>