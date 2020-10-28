<html>
<head>
<title>Atualizando dados do Aluno</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$email_aluno = $_POST['email_aluno'];
$id = $_POST['id'];
$nome_admin = $_POST['nome_admin'];
$email_admin = $_POST['email_admin'];
$senha_admin = $_POST['senha_admin'];
$foto_admin = $_FILES["foto_admin"];
 if (!empty($foto_admin["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto_admin["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../fotos_alunos/" . $nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($foto_admin["tmp_name"], $caminho_imagem);
mysqli_query($conn,"update admin set nome_admin='$nome_admin',email_admin='$email_admin',senha_admin='$senha_admin',foto_admin='$caminho_imagem' where email_admin='$email_aluno'");
mysqli_query($conn,"update usuario set nome='$nome_admin',email='$email_admin',senha='$senha_admin',foto='$caminho_imagem' where email='$email_aluno'");

 }else{
mysqli_query($conn,"update admin set nome_admin='$nome_admin',email_admin='$email_admin',senha_admin='$senha_admin' where email_admin='$email_aluno'");
mysqli_query($conn,"update usuario set nome='$nome_admin',email='$email_admin',senha='$senha_admin' where email='$email_aluno'");

	 
 }
header("location:cadastro_login.php?email=".$email_admin."&senha=".$senha_admin);
?>
</body>
</html>