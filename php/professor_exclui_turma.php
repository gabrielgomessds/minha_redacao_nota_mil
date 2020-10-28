<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Excluir turma</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM turma WHERE id = $id");		
header("location:../paginas/sucesso_professor_exclui_turma.php");
?>
</div>
</body>
</html>