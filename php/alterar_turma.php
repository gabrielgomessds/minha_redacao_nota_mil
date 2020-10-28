<html>
<head>
<title>Alterar dados da turma</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$id = $_POST['id'];
$nome_turma = $_POST['nome_turma'];
$escola_turma = $_POST['escola_turma'];
$codigo_acesso = $_POST['codigo_acesso']; 
$descricao = $_POST['descricao'];
$simbolo = $_FILES["simbolo"];
 if (!empty($simbolo["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $simbolo["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../fotos_alunos/" . $nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($simbolo["tmp_name"], $caminho_imagem);

mysqli_query($conn,"update turma set nome_turma='$nome_turma',escola_turma='$escola_turma',codigo_acesso='$codigo_acesso',descricao='$descricao',simbolo='$caminho_imagem' where id='$id'");
 }else{
    mysqli_query($conn,"update turma set nome_turma='$nome_turma',escola_turma='$escola_turma',codigo_acesso='$codigo_acesso',descricao='$descricao' where id='$id'");
	 
 }
header("location:../paginas/professor_ver_turma.php?codigo_turma=".$id);
?>
</body>
</html>