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
	
}
.correcao:focus{
box-shadow: 0 0 0 0;
    outline: 0;
}
.td-comp{
	font-size:16px;
	
}
.td-nota-final b{
	color:blue;
font-size:22px;
font-weight:bold;
text-align:center;
}
.td-nota b{
	color:blue;
font-size:18px;
font-weight:bold;
text-align:center;
}
@media (max-width: 658px){
	.balao2:after{ /*Triangulo*/
    content: "";
    width: 0;
    height: 0;
    position: absolute;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    /*Faz seta "apontar para baixo. Definir o valor como 'top' fará ela "apontar para cima" */
    /*Aqui entra a cor da "aba" do balão */
    border-bottom: 30px solid #1E90FF;
    top: -18px; /*localização. Experimente alterar para 'bottom'*/
    left: 0%;
	transform:rotate(-180deg);
    -ms-transform:rotate(-80deg); /* IE 9 */
    -webkit-transform:rotate(-6deg); /* Opera, Chrome, and Safari */
}
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
$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
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
		$codigo_correcao = $_GET['codigo_correcao'];
		include '../php/conexao.php';
		$sql = mysqli_query($conn,"select * from redacao where id='$codigo_correcao' and codigo_aluno = '".$row['id']."'");
		$linha = mysqli_fetch_assoc($sql);
		if(mysqli_num_rows($sql) > 0){
			?>
          <h1><a href="aluno.php">
		  <button class="btn btn-success" type="button">
		 Voltar</button></a> Correção. <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
     
	 </div>
	  
			<center>
			<b>Redação de :</b> <b style="color:blue;"><?php echo $linha['nome_aluno']?></b> <img src="<?php echo $row['foto'];?>" style="width:60px;height:60px;border-radius:100%;border:1px solid blue;">
			<br><br>
			<h3>Tema: <?php echo $linha['tema']?> / NOTA: <?php 
						if($linha['nota']<=1000 and $linha['nota']>=700){echo'<b style="color:green">'.$linha['nota'].',00'.' </b> ';}  
						if($linha['nota']<700 and $linha['nota']>=400){echo'<b style="color:#DAA520">'.$linha['nota'].',00'.' </b> ';}
						if($linha['nota']<400 and $linha['nota']>=0){echo'<b style="color:red">'.$linha['nota'].',00'.' </b> ';}
					?></h3>
			<br><br>
			</div>
             </center>
			<?php 
			$codigo_correcao = $_GET['codigo_correcao'];
			$pega = mysqli_query($conn,"select * from correcao where codigo_redacao='$codigo_correcao'");
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
<br><br><br><br>
				<center>
				
				<?php 
					$codigo_correcao = $_GET['codigo_correcao'];
				$busca_comp = mysqli_query($conn,"select * from competencia where codigo_redacao = '$codigo_correcao'");
				if(mysqli_num_rows($busca_comp) > 0){
				$pega_comp = mysqli_fetch_assoc($busca_comp);
				
				
				?>
				<h1 style="color:red;">Nota nas competências</h1>
				<table class="table table-bordered" style="background:#FFF;width:80%;">
<tr>
<td style="text-align:center;font-size:22px;font-weight:bold;">Competências</td>
<td style="text-align:center;font-size:18px;font-weight:bold;">NOTAS</td>
</tr>
<tr>
<td class="td-comp">1 - Dominio da norma culta</td>
<td class="td-nota"> <b style="color:blue;"><?php echo $pega_comp['comp1']?></b></td>
</tr>
<tr>
<td class="td-comp">2 - Compreender a proposta da redação e aplicar conceitos das várias áreas de conhecimento para desenvolver o tema</td>
<td class="td-nota"> <b><?php echo $pega_comp['comp2']?></b></td>
</tr>
<tr>
<td class="td-comp">3 - Selecionar, relacionar, organizar e interpretar informações, fatos, opiniões e argumentos em defesa de um ponto de vista.</td>
<td class="td-nota"> <b><?php echo $pega_comp['comp3']?></b></td>
</tr>
<tr>
<td class="td-comp">4 - Demonstrar conhecimento dos mecanismos linguísticos necessários para a construção da argumentação.</td>
<td class="td-nota"> <b><?php echo $pega_comp['comp4']?></b></td>
</tr>
<tr>
<td class="td-comp">5 - Elaborar proposta de solução para o problema abordado, mostrando respeito aos valores humanos e considerando a diversidade 
sociocultural.</td>
<td class="td-nota"><b><?php echo $pega_comp['comp5']?></b></td>
</tr>
<tr>
<td style="text-align:center;font-size:18px;font-weight:bold;">TOTAL</td>
<td class="td-nota-final"> <b><?php 
						if($linha['nota']<=1000 and $linha['nota']>=700){echo'<b style="color:green">'.$linha['nota'].' </b> ';}  
						if($linha['nota']<700 and $linha['nota']>=400){echo'<b style="color:#DAA520">'.$linha['nota'].' </b> ';}
						if($linha['nota']<400 and $linha['nota']>=0){echo'<b style="color:red">'.$linha['nota'].' </b> ';}
					?></b></td>
</tr>
</table></center><br><br>

<?php
				}else{
?>
		
<?php

				}
?>

			
				<h1 style="color:red;text-align:center;">Feedback</h1>
				<br>
      
			
				<?php
				$codigo_correcao = $_GET['codigo_correcao'];
				$busca = mysqli_query($conn,"select * from feedback_redacao where codigo_redacao='$codigo_correcao'");
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
			      
				  <?php
					}else{
						?>
							<center>
			
			<img src="../img/icone/area_restrita.png">
			<h1 style="color:red;font-weight:bold;">Você não tem acesso a esta correção</h1>
			
			</center>
						<?php
					}
				?>
	  <footer>
	<strong align="center">Gomess Productions | Todos os direitos reservados</strong>
	</footer>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript" src="js/plugins/chart.js"></script>
  </body>
  <?php
}
  ?>
</html>