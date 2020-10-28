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
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/checked.css">

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
.correcao{
	  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  width: 62%;
	  padding: 5px 0px;
	  margin-bottom: 20px;
	  resize:vertical;
	  font-size: 13px;
	  line-height: 24px;
	  border:1px solid #000;
	  border-bottom: 2px solid;
	   -webkit-appearance: none;
	  border-radius: 0;
	  background: url(notebook.png);
	  height:700px;
	  resize:none;
}
.correcao:focus{
	box-shadow:0 0 0 0;
	outline:0;
}
.nota{
	width:150px;
	height:30px;
	font-size: 18px;
	font-weight:800;
	color: blue;
	text-align: center;
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
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
$prof = mysqli_fetch_assoc($resultado);
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
		$codigo_redacao = $_GET['codigo_redacao'];
		include '../php/conexao.php';
		$sql = mysqli_query($conn,"select * from redacao where id='$codigo_redacao'");
		$linha = mysqli_fetch_assoc($sql);
			
			?>
          <h1>
		  <a href="professor_redacoes_aluno.php?codigo_tema=<?php echo $linha['codigo_tema']?>">
		<button class="btn btn-success" type="button">
		  Voltar</button></a> Redação<img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>    
		   
	 </div>
	 <?php
	 $buscaTema = mysqli_query($conn,"select * from temas_redacao where id = '".$linha['codigo_tema']."' and codigo_professor = '".$prof['id']."'");
	 $tema = mysqli_fetch_assoc($buscaTema);
	 if(mysqli_num_rows($buscaTema)>=1){
	 ?>
	  
			<center>
			<?php
			$codigo_redacao = $_GET['codigo_redacao'];
			$busca_correcao = mysqli_query($conn,"select * from correcao where codigo_redacao = '$codigo_redacao'");
			if(mysqli_num_rows($busca_correcao) >= 1){
			$primeiro_nome = explode(" ",$prof['nome']);
			?>
<div class="alert alert-danger" role="alert" style="width:80%;background-color:#F08080;">
  <h3 class="alert-heading"><img src="../img/icone/icone_caderno_danger.png" width="30px" height="30px">Atenção Prof. <?php echo $primeiro_nome[0]?></h3>
  <hr>
  <p style="font-size:22px;">Parece que você já corrigiu essa redação, confira clicando aqui -> <a href="professor_ver_correcao_turma.php?codigo_correcao=<?php echo $codigo_redacao?>"><b>Ver correção</p>
			</a></div>
			<?php
			}else{

			}
			?>
			
		<b style="font-size:15px;">Redação de :</b> <br><br>
		<img src="<?php echo $linha['foto_aluno'];?>" style="width:80px;height:80px;border-radius:100%;border:1px solid blue;"><br><br>
		<b style="color:blue;font-size:15px;"><?php echo $linha['nome_aluno']?></b> 
			<br><br>
			<h3>Tema: <?php echo $linha['tema']?></h3>
			</div>
            
            	
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
			<?php 
				$codigo_redacao = $_GET['codigo_redacao'];
			$pega = mysqli_query($conn,"select * from correcao where codigo_redacao='$codigo_redacao'");
			$row = mysqli_fetch_assoc($pega);
			$buscaAluno = mysqli_query($conn,"select * from aluno where id='".$linha['codigo_aluno']."'");
			$pegaAluno = mysqli_fetch_assoc($buscaAluno);
			?>
						

			<br><br>
			<form method="post" name="form" action="../php/enviar_correcao.php" onsubmit="return verificaNota()">
			<input type="text" name="codigo_tema" value="<?php echo $linha['codigo_tema'];?>" style="display:none;">
			<input type="text" name="codigo_aluno" value="<?php echo $linha['codigo_aluno'];?>"style="display:none;">
			<input type="text" name="codigo_turma" value="<?php echo $pegaAluno['codigo_turma'];?>"style="display:none;">
			<input type="text" name="codigo_redacao"value="<?php echo $linha['id'];?>"style="display:none;">
			<input type="text" name="email_aluno"value="<?php echo $linha['email_aluno'];?>"style="display:none;">
			<input type="text" name="data_envio" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s');?>"style="display:none;">
			<textarea class="notebook" name="redacao" > <?php echo $linha['redacao']?></textarea><br>
			<a href="../imprimir/imprimir_redacao.php?id=<?php echo $linha['id']?>"><button type="button" class="btn btn-success">Imprimir Redação</button></a><br><br><br>
			<b style="font-size:18px;font-weight:bold;">NOTA:</b> <input type="text" required name="total" maxlength="4" id="nota" value="" class="nota" onkeyup="mudacor();"><br><br>
 

<table class="table table-bordered" style="background:#FFF;width:80%;font-weight:bold;" onclick="mudacor();">
<tr>
<td style="text-align:center;font-weight:bold;font-size:16px;">Tabela de Competências</td>
<td>40</td>
<td>80</td>
<td>120</td>
<td>160</td>
<td>200</td>
</tr>
<tr>


<td>1 - Dominio da norma culta</td>
<td><input type="checkbox" name="comp1" value="40" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp1" value="80" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp1" value="120" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp1" value="160" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp1" value="200" onClick="soma(this)"></td>
</div>
</tr>
<tr>
<td>2 - Compreender a proposta da redação e aplicar conceitos das várias áreas de conhecimento para desenvolver o tema</td>
<td><input type="checkbox" name="comp2" value="40" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp2" value="80" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp2" value="120" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp2" value="160" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp2" value="200" onClick="soma(this)"></td>
</tr>
<tr>
<td>3 - Selecionar, relacionar, organizar e interpretar informações, fatos, opiniões e argumentos em defesa de um ponto de vista.</td>
<td><input type="checkbox" name="comp3" value="40" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp3" value="80" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp3" value="120" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp3" value="160" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp3" value="200" onClick="soma(this)"></td>
</tr>
<tr>
<td>4 - Demonstrar conhecimento dos mecanismos linguísticos necessários para a construção da argumentação.</td>
<td><input type="checkbox" name="comp4" value="40" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp4" value="80" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp4" value="120" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp4" value="160" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp4" value="200" onClick="soma(this)"></td>
</tr>
<tr>
<td>5 - Elaborar proposta de solução para o problema abordado, mostrando respeito aos valores humanos e considerando a diversidade 
sociocultural.</td>
<td><input type="checkbox" name="comp5" value="40" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp5" value="80" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp5" value="120" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp5" value="160" onClick="soma(this)"></td>
<td><input type="checkbox" name="comp5" value="200" onClick="soma(this)"></td>
</tr>
</table><br><br>
			<br>
			
				
				<h3 style="color:red;font-weight:bold;">Feedback da Redação</h3>
				<input type="text" name="codigo_redacao" value="<?php echo $linha['id']?>" style="display:none;">
				<input type="text" name="codigo_tema" value="<?php echo $linha['codigo_tema']?>" style="display:none;">
				<input type="text" name="codigo_usuario" value="<?php echo $prof['id']?>" style="display:none;">
				<input type="text" name="nome_usuario" value="<?php echo $prof['nome']?>" style="display:none;">
				<input type="text" name="email_usuario" value="<?php echo $prof['email']?>" style="display:none;">
				<input type="text" name="foto_usuario" value="<?php echo $prof['foto']?>" style="display:none;">
				<input type="text" name="data_comentario" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s');?>"style="display:none;">
				<textarea class="feedback-redacao" name="comentario" placeholder="Feedback sobre a redação do aluno..."></textarea>
				<br><br>
				
				
				<button class="btn btn-success">Enviar Correção <img src="../img/icone/menu/enviar.png" width="16px" height="16px"></button>	<div class="btn" style="color:#FFF;background-color:red;display:inline-block;" data-toggle="modal" data-target="#exclui_redacao_<?php echo $linha['id'];?>" >Deletar Redação <img src="../img/icone/lixo.png" width="16px" height="16px"></div></center>

				
				</form>
				
				
			

		
			<br><br>
			<center><p style="font-size:18px;"><font color="red" id="erronota"></font></p></center>
				<!--Janela Modal que exclui o aluno-->
			<div class="modal fade" id="exclui_redacao_<?php echo $linha['id'];?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h5>Tem certeza que deseja excluir essa redação?</h5><br>
								</div>
								<div class="modal-body" align="center">
								<a href="../php/professor_exclui_redacao.php?codigo_redacao=<?php echo $linha['id'];?>&codigo_tema=<?php echo $linha['codigo_tema'];?>" ><button class="button-modal" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>

								<a href=""><button class="button-modal" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


								</div>
								</div>
      
								</div>
                </div>
			</center>
			<?php
				}else{
			?>
			<center>
			
			<img src="../img/icone/area_restrita.png">
			<h1 style="color:red;font-weight:bold;">Você não tem acesso a está turma</h1>
			
			</center>
			<?php
				}
			?>
			      

	  <footer>
	<strong align="center"> Gomess Productions | Criador por: Gabriel Gomes</strong>
	</footer>


    </main>
	<SCRIPT LANGUAGE="JavaScript">
		
var total = 0;
function soma(campo) {
	if (campo.checked)
	    total += eval(campo.value);
	else 
		total -= eval(campo.value);
	document.form.total.value = total;
}

//-->
</SCRIPT>
<script>
            function verificaNota(){
            if(document.getElementById('nota').value > 1000){
            erronota.innerHTML = '<b>Atenção! A nota de uma redação não pode ser superior a 1000(MIL).<b>';
            return false;
            }else{
			erronota.innerHTML = '';
			return true;
            }
            }
    
			</script>
			
			<script>
				function mudacor(){
					var nota = document.getElementById('nota').value;

					if(nota<=1000 && nota>=700){
						document.getElementById('nota').style.color = 'green';
					}else if(nota<700 && nota>=400){
						document.getElementById('nota').style.color = '#DAA520';
					}else{
						document.getElementById('nota').style.color = 'red';
					}
				}
			</script>



    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
  <?php
}
  ?>
</html>