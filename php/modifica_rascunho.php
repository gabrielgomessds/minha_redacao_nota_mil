<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$id = $_GET['id'];
		$codigo_aluno = $_POST['codigo_aluno'];
		$redacao = $_POST['redacao'];
		$data_modificacao = $_POST['data_modificacao'];
		mysqli_query($conn,"update rascunho set rascunho='$redacao',data_modificacao='$data_modificacao' where id=$id");
		header ("location: ../paginas/sucesso_modificado_rascunho.php?id=".$codigo_aluno);

?>