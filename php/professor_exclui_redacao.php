<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../img/icone/icone_pagina_inicial.png">
<title>Minha redação - Excluir Redação</title>
<style>
body{
	 background-color:#1E90FF;
}
.conteudo{
	color:#FFF;
	height: 100px;
    width: 100%;
    position: absolute;
    left: 50%;
    top: 30%;
    transform: translate(-50%, -50%);
	}
	.botao {
  background-color: #2ECC71;
  border: none;
  color: white;
  padding: 10px 22px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  cursor:pointer;
}
</style>
</head>
<body>
<div class="conteudo">
<center>
<?php
include 'conexao.php';
$codigo_redacao = $_GET['codigo_redacao'];
$codigo_tema = $_GET['codigo_tema'];

mysqli_query($conn,"DELETE FROM redacao  WHERE id = $codigo_redacao and codigo_tema = $codigo_tema");
mysqli_query($conn,"DELETE FROM correcao WHERE codigo_redacao = $codigo_redacao and codigo_tema = $codigo_tema");
mysqli_query($conn,"DELETE FROM feedback_redacao WHERE codigo_redacao = $codigo_redacao and codigo_tema = $codigo_tema");


?>
<?php
$codigo_tema = $_GET['codigo_tema'];
?>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<h1>A redação foi excluido com sucesso!!!</h1>
<a href="../paginas/professor_redacoes_aluno.php?codigo_tema=<?php echo $codigo_tema?>"><button class="botao" title="Voltar para página inicial">Voltar</button></a>
</center>
</div>
</body>
</html>