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
$nome = $_POST['nome'];
$email = $_POST['email'];
$codigo_acesso = $_POST['codigo_acesso'];
$senha = $_POST['senha'];
$tipo = $_POST['tipo'];
$foto = $_FILES["foto"];

//Verificando o email:
//começo
if($tipo == 'aluno'){
$pegacodigo = mysqli_query($conn,"select * from turma where codigo_acesso = '".$codigo_acesso."'");
$lista = mysqli_fetch_assoc($pegacodigo);
$verifica = mysqli_num_rows($pegacodigo);
if($verifica >= 1){
$pegaEmail = mysqli_query($conn,"SELECT * FROM usuario WHERE email = '$email'");
$numero = mysqli_num_rows($pegaEmail);
if($numero >= 1 ){

	if (!empty($foto["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../fotos_alunos/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($foto["tmp_name"], $caminho_imagem);
// Insere os dados no banco
header("location: ../paginas/professor_erro_cadastro_aluno_email.php?nome=".$nome."&email=".$email."&codigo_acesso=".$codigo_acesso."&senha=".$senha."&foto=".$caminho_imagem);
	
	}else{
		$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
		header("location: ../paginas/professor_erro_cadastro_aluno_email.php?nome=".$nome."&email=".$email."&codigo_acesso=".$codigo_acesso."&senha=".$senha."&foto=".$caminho_imagem);
	}
		

}else{
if (!empty($foto["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../fotos_alunos/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($foto["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."','".$tipo."')") ;
$sql = mysqli_query($conn,"INSERT INTO aluno (nome,email,codigo_turma,senha,foto) VALUES ('".$nome."','".$email."','".$lista['id']."','".$senha."','".$caminho_imagem."')") ;
header("location:../paginas/sucesso_professor_cadastra_aluno.php?codigo_turma=".$lista['id']);
// Se os dados forem inseridos com sucesso
}else{
$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."','".$tipo."')") ;
$sql = mysqli_query($conn,"INSERT INTO aluno (nome,email,codigo_turma,senha,foto) VALUES ('".$nome."','".$email."','".$lista['id']."','".$senha."','".$caminho_imagem."')") ;
header("location:../paginas/sucesso_professor_cadastra_aluno.php?codigo_turma=".$lista['id']);
}

}


}else{
	
	if (!empty($foto["name"])) {
		preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
		 
				 // Gera um nome único para a imagem
				 $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
		 
				 // Caminho de onde ficará a imagem
				 $caminho_imagem = "../fotos_alunos/".$nome_imagem;
		 
		// Faz o upload da imagem para seu respectivo caminho
		move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		// Insere os dados no banco
	header("location:../paginas/erro_codigo_turma.php?nome=".$nome."&email=".$email."&senha=".$senha."&foto=".$caminho_imagem);
	
	}else{
		$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
		header("location:../paginas/erro_codigo_turma.php?nome=".$nome."&email=".$email."&senha=".$senha."&foto=".$caminho_imagem);
	}


}

?>
<?php 
}
?>
</body>
</html>