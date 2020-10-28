<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Enviar Mensagem</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style-pages.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style>
	.app-content {
    margin-left: 0;
  }
   .mensagem{
	  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  width: 92%;
	  padding: 5px 0px;
	  margin-bottom: 20px;
	  resize:vertical;
	  font-size: 16px;
	  line-height: 24px;
	  border-bottom: 2px solid;
	   -webkit-appearance: none;
	  border-radius: 0;
	  height:500px;
	  resize:none;
}
.mensagem:focus{
box-shadow: 0 0 0 0;
    outline: 0;
}
.label{
	font-size:18px;
	color:green;
	font-family:Arial Black;
}
.campo{
	font-size:18px;
	color:Blue;
	width:92%;
	text-align:center;
	height:30px;
	font-family:Arial Black;
}

	</style>
	<script>
 var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script>
function mudaImagem(i) {    
document.getElementById("output").src="img/icone/icone_usuario.png";
		
		}
		</script>
  </head>
  <body class="app sidebar-mini rtl">
 
    <!-- Navbar-->
    <header class="app-header"><strong class="app-header__logo" >Minha Redação</strong>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
	<?php
session_start();
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
?>
<?php
  require_once '../includes/correcao_caracteres.php';
  require '../includes/acesso_negado.php';
include '../php/conexao.php';
$resultado = mysqli_query($conn,"SELECT * FROM admin where email_admin = '$email' and senha_admin = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>

    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
          <a href="admin.php"><button class="btn btn-success" type="button">
		 Voltar</button></a> <b style="font-size:20px;"> ADICIONAR MENSAGEM </b>    
     
        </div>
      </div>
	  <div class="clearfix"></div>
	  <center>
        <div class="col-md-8" align="center">
		<form action="../php/envia_mensagem.php" method="post" enctype="multipart/form-data">
        <input type="text" name="codigo_tema" value="<?php echo $tema['id']?>" style="display:none;">
          <div class="tile">
          
            <h3 class="tile-title">MENSAGEM <img src="../img/icone/nova_mensagem.png" width="50px" height="50px"></button></h3>
            <div class="table-responsive">
             <div id="texto1">
			 <input type="text" name="remetente" value="ADMIN" style="display:none;">
			<label class="label">Assunto: </label><input type="text" name="titulo"  class="campo"><br>
			<label class="label">Mensagem: </label><textarea class="mensagem" name="mensagem" rows="30" cols="100"></textarea>
			 </div>
			 	 <label class="label">Imagem: </label>
			 <div id="imagem1">
		
			 <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="imagem" onchange="loadFile(event)"/>
    <span><img src="../img/icone/imagem_mensagem.png" title="Escolha uma imagem" name="imagem" id="output" style="width:250px;height:250px;cursor:pointer;" ></span>

	</label>
			</div>
			<div id="destinatario">
			 <label class="label">Destinatario: </label><input type="text" name="destinatario" value="Todos" class="campo"><br>
			 <center><p style="color:red;"><i>(Digite o email do destinatario)</i></p></center>
			</div>
		<input type="text" style="display:none;" name="data_envio" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s');?>" >


<input type="checkbox" name="comentar" value="sim" >
 <span><strong>Permitir que os usuários façam comentarios nessa mensagem</strong></span>




			<br><br>
			<input type="submit" value="Enviar Mensagem" class="btn btn-success">
			</form>
            </div>
          </div>
			

		</center>
		</div>
		
<!---#########################################=FIM=##############################################################-->
	  <footer>
	<strong align="center">&copy; Gomess Productions | Criador por: Gabriel Gomes</strong>
	</footer>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	
	<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("app-menu__item");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
	<?php
}
	?>
  </body>
</html>