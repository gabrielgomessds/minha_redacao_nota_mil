<?php
include 'conexao.php';
$codigo_usuario = $_GET['codigo_usuario'];
$codigo_mensagem = $_GET['codigo_mensagem'];
$para = $_GET['para'];
$email_usuario = $_GET['email_usuario'];
mysqli_query($conn,"insert into ler(codigo_usuario,codigo_mensagem,para,email_usuario)values('".$codigo_usuario."','".$codigo_mensagem."','".$para."','".$email_usuario."')");
header("location:../paginas/ver_mensagem.php?codigo_mensagem=".$codigo_mensagem);
?>