<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Excluir Aluno da turma</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
$codigo_aluno = $_GET['codigo_aluno'];
$codigo_turma = $_GET['codigo_turma'];
mysqli_query($conn,"update aluno set codigo_turma='' where id='$codigo_aluno'");
		
header("location:../paginas/admin_ver_turma.php?codigo_turma=".$codigo_turma);
?>
</div>
</body>
</html>