<html>
<head>
<title>Atualizando foto do professor</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$codigo_turma = $_GET['codigo_turma'];
$caminho_imagem = "../img/icone/imagem_turma.png" ;
mysqli_query($conn,"update turma set simbolo='$caminho_imagem' where id='$codigo_turma'");
header("location:../paginas/professor_ver_turma.php?codigo_turma=".$codigo_turma);
?>
</body>
</html>