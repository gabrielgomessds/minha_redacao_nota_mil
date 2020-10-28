<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Excluir tema</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
$codigo_tema = $_GET['codigo_tema'];
mysqli_query($conn,"DELETE FROM temas_redacao WHERE id = $codigo_tema");
mysqli_query($conn,"DELETE FROM turmas_selecionadas WHERE codigo_tema = $codigo_tema");

header("location:../paginas/sucesso_professor_exclui_tema.php");
?>
</div>
</body>
</html>