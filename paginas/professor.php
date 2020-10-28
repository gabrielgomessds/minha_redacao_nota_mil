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
	
  </head>
  <body class="app sidebar-mini rtl">
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
    <!-- Navbar-->
    <header class="app-header"><a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" ><img src="../img/icone/menu.png" class="img_menu"> Minha Redação</i></strong></a>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
	<script language="JavaScript" type="text/javascript">
   function mascaraData(campoData){
              var data = campoData.value;
              if (data.length == 2){
                  data = data + '/';
                  document.forms[0].vencimento.value = data;
      return true;              
              }
              if (data.length == 5){
                  data = data + '/';
                  document.forms[0].vencimento.value = data;
                  return true;
              }
         }
</script>
<?php
session_start();
require_once '../includes/acesso_negado.php';
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
?>

<?php
include '../php/conexao.php';

require_once '../includes/correcao_caracteres.php';
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'");
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

      <div class="app-sidebar__user"><img src="<?php echo $row['foto']?>" style="cursor:pointer;" title="<?php echo $row['nome']?>"  class="app-sidebar__user-avatar" width="70px" height="70px" >
        <div>
	
		<?php
			$nomeUsuario = $row['nome'];
			list($nome) = explode(' ',$nomeUsuario);
		?>
			<p class="app-sidebar__user-name"><?php echo $nome?></p>

          
        </div>
      </div>
      <?php
			$busca = mysqli_query($conn,"select * from usuario where email = '".$row['email']."'")
	;
			$pega_usuario = mysqli_fetch_assoc($busca);
	  ?>
	  
      <ul class="app-menu">
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'home')" id="defaultOpen"><i><img src="../img/icone/menu/inicio.png"></i><span class="app-menu__label">Inicio</span></a></li>
        
		<?php
			           include '../php/conexao.php';
					   $query = mysqli_query($conn,"select * from ler");
					   $sql = mysqli_query($conn,"select * from mensagem");
					   
					   $pega_publico = "";
					   $pega_privada = "";
					   $mostra = "";
					   $visto = "";
						while($mensagem = mysqli_fetch_assoc($sql)){
						$privada = mysqli_query($conn,"select para = '".$pega_usuario['email']."' from ler where codigo_usuario ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$publica = mysqli_query($conn,"select * from ler where codigo_usuario ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$pega_publico = mysqli_num_rows($publica);
						$pega_privada = mysqli_num_rows($privada);
						$visto = $mensagem['destinatario'];
						
}				
					$buscaMensagem = mysqli_query($conn,"select * from mensagem where destinatario = 'Professores' or destinatario = '".$row['id']."' or destinatario = 'Todos'");
					$pegaMensagem = mysqli_fetch_assoc($buscaMensagem);
					$buscaLeitura = mysqli_query($conn,"select * from ler where email_usuario='".$row['email']."'");
					$contaMensagem = mysqli_num_rows($buscaMensagem);
					$contaLeitura = mysqli_num_rows($buscaLeitura);
					$calc = $contaMensagem - $contaLeitura;
					
					if(($contaMensagem = mysqli_num_rows($sql)== 0)){
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagem</span></a>  </li>
						<?php
                   }else  if(($pega_publico == 0 and $visto == 'Todos') or ($pega_publico == 0 and $visto == 'Professores') or ($pega_privada == 0 and $visto == $pega_usuario['email'])){
					
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens </span>	<i><img src="../img/icone/menu/sino_mensagem.png" width="26px" height="26px"></i></a> </li>
						
						<?php
					 }else{
						?>
							<?php
								if($calc >= 1){
							?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagem </span><?php 	echo '<div style="background:#dc3545;font-weight:bold;color:white;border-radius:100%;width:27px;height:23px;text-align:center;">'.'+'.$calc.'</div>'.'<br>';?></a>  </li>
							<?php

								}else{
							?>
							<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagem </span></a>  </li>
					
						<?php
						}}
						?>
						
	   <li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'turmas')" ><i ><img src="../img/icone/menu/turma.png" width="32px" height="32px"></i><span class="app-menu__label">Turmas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
        </li>
		<li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'temas')" ><i ><img src="../img/icone/menu/folha.png"></i><span class="app-menu__label">Temas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
		</li>
		
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'dados')"><i ><img src="../img/icone/menu/editar.png"></i><span class="app-menu__label">Meus dados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'sugestoes')"><i><img src="../img/icone/menu/comentarios.png"></i><span class="app-menu__label"> Sugestões</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" href="../php/sair.php?email=<?php echo $row['email'];?>"><i><img src="../img/icone/menu/sair.png"></i><span class="app-menu__label">Sair</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
      </ul>
	</aside>
	
    <main class="app-content">
	<!--###########################################=MENSAGENS#########################################################-->
<div class="tabcontent" id="mensagens">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/mensagens.png" width="30px" height="30px"></i> Mensagens</h1>
         
        </div>
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		<center>
		  <div class="col-md-12">
          <div class="tile">
		   <h5 class="tile-title">Mensagens</h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Rementente</th>
                    <th>Assunto</th>
					<th>Data de Envio</th>
					  <th>Ler Menssagem</th>
					  <th>Status</th>
	
					
					
                  </tr>
                </thead>
                <tbody>
				   <?php
					$resultado = mysqli_query($conn,"SELECT * FROM mensagem ORDER BY id DESC ") 
			;
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Você não tem mensagens</h2>
					<?php
						}else{
						while($mensagem = mysqli_fetch_assoc($resultado)){	
					?> 
					<?php
						if($mensagem['destinatario'] == 'Todos' or $mensagem['destinatario'] == 'Professores'){
					?>
                  <tr>
                <td><?php echo $mensagem['remetente']?></td>
                    <td><?php echo $mensagem['titulo']?></td>
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($mensagem['data_envio'])); ?></td>
                    <?php
						$sql = mysqli_query($conn,"select * from ler where codigo_usuario='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						?>
						<?php
						if($mensagem['destinatario'] == 'Todos'){
						?>
						<td><a href="../php/professor_envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=Todos&email_usuario=<?php echo $row['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="../php/professor_envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=Professores&email_usuario=<?php echo $row['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php	
						}
						?>
						<?php
						}else{
						?>
						<td><a href="professor_ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}
						?>
						
						<?php
						$sql = mysqli_query($conn,"select * from ler where codigo_usuario='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						
						?>
						<td style="color:red;text-decoration:italic;"><i>Menssagem não lida<i></td>
						<?php
						}else{
						?>
						<td style="color:green;text-decoration:italic;"><i>Menssagem lida</i></td>
						<?php
						}
						?>
						
					</td>
				 </tr>
				 <?php
						}else{
							if($mensagem['destinatario'] == $pega_usuario['email']){
								
								?>
								<tr>
                <td><?php echo $mensagem['remetente']?></td>
                    <td><?php echo $mensagem['titulo']?></td>
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($mensagem['data_envio'])); ?></td>
                    <?php
						$sql = mysqli_query($conn,"select * from ler where codigo_usuario='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						?>
						<td><a href="../php/professor_envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=<?php echo $row['email']?>&email_usuario=<?php echo $row['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="professor_ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}
						?>
						
						<?php
						$sql = mysqli_query($conn,"select * from ler where codigo_usuario='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						?>
						<td style="color:red;text-decoration:italic;"><i>Menssagem não lida<i></td>
						<?php
						}else{
						?>
						<td style="color:green;text-decoration:italic;"><i>Menssagem lida</i></td>
						<?php
						}
						?>
						
						<?php }?></td>
				 </tr>
								<?php
								
							}
							
						}
				 ?>
                </tbody>
				<?php
						}
				?>
              </table>
            </div>
		  </div>
        </div>
		</center>
            </div>
          </div>
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="home"> 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/home.png" width="25px" height="25px"></i> Inicio</h1>
          <p>Informações importantes aqui</p><b style="color:red;"></b>
        </div>
      </div>
	  
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Um click para acessar</h3>
			<i></i>
			<p></p>
			<img src="../img/inicio/portfolio-1.jpg" width="300px" height="300px" >
             <p>Acesso rápido em qualquer lugar.
Você pode acessar nosso site em qualquer lugar com apenas um click.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Construa suas redações</h3>
			<i>
			</i>
			<p></p>
            <img src="../img/inicio/portfolio-2.jpg" width="300px" height="300px" >
             <p>Nós sabemos que o ano mais importante e de maior preparação para o Enem é o terceiro ano. E um dos assuntos que mais trazem dificuldades para os alunos é a REDAÇÃO. Pensando nisso este site foi criado com o intuito de ajudar alunos concludentes e que buscam ingressar no ensino superior por meio do SISU, PROUNI e FIES.</p>
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Inserindo as tecnologias no meio escolar</h3>
			<i></i>
			<p></p>
            <img src="../img/imagens/online.jpg" width="350px" height="300px" >
             <p>Com a chegada das tecnologias as o nosso mundo teve diversas melhoras. Então por que não aplicar na educação? Pensando nisso o Minha Redação veio para agilizar a correção de suas redações através dos seus professores.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Professores para ajudar</h3>
			<i></i>
			<p></p>
            <img src="../img/imagens/professor2.jpg" width="300px" height="300px" >
             <p>Seus professores de redação estaram online para tirar suas dúvidas e ajudar nas suas redações fazendo correções e dando dicas/p>
          </div>
        </div>
      </div>
		</div>
<!---##########################################=TEMAS=#############################################################-->
<div class="tabcontent" id="temas">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/temas.png" width="25px" height="25px"></i> Temas</h1>
         
        </div>
      </div>
	  
	  <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title">Temas propostos por você
			<br><br><a href="professor_cadastra_tema.php"><button  class="btn btn-success" title="clique aqui para adicionar um tema">Adicionar novo tema <img src="../img/icone/adicionar.png" width="20px" height="20px"></button></a></h3></center>
            <div class="table-responsive">
              <table class="table" >
			   
                <thead>
                  <tr>
                    <th>Tema</th>
                    <th>Ver Redações</th>
					<th>Ver Rank</th>
					<th>Ver estatistica</th>
					<th>Data de Entrega</th>
					<th>Tempo Restante</th>
					<th>Enviado Para</th>
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$resultado = mysqli_query($conn,"SELECT * FROM temas_redacao where codigo_professor = '".$row['id']."' order by id desc");
					if(mysqli_num_rows($resultado) > 0){
					while($tema = mysqli_fetch_assoc($resultado)){
				?>
				
                <tbody>
				
                  <tr>
				  
				  <td>	<a href="professor_ver_tema.php?codigo_tema=<?php echo $tema['id']?>" title="<?php echo $tema['nome_tema']?>"><i><?php echo $tema['nome_tema'];?></i></a>   </td>
                    <td>
					<?php
							
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $tema['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				?>
					<a href="professor_redacoes_aluno.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-success" type="button">Ver Redações<img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a>
					</td></a>
					<td><a href="professor_rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" type="button">Rank<img src="../img/icone/icone_rank.png" width="16px" height="16px"></button></a></td>

					<td><a href="../dados/dados_redacao.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" style="background:orange;border-color:orange;" type="button">Estatisticas</button></a></td>
					
					
					<td><?php $data = $tema['vencimento']?>
					<?php echo date('d/m/y',strtotime($data))?>
					</td>
					<td style="color:green;font-style:italic;font-weight:bold;">
					<?php
					$dataFuturo = $tema['vencimento'];
					$dataAtual = date("Y/m/d");
					$date_time  = new DateTime($dataAtual);
					$diff  = $date_time->diff( new DateTime($dataFuturo));
					$date = DateTime::createFromFormat('Y-m-d' , $tema['vencimento']);					
					
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $tema['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				// data atual é maior que a data de expiração
				if ($timestamp_dt_atual > $timestamp_dt_expira){
				?>
					<b style="color:red;font-style:italic;">Encerrado</b>
					<?php
					}else if($timestamp_dt_atual == $timestamp_dt_expira){
					
					?>
					<b style="color:blue;font-style:italic;font-size:15px;">Prazo até hoje</b>
					<?php
				}else{
					echo $diff->format('%m mês(s), %d dia(s)');
				}
					?>
					</td>
					<?php 
					$busca = mysqli_query($conn,"select * from turma where id = '".$tema['codigo_turma']."' ");
					$pega = mysqli_fetch_assoc($busca); 
					if($tema['codigo_turma'] == 'TodasTurmas'){
					?>
					<td>Todas minhas turmas</td>
					<?php
					}else if($tema['codigo_turma'] == 'TurmasEspecificas'){
					?>
					<td>Turmas específicas</td>
					<?php
					}else{
					?>
					<td><?php echo $pega['nome_turma']?> - <?php echo $pega['escola_turma']?></td>
					<?php
					}
					?>
				 </tr>
				 
				 <?php
					}}else{
				?>
					<center><h2 style="color:red;"><b>Você não tem temas cadastrados</b></h2></center>
				
				<?php
						}
				?>
				</tbody>
              </table>
			  
            </div>
          </div>
        </div>
</div>



	<!---#########################################=CADASTRO TURMA=##############################################################-->
<div class="tabcontent" id="turmas">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/turma.png" width="40px" height="40px"></i> Turmas </h1>
         
        </div>
	  </div>
	  
	  <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title">Turmas criadas por você<br><br><a href="professor_cadastro_turma.php"><button class="btn btn-success">Adicionar nova turma <img src="../img/icone/adicionar.png" width="20px" height="20px"></button></a></h3></center>
            <div class="table-responsive">
              <table class="table" >
			   
                <thead>
                  <tr>
					<th>Simbolo da Turma</th>
					<th>Instituição</th>
                    <th>Nome da Turma</th>
					<th>Código de Acesso</th>
					<th>Ver perfil</th>
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$resultado = mysqli_query($conn,"select * from turma where codigo_professor='".$row['id']."'") or die(mysqli_error($conn));
					if(mysqli_num_rows($resultado) > 0){
					while($turma = mysqli_fetch_assoc($resultado)){
				?>
                <tbody>
                  <tr>
				
				  <td><img src="<?php echo $turma['simbolo']?>" width="60px" height="60px" style="border-radius:100%;"></td>
				  <td><?php echo $turma['escola_turma']?></td>
                    <td><?php echo $turma['nome_turma']?></td>
                
					<td><?php echo $turma['codigo_acesso'];?></td>
					
					<td><a href="professor_ver_turma.php?codigo_turma=<?php echo $turma['id']?>"><button class="btn btn-info" style="background:#8B0000;border-color:#8B0000;" type="button">Perfil da Turma</button></a></td>

				 </tr>
                </tbody>
				<?php
					}}else{

					
				?>
						<center><h2 style="color:red;"><b>Você não tem turmas cadastradas</b></h2></center>
				<?php
					}
				?>
				 </tbody>
			  </table>
            </div>
          </div>
		</div>	 
				</div>
<!---#########################################=DADOS DO PROFESSOR=##############################################################-->
<div class="tabcontent" id="dados">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/editar.png" width="25px" height="25px"></i> Meus dados</h1>
         
        </div>
      </div>
	  <?php

	include '../php/conexao.php';
	$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
	$row = mysqli_fetch_assoc($resultado);
	if($resultado){
		?>
	    <div class="tile">
            <h3 class="tile-title">Seus dados</h3>
            <div class="tile-body">
              <form action="../php/alterar_professor.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
				<input type="text" name="id" value="<?php echo $row['id']?>" style="display:none;">
                  <label class="control-label">Nome: </label>
                  <input class="form-control" type="text" name="nome" value="<?php echo $row['nome']?>" placeholder="Nome">
                </div>
				<div class="form-group" style="display:none;">
                  <label class="control-label">Email: </label>
                  <input class="form-control" type="email" name="email_aluno" value="<?php echo $row['email']?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="control-label">Email: </label>
                  <input class="form-control" type="email" name="email" value="<?php echo $row['email']?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="control-label">Escola: </label>
                  <input class="form-control" name="escola" type="text" value="<?php echo $row['escola']?>" placeholder="Escola">
                </div>
				<div class="form-group">
                  <label class="control-label">Senha: </label>
                  <input class="form-control" name="senha" type="password" value="<?php echo $row['senha']?>" placeholder="Senha">
				</div>
				<div class="form-group">
                  <label class="control-label">Sexo: </label>
				  <select class="select" name="sexo" required>
					  <?php
					 	if($row['sexo'] == 'Masculino'){
					  ?>
            			<option value="Masculino">Masculino</option>
            			<option value="Feminino">Feminino</option>
            			<option value="Outro">Outro</option>
            			<option value="Não quero informar">Não quero informar</option>
						<?php
						}else if($row['sexo'] == 'Feminino'){
						?>
						<option value="Feminino">Feminino</option>
						<option value="Masculino">Masculino</option>
            			<option value="Outro">Outro</option>
            			<option value="Não quero informar">Não quero informar</option>
						<?php
						}else if($row['sexo'] == 'Outro'){
							?>
							<option value="Outro">Outro</option>
							<option value="Feminino">Feminino</option>
							<option value="Masculino">Masculino</option>
							<option value="Não quero informar">Não quero informar</option>
						<?php
					       }else if($row['sexo'] == ''){
						?>
								  <option value="">Escolha o sexo....</option>
            					  <option value="Masculino">Masculino</option>
                                  <option value="Feminino">Feminino</option>
                                  <option value="Outro">Outro</option>
                                   <option value="Não quero informar">Não quero informar</option>
						<?php
							}else{
								?>
										<option value="Não quero informar">Não quero informar</option>
										<option value="Outro">Outro</option>
										<option value="Feminino">Feminino</option>
										<option value="Masculino">Masculino</option>
								<?php
									}
								?>
						?>
          			</select>
                </div>
				<div class="form-group">
                  <label class="control-label">Foto de Perfil: </label>
                  <label class="labelInput" >
					<input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFile(event)"/>
					<span><img src="<?php echo $row['foto']?>" title="Escolha uma imagem" name="foto" id="output" style="width:240px;height:190px;cursor:pointer;" ></span>
					</label>
                </div>
          
            </div>
            <div class="tile-footer">
              <input class="btn btn-primary" type="submit"  value="Salvar Alterações">
           
			    </form>
				<a href="../php/professor_retira_foto.php?email=<?php echo $row['email']?>"><button class="btn btn-sucess" style="background:#551A8B;color:#FFF;">Retirar foto de perfil</button></a>
				</div>
          </div>
		  <?php 
			}
		  ?>
</div><!---#########################################=SUGESTOES=##############################################################-->
<div class="tabcontent" id="sugestoes">
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/comentarios.png" width="25px" height="25px"></i>Sugestões</h1>
         
        </div>
      </div>
	  <?php
	  include '../php/conexao.php';
		$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") 
;
		$row = mysqli_fetch_assoc($resultado);
		if($resultado){
	  ?>
	  <div class="alert alert-primary alert-dismissible fade show" role="alert">
	  <p style="font-size:18px;"><strong><?php echo $nome;?></strong> nós queremos ouvir as suas dúvidas e sugestões. Fique à vontade para nos enviar
uma mensagem e em breve entraremos em contato com você.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
	    <div class="tile">
            <h3 class="tile-title">Tem alguma dúvida ou sugestão?</h3>
            <div class="tile-body">
              <div class="contato">  
  <form action="../php/professor_envia_sugestao.php" class="form-contato" method="post" tabindex="1">  
       <input type="text" style="text-align:center;display:none;"  class="campo-contato" name="codigo_aluno" value="<?php echo $row['id']?>"> 
     <input type="tipo" style="text-align:center;display:none;" name="tipo" value="Professor">
	 <input type="text"  style="text-align:center;display:none;"   class="campo-contato" name="nome_contato" value="<?php echo $row['nome']?>"> 
     <input type="text" style="text-align:center;display:none;"  class="campo-contato" name="escola_contato" value="<?php echo $row['escola']?>"> 	 
     <input type="email" style="text-align:center;display:none;" class="campo-contato" name="email_contato" value="<?php echo $row['email']?>">  
     <input type="text" style="text-align:center;display:none;" class="campo-contato" name="foto_contato" value="<?php echo $row['foto']?>">
	 <input type="text" name="data_envio" style="display:none;" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s:m');?>">  
	 <label class="label-contato">Sobre o que é essa mensagem:</label><input class="campo-contato" type="text" name="titulo" placeholder="Titulo da mensagem" required>      
	 <label class="label-contato">Digite sua mensagem aqui:</label><textarea class="campo-contato-mensagem" name="mensagem" placeholder="Deixe sua mensagem aqui" required></textarea>  
     
	 <button type="submit" class="botao-contato">Enviar <i><img src="../img/icone/menu/enviar.png" width="16px"></i></button>  
 
  </form>  
</div> 
            </div>
          </div>
		  <?php
		}
		  ?>
</div>
<!---#########################################=FIM=##############################################################-->
	  <footer>
	  <strong align="center">Gomess Productions | Todos os direitos reservados</strong>
	</footer>
    </main>

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


document.getElementById("defaultOpen").click();
</script>
	<?php
}
	?>
  </body>
</html>