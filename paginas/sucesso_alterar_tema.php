<html>
<head>
<meta charset="utf-8">
<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
<title>Minha Redação - Sucesso!!</title>
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
<body >
<div class="conteudo">
<center>
  <?php
  include '../php/conexao.php';
  $codigo_tema = $_GET['codigo_tema'];
  ?>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<h1>Os dados do tema foram alterados com sucesso!!</h1>
<a href="professor_ver_tema.php?codigo_tema=<?php echo $codigo_tema?>"><button class="botao" title="Voltar para página inicial">Voltar</button></a>

</center>
</div>
</body>
</html>