<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_tema = $_POST['codigo_tema'];
		$codigo_redacao = $_POST['codigo_redacao'];
        $codigo_usuario = $_POST['codigo_usuario'];
		$nome_usuario = $_POST['nome_usuario'];
		$email_usuario = $_POST['email_usuario'];
		$foto_usuario = $_POST['foto_usuario'];
		$data_comentario = $_POST['data_comentario'];
		$comentario= $_POST['comentario'];
        $comentario = mysqli_query($conn,"insert into feedback_redacao (codigo_redacao,codigo_tema,codigo_usuario,nome_usuario,email_usuario,foto_usuario,data_comentario,comentario)values('".$codigo_redacao."','".$codigo_tema."','".$codigo_usuario."','".$nome_usuario."','".$email_usuario."','".$foto_usuario."','".$data_comentario."','".$comentario."')");
		header ("location: ../paginas/professor_ver_correcao.php?id=".$codigo_redacao);

?>