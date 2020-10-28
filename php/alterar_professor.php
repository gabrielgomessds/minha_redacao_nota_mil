<html>
<head>
<title>Atualizando dados do professor</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$email_aluno = $_POST['email_aluno'];
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$escola = $_POST['escola']; 
$senha = $_POST['senha'];
$sexo = $_POST['sexo'];
$foto = $_FILES["foto"];
 if (!empty($foto["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../fotos_alunos/" . $nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($foto["tmp_name"], $caminho_imagem);
mysqli_query($conn,"update professor set nome='$nome',email='$email',escola='$escola',senha='$senha',foto='$caminho_imagem',sexo = '$sexo' where email='$email_aluno'");
mysqli_query($conn,"update usuario set nome='$nome',email='$email',senha='$senha',foto='$caminho_imagem',sexo = '$sexo' where email='$email_aluno'");

 }else{
mysqli_query($conn,"update professor set nome='$nome',email='$email',escola='$escola',senha='$senha',sexo = '$sexo' where email='$email_aluno'");
mysqli_query($conn,"update usuario set nome='$nome',email='$email',senha='$senha',foto='$caminho_imagem',sexo = '$sexo' where email='$email_aluno'");
	 
 }
header("location:cadastro_login.php?email=".$email_aluno."&senha=".$senha);
?>
</body>
</html>