<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Professor</title>
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
   .texto-motivacional{
	  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  width: 92%;
	  padding: 5px 0px;
	  margin-bottom: 20px;
	  resize:vertical;
	  font-size: 13px;
	  line-height: 24px;
	  border-bottom: 2px solid;
	   -webkit-appearance: none;
	  border-radius: 0;
	  height:700px;
	  resize:none;
}
.texto-motivacional:focus{
box-shadow: 0 0 0 0;
    outline: 0;
}
.texto-motivacional{
	font-size:16px;
	
}
	</style>
  </head>
  <body class="app sidebar-mini rtl">
 
    <!-- Navbar-->
    <header class="app-header"><a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" >Minha Redação</strong></a>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
	<?php
session_start();
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
?>
<?php
include '../php/conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>
  <script>
 var loadFile1 = function(event) {
    var output1 = document.getElementById('output1');
	output1.src = URL.createObjectURL(event.target.files[0]);
  };
   var loadFile2 = function(event) {
    var output2 = document.getElementById('output2');
	output2.src = URL.createObjectURL(event.target.files[0]);
  };
  var loadFile3 = function(event) {
    var output3 = document.getElementById('output3');
	output3.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
          <a href="professor.php"><button class="btn btn-success" type="button">
		  <img src="../img/icone/menu/voltar.png" width="16px" height="16px">Voltar</button></a> <b style="font-size:20px;"> Textos Motivacionais. </b>    
     
        </div>
      </div>
	  <div class="clearfix"></div>
	  <center>
        <div class="col-md-8" align="center">
		  <?php
		  $codigo_tema = $_GET['codigo_tema'];
		$resultado = mysqli_query($conn,"SELECT * FROM texto_motivacional where codigo_tema='$codigo_tema' ") ;
		$busca = mysqli_query($conn,"SELECT * FROM temas_redacao where id='$codigo_tema' ") ;
		$tema = mysqli_fetch_assoc($resultado);
		$linha = mysqli_fetch_assoc($busca);
			?>
		<form action="../php/professor_envia_texto_motivacional.php" method="post" enctype="multipart/form-data">
         <input type="text" value="<?php echo $linha['nome_tema'];?>" class="form-control" style="text-align:center;"><br>
          <div class="tile">
            <h3 class="tile-title">Texto motivacional I: <button class="btn btn-success" id="botao-texto" type="button" onclick="Mudarestado1('texto1')">Texto <img src="../img/icone/folha.png" width="25px" height="25px"></button> <button class="btn btn-success" onclick="Mudaimagem1('imagem1')" type="button">Imagem <img src="../img/icone/icone_imagem.png"></button></h3>
            <div class="table-responsive">
             <div style="display:none;" id="texto1">
			<textarea class="texto-motivacional" name="texto1" rows="30" cols="100"><?php echo $tema['texto1'];?></textarea>
			 </div>
			 <div style="display:none;" id="imagem1">
			 <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="imagem_texto1" onchange="loadFile1(event)"/>
    <span><img src="<?php echo $tema['imagem_texto1'];?>" title="Escolha uma imagem" name="foto" id="output1" style="width:140px;height:130px;cursor:pointer;" ></span>
	</label>
			</div>
			<input type="text" value="" id="campo-tipo1" name="tipo1" style="display:none;">
            </div>
          </div>
		  
		    <div class="tile">
            <h3 class="tile-title">Texto motivacional II: <button class="btn btn-success" type="button" onclick="Mudarestado2('texto2')">Texto <img src="../img/icone/folha.png" width="25px" height="25px"></button> <button class="btn btn-success" onclick="Mudaimagem2('imagem2')" type="button">Imagem <img src="../img/icone/icone_imagem.png"></button></h3>
            <div class="table-responsive">
             <div style="display:none;" id="texto2">
			<textarea class="texto-motivacional" name="texto2" rows="30" cols="100"><?php echo $tema['texto2'];?></textarea>
			 </div>
			<div style="display:none;" id="imagem2">
			 <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="imagem_texto2" onchange="loadFile2(event)"/>
    <span><img src="<?php echo $tema['imagem_texto2'];?>" title="Escolha uma imagem" name="foto" id="output2" style="width:140px;height:130px;cursor:pointer;" ></span>
	</label>
			</div>
			<input type="text" value="" id="campo-tipo2" name="tipo2" style="display:none;">
            </div>
          </div>
		  
		    <div class="tile">
            <h3 class="tile-title">Texto motivacional III: <button class="btn btn-success" type="button" onclick="Mudarestado3('texto3')">Texto <img src="../img/icone/folha.png" width="25px" height="25px"></button> <button class="btn btn-success" onclick="Mudaimagem3('imagem3')" type="button">Imagem <img src="../img/icone/icone_imagem.png"></button></h3>
            <div class="table-responsive">
             <div style="display:none;" id="texto3">
			<textarea class="texto-motivacional" name="texto3" rows="30" cols="100"><?php echo $tema['texto3'];?></textarea>
			
			 </div>
			 <div style="display:none;" id="imagem3">
			 <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="imagem_texto3" onchange="loadFile3(event)"/>
    <span><img src="<?php echo $tema['imagem_texto3'];?>" title="Escolha uma imagem" name="foto" id="output3" style="width:140px;height:130px;cursor:pointer;" ></span>
	</label>

			</div>
			<input type="text" value="" id="campo-tipo3" name="tipo3" style="display:none;">
            </div>
          </div>
		  <input class="btn btn-success" type="submit" value="Confirmar Alterações">
		  </form>
        </div>
		</center>
		</div>
		
		<script type="text/javascript" language="javascript">
function Mudarestado1(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('imagem1').style.display = 'none';
			document.getElementById("campo-tipo1").value = "1";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo1").value = "";
}}
function Mudarestado2(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('imagem2').style.display = 'none';
			document.getElementById("campo-tipo2").value = "1";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo2").value = "";
}}
function Mudarestado3(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('imagem3').style.display = 'none';
			document.getElementById("campo-tipo3").value = "1";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo3").value = "";
}}
</script>
<script type="text/javascript" language="javascript">
function Mudaimagem1(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('texto1').style.display = 'none';
			document.getElementById("campo-tipo1").value = "2";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo1").value = "";
}}
function Mudaimagem2(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('texto2').style.display = 'none';
			document.getElementById("campo-tipo2").value = "2";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo2").value = "";
}}
function Mudaimagem3(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			document.getElementById('texto3').style.display = 'none';
			document.getElementById("campo-tipo3").value = "2";
        }else{
            document.getElementById(el).style.display = 'none';
			document.getElementById("campo-tipo3").value = "";
}}
</script>
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