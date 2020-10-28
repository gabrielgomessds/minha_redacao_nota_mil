<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_usuario = $_POST['codigo_usuario'];
		$tipo_usuario = $_POST['tipo_usuario'];
		$email_usuario = $_POST['email_usuario'];
		$codigo_mensagem = $_POST['codigo_mensagem'];
		$data_comentario = $_POST['data_comentario'];
		$comentario = $_POST['comentario'];
		$sql = mysqli_query($conn,"insert into comentario (codigo_usuario,codigo_mensagem,email_usuario,data_comentario,tipo_usuario,comentario)values('".$codigo_usuario."','".$codigo_mensagem."','".$email_usuario."','".$data_comentario."','".$tipo_usuario."','".$comentario."')");
		header("location:../paginas/admin_ver_mensagem.php?codigo_mensagem=".$codigo_mensagem);
?>