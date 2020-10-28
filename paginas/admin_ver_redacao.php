<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Redação</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style-pages.css">
	<style>
	.app-content {
    margin-left: 0;
  }
  textarea.notebook {
	  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  width: 62%;
	  padding: 5px 0px;
	  margin-bottom: 20px;
	  resize:vertical;
	  font-size: 13px;
	  line-height: 24px;
	  border-bottom: 2px solid;
	   -webkit-appearance: none;
	  border-radius: 0;
	  background: url(notebook.png);
	  height:700px;
	  resize:none;
}
textarea.notebook:focus{
box-shadow: 0 0 0 0;
    outline: 0;
}
	</style>
	<script type="text/javascript" language="javascript">
function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('esconde').style.display = 'block'
        }else{
            document.getElementById(el).style.display = 'none';
}}
</script>
  </head>
  <?php
session_start();
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
?>
<?php
include '../php/conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$resultado = mysqli_query($conn,"SELECT * FROM admin where email_admin = '$email' and senha_admin = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
	

 ?>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><strong class="app-header__logo" >Minha Redação</strong>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
	  <?php
		$codigo_tema = $_GET['codigo_tema'];
		include '../php/conexao.php';
		$sql = mysqli_query($conn,"select * from redacao where id='$codigo_tema'");
		while($linha = mysqli_fetch_assoc($sql)){
		if($sql){
			$buscaTema = mysqli_query($conn,"select * from temas_redacao where id = '".$linha['codigo_tema']."'");
			$tema = mysqli_fetch_assoc($buscaTema);
			?>
          <h1><a href="admin_redacoes_aluno.php?codigo_tema=<?php echo $linha['codigo_tema']?>">
		  <button class="btn btn-success" type="button">
		  <img src="../img/icone/menu/voltar.png" width="16px" height="16px">Voltar</button></a> Redação. <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
     
	 </div>
	  
			<center>
			<b style="font-size:15px;">Redação de :</b> <br><br>
		<img src="<?php echo $linha['foto_aluno'];?>" style="width:80px;height:80px;border-radius:100%;border:1px solid blue;"><br><br>
		<b style="color:blue;font-size:15px;"><?php echo $linha['nome_aluno']?></b> 
			<br><br>
			<h3>Tema: <?php echo $linha['tema']?></h3>   
                     
			<button align="center" type="button"  class="btn btn-info"  onclick="Mudarestado('minhaDiv')">Mostrar Texto Motivacional</button>
			<br><br>
			<div id="minhaDiv" style="display:none;" align="center"><p align="center"><b style="text-decoration:underline;">Texto motivacional:</b>
			<?php 
			if($tema['texto_motivacional'] != null){
			?>
			<div style="background-color:#FFF;width:860px;text-align:left;">
				<p><?php echo $tema['texto_motivacional']?></p>
			</div>
			<?php
			}else{
				?>
				<p><h1 style="color:red;font-weight:bold;">Esse tema não possui texto motivacional</h1></p><br>

			<?php
			}
			?>
            <br>
			<button type="button"  class="btn btn-info" id="esconde" style="display:none;" align="center" onClick="document.getElementById('minhaDiv').style.display = 'none'">Não Mostrar Texto</button>
			<br><br>
			</div>
            

			<form method="post" name="form">
			<textarea class="notebook" name="redacao" rows="30" cols="100" disabled><?php echo $linha['redacao']?></textarea>
			</form>
			</center>
				<br>
				
				<?php
		}}
			?>
			      

	  <footer>
	<strong align="center">&copy; Gomess Productions | Criador por: Gabriel Gomes</strong>
	</footer>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
  </body>
  <?php
}
  ?>
</html>