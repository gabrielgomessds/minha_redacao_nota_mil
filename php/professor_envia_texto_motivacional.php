<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Cadastro</title>
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
// Conexão com o banco de dados
include 'conexao.php';
//Envia para o banco palavras acentuadas de forma correta
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';

 
 
// Se o usuário clicou no botão cadastrar efetua as ações
$codigo_tema = $_POST['codigo_tema'];
$texto1 = $_POST['texto1'];
$imagem_texto1 = $_FILES["imagem_texto1"];
$tipo1 = $_POST['tipo1'];
$texto2 = $_POST['texto2'];
$imagem_texto2 = $_FILES["imagem_texto2"];
$tipo2 = $_POST['tipo2'];
$texto3 = $_POST['texto3'];
$imagem_texto3 = $_FILES["imagem_texto3"];
$tipo3 = $_POST['tipo3'];

if (!empty($imagem_texto1["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem_texto1["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../imagens_texto_motivacional/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem_texto1["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"INSERT INTO texto_motivacional(codigo_tema,texto1,imagem_texto1,tipo1,texto2,imagem_texto2,tipo2,texto3,imagem_texto3,tipo3) VALUES ('".$codigo_tema."','".$texto1."','".$caminho_imagem."','".$tipo1."','".$texto2."','".$imagem_texto2."','".$tipo2."','".$texto3."','".$imagem_texto3."','".$tipo3."')") ;
// Se os dados forem inseridos com sucesso

}
if (!empty($imagem_texto2["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem_texto2["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../imagens_texto_motivacional/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem_texto2["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"INSERT INTO texto_motivacional(codigo_tema,texto1,imagem_texto1,tipo1,texto2,imagem_texto2,tipo2,texto3,imagem_texto3,tipo3) VALUES ('".$codigo_tema."','".$texto1."','".$imagem_texto1."','".$tipo1."','".$texto2."','".$caminho_imagem."','".$tipo2."','".$texto3."','".$imagem_texto3."','".$tipo3."')") ;
// Se os dados forem inseridos com sucesso

}
if (!empty($imagem_texto3["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem_texto3["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../imagens_texto_motivacional/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem_texto3["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"INSERT INTO texto_motivacional(codigo_tema,texto1,imagem_texto1,tipo1,texto2,imagem_texto2,tipo2,texto3,imagem_texto3,tipo3) VALUES ('".$codigo_tema."','".$texto1."','".$imagem_texto1."','".$tipo1."','".$texto2."','".$imagem_texto2."','".$tipo2."','".$texto3."','".$caminho_imagem."','".$tipo3."')") ;
// Se os dados forem inseridos com sucesso

}
header("location:../paginas/sucesso_tema.php");
?>
</body>
</html>