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
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$codigo_aluno = $_GET['codigo_aluno'];
$codigo_turma = $_GET['codigo_turma'];
mysqli_query($conn,"update aluno set codigo_turma='' where id='$codigo_aluno'");
		
header("location:../paginas/sucesso_professor_exclui_aluno.php?codigo_turma=".$codigo_turma);
?>
</div>
</body>
</html>