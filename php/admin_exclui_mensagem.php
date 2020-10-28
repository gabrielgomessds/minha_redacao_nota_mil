<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Excluir</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
$codigo_mensagem = $_GET['codigo_mensagem'];
mysqli_query($conn,"DELETE FROM mensagem WHERE id = $codigo_mensagem");		
header("location:../paginas/sucesso_excluir_mensagem.php");
?>
</div>
</body>
</html>