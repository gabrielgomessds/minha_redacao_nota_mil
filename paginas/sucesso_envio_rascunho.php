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
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
$codigo_aluno = $_GET['codigo_aluno'];
include '../php/conexao.php';
$sql=mysqli_query($conn,"select * from aluno where id='$codigo_aluno'");
while($row = mysqli_fetch_assoc($sql)){
$nomeUsuario = $row['nome'];
list($nome) = explode(' ',$nomeUsuario);		
?>
<h1><?php echo $nome?> seu rascunho foi guardado com sucesso!</h1>
<h3> Você pode ver e modificar todos seus rascunhos indo no menu e clicando em Rascunhos</h3>
<a href="../php/cadastro_login.php?email=<?php echo $row['email']?>&senha=<?php echo $row['senha']?>"><button class="botao" title="Voltar para página inicial">Voltar</button></a>
</center>
<?php
}
?>
</div>

</body>
</html>