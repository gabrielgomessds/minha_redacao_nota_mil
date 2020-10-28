<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Mensagem</title>
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
  .mensagem {
	font-family: 'Open Sans', Arial, Helvetica, sans-serif;
	  width: 80%;
	  padding: 5px 0px;
	  margin-bottom: 20px;
	  resize:vertical;
	  font-size: 18px;
	  line-height: 24px;
	  border-bottom: 2px solid;
	  -webkit-appearance: none;
	  border-radius: 0;
	  background-color:#FFF ;
	  height:34%;
	  overflow: scroll;
	  resize:none;
}
.campo_comenta{
	width:900px;
	height:300px;
	overflow:scroll;
	resize:none;
	
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
header('Content-Type: text/html; charset=utf-8');
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
          <h1><a href="admin.php">
		  <button class="btn btn-success" type="button">Voltar</button></a> Ler Mensagem.</h1>     
      </div>

	  <?php
		$codigo_mensagem = $_GET['codigo_mensagem'];
		include '../php/conexao.php';
		$sql = mysqli_query($conn,"select * from mensagem where id='$codigo_mensagem'");
		$linha = mysqli_fetch_assoc($sql);
			if($linha['resposta'] != null){
			?>
			
			<center>
			<br><br>
             <?php
			 if($linha['imagem'] == null){
				 
			 ?>
			 <center>
			 <?php 
			 $buscaSugestao = mysqli_query($conn,"select * from sugestao where id = '".$linha['resposta']."'");
			 $pegaSugestao = mysqli_fetch_assoc($buscaSugestao);
			 ?>
			<div class="mensagem" col="100" rows="30">
			<br>
			<h3 style="color:blue;"><?php echo $linha['titulo']?></h3>
			<p><i>(Mensagem enviada pelo <?php echo $linha['remetente']?> no dia <?php echo date("d/m/Y \à\s H:i:s", strtotime($linha['data_envio'])); ?>)</i></p>
           
		   <b style="color:#CD9B1D;text-decoration:underline;margin-left:30px;">Sugestão de <?php echo $pegaSugestao['nome_contato'];?></b>: <br><br><i style="color:red;"><?php echo $pegaSugestao['mensagem']?></i><br><br>
			
			<b style="color:#CD9B1D;text-decoration:underline;">Resposta: </b> <br><br><i style="color:green;"><?php echo $linha['mensagem']?></i><br><br>
			
			 
			</div>
		
			<?php
			 }else{
			?>
		
		<div class="mensagem" col="100" rows="30">
			<h3 style="color:blue;"><?php echo $linha['titulo']?></h3>
			<p><i>(Mensagem enviada pelo <?php echo $linha['remetente']?> no dia <?php echo date("d/m/Y \à\s H:i:s", strtotime($linha['data_envio'])); ?>)</i></p>
           
		   <b style="color:#CD9B1D;text-decoration:underline;">Sugestão de <?php echo $pegaSugestao['nome_contato'];?></b>: <br><br><i style="color:red;"><?php echo $pegaSugestao['mensagem']?></i><br><br>
			
			<b style="color:#CD9B1D;text-decoration:underline;">Resposta: </b> <br><br><i style="color:green;"><?php echo $linha['mensagem']?></i><br><br>
			
			<br><br>
			<img src="<?php echo $linha['imagem']?>" width="40%" height="70%">
			</div>
				</center>
			<?php
			 }
			?>
		<a href="admin_altera_mensagem.php?codigo_mensagem=<?php echo $codigo_mensagem?>" class="btn btn-success">Alterar Mensagem </a> <a href="../php/admin_exclui_mensagem.php?codigo_mensagem=<?php echo $codigo_mensagem?>" class="btn btn-danger">Excluir Mensagem </a>
			<br><br>
			<div>

			
			<?php
		}else{
			?>
				<br><br>
             <?php
			 if($linha['imagem'] == null){
				 
			 ?>
			 <center>
			<div class="mensagem" col="100" rows="30">
			<h3><?php echo $linha['titulo']?></h3>
			<p><i>(Mensagem enviada pelo <?php echo $linha['remetente']?> no dia <?php echo date("d/m/Y \à\s H:i:s", strtotime($linha['data_envio'])); ?>)</i></p>
           
			<?php echo $linha['mensagem']?> 
			 
			</div>
		
			<?php
			 }else{
			?>
		
			<div class="mensagem" >
			<h3><?php echo $linha['titulo']?></h3>
			<p><i>(Mensagem enviada pelo <?php echo $linha['remetente']?> no dia <?php echo date("d/m/Y \à\s H:i:s", strtotime($linha['data_envio'])); ?>)</i></p>

			<p><?php echo $linha['mensagem']?></p>
			
			
			<br><br>
			<img src="<?php echo $linha['imagem']?>" width="40%" height="70%">
			</div>
				</center>
			<?php
			 }
			?>
		<a href="admin_altera_mensagem.php?codigo_mensagem=<?php echo $codigo_mensagem?>" class="btn btn-success">Alterar Mensagem </a> <a href=""  data-toggle="modal" data-target="#excuir_mensagem_<?php echo $codigo_mensagem?>" class="btn btn-danger">Excluir Mensagem </a>
			<br><br>
			<div>

				<!--Janela Modal excluir-->
				<div class="modal fade" id="excuir_mensagem_<?php echo $codigo_mensagem?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h5>Tem certeza que deseja excluir essa mensagem?</h5>
								</div>
								<div class="modal-body" align="center">
								<a href="../php/admin_exclui_mensagem.php?codigo_mensagem=<?php echo $codigo_mensagem?>"><button class="button-modal" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href=""><button class="button-modal" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


								</div>
								</div>
      
								</div>
								</div>
			
			<?php
		}
			?>

<br><br>
			<?php 
			include '../php/conexao.php';
			$codigo_mensagem = $_GET['codigo_mensagem'];
			$a = mysqli_query($conn,"select * from ler where codigo_mensagem = '".$codigo_mensagem."'");
			?>
			<button class="btn" onclick="Mudarestado('minhaDiv')" style="background-color:#CD9B1D;color:#fff;">Mostrar usuarios que viram está mensagem</button>
		<div style="display:none" id="minhaDiv">
			<h1>Visto por:</h1>		
			<?php
			while($mostra = mysqli_fetch_assoc($a)){
			$conta = mysqli_num_rows($a);
			if($conta == 0){
				?>
				<h4><b style="color:red;">Ninguém viu está mesnagem</b></h4>
				<?php
			}else{
				
		    $b = mysqli_query($conn,"select * from aluno where email = '".$mostra['email_usuario']."'");
			while($pega_aluno = mysqli_fetch_assoc($b)){
				?>
				
		
<table border="1px" width="530px" bgcolor="#FFF">
<tr>
<td width="70px"><img src="<?php echo $pega_aluno['foto']?>" width="50px" height="50px" style="border-radius:100%;"></td> <td><h4><strong><?php echo $pega_aluno['nome'];?></strong></h4></td>
</tr>
</table>
<?php
}
?>
				<?php
		    $c = mysqli_query($conn,"select * from professor where email = '".$mostra['email_usuario']."'");
			while($pega_professor = mysqli_fetch_assoc($c)){
			?>
	<table border="1px" width="530px" bgcolor="#FFF">
<tr>
<td width="70px"><img src="<?php echo $pega_professor['foto']?>" width="50px" height="50px" style="border-radius:100%;"></td> <td><h4><strong><?php echo $pega_professor['nome'];?></strong></h4></td>
</tr>
</table>

	<?php
			}}}
			?>
			</div>
			<br></br>
			</div>
			<?php
	  $query = mysqli_query($conn,"select * from usuario where email = '".$row['email_admin']."'");
	  $pegando_usuario = mysqli_fetch_assoc($query);
	  ?>
			<?php
		if($linha['comentar'] == 'sim'){
			?>
			<center><h2 style="color:green;"><u>Faça seu comentario</u></h2></center>
			<form method="POST" action="../php/admin_envia_comentario.php">
			<input type="text" name="codigo_usuario" value="<?php echo $pegando_usuario['id']?>" style="display:none;">
			<input type="text" name="codigo_mensagem" value="<?php echo $codigo_mensagem?>" style="display:none;">
			<input type="text" name="email_usuario" value="<?php echo $pegando_usuario['email']?>" style="display:none;">
			<input type="text" name="data_comentario" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s');?>" style="display:none;">
			<input type="text" name="tipo_usuario" value="admin" style="display:none;">
			<textarea class="campo_comenta" name="comentario"></textarea><br><br>
			<input type="submit" class="btn btn-success" value="Enviar Comentario">
			</form>
			<br><br>
			
			
			
			
			<?php
			$procurar = mysqli_query($conn,"select * from comentario where codigo_mensagem = '".$codigo_mensagem."'");
			if($conta = mysqli_num_rows($procurar) == 0){
				?>
				<center><h2 style="color:red;">Essa mensagem ainda não possui comentarios</h2></center>
				<?php
				}else{
					while($pega = mysqli_fetch_assoc($procurar)){
						$verificando = mysqli_query($conn,"select * from usuario where id = '".$pega['codigo_usuario']."'");
						$dados = mysqli_fetch_assoc($verificando);
				?>
				<?php
				if($pega['tipo_usuario']=='aluno'){
				?>
				<section class='box-comentario'>
				<aside class='foto-contato'>
				<div><img src="<?php echo $dados['foto'];?>" width="65px" height="65px" style="border-radius:100%;"></div>
				</aside>
				<article class='comentario'>
				<div class="balao1">
				<b class="assinatura">ALUNO(A). <?php echo $dados['nome'];?> </b>
				<br><br>
				<h5><b><?php echo $pega['comentario'];?></b></h5>
				<br>
				<footer class="assinatura" style="color:#8B2323;"><?php echo date("d/m/Y \à\s H:i:s", strtotime($pega['data_comentario'])); ?> </footer>
				</div>
				</article>
				</section>
				<?php
				}elseif($pega['tipo_usuario']=='professor'){
				?>
				<section class='box-comentario'>
				<aside class='foto-contato'>
				<div><img src="<?php echo $dados['foto'];?>" width="65px" height="65px" style="border-radius:100%;"></div>
				</aside>
				<article class='comentario'>
				<div class="balao2">
				<b class="assinatura">PROF. <?php echo $dados['nome'];?> </b>
				<br><br>
				<h5><b><?php echo $pega['comentario'];?></b></h5>
				<br>
				<footer class="assinatura" style="color:#8B2323;"><?php echo date("d/m/Y \à\s H:i:s", strtotime($pega['data_comentario'])); ?> </footer>
				</div>
				</article>
				</section>
				<?php
				}elseif($pega['tipo_usuario']=='admin'){
				?>
				<section class='box-comentario'>
				<aside class='foto-contato'>
				<div><img src="<?php echo $dados['foto'];?>" width="65px" height="65px" style="border-radius:100%;"></div>
				</aside>
				<article class='comentario'>
				<div class="balao3">
				<b class="assinatura">ADMIN. <?php echo $dados['nome'];?> </b>
				<br><br>
				<h5><b><?php echo $pega['comentario'];?></b></h5>
				<br>
				<footer class="assinatura" style="color:#8B2323;"><?php echo date("d/m/Y \à\s H:i:s", strtotime($pega['data_comentario'])); ?> </footer>
				</div>
				</article>
				</section>
				<?php
					}
				?>
				<?php
				
			} }
			
			?>
			
			
			<?php
		}else{
		?>
		<center><h1 style="color:red;">Está mensagem não permite comentarios</h1></center>
		<?php
		}
		?>
			</center>
	  <footer>
	<strong align="center">Gomess Productions | Todos os direitos reservados</strong>
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