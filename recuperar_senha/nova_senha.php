
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Digite sua nova senha</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <script src='main.js'></script>
    <!-- Codigo bootstrap aqui -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Codigo css para customizar o site -->
	 <link href="../css/style-pages.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	

    <!-- Customiza as fontes do site -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
</head>
<body style="background-color:#4682B4;">
<?php
include '../php/conexao.php';
mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
$confirmacao = $_GET['confirmacao'];
$utilizador = $_GET['utilizador'];
$busca = mysql_query("select * from recuperacao where utilizador = '".$utilizador."' and confirmacao = '".$confirmacao."'")or die(mysql_error());
$conta = mysql_num_rows($busca);
if($conta >= 1){
?>
 <!-- Campo de login -->
 <section id="login" class="login" >
	
    <div class="container">
        <div class="row">    
            <div class="form-cadastro">
                <form id="form" action="altera_senha.php" method="POST" onsubmit="return verifica()" >
                <center>
            <h3 style="color:green;">Redefinir senha</h3></center>
<fieldset>
  <input placeholder="Digite sua nova senha" name="senha" id="senha" type="password" required>
</fieldset>
<fieldset>
<input placeholder="Digite sua nova senha novamente" id="confirma" name="confirma" type="password" required>
</fieldset>
<input type="text" name="email" value="<?php echo $utilizador;?>" style="display:none;">
<center><p><font color="red" id="erro"></font></p></center>
<fieldset>
<button name="submit" type="submit" id="contact-submit">Redefinir senha</button>
</fieldset>
<p>
<center><b style="color:red;text-decoreiton:none;" align="center">Se quiser fazer login é só clicar <a href="../paginas/login.php">aqui</a></b></center><br>
  <center><b style="color:red;text-decoreiton:none;" align="center">Se não tiver uma conta clique <a href="../paginas/cadastro.php">aqui</a></b></center>
  </p>

</form>
        </div>
<?php
}else{
    ?>
<center><h1 style="color:red;">Este link de recuperação não está mais disponivel!</h1></center>
<?php
}
?>
<script>
		function verifica(){
		if(document.getElementById('senha').value != document.getElementById('confirma').value){
		erro.innerHTML = '<b>Sehas diferentes!<b>';
		return false;
		}else{
		erro.innerHTML = '';
		return true;
		}
		}

		</script>
</body>
</html>
<?php


