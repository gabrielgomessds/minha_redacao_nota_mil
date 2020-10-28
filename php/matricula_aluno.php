<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Matricula Aluno</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
$codigo_acesso = $_POST['codigo_acesso'];
$codigo_aluno = $_POST['codigo_aluno'];
$busca = mysqli_query($conn,"select * from turma where codigo_acesso = '".$codigo_acesso."'");
if(mysqli_num_rows($busca) == 0){
    header("location:../paginas/erro_matricula_aluno.php");
}else{
$pega = mysqli_fetch_assoc($busca);
mysqli_query($conn,"update aluno set codigo_turma='".$pega['id']."' where id='$codigo_aluno'");
header("location:../paginas/aluno.php");
}	

?>
</div>
</body>
</html>