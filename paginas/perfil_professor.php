<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Perfil Professor</title>
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
    <header class="app-header"><a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" >Minha Redação</strong></a>
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
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

      <div class="app-sidebar__user"><img src="<?php echo $row['foto']?>" style="cursor:pointer;" title="<?php echo $row['nome']?>"  class="app-sidebar__user-avatar" width="70px" height="70px" >
        <div>
	
		<?php
			$nomeUsuario = $row['nome'];
			list($nome) = explode(' ',$nomeUsuario);
		?>
		<?php 
			if(count($nomeUsuario)<1){ 
		?> 
			<p class="app-sidebar__user-name"><?php echo $nome?></p>

		<?php
		}else{
		?>
		<p class="app-sidebar__user-name"><?php echo $nome?></p>
			<?php
			}
			?>
          
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
						while($mensagem = mysqli_fetch_assoc($sql)){
						$privada = mysqli_query($conn,"select para = '".$pega_usuario['email']."' from ler where codigo_aluno ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$publica = mysqli_query($conn,"select * from ler where codigo_aluno ='".$pega_usuario['id']."' and codigo_mensagem = '".$mensagem['id']."'");
						$pega_publico = mysqli_num_rows($publica);
						$pega_privada = mysqli_num_rows($privada);
						$visto = $mensagem['destinatario'];
					
}					
                     if(($pega_publico == 0 and $visto == 'Todos') or ($pega_privada == 0 and $visto == $pega_usuario['email'])){
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens</span> <i><img src="../img/icone/menu/sino_mensagem.png" width="26px" height="26px"></i></a> </li>
						<?php
					 }else{
						?>
						<li><a class="app-menu__item" style="cursor:pointer;color:#FFF;" onclick="openCity(event, 'mensagens')" id="defaultOpen"><i><img src="../img/icone/menu/mensagem.png" width="26px" height="26px"></i> <span class="app-menu__label">Mensagens</span></a>  </li>

						<?php
						}
						?>
	   
		<li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'temas')" ><i ><img src="../img/icone/menu/folha.png"></i><span class="app-menu__label">Temas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
		</li>
		<li ><a class="app-menu__item "  style="cursor:pointer;color:#FFF;"onclick="openCity(event, 'turma')" ><i ><img src="../img/icone/menu/turma.png" width="32px" height="32px"></i><span class="app-menu__label">Turmas</span><i class="treeview-indicator fa fa-angle-right"></i></a> 
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
					$resultado = mysqli_query($conn,"SELECT * FROM mensagem ORDER BY id DESC ") ;
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Você não tem mensagens</h2>
					<?php
						}else{
						while($mensagem = mysqli_fetch_assoc($resultado)){	
					?> 
					<?php
						if($mensagem['destinatario'] == 'Todos'){
					?>
                  <tr>
                <td><?php echo $mensagem['remetente']?></td>
                    <td><?php echo $mensagem['titulo']?></td>
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($mensagem['data_envio'])); ?></td>
                    <?php
						$sql = mysqli_query($conn,"select * from ler where codigo_aluno='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						?>
						<td><a href="../php/professor_envia_visualizacao.php?codigo_aluno=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=Todos&email_usuario=<?php echo $row['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="professor_ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}
						?>
						
						<?php
						$sql = mysqli_query($conn,"select * from ler where codigo_aluno='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
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
						$sql = mysqli_query($conn,"select * from ler where codigo_aluno='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
						if($status = mysqli_num_rows($sql) == 0){
						?>
						<td><a href="../php/professor_envia_visualizacao.php?codigo_aluno=<?php echo $pega_usuario['id']?>&codigo_mensagem=<?php echo $mensagem['id']?>&para=<?php echo $mensagem['destinatario']?>&para=<?php echo $row['email']?>&email_usuario=<?php echo $row['email']?>"><button class="btn btn-danger" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}else{
						?>
						<td><a href="professor_ver_mensagem.php?codigo_mensagem=<?php echo $mensagem['id']?>"><button class="btn btn-success" type="button">Abrir mensagem  <img src="../img/icone/icone_mensagem.png" width="16px" height="16px"></button></a></td>
						<?php
						}
						?>
						
						<?php
						$sql = mysqli_query($conn,"select * from ler where codigo_aluno='".$pega_usuario['id']."' and codigo_mensagem='".$mensagem['id']."'");
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
          <main class="app-content">

      <div class="row user">
        
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/128.jpg">
              <h4>John Doe</h4>
              <p>FrontEnd Developer</p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Timeline</a></li>
              <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Settings</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>
              </div>
              <div class="timeline-post">
                <div class="post-media"><a href="#"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"></a>
                  <div class="content">
                    <h5><a href="#">John Doe</a></h5>
                    <p class="text-muted"><small>2 January at 9:30</small></p>
                  </div>
                </div>
                <div class="post-content">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,	quis tion ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
                <ul class="post-utility">
                  <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                  <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                  <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                </ul>
              </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Settings</h4>
                <form>
                  <div class="row mb-4">
                    <div class="col-md-4">
                      <label>First Name</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="col-md-4">
                      <label>Last Name</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Mobile No</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Office Phone</label>
                      <input class="form-control" type="text">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-8 mb-4">
                      <label>Home Phone</label>
                      <input class="form-control" type="text">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i> Save</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
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