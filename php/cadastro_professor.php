<!DOCTYPE html>
<html>
<head>
<?php
ini_set('default_charset','UTF-8');
?>
<meta charset="UTF-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
<title>Minnha redação - Cadastro de Professor</title>
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
// Se o usuário clicou no botão cadastrar efetua as ações
$nome = mysqli_real_escape_string($conn,$_POST['nome']);
$email = mysqli_real_escape_string($conn,$_POST['email']);
$escola = mysqli_real_escape_string($conn,$_POST['escola']);
$foto = $_FILES['foto']; 
$senha = mysqli_real_escape_string($conn,$_POST['senha']);
$sexo = mysqli_real_escape_string($conn,$_POST['sexo']);
$tipo = mysqli_real_escape_string($conn,$_POST['tipo']);

//Verificando o email:
//começo
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

header ("location: ../paginas/erro_cadastro_email_prof.php?nome=".$nome."&email=".$email."&escola=".$escola."&senha=".$senha."&foto=".$caminho_imagem."&sexo=".$sexo);
	}else{
		$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
		header ("location: ../paginas/erro_cadastro_email_prof.php?nome=".$nome."&email=".$email."&escola=".$escola."&senha=".$senha."&foto=".$caminho_imagem."&sexo=".$sexo);

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
$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo,sexo) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."','".$tipo."','".$sexo."')");
$sql = mysqli_query($conn,"INSERT INTO professor (nome,email,escola,senha,foto,sexo) VALUES ('".$nome."','".$email."','".$escola."','".$senha."','".$caminho_imagem."','".$sexo."')");
header ("location: cadastro_login.php?email=".$email."&senha=".$senha);
}else{
	$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
	$sql = mysqli_query($conn,"INSERT INTO usuario (nome,email,senha,foto,tipo,sexo) VALUES ('".$nome."','".$email."','".$senha."','".$caminho_imagem."','".$tipo."','".$sexo."')");
	$sql = mysqli_query($conn,"INSERT INTO professor (nome,email,escola,senha,foto,sexo) VALUES ('".$nome."','".$email."','".$escola."','".$senha."','".$caminho_imagem."','".$sexo."')");
	header ("location: cadastro_login.php?email=".$email."&senha=".$senha);
}

}

?>
</body>
</html>