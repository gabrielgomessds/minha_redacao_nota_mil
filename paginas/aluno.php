<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Aluno</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style-pages.css">
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<style>
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


/* body{

cursor: url('../img/icone/canetaa.cur'), default;

} */
	</style>
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
    <!-- Navbar-->
    <header class="app-header"><a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" ><img src="../img/icone/menu.png" class="img_menu"> Minha Redação</i></strong></a>
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
//require '../includes/tempo.php';
require '../includes/acesso_negado.php';
$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
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
			$busca = mysqli_query($conn,"select * from usuario where email = '".$row['email']."'");
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
					   $pegaCodigo = 0;
						while($mensagem = mysqli_fetch_assoc($sql)){
						$privada = mysqli_query($conn,"select para = '".$pega_usuario['email']."' from ler where codigo_usuario ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$publica = mysqli_query($conn,"select * from ler where codigo_usuario ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$buscaTurma = mysqli_query($conn,"select * from aluno where id = '".$row['id']."'");
						$pegaTurma = mysqli_fetch_assoc($buscaTurma);
						$buscaCodigo = mysqli_query($conn,"select * from turma where id = '".$pegaTurma['codigo_turma']."'");
						$pegaCodigo = mysqli_fetch_assoc($buscaCodigo);
						$pega_publico = mysqli_num_rows($publica);
						$pega_privada = mysqli_num_rows($privada);
						$visto = $mensagem['destinatario'];
					
}					

						$buscaMensagem = mysqli_query($conn,"select * from mensagem where destinatario = 'Alunos' or destinatario = '".$row['id']."' or destinatario = 'Todos'");
						$pegaMensagem = mysqli_fetch_assoc($buscaMensagem);
						$buscaLeitura = mysqli_query($conn,"select * from ler where email_usuario='".$row['email']."'");
						$contaMensagem = mysqli_num_rows($buscaMensagem);
						$contaLeitura = mysqli_num_rows($buscaLeitura);
						$calc = $contaMensagem - $contaLeitura;

                     if(($contaMensagem = mysqli_num_rows($sql)== 0)){
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens</span></a>  </li>
						<?php
					 }elseif(($pega_publico == 0 and $visto == 'Todos') or ($pega_publico == 0 and $visto == 'Alunos') or ($pega_publico == 0 and $visto == $pegaCodigo['codigo_acesso']) or ($pega_privada == 0 and $visto == $pega_usuario['email'])){
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens</span> <i><img src="../img/icone/menu/sino_mensagem.png" width="26px" height="26px"></i></a> </li>

						<?php
					 }else{
						?>
						<?php
								if($calc >= 1){
							?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens </span><?php 	echo '<div style="background:#dc3545;font-weight:bold;color:white;border-radius:100%;width:27px;height:23px;text-align:center;">'.' +'.$calc.'</div>'.'<br>';?></a>  </li>
							<?php

								}else{
							?>
							<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagem </span></a>  </li>
					

						<?php
						}}
						?>
						<li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'turma')" ><i ><img src="../img/icone/menu/turma.png" width="32px" height="32px"></i><span class="app-menu__label">Turma</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
        </li>
	   <li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'temas')" ><i ><img src="../img/icone/menu/folha.png"></i><span class="app-menu__label">Temas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
		</li>
		 <li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'rascunhos')" ><i ><img src="../img/icone/menu/rascunho.png" width="26px" height="26px"></i><span class="app-menu__label">Rascunhos</span><i class="treeview-indicator fa fa-angle-right"></i></a>  </li>
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'redacao')"><i><img src="../img/icone/menu/redacoes.png"></i><span class="app-menu__label">Redações</span></a></li>
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'dados')"><i ><img src="../img/icone/menu/editar.png"></i><span class="app-menu__label">Meus dados</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
        <li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'sugestoes')"><i><img src="../img/icone/menu/comentarios.png"></i><span class="app-menu__label"> Sugestões</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
		<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" href="../php/sair.php?email=<?php echo $row['email'];?>"><i><img src="../img/icone/menu/sair.png"></i><span class="app-menu__label">Sair</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        </li>
      </ul>
	  
	  
	  
    </aside>
	
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="home"> 
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/home.png" width="25px" height="25px"></i> Inicio</h1>
          <p>Vamos por a mão na massa.</p><b style="color:red;">use o menu a esquerda para navegar</b>
        </div>
	  </div>
	  <h2 align="center">Competências para uma boa redação</h2>
	  <br>
      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Competência 1</h3>
			<i>Demonstrar domínio da norma culta da língua escrita.</i>
			<p></p>
			<img src="../img/imagens/redacao.jpeg" width="300px" height="300px" >
             <p>Essa competência avalia os aspectos básicos da língua portuguesa, como a maneira correta de escrever as palavras, o emprego correto das expressões, etc. Nessa correção, o candidato recebe uma avaliação que sinaliza o conhecimento das regras básicas de português. 
			 É fundamental que o candidato conheça as diferenças entre a linguagem oral e escrita para se sair bem nessa avaliação.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Competência 2</h3>
			<i>Compreender a proposta da redação e aplicar conceitos das várias áreas de conhecimento para desenvolver o tema, dentro dos limites estruturais do texto dissertativo-argumentativo.</i>
			<p></p>
            <img src="../img/imagens/desenvolvimento.jpg" width="300px" height="300px" >
             <p>A descrição da competência 2 é grande, então vamos separar ela em duas partes principais. Primeiro, ela avalia a compreensão da proposta da redação do Enem, ou seja, ela verifica se o candidato conseguiu ser fiel ao tema. Ser fiel ao tema significa escrever sobre o assunto proposto sem perder o foco. Por exemplo, se o texto é sobre o desarmamento, o centro da sua redação não pode ser outra coisa senão o desarmamento. É comum que muitos candidatos fujam do tema e acabem falando mais sobre outros aspectos relacionados ao tema do que sobre o próprio tema em si. 
			 A capacidade de ser fiel ao tema é muito importante para uma boa redação, e é por isso que existe essa competência.</p>
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Competência 3</h3>
			<i>Selecionar, relacionar, organizar e interpretar informações, fatos, opiniões e argumentos em defesa de um ponto de vista.</i>
			<p></p>
            <img src="../img/imagens/img.png" width="350px" height="300px" >
             <p>Essa competência avalia de uma forma geral a organização do seu texto e a utilização correta das conjunções (mas, porém, pois, porque, etc.), que são os termos responsáveis por conectar as frases e uni-las de forma coerente. 
			 A maneira como você organiza e concatena as ideias também é fundamental para a correta interpretação do texto, por isso que essa competência é tão importante de ser verificada nos candidatos. Toda escrita precisa refletir corretamente o que pensamos, traduzindo nossos pensamentos de forma que o leitor consiga facilmente compreender nosso ponto de vista.</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Competência 4</h3>
			<i>Demonstrar conhecimento dos mecanismos linguísticos necessários para a construção da argumentação.</i>
			<p></p>
            <img src="../img/imagens/comp2.jpg" width="300px" height="300px" >
             <p>Ao se escrever uma redação, é preciso saber o momento certo de se terminar um parágrafo e de se começar outro, 
			 bem como o momento certo de se terminar uma frase e de se começar outra. Além disso, cada frase precisa estar inserida corretamente no contexto do seu respectivo parágrafo, para não prejudicar a lógica do texto e a linha de pensamento.</p>
          </div>
        </div>
      </div>
	  <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Competência 5</h3>
			<i>Elaborar proposta de solução para o problema abordado, mostrando respeito aos valores humanos e considerando a diversidade sociocultural.</i>
			<p></p>
            <img src="../img/imagens/comp4.jpg" width="300px" height="300px" >
             <p>Essa competência, antes de tudo, já deixa claro a importância de se considerar e valorizar as diferenças culturais e sociais. Isso significa que você não deve se restringir a uma cultura ou sociedade manifestando parcialidade que induza ao preconceito, à segregação ou ao menosprezo. 
			 Não pense em fazer uma redação para o Enem sem considerar a diversidade cultural e social.</p>
          </div>
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
					$resultado = mysqli_query($conn,"SELECT * FROM mensagem ORDER BY id DESC ") ;
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Você não tem mensagens</h2>
					<?php
						}else{
						while($mensagem = mysqli_fetch_assoc($resultado)){	
					
					?> 
					<?php
						if($mensagem['destinatario'] == 'Todos' or $mensagem['destinatario'] == $pegaCodigo['codigo_acesso'] or $mensagem['destinatario'] == 'Alunos'){
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
						<td><a href="../php/envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=Todos&email_usuario=<?php echo $pega_usuario['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}elseif($mensagem['destinatario'] == 'Alunos'){
							?>
						<td><a href="../php/envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=Alunos&email_usuario=<?php echo $pega_usuario['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="../php/envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=<?php echo $pegaCodigo['codigo_acesso']?>&email_usuario=<?php echo $pega_usuario['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}
						?>
						<?php
						}else{
						?>
						<td><a href="ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
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
						<td><a href="../php/envia_visualizacao.php?codigo_usuario=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=<?php echo $row['email']?>&email_usuario=<?php echo $pega_usuario['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem_fechada.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
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
		  <!---#########################################=TURMA=##############################################################-->
<div class="tabcontent" id="turma">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/turma.png" width="30px" height="30px"></i> Turma</h1>
         
        </div>
      </div>
	  <div class="clearfix"></div>
	  <div class="col-md-12">
          <div class="tile">
			  <?php 
				 $busca = mysqli_query($conn,"select * from turma where id='".$row['codigo_turma']."'"); 
				 if(mysqli_num_rows($busca) == 0){
				 ?>
				  <div class="form-group">
				  <form method="POST" action="../php/matricula_aluno.php">
				  <center><b style="font-size:18px;color:red;">Opa! Parece que você não está matriculado em nenhuma turma, digite um código de acesso para ser matriculado em uma!</b></center><br>
				  <label class="control-label">Codigo de Acesso:</label>
				  <input type="text" name="codigo_aluno" value="<?php echo $row['id']?>" style="display:none;"><br>
				  <input class="form-control" type="text" name="codigo_acesso" placeholder="Digite aqui um codigo de acesso"><br>
				  <input type="submit" class="btn btn-info"  value="Concluir Matricula" style="background-color:#228B22;border-color:#228B22;">				 </form>
				</div>
				 <?php
				 }else{
				 
				 $turma = mysqli_fetch_assoc($busca);
				 $buscaprof = mysqli_query($conn,"select * from professor where id = '".$turma['codigo_professor']."'");
				$professor = mysqli_fetch_assoc($buscaprof);
			 ?>
			 <center>
            <h2 class="tile-title">	<img src="<?php echo $turma['simbolo']?>" width="210px" height="180px" style="border-radius:100%;border:3px solid blue;"><br> <br>
			<?php echo $turma['nome_turma']?> - <?php echo $turma['escola_turma']?> <br><br>
			<b><h5>Professor da turma: <?php echo $professor['nome']?></h5></b><br>
			<button class="btn btn-success" style="background:#00008B;border-color:#00008B;" type="button" data-toggle="modal" data-target="#<?php echo $turma['id'];?>">Sair da turma</button></h2>
			<p></p>
			<p style="font-size:18px;text-decoration: underline;font-weight:bold;"><i>Descrição da turma: </i></p>
             <p style="font-size:18px;"><?php echo $turma['descricao']?></p>
			 </center>
		  <?php
				 } 
		  ?>
			</div>
        </div>
          </div>
        </div>
		</div>


		 <!--Janela Modal que exclui o aluno-->
		 <div class="modal fade" id="<?php echo $turma['id'];?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                 <p> <h4>Tem certeza que deseja sair da turma do <?php echo $turma['nome_turma']?>? Se fizer isso você não terá mais acesso aos conteúdos relacionados a essa turma.</h4></p><br>
				

								</div>
								<div class="modal-body" align="center">
								<a href="../php/aluno_sair_turma.php?codigo_aluno=<?php echo $row['id']?>"><button class="button-modal" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href=""><button class="button-modal" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


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
            <center><h3 class="tile-title">Temas propostos pelo seu professor </h3></center>
            <div class="table-responsive">
              <table class="table" >
			   
                <thead>
                  <tr>
                    <th>Tema</th>
                    <th>Fazer Redação</th>
                    <th>Rank do Tema</th>
					<th>Data de Entrega</th>
					<th>Tempo Restante</th>
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$busca = mysqli_query($conn,"select * from turma where id='".$row['codigo_turma']."'"); 
					 $turma = mysqli_fetch_assoc($busca);
					 if(mysqli_num_rows($busca) > 0){
					
					$busca_tema = mysqli_query($conn,"select * from temas_redacao where codigo_professor = '".$turma['codigo_professor']."'");
					while($pega_tema = mysqli_fetch_assoc($busca_tema)){
					$busca_tema_turma_especifica = mysqli_query($conn,"select * from temas_redacao where codigo_professor = '".$turma['codigo_professor']."' and codigo_turma = 'TurmasEspecificas'");
					$verifica = mysqli_num_rows($busca_tema_turma_especifica);

					if(mysqli_num_rows($busca_tema_turma_especifica) > 0){
					$resultado = mysqli_query($conn,"select DISTINCT * from turmas_selecionadas inner join temas_redacao
					 where temas_redacao.codigo_turma = '".$turma['id']."' 
					or temas_redacao.codigo_turma = 'TodasTurmas' 
					and temas_redacao.codigo_professor = '".$turma['codigo_professor']."' 
					or temas_redacao.codigo_turma = 'TurmasEspecificas' 
					and turmas_selecionadas.codigo_turma = '".$turma['id']."' 
					and turmas_selecionadas.situacao = 'checked' 
					and temas_redacao.id = turmas_selecionadas.codigo_tema 
					and turmas_selecionadas.codigo_professor = '".$turma['codigo_professor']."' 
					GROUP BY temas_redacao.id order by temas_redacao.id desc") ;
					
					}else{
						$resultado = mysqli_query($conn,"select * from temas_redacao where codigo_turma = '".$pega_tema['codigo_turma']."' or codigo_turma = 'TodasTurmas' and codigo_professor = '".$pega_tema['codigo_professor']."'");
						
					}
				}
					
					if(mysqli_num_rows($resultado) > 0){
					while($tema = mysqli_fetch_assoc($resultado)){
						//echo $tema['codigo_turma']." ".$v."<br>";
						$sql = mysqli_query($conn,"SELECT * FROM aluno where email='$email'") ;
						while($linha = mysqli_fetch_assoc($sql)){
				?>
                <tbody>
                  <tr>
                
                    <td><?php echo $tema['nome_tema']?></td>
                    <td>
					<?php
							
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $tema['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				// data atual é maior que a data de expiração
				
				if($tema['maximo_redacao'] == 'uma'){
					$verRedacao = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='".$tema['id']."' and codigo_aluno = '".$row['id']."'") ;
					$contaRedacao = mysqli_num_rows($verRedacao);
				}else{
					$contaRedacao = 0;
				}

				if ($timestamp_dt_atual > $timestamp_dt_expira ){
					?>
					<button class="btn btn-success" disabled title="Parece que o prazo da redação se encerrou" type="button">Fazer<img src="../img/icone/icone_escreve.png" width="16px" height="16px"></button>
					<?php
					}else if($contaRedacao >=1){
					?>
					<button class="btn btn-success" disabled title="Parece que você já mandou uma redação com esse tema" type="button">Fazer<img src="../img/icone/icone_escreve.png" width="16px" height="16px"></button>

					<?php
					}else{
					?>
					<a href="redacao.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-success" title="Clique aqui e comece a fazer sua redação" type="button">Fazer<img src="../img/icone/icone_escreve.png" width="16px" height="16px"></button></a>
					<?php
					}}
					?>

					</td></a>
					<?php
					$busca = mysqli_query($conn,"select * from rank where codigo_tema = '".$tema['id']."'");
					if(mysqli_num_rows($busca)>=1){
					?>
                    <td><a href="rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" type="button">Rank<img src="../img/icone/icone_rank.png" width="16px" height="16px"></button></a></td>
					<?php
					}else{
					?>
					<td><a href="rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn btn-info" disabled title="O professor ainda não enviou o rank deste tema" type="button">Rank<img src="../img/icone/icone_rank.png" width="16px" height="16px"></button></a></td>
					<?php
					}
					?>
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
				 </tr>
                </tbody>
				<?php
					}}else{
				?>
				<center><h2 style="color:red;">Sua turma ainda não tem temas disponíveis</h2></center>
				<?php
					}
				?>
				<?php
					 }else{
				?>
				<center><h2 style="color:red;">Parece que você não está cadastro em nenhuma turma!</h2>
				<p style="color:red;"><b>Para ter acesso aos temas vá no menu turmas e digite o código da sua turma</b></p></center>
				<?php
				}
				?>
              </table>
            </div>
          </div>
        </div>
</div>
<!---#########################################=RASCUNHO=##############################################################-->
<div class="tabcontent" id="rascunhos">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/rascunho.png" width="25px" height="25px"></i> Rascunhos</h1>
         
        </div>
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		  <?php
		$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
		$aluno = mysqli_fetch_assoc($resultado);
		if($resultado){
		$sql = mysqli_query($conn,"SELECT * FROM rascunho WHERE codigo_aluno= '".$aluno['id']."' order by id desc") ;
		$conta = mysqli_num_rows($sql);
			?>
          <div class="tile">
            <h3 class="tile-title">Meus Rascunhos/Total: <?php echo $conta?></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tema</th>
                    <th>Rascunho</th>
					  <th>Última modificação</th>
					
					
                  </tr>
                </thead>
                <tbody>
				   <?php
					$resultado = mysqli_query($conn,"SELECT * FROM rascunho where codigo_aluno = '".$aluno['id']."' order by id desc") ;
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Você não tem rascunhos</h2>
					<?php
						}else{
						while($row = mysqli_fetch_assoc($resultado)){	
					?> 
                  <tr>
                
                    <td><?php echo $row['tema_redacao']?></td>
                    <td><a href="rascunho.php?codigo_rascunho=<?php echo $row['id']?>"><button class="btn btn-success" type="button">Abrir <img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a></td>
						<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($row['data_modificacao'])); ?></td>
						<?php }?></td>
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
<!---#########################################=REDAÇÃO=##############################################################-->
<div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/redacao.png" width="25px" height="25px"></i> Redações</h1>
         
        </div>
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		  <?php
		$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
		$aluno = mysqli_fetch_assoc($resultado);
		if($resultado){
		$sql = mysqli_query($conn,"SELECT * FROM redacao WHERE codigo_aluno= '".$aluno['id']."' order by id desc") ;
		$redacao = mysqli_fetch_assoc($sql);
		$conta = mysqli_num_rows($sql);
			?>
          <div class="tile">
            <h3 class="tile-title">Minhas Redações/Total: <?php echo $conta?></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Tema</th>
                    <th>Nota</th>
                    <th>Redação</th>
					 <th>Correção</th>
					  <th>Data de Envio</th>
                  </tr>
                </thead>
                <tbody>
				   <?php
					$resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_aluno = '".$aluno['id']."' order by id desc") ;
					if(mysqli_num_rows($resultado) == 0){
						
					?>
						<h2 align="center" style="color:red;">Você não tem redações</h2>
					<?php
						}else{
						while($correcao = mysqli_fetch_assoc($resultado)){	
					?> 
                  <tr>
                    <td><?php echo $correcao['tema']?></td>
					<td><?php if($correcao['nota']>0){?>	
					<?php 
						if($correcao['nota']<=1000 and $correcao['nota']>=700){echo'<b style="color:green">'.$correcao['nota'].',00'.' </b> ';}  
						if($correcao['nota']<700 and $correcao['nota']>=400){echo'<b style="color:#DAA520">'.$correcao['nota'].',00'.' </b> ';}
						if($correcao['nota']<400 and $correcao['nota']>=0){echo'<b style="color:red">'.$correcao['nota'].',00'.' </b> ';}
					?>
					
					<?php }else{?>
					<b style="color:red;font-style:italic;">Sem nota</b>

					<?php }?></td>
                    <td><a href="ver_redacao.php?id=<?php echo $correcao['id']?>"><button class="btn btn-success" type="button">Abrir <img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a></td>
					<?php
					$busca = mysqli_query($conn,"select * from correcao where codigo_redacao='".$correcao['id']."'");
					if(mysqli_num_rows($busca)==0){
					?>
				    <td><a href="aluno_ver_correcao.php?codigo_correcao=<?php echo $correcao['id']?>"><button class="btn btn-info" type="button" disabled title="Essa redação ainda não possui correção">Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>
					<?php
					}else{
					?>
					<td><a href="aluno_ver_correcao.php?codigo_correcao=<?php echo $correcao['id']?>"><button class="btn btn-info" type="button">Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>
					<?php
					}
					?>
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($correcao['data_envio'])); ?></td>
				 </tr>
                </tbody>
				<?php
		}}}
				?>
              </table>
            </div>
          </div>
        </div>
		</div>

<!---#########################################=DADOS DO ALUNO=##############################################################-->
<div class="tabcontent" id="dados">
<div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/editar.png" width="25px" height="25px"></i> Meus dados</h1>
         
        </div>
      </div>
	  <?php

	include '../php/conexao.php';
	$dadosAlunos = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'")or die(mysqli_error($conn));
	$aluno = mysqli_fetch_assoc($dadosAlunos);
	$pegaTurmaAluno = mysqli_query($conn,"select * from turma where id = '".$aluno['codigo_turma']."'");
		?>
	    <div class="tile">
            <h3 class="tile-title">Seus dados</h3>
            <div class="tile-body">
              <form action="../php/alterar_aluno.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
				<input type="text" name="id" value="<?php echo $aluno['id']?>" style="display:none;">
                  <label class="control-label">Nome Completo:</label>
                  <input class="form-control" type="text" name="nome" value="<?php echo $aluno['nome']?>" placeholder="Nome">
                </div>
				 <div class="form-group" style="display:none;">
                  <label class="control-label">Email:</label>
                  <input class="form-control" type="email" name="email_aluno" value="<?php echo $aluno['email']?>" placeholder="Email">
                </div>
                <div class="form-group">
                  <label class="control-label">Email:</label>
                  <input class="form-control" type="email" name="email" value="<?php echo $aluno['email']?>" placeholder="Email">
                </div>
                
				<div class="form-group">
                  <label class="control-label">Senha: </label>
                  <input class="form-control" name="senha" type="password" value="<?php echo $aluno['senha']?>" placeholder="Senha">
				</div>
				<div class="form-group">
                  <label class="control-label">Sexo: </label>
				  <select class="select" name="sexo" required>
					  <?php
					 	if($aluno['sexo'] == 'Masculino'){
					  ?>
            			<option value="Masculino">Masculino</option>
            			<option value="Feminino">Feminino</option>
            			<option value="Outro">Outro</option>
            			<option value="Não quero informar">Não quero informar</option>
						<?php
						}else if($aluno['sexo'] == 'Feminino'){
						?>
						<option value="Feminino">Feminino</option>
						<option value="Masculino">Masculino</option>
            			<option value="Outro">Outro</option>
            			<option value="Não quero informar">Não quero informar</option>
						<?php
						}else if($aluno['sexo'] == 'Outro'){
							?>
							<option value="Outro">Outro</option>
							<option value="Feminino">Feminino</option>
							<option value="Masculino">Masculino</option>
							<option value="Não quero informar">Não quero informar</option>
						<?php
					       }else if($aluno['sexo'] == ''){
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
                  <label class="control-label">Turma: </label>
				  <?php
				 	if(mysqli_num_rows($pegaTurmaAluno) < 1 ){ 
				  ?>
				  		<input class="form-control" type="text" title="Para alterar a turma vá no menu e clique em turma" value="Você não está matriculado(a) em nenhuma turma" disabled>


						<?php
						
					 }else{
						?>
						<input class="form-control" type="text" title="Para alterar a turma vá no menu e clique em turma" value="<?php echo $turma['nome_turma']?> - <?php echo $turma['escola_turma']?>" disabled>

					<?php
					 }
					?>
				</div>
				<div class="form-group">
                  <label class="control-label">Foto de Perfil: </label>
                  <label class="labelInput" >
					<input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFile(event)"/>
					<span><img src="<?php echo $aluno['foto']?>" title="Escolha uma imagem" name="foto" id="output" style="width:240px;height:190px;cursor:pointer;" ></span>
					</label>
                </div>
          
            </div>
            <div class="tile-footer">
              <input class="btn btn-primary" type="submit" value="Salvar alterações">
          
			    </form>
				<a href="../php/aluno_retira_foto.php?email=<?php echo $aluno['email']?>"><button class="btn btn-sucess" style="background:#551A8B;color:#FFF;">Retirar foto de perfil</button></a>
				</div>
          </div>
		 
</div>
<!---#########################################=SUGESTOES=##############################################################-->
<div class="tabcontent" id="sugestoes">
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"><img src="../img/icone/menu/titulo/comentarios.png" width="25px" height="25px"></i>Sugestões</h1>
         
        </div>
      </div>
	  <?php
	  include '../php/conexao.php';
		$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
		$row = mysqli_fetch_assoc($resultado);
		if($resultado){
		$busca_escola = mysqli_query($conn,"SELECT * FROM turma where id = '".$row['codigo_turma']."' ") ;
		$pegaEscola = mysqli_fetch_assoc(	$busca_escola);
	  ?>
	    <div class="alert alert-primary alert-dismissible fade show" role="alert">
	  <p style="font-size:18px;"><strong><?php echo $nome;?></strong> nós queremos ouvir as suas dúvidas e sugestões. Fique à vontade para nos enviar
uma mensagem e em breve entraremos em contato com você.</p>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
	    <div class="tile">
            <h3 class="tile-title" align="center" style="font-weight:bold;">Tem alguma dúvida ou sugestão?</h3>
            <div class="tile-body">
              <div class="contato">  
  <form action="../php/envia_sugestao.php" class="form-contato" method="post" tabindex="1">  
       <input type="text" style="text-align:center;display:none;" class="campo-contato" name="codigo_aluno" value="<?php echo $row['id']?>"> 
          <input type="tipo" style="text-align:center;display:none;" name="tipo" value="Aluno">
	 <input type="text" style="text-align:center;display:none;"   class="campo-contato" name="nome_contato" value="<?php echo $row['nome']?>"> 
     <input type="text" style="text-align:center;display:none;"  class="campo-contato" name="escola_contato" value="<?php echo $pegaEscola['escola_turma']?>"> 	 
     <input type="email" style="text-align:center;display:none;" class="campo-contato" name="email_contato" value="<?php echo $row['email']?>">  
     <input type="text" style="text-align:center;display:none;" class="campo-contato" name="foto_contato" value="<?php echo $row['foto']?>">  
	 <input type="text" style="text-align:center;display:none;"  class="campo-contato" name="data_envio" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s');?>" /> 	 
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

    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
	 <script src="js/ajax.js"></script>
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