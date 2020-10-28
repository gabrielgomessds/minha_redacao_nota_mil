<html>
<head>
<title>Enviando Rank</title>
</head>
<body>
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$codigo_tema = $_GET['codigo_tema'];
$codigo_turma = $_GET['codigo_turma'];
$busca_rank = mysqli_query($conn,"select * from rank where codigo_tema = '$codigo_tema'");
$pega_rank = mysqli_fetch_assoc($busca_rank);
if(mysqli_num_rows($busca_rank) >= 1 ){
    $altera = mysqli_query($conn,"update rank set codigo_turma = '$codigo_turma' where id = '".$pega_rank['id']."'");
}else{
$inseri = mysqli_query($conn,"insert into rank(codigo_tema,codigo_turma)values('".$codigo_tema."','".$codigo_turma."')");
}
header("location:../paginas/sucesso_professor_envia_rank.php?codigo_tema=".$codigo_tema);
?>
</body>
</html>