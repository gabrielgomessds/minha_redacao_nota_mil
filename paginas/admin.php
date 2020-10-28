<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Admin</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
	<link rel="stylesheet" href="../css/ajaxRequest.css" type="text/css">
	<script type="text/javascript" src="../js/ajaxRequest.js"></script>
	<!-- Main CSS-->
	<style>
.invisivel{
	display:none;
	
}
.button-modal {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.divs{
  
  width:160px;
  height:180px;
  display:inline-block;
  margin:4px 9px 20px;
}
.divs b{
	font-size:22px;
	color:blue;
}
.divs p{
	font-size: 16px;
	color:red;
	font-weight: bold;
}
.divs img{
	width:80px;
	height:80px;
}
.menulink {
  background-color: #555;
  color: white;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  font-size: 17px;
  margin-bottom: 6px;
  height:60px;
  width: 200px;
  margin-right: 4px;
}

.menulink:hover {
  background-color: #777;
}

        </style>
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
		</script>

    <!-- Navbar-->
    <header class="app-header"><a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" ><img src="../img/icone/menu.png" class="img_menu"> Minha Redação</i></strong></a>
      <!-- Navbar Right Menu-->
    </header>

<script>
function altera() {
	document.getElementById('output').src = "../img/icone/icone_usuario_sem_foto.png";
}
</script>
    <!-- Sidebar menu-->
	<?php
include '../php/conexao.php';
session_start();
require_once '../includes/acesso_negado.php';
$email=$_SESSION['email'];
$senha=$_SESSION['senha'];
?>
<?php
$resultado = mysqli_query($conn,"SELECT * FROM admin where email_admin = '$email' and senha_admin = '$senha'");
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

      <div class="app-sidebar__user"><img src="<?php echo $row['foto_admin']?>" style="cursor:pointer;" title="<?php echo $row['nome_admin']?>"  class="app-sidebar__user-avatar" width="70px" height="70px" >
        <div>
	
		<?php
			$nomeUsuario = $row['nome_admin'];
			list($nome) = explode(' ',$nomeUsuario);
		?>
			<p class="app-sidebar__user-name"><?php echo $nome?></p>
          
        </div>
      </div>
      <ul class="app-menu">
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'home')" id="defaultOpen"><i><img src="../img/icone/menu/inicio.png"></i><span class="app-menu__label">Inicio</span></a></li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" ><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens</span></a> </li>
	   <li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'temas')" ><i ><img src="../img/icone/menu/folha.png"></i><span class="app-menu__label">Temas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
        </li>
		<li ><a class="app-menu__item "   style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'turmas')" ><i ><img src="../img/icone/menu/turma.png" width="32px" height="32px"></i><span class="app-menu__label">Turmas</span><i class="treeview-indicator fa fa-angle-right"></i></a> </li>
		<li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'admin')" ><i ><img src="../img/icone/menu/admin.png" width="26px" height="26px"></i><span class="app-menu__label">Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>  </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'dados')"><i ><img src="../img/icone/menu/editar.png"></i><span class="app-menu__label">Meus dados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'sugestoes')"><i><img src="../img/icone/menu/comentarios.png"></i><span class="app-menu__label"> Sugestões</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'contato')"><i><img src="../img/icone/menu/suporte.png" width="26px" height="26px"></i><span class="app-menu__label"> Contato</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" href="../php/sair.php"><i><img src="../img/icone/menu/sair.png"></i><span class="app-menu__label">Sair</span><i class="treeview-indicator fa fa-angle-right"></i></a>
		</li>
		
      </ul>
    </aside>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="home"> 
      <div class="app-title">
        <div>
	
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/home.png" width="25px" height="25px"></i> Inicio</h1>
          <p>Tudo sobre os usuarios</p><b style="color:red;"></b>
        </div>
      </div>
	  <center>
		<?php
		$busca_usuarios = mysqli_query($conn,"select * from usuario") or die(mysqli_error($conn));
		$busca_alunos = mysqli_query($conn,"select * from usuario where tipo = 'Aluno'") or die(mysqli_error($conn));
		$busca_profs = mysqli_query($conn,"select * from usuario where tipo = 'Professor'") or die(mysqli_error($conn));
		$busca_admins = mysqli_query($conn,"select * from usuario where tipo = 'Admin'") or die(mysqli_error($conn));
		$busca_turmas = mysqli_query($conn,"select * from turma") or die(mysqli_error($conn));
		$busca_redacoes = mysqli_query($conn,"select * from redacao") or die(mysqli_error($conn));
		$busca_temas = mysqli_query($conn,"select * from temas_redacao") or die(mysqli_error($conn));
		$busca_sugestoes = mysqli_query($conn,"select * from sugestao") or die(mysqli_error($conn));
		$busca_contato = mysqli_query($conn,"select * from contato") or die(mysqli_error($conn));
		$busca_provas = mysqli_query($conn,"select * from provas_marcadas") or die(mysqli_error($conn));



		//------------------------------------------------------------------------------------------------------------------//
		$conta_usuarios = mysqli_num_rows($busca_usuarios);
		$conta_alunos = mysqli_num_rows($busca_alunos);
		$conta_profs = mysqli_num_rows($busca_profs);
		$conta_admins = mysqli_num_rows($busca_admins);
		$conta_turmas = mysqli_num_rows($busca_turmas);
		$conta_redacoes = mysqli_num_rows($busca_redacoes);
		$conta_temas = mysqli_num_rows($busca_temas);
		$conta_sugestoes = mysqli_num_rows($busca_sugestoes);
		$conta_contato = mysqli_num_rows($busca_contato);
		$conta_provas = mysqli_num_rows($busca_provas);
		

		?>			


		 <div class="col-md-12">
          <div class="tile" >
			<h3 class="tile-title" align="center" style="color:#009688;font-size:30px;"><b>Dados do site</b></h3>

			<div class="divs">
			<b>Usuários</b><br>
			<img src="../img/icone/icone_login.png"><br>
			<p>Quant: <?php echo $conta_usuarios?></p>
		</div>
		 <div class="divs">
			<b>Alunos</b><br>
			<img src="../img/icone/icone_aluno.png"><br>
			<p>Quant: <?php echo $conta_alunos?></p>
		</div>
		<div class="divs">
			<b>Professores</b><br>
			<img src="../img/icone/icone_professor_cadastro.png"><br>
			<p>Quant: <?php echo $conta_profs?></p>
		</div>
		<div class="divs">
			<b>Admins</b><br>
			<img src="../img/icone/icone_admin_sem_foto.png"><br>
			<p>Quant: <?php echo $conta_admins?></p>
		</div>
		<div class="divs">
			<b>Turmas</b><br>
			<img src="../img/icone/imagem_turma.png"><br>
			<p>Quant: <?php echo $conta_turmas?></p>
			
		</div>
		<div class="divs">
			<b>Redações</b><br>
			<img src="../img/icone/icone_red.png"><br>
			<p>Quant: <?php echo $conta_redacoes?></p>
		</div>
		<div class="divs">
			<b>Temas</b><br>
			<img src="../img/icone/icone_para_temas.png"><br>
			<p>Quant: <?php echo $conta_temas?></p>
		</div>
		<div class="divs">
			<b>Sugestões</b><br>
			<img src="../img/icone/icone_para_sugestao.png"><br>
			<p>Quant : <?php echo $conta_sugestoes?></p>
		</div>
		<div class="divs">
			<b>Contato</b><br>
			<img src="../img/icone/fale_conosco.png"><br>
			<p>Quant: <?php echo $conta_contato?></p>
		</div>
		<p><button class="btn" onclick="Mudarestado('minhaDiv')" style="color:#FFF;background:#009688;">Mais detalhes</button></p>

		 </center>
            </div>
         
        </div>
		</div>
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
		  <div class="col-md-10">
          <div class="tile">
		   <h5 class="tile-title">Mensagens <br><br><a href="add_mensagem.php"><button class="btn btn-success"><i><img src="../img/icone/icone_adicionar.png" width="20px" height="20px"></i> Adicionar Menssagem </button></a></h5>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Rementente</th>
                    <th>Assunto</th>
					<th>Tipo</th>
					<th>Data de Envio</th>
					  <th>Ler Menssagem</th>
					
					
                  </tr>
                </thead>
                <tbody>
				   <?php
					$resultado = mysqli_query($conn,"SELECT * FROM mensagem ORDER BY id DESC ");
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Você não tem mensagens</h2>
					<?php
						}else{
						while($mensagem = mysqli_fetch_assoc($resultado)){	
					?> 
					
                  <tr>
                <td><?php echo $mensagem['remetente']?></td>
                    <td><?php echo $mensagem['titulo']?></td>
					 <td><?php echo $mensagem['tipo']?></td>
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($mensagem['data_envio'])); ?></td>
						<td><a href="admin_ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php }?></td>
				 </tr>
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
		  
	         <!---#########################################=TURMAS=##############################################################-->
<div class="tabcontent" id="turmas">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/turma.png" width="25px" height="25px"></i> Turmas </h1>
         
        </div>
	  </div>
	  
	  <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
            <center><h3 class="tile-title">Turmas Cadastradas<br><br><a href="cadastro_turma.php"></a></h3></center>
            <div class="table-responsive">
              <table class="table" >
			   
                <thead>
                  <tr>
					<th>Simbolo Turma</th>
                    <th>Nome da Turma</th>
					<th>Código de Acesso</th>
					<th>Ver perfil</th>
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$resultado = mysqli_query($conn,"select * from turma");
					if(mysqli_num_rows($resultado) > 0){
					while($turma = mysqli_fetch_assoc($resultado)){
				?>
                <tbody>
                  <tr>
				
				  <td><img src="<?php echo $turma['simbolo']?>" width="50px" height="50px"></td>
                    <td><?php echo $turma['nome_turma']?></td>
                
					<td><?php echo $turma['codigo_acesso'];?></td>
					
					<td><a href="admin_ver_turma.php?codigo_turma=<?php echo $turma['id']?>"><button class="btn btn-info" style="background:#8B0000;border-color:#8B0000;" type="button">Perfil da Turma</button></a></td>

				 </tr>
                </tbody>
				<?php
					}}
				?>
			  </table>
            </div>
          </div>
		</div>	 
				</div>           
<!---##########################################=TEMA=#############################################################-->
<div class="tabcontent" id="temas">
<div class="app-title">
        <div>
		  <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/temas.png" width="25px" height="25px"></i> Temas para Redação</h1>
         
        </div>
      </div>
	  
	  <div class="clearfix"></div>
        <div class="col-md-12">
          <div class="tile">
           <center> <h3 class="tile-title">Temas Cadastrados </h3> 
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
					<th>Para</th>
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$resultado = mysqli_query($conn,"SELECT * FROM temas_redacao order by id desc");
					if(mysqli_num_rows($resultado) > 0){
					while($tema = mysqli_fetch_assoc($resultado)){
				?>
                <tbody>
                  <tr>
                
				  <td><i><?php echo $tema['nome_tema']?></i></td>
                    <td>
					<?php
							
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $tema['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				// data atual é maior que a data de expiração
				?>
					<a href="admin_redacoes_aluno.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-success" type="button">Ver Redações<img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a>
					<td><a href="admin_rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" type="button">Rank<img src="../img/icone/icone_rank.png" width="16px" height="16px"></button></a></td>
					<td><a href="../dados/dados_redacao.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" style="background:orange;border-color:orange;" type="button">Estatisticas</button></a></td>

					</td></a>
					
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
					<td>Todas as Turmas</td>
					<?php
					}else if($tema['codigo_turma'] == 'TurmasEspecificas'){
					?>
					<td>Turmas Especificas</td>
					<?php
					}else{
					?>
					<td><?php echo $pega['nome_turma']?> - <?php echo $pega['escola_turma']?></td>
					<?php
					}
					?>
				 </tr>
                </tbody>
				<?php
					}}
				?>
              </table>
            </div>
          </div>
        </div>
</div>

<!---#########################################=ADMIN=##############################################################-->
<div class="tabcontent" id="admin">
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/admin.png" width="30px" height="30px"></i>Cadastrar Admin</h1>
         
        </div>
      </div>
	    <div class="tile">
            <h3 class="tile-title"></h3>
            <div class="tile-body">
              <div class="contato">  
  <form class="form-contato" action="../php/cadastro_admin.php" method="post" tabindex="1">  
	 <label class="label-contato">Nome:</label><input class="campo-contato" type="text" name="nome" placeholder="Nome completo" required>      
	 <label class="label-contato">Email:</label><input class="campo-contato" type="text" name="email" placeholder="Email" required>          
	 <label class="label-contato">Senha:</label><input class="campo-contato" type="password" name="senha" placeholder="Senha" required>      
	 <input class="campo-contato" type="text" name="tipo" style="display:none;" value="admin"required>      
     <button type="submit" class="botao-contato"><i></i> Cadastrar</button>  
  </form>  
</div> 
            </div>
          </div>
</div>
<!---#########################################=DADOS DO ADMIN=##############################################################-->
<div class="tabcontent" id="dados">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/editar.png" width="25px" height="25px"></i> Meus dados</h1>
         
        </div>
      </div>
	  <?php

	include '../php/conexao.php';
	$resultado = mysqli_query($conn,"SELECT * FROM admin where email_admin = '$email' and senha_admin = '$senha'");
	$row = mysqli_fetch_assoc($resultado);
	if($resultado){
		?>
	  <div class="tile">
            <h3 class="tile-title">Seus dados</h3>
            <div class="tile-body">
              <form action="../php/alterar_admin.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
				<input type="text" name="id" value="<?php echo $row['id']?>" style="display:none;">
                  <label class="control-label">Nome</label>
                  <input class="form-control" type="text" name="nome_admin" value="<?php echo $row['nome_admin']?>" placeholder="Nome">
                </div>
				 <div class="form-group" style="display:none;">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="email_aluno" value="<?php echo $row['email_admin']?>" placeholder="Email" >
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                  <input class="form-control" type="email" name="email_admin" value="<?php echo $row['email_admin']?>" placeholder="Email">
                </div>
				<div class="form-group">
                  <label class="control-label">Senha</label>
                  <input class="form-control" name="senha_admin" type="password" value="<?php echo $row['senha_admin']?>" placeholder="Senha">
                </div>
				<div class="form-group">
                  <label class="control-label">Foto</label>
                  <label class="labelInput" >
					<input type="file" accept="image/*"  id="foto" name="foto_admin" onchange="loadFile(event)"/>
					<span><img src="<?php echo $row['foto_admin']?>" title="Escolha uma imagem" name="foto_admin" id="output" style="width:240px;height:190px;cursor:pointer;" ></span>
					</label>
                </div>
          
            </div>
            <div class="tile-footer">
              <input class="btn btn-primary" type="submit" value="Salvar Alterações">
           
			    </form>
				<a href="../php/admin_retira_foto.php?email=<?php echo $row['email_admin']?>"><button class="btn btn-sucess" style="background:#551A8B;color:#FFF;">Retirar foto de perfil</button></a>
				</div>
		  </div>
		  <?php 
			}
		  ?>
</div>
<!---#########################################=SUGESTOES=##############################################################-->
<div class="tabcontent" id="sugestoes">
   <div class="app-title">
        <div>
		<?php
		$resultado = mysqli_query($conn,"SELECT * FROM sugestao order by id desc");
		$conta = mysqli_num_rows($resultado);
		?>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/comentarios.png" width="25px" height="25px"></i>Sugestões/Total: <?php echo $conta?></h1>
         
        </div>
      </div>
	  <?php
		
		if($resultado){
			while($contato = mysqli_fetch_assoc($resultado)){
			?>
	    <div class="col-md-12" align="center">
        <div class="col-md-10">
          <div class="tile">
            <h3 class="tile-title"><img src="<?php echo $contato['foto_contato']?>" width="50px" height="50px" style="border-radius:100%;"> <b style="color:red;"><?php echo $contato['tipo']?>(a): </b> <b style="color:blue;"><?php echo $contato['nome_contato'];?></b></h3>
			<i>Enviada: <?php echo date("d/m/Y \à\s H:i:s", strtotime($contato['data_envio'])); ?></i>
			<br><br>
			<h4 align="center"><?php echo $contato['titulo'];?></h4>
			<p></p>
             <p align="center" style="font-size:16px;"><?php echo $contato['mensagem']?></p><br><br>
			 <a href="responde_sugestao.php?codigo_sugestao=<?php echo $contato['id']?>"><b style="font-style:italic;font-size:22px">Responder</b></a>
          </div>
		 
        </div>
		
        </div>
		<?php
		}}
		?>
</div>
<!---#########################################=CONTATO=##############################################################-->


<div class="tabcontent" id="contato">
   <div class="app-title">
        <div>
		<?php
		$resultado = mysqli_query($conn,"SELECT * FROM contato order by id desc");
		$conta = mysqli_num_rows($resultado);
		?>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/suporte.png" width="25px" height="25px"></i>Contato/Total: <?php echo $conta?></h1>
         
        </div>
      </div>
	  <?php
		
		if($resultado){
			while($pegaContato = mysqli_fetch_assoc($resultado)){
			?>
	    <div class="col-md-12" align="center">
        <div class="col-md-10">
          <div class="tile">
            <h3 class="tile-title"> <b style="color:blue;">Nome: <?php echo $pegaContato['nome_contato'];?></b></h3>
			<b align="center" style="font-size:18px;">E-mail: <?php echo $pegaContato['email_contato'];?></b>
			<p></p>
             <p align="center" style="font-size:22px;">Mensagem: <?php echo $pegaContato['mensagem_contato']?></p>
          </div>
		 
        </div>
		
        </div>
		<?php
		}}
		?>
</div>
<!---#########################################=TABELA DE USUARIOS=##############################################################-->
<div id="minhaDiv" style="display:none;">

<center><button class="menulink" onclick="openUser('usuarios', this, 'red')" id="principal">Usuários</button>
<button class="menulink" onclick="openUser('alunos', this, 'green')">Alunos</button>
<button class="menulink" onclick="openUser('professores', this, 'blue')">Professores</button>
<button class="menulink" onclick="openUser('admins', this, 'orange')">Admins</button></center>
<br><br>


<div id="usuarios" class="menucontent">
<div class="col-md-12">
<div class="tile">
<center>
<h3 style="color:blue;font-weight:bold;font-style:italic;">Usuários cadastro</h3><br>		
<input type="text" name="filtro" class="filtro-de-tabela" id="filtrar-tabela" placeholder="Buscar usuário"></center><br><br>
<table class="table" >
			  
			   <?PHP
				$sql = mysqli_query($conn,"select * from usuario order by situacao desc");
				if(mysqli_num_rows($sql)>0){
				while($usuario = mysqli_fetch_assoc($sql)){
				?>
                <tbody id="tabela-usuario">
				
                  <tr class="usuario">
					<td class="info-nome"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $usuario['foto']?>"> <b style="font-size:18px;"><?php echo $usuario['nome']?></b> <i style="color:blue;">(<?php echo $usuario['tipo']?>)</i></td>
                    <td><button data-toggle="modal" data-target="#<?php echo $usuario['id']?>" class="btn btn-success">Informações</button></td>
					<td><button class="btn btn-danger" data-toggle="modal" data-target="#excluir-usuario-<?php echo $usuario['id']?>" type="button">Excluir Ususario</button></td>
					</tr>

					<!--Janela Modal informações-->
								<div class="modal fade" id="<?php echo $usuario['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
								</div>
								<div class="modal-body" align="center">
									<center><img src="<?php echo $usuario['foto']?>" style="width:200px;height:300px;"><br></center>
									<strong>Nome: <?php echo $usuario['nome'];?></strong><br>
									<strong>Email: <?php echo $usuario['email'];?></strong><br>
									<strong>Senha: <?php echo $usuario['senha'];?></strong><br>
									<strong>Tipo: <?php echo $usuario['tipo'];?></strong><br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
      
								</div>
								</div>
							


							<!--Janela Modal excluir-->
							<div class="modal fade" id="excluir-usuario-<?php echo $usuario['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h5>Tem certeza que deseja excluir este usuario?</h5>
								</div>
								<div class="modal-body" align="center">
								<a href="../php/admin_exclui_usuario.php?id=<?php echo $usuario['id']?>"><button class="button-modal" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href=""><button class="button-modal" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


								</div>
								</div>
      
								</div>
								</div>
							

		
			
				 
                </tbody>
             
		
							
					
				<?php }}else{?>
		<center><h1 style="color:red;">Nenhum usuário cadastrado</h1></center>
		<?php } ?>
		 </table>
</div>
</div>	

</div>

<div id="alunos" class="menucontent">
 
<!--###########################################################TABELA DE ALUNOS##############################################################################-->
<div class="col-md-12">
<div class="tile">
<center>
<h3 style="color:blue;font-weight:bold;font-style:italic;">Alunos cadastro</h3><br>		

<input type="text" name="filtro" class="filtro-de-tabela" id="filtrar-tabela-aluno" placeholder="Buscar aluno"></center><br><br>
<table class="table" >
			  
			   <?PHP
				$sql = mysqli_query($conn,"select * from aluno");
				if(mysqli_num_rows($sql)>0){
				while($aluno = mysqli_fetch_assoc($sql)){
				$busca_turma = mysqli_query($conn,"select * from turma where id='".$aluno['codigo_turma']."'");
				$pega_turma = mysqli_fetch_assoc($busca_turma);
				
				?>
                <tbody id="tabela-usuario">
				
					<tr class="aluno">
					<td class="info-nome-aluno"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $aluno['foto']?>"> <b style="font-size:18px;"><?php echo $aluno['nome']?></b> </td>
                    <td><button data-toggle="modal" data-target="#mostra_aluno_<?php echo $aluno['id']?>" class="btn btn-success">Informações</button></td>
					</tr>
                </tbody>			
					
					<!--Janela Modal-->
								<div class="modal fade" id="mostra_aluno_<?php echo $aluno['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-body" align="center">
									<center><img src="<?php echo $aluno['foto']?>" style="width:200px;height:300px;"><br></center>
									<strong>Nome: <?php echo $aluno['nome'];?></strong><br>
									<strong>Email: <?php echo $aluno['email'];?></strong><br>
									<strong>Senha: <?php echo $aluno['senha'];?></strong><br>
									<strong>Turma: <?php echo $pega_turma['nome_turma'];?></strong><br>
									<strong>Escola: <?php echo $pega_turma['escola_turma'];?></strong><br>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
      
								</div>
								</div>

				<?php }}else{?>
		<center><h1 style="color:red;">Nenhum aluno cadastrado</h1></center>
		<?php } ?>
		 </table>
</div>
</div>	

</div>


<div id="professores" class="menucontent">
<!--###########################################################TABELA DE PROFESSORES##############################################################################-->
<div class="col-md-12">
<div class="tile">
<center>
<h3 style="color:blue;font-weight:bold;font-style:italic;">Professores cadastrados</h3><br>		

<input type="text" name="filtro" class="filtro-de-tabela" id="filtrar-tabela-prof" placeholder="Buscar professor"></center><br><br>
<table class="table" >
			  
			   <?PHP
				$sql = mysqli_query($conn,"select * from professor");
				if(mysqli_num_rows($sql)>0){
				while($prof = mysqli_fetch_assoc($sql)){

				?>
                <tbody id="tabela-usuario">
				
					<tr class="prof">
					<td class="info-nome-prof"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $prof['foto']?>"> <b style="font-size:18px;"><?php echo $prof['nome']?></b> </td>
                    <td><button data-toggle="modal" data-target="#mostra_prof_<?php echo $prof['id']?>" class="btn btn-success">Informações</button></td>
					</tr>
                </tbody>			
					
					<!--Janela Modal-->
								<div class="modal fade" id="mostra_prof_<?php echo $prof['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-body" align="center">
									<center><img src="<?php echo $prof['foto']?>" style="width:200px;height:300px;"><br></center>
									<strong>Nome: <?php echo $prof['nome'];?></strong><br>
									<strong>Email: <?php echo $prof['email'];?></strong><br>
									<strong>Senha: <?php echo $prof['senha'];?></strong><br>
									<strong>Escola: <?php echo $prof['escola'];?></strong><br>
				
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
      
								</div>
								</div>

				<?php }}else{?>
		<center><h1 style="color:red;">Nenhum professor cadastrado</h1></center>
		<?php } ?>
		 </table>
</div>
</div>	



</div>


<div id="admins" class="menucontent">
  <!--###########################################################TABELA DE ADMIN##############################################################################-->
<div class="col-md-12">
<div class="tile">
<center>
<h3 style="color:blue;font-weight:bold;font-style:italic;">Admin cadastrados</h3><br>		

<input type="text" name="filtro" class="filtro-de-tabela" id="filtrar-tabela-adm" placeholder="Buscar admin"></center><br><br>
<table class="table" >
			  
			   <?PHP
				$sql = mysqli_query($conn,"select * from admin");
				if(mysqli_num_rows($sql)>0){
				while($adm = mysqli_fetch_assoc($sql)){

				?>
                <tbody id="tabela-usuario">
				
					<tr class="adm">
					<td class="info-nome-adm"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $adm['foto_admin']?>"> <b style="font-size:18px;"><?php echo $adm['nome_admin']?></b> </td>
                    <td><button data-toggle="modal" data-target="#mostra_adm_<?php echo $adm['id']?>" class="btn btn-success">Informações</button></td>
					</tr>
                </tbody>			
					
					<!--Janela Modal-->
								<div class="modal fade" id="mostra_adm_<?php echo $adm['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-body" align="center">
									<center><img src="<?php echo $adm['foto_admin']?>" style="width:200px;height:300px;"><br></center>
									<strong>Nome: <?php echo $adm['nome_admin'];?></strong><br>
									<strong>Email: <?php echo $adm['email_admin'];?></strong><br>
									<strong>Senha: <?php echo $adm['senha'];?></strong><br>
									
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
      
								</div>
								</div>

				<?php }}else{?>
		<center><h1 style="color:red;">Nenhum admin cadastrado</h1></center>
		<?php } ?>
		 </table>
</div>
</div>	
</div>	


</div>



</div>	
<!---#########################################=FIM=##############################################################-->
	  <footer>
	<strong align="center">Gomess Productions | Todos os direitos reservados</strong>
	</footer>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
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


<script>
function openUser(cityName,elmnt,color) {
  var i, menucontent, menulinks;
  menucontent = document.getElementsByClassName("menucontent");
  for (i = 0; i < menucontent.length; i++) {
    menucontent[i].style.display = "none";
  }
  menulinks = document.getElementsByClassName("menulink");
  for (i = 0; i < menulinks.length; i++) {
    menulinks[i].style.backgroundColor = "";
  }
  document.getElementById(cityName).style.display = "block";
  elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("principal").click();
</script>

<script type="text/javascript" language="javascript">
function Mudarestado(el) {
        var display = document.getElementById(el).style.display;
        if(display == "none"){
            document.getElementById(el).style.display = 'block';
			
        }else{
            document.getElementById(el).style.display = 'none';
}}
</script>
<!-- Filtro para a tabela -->
<script>


//pegando valor de um campo de texto
var campoFiltro = document.querySelector("#filtrar-tabela");
//o input verifica o que foi digitado
campoFiltro.addEventListener("input",function(){
	console.log(this.value);
	//aqui pega o tr
	var pacientes = document.querySelectorAll(".usuario");
	
	if(this.value.length > 0){
		for(var i =0;i<pacientes.length;i++){
			var paciente = pacientes[i];
			//buscando dentro do td o nome
			var tdNome = paciente.querySelector(".info-nome");
			var nome = tdNome.textContent;  
			//RegExp expresão regular que busca, usando o i informa que pode ser maiscula ou minuscula
			var expressao = new RegExp(this.value,"i");
			if( !expressao.test(nome)){
				//adiciona a class invisivel
				paciente.classList.add("invisivel");
			}else{
				//remove a class invisivel
				paciente.classList.remove("invisivel");
			}
		}
	}else{
		for(var i = 0;i < pacientes.length;i++){
			var paciente = pacientes[i];
			paciente.classList.remove("invisivel");
		}
	}
	
});
	</script>
	<script>


//pegando valor de um campo de texto
var campoFiltro = document.querySelector("#filtrar-tabela-aluno");
//o input verifica o que foi digitado
campoFiltro.addEventListener("input",function(){
	console.log(this.value);
	//aqui pega o tr
	var pacientes = document.querySelectorAll(".aluno");
	
	if(this.value.length > 0){
		for(var i =0;i<pacientes.length;i++){
			var paciente = pacientes[i];
			//buscando dentro do td o nome
			var tdNome = paciente.querySelector(".info-nome-aluno");
			var nome = tdNome.textContent;  
			//RegExp expresão regular que busca, usando o i informa que pode ser maiscula ou minuscula
			var expressao = new RegExp(this.value,"i");
			if( !expressao.test(nome)){
				//adiciona a class invisivel
				paciente.classList.add("invisivel");
			}else{
				//remove a class invisivel
				paciente.classList.remove("invisivel");
			}
		}
	}else{
		for(var i = 0;i < pacientes.length;i++){
			var paciente = pacientes[i];
			paciente.classList.remove("invisivel");
		}
	}
	
});
	</script>


<script>


//pegando valor de um campo de texto
var campoFiltro = document.querySelector("#filtrar-tabela-prof");
//o input verifica o que foi digitado
campoFiltro.addEventListener("input",function(){
	console.log(this.value);
	//aqui pega o tr
	var pacientes = document.querySelectorAll(".prof");
	
	if(this.value.length > 0){
		for(var i =0;i<pacientes.length;i++){
			var paciente = pacientes[i];
			//buscando dentro do td o nome
			var tdNome = paciente.querySelector(".info-nome-prof");
			var nome = tdNome.textContent;  
			//RegExp expresão regular que busca, usando o i informa que pode ser maiscula ou minuscula
			var expressao = new RegExp(this.value,"i");
			if( !expressao.test(nome)){
				//adiciona a class invisivel
				paciente.classList.add("invisivel");
			}else{
				//remove a class invisivel
				paciente.classList.remove("invisivel");
			}
		}
	}else{
		for(var i = 0;i < pacientes.length;i++){
			var paciente = pacientes[i];
			paciente.classList.remove("invisivel");
		}
	}
	
});
	</script>

<script>


//pegando valor de um campo de texto
var campoFiltro = document.querySelector("#filtrar-tabela-adm");
//o input verifica o que foi digitado
campoFiltro.addEventListener("input",function(){
	console.log(this.value);
	//aqui pega o tr
	var pacientes = document.querySelectorAll(".adm");
	
	if(this.value.length > 0){
		for(var i =0;i<pacientes.length;i++){
			var paciente = pacientes[i];
			//buscando dentro do td o nome
			var tdNome = paciente.querySelector(".info-nome-adm");
			var nome = tdNome.textContent;  
			//RegExp expresão regular que busca, usando o i informa que pode ser maiscula ou minuscula
			var expressao = new RegExp(this.value,"i");
			if( !expressao.test(nome)){
				//adiciona a class invisivel
				paciente.classList.add("invisivel");
			}else{
				//remove a class invisivel
				paciente.classList.remove("invisivel");
			}
		}
	}else{
		for(var i = 0;i < pacientes.length;i++){
			var paciente = pacientes[i];
			paciente.classList.remove("invisivel");
		}
	}
	
});
	</script>


	<?php
}
	?>
  </body>
</html>