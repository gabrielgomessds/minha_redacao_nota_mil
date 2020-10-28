<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Redações da Turma</title>
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
.dados_redacao{
  margin-right:70px;
  font-size:20px;
}
.icone_redacao{
  width: 30px;
  height: 30px;
}
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
include '../php/conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
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
        <h1><a href="admin.php">
		  <button class="btn btn-success" type="button">Voltar</button></a> Redações <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
              
        </div>
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		  <?php
      $codigo_tema = $_GET['codigo_tema'];
    $resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema'") ;
   
    $busca_tema = mysqli_query($conn,"SELECT * FROM correcao where codigo_tema='$codigo_tema' ") ;
    $busca_sem_corrigir = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' and nota is null ") ;
    $conta_correcao = mysqli_num_rows($busca_tema);
    $conta_redacao = mysqli_num_rows($resultado);
    $redacao_sem_corrigir = mysqli_num_rows($busca_sem_corrigir);

    $redacao = mysqli_fetch_assoc($resultado);
    
    $pesq = mysqli_query($conn,"SELECT * FROM temas_redacao where id='$codigo_tema' ") ;
    $nome_tema = mysqli_fetch_assoc($pesq);

			?>


      
          <div class="tile">
         <center> <h3 class="tile-title">Redações do tema: <?php echo $nome_tema['nome_tema']?></h3>
         <a href="../dados/dados_redacao.php?codigo_tema=<?php echo $redacao['codigo_tema']?>"><button class="btn btn-info" style="background:orange;border-color:orange;" type="button">Estatisticas</button></a></center><br>
          
          <center>  <b style="color:blue;" class="dados_redacao"><img src="../img/icone/redacao_lista.png" class="icone_redacao">Total de Redações: <?php echo $conta_redacao?></b>   <b style="color:green;" class="dados_redacao"><img src="../img/icone/redacao_corrigida.png" class="icone_redacao"> Corrigidas: <?php echo $conta_correcao?></b>   <b style="color:red;" class="dados_redacao"><img src="../img/icone/redacao_n_corrigida.png" class="icone_redacao"> Faltam corrigir: <?php echo $redacao_sem_corrigir?></b> </center><br><br>
           
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Foto</th>
					<th>Nome</th>
                    <th>Nota</th>
                    <th>Redação</th>
					 <th>Correção</th>
					 <th>Data de Envio</th>
                  </tr>
                </thead>
                <tbody>
				   <?php
					$busca = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' order by nota desc ") ;
					if(mysqli_num_rows($busca) == 0){
					?>
						<h2 align="center" style="color:red;">Nenhum redação com esse tema</h2>
					<?php
						}else{
						while($row = mysqli_fetch_assoc($busca)){	
              $busca_aluno = mysqli_query($conn,"SELECT * FROM aluno where id = '".$row['codigo_aluno']."'") ;
              $aluno = mysqli_fetch_assoc($busca_aluno);
              $busca_turma = mysqli_query($conn,"SELECT * FROM turma where id = '".$aluno['codigo_turma']."'") ;
              $turma = mysqli_fetch_assoc($busca_turma);
					?> 
                  <tr>
                    <td><img src="<?php echo $row['foto_aluno']?>" style="border-radius:100%;width:50px;height:50px;cursor:pointer;" data-toggle="modal" data-target="#<?php echo $row['codigo_aluno']?>"></td>
					<td><?php echo $row['nome_aluno']?></td>
					<td><?php if($row['nota']>0){?>	
					<?php 
						if($row['nota']<=1000 and $row['nota']>=700){echo'<b style="color:green">'.$row['nota'].',00'.' </b> ';}  
						if($row['nota']<700 and $row['nota']>=400){echo'<b style="color:#DAA520">'.$row['nota'].',00'.' </b> ';}
						if($row['nota']<400 and $row['nota']>=0){echo'<b style="color:red">'.$row['nota'].',00'.' </b> ';}
					?>
					
					<?php }else{?>
					<b style="color:red;font-style:italic;">Sem nota</b>

					<?php }?></td>
                    <td><a href="admin_ver_redacao.php?codigo_tema=<?php echo $row['id']?>"><button class="btn btn-success" type="button">Abrir <img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a></td>
					

                    <?php
					$pega_correcao = mysqli_query($conn,"select * from correcao where codigo_redacao='".$row['id']."'");
					if(mysqli_num_rows($pega_correcao)== 0){
					?>
				    <td><a href="admin_ver_correcao.php?id=<?php echo $row['id']?>"><button class="btn btn-info" type="button" disabled>Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>
					<?php
					}else{
					?>
					<td><a href="admin_ver_correcao.php?id=<?php echo $row['id']?>"><button class="btn btn-info" type="button">Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>
					<?php
					}
					?>					
					<td><?php echo date("d/m/Y \à\s H:i:s", strtotime($row['data_envio'])); ?></td>
				 
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