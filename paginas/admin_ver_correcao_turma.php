<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Correção</title>
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
.correcao {
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
.correcao:focus{
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
$resultado = mysqli_query($conn,"SELECT * FROM usuario where email = '$email' and senha = '$senha'") ;
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
		$id = $_GET['id'];
		$codigo_turma = $_GET['codigo_turma'];
		include '../php/conexao.php';
		$sql = mysqli_query($conn,"select * from redacao where id='$id'");
		while($linha = mysqli_fetch_assoc($sql)){
		if($sql){
			?>
           <h1><a href="admin_redacoes_turma.php?codigo_tema=<?php echo $linha['codigo_tema']?>&codigo_turma=<?php echo $codigo_turma?>">
		  <button class="btn btn-success" type="button">
		  <img src="../img/icone/menu/voltar.png" width="16px" height="16px">Voltar</button></a> Correção. <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
     
	 </div>
	  
			<center>
			<b style="font-size:15px;">Redação de :</b> <br><br>
		<img src="<?php echo $linha['foto_aluno'];?>" style="width:80px;height:80px;border-radius:100%;border:1px solid blue;"><br><br>
		<b style="color:blue;font-size:15px;"><?php echo $linha['nome_aluno']?></b> 
			<br><br>
			<h3>Tema: <?php echo $linha['tema']?> / NOTA: <?php 
						if($linha['nota']<=1000 and $linha['nota']>=700){echo'<b style="color:green">'.$linha['nota'].',00'.' </b> ';}  
						if($linha['nota']<700 and $linha['nota']>=400){echo'<b style="color:#DAA520">'.$linha['nota'].',00'.' </b> ';}
						if($linha['nota']<400 and $linha['nota']>=0){echo'<b style="color:red">'.$linha['nota'].',00'.' </b> ';}
					?></h3>
			<br><br>
			</div>
			<?php 
			$id = $_GET['id'];
			$pega = mysqli_query($conn,"select * from correcao where codigo_redacao='$id'");
			$linhacorrecao = mysqli_fetch_assoc($pega);
			?>
			

<?php
function get_str_difs($str1, $str2) {
  $first = explode(" ", $str1);
  $second = explode(" ", $str2);
  $arrDif1 = array_diff($first,$second);
  $arrDif2 = array_diff($second,$first);
  $old = '';
  $new = '';
    foreach($first as $word) {
      if(in_array($word,$arrDif1)) {
      $old .= "<span style='color: red; background-color:#dedede;'>" . $word . "</span> ";
      continue;
      }
      $old .= $word . " ";
    }
    foreach($second as $word) {
      if(in_array($word,$arrDif2)) {
      $new .= "<span style='color: green;background-color:#dedede;'> " . $word . " </span>";
      continue;
      }

      $new .= $word . " ";
    }
  return array('old' => $old, 'new' => $new);
  }
$str1 = $linha['redacao'];;
$str2 = $linhacorrecao['correcao'];
  $difs = get_str_difs($str1, $str2);
?>
</center>
<center>
<div style="width:100%;max-width:1000px;overflow:auto;border:5px solid #d1d1d1;padding: 8px 15px;resize:vertical;font-size: 13px;
	  line-height: 24px;
	  border-bottom: 2px solid;
	   -webkit-appearance: none;
	  border-radius: 0;
	  background: url(notebook.png);">
<p  style="margin:5px 0;">Legenda: <span style="color: red; background-color:#dedede;">Texto original</span>; <span style="color: green;background-color:#dedede;">Texto corrigido</span></p>
  <div style="width: 50%; float:left; border-right:10px solid #dedede; padding-right: 10px; box-sizing: border-box;">
    <h4 style="margin:5px 0;">Redação</h4>
    <?php echo $difs['old']; ?>
  </div>
  <div placeholder="Correção" style="width: 50%; float:left;  padding-left: 10px; box-sizing: border-box;">
    <h4 style="margin:5px 0;">Correção</h4>
    <?php  echo $difs['new']; ?>
  </div>
</div>
				
			</center>

            
			
				<br>
                <?php
		}}
			?>
<center>

<?php 
					$id = $_GET['id'];
				$busca_comp = mysqli_query($conn,"select * from competencia where codigo_redacao = '$id'");
				if(mysqli_num_rows($busca_comp) > 0){
				$pega_comp = mysqli_fetch_assoc($busca_comp);
				
				
				?>
				<h1 style="color:red;">Nota nas competências</h1>
				<table border="1px" bgcolor="#FFF" >
<tr>
<td style="text-align:center;font-size:16;font-weight:bold;">Competências</td>
<td style="text-align:center;font-size:16;font-weight:bold;">NOTAS</td>
</tr>
<tr>
<td>1 - Dominio da norma culta</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"> <b style="color:red;"><?php echo $pega_comp['comp1']?></b><b style="color:green;">/200</b></td>
</tr>
<tr>
<td>2 - Compreender a proposta da redação e aplicar conceitos das várias áreas de conhecimento para desenvolver o tema</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"> <b style="color:red;"><?php echo $pega_comp['comp2']?></b><b style="color:green;">/200</b></td>
</tr>
<tr>
<td>3 - Selecionar, relacionar, organizar e interpretar informações, fatos, opiniões e argumentos em defesa de um ponto de vista.</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"> <b style="color:red;"><?php echo $pega_comp['comp3']?></b><b style="color:green;">/200</b></td>
</tr>
<tr>
<td>4 - Demonstrar conhecimento dos mecanismos linguísticos necessários para a construção da argumentação.</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"> <b style="color:red;"><?php echo $pega_comp['comp4']?></b><b style="color:green;">/200</b></td>
</tr>
<tr>
<td>5 - Elaborar proposta de solução para o problema abordado, mostrando respeito aos valores humanos e considerando a diversidade 
sociocultural.</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"><b style="color:red;"><?php echo $pega_comp['comp5']?></b><b style="color:green;">/200</b></td>
</tr>
<tr>
<td style="text-align:center;font-size:16;font-weight:bold;">TOTAL</td>
<td style="font-size:16px;font-weight:bold;text-align:center;"> <b style="color:red;"><?php echo $pega_comp['comp1'] + $pega_comp['comp2'] + $pega_comp['comp3'] + $pega_comp['comp4'] + $pega_comp['comp5']?></b><b style="color:green;">/1000<b></td>
</tr>
</table></center><br><br>


					<?php
				}else{
					?>
						
					<?php
				}
					?>
                </center>
			
				<?php
				$id = $_GET['id'];
				$busca = mysqli_query($conn,"select * from feedback_redacao where codigo_redacao='$id'");
				if(mysqli_num_rows($sql)>0){
					while($ComentarioRedacao = mysqli_fetch_assoc($busca)){
				?>
            
				<section class='box-comentario'>
				<aside class='foto-contato'>
				<div><img src="<?php echo $ComentarioRedacao['foto_usuario'];?>" width="70px" height="70px" style="border-radius:100%;"></div>
				</aside>
				<article class='comentario'>
				<div class="balao2">
				<i>(PROF).</i> <b class="assinatura"><?php echo $ComentarioRedacao['nome_usuario'];?> </b>
				<br>
				<h5><?php echo $ComentarioRedacao['comentario'];?></h5>
				<br>
				<footer class="assinatura" style="color:#8B2323;"><?php echo date("d/m/Y \à\s H:i:s", strtotime($ComentarioRedacao['data_comentario'])); ?> </footer>
				</div>
				</article>
				</section>
				<?php
				}}else{
				?>
				<center><h1 style="color:red;text-decoration:underline;">Você não tem comentários</h1></center>
				<?php
				}
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