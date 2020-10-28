<html>
<head>
<title>Atualizando foto do professor</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$email = $_GET['email'];
$caminho_imagem = "../img/icone/icone_usuario_sem_foto.png" ;
mysqli_query($conn,"update usuario set foto='$caminho_imagem' where email='$email'");
mysqli_query($conn,"update professor set foto='$caminho_imagem' where email='$email'");
header("location:../paginas/professor.php");
?>
</body>
</html>