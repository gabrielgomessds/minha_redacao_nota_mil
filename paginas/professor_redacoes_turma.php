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
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>


	<!---##########################################=INICIO=#############################################################-->
  <main class="app-content">
		<div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
        <?php
          $codigo_turma = $_GET['codigo_turma'];
          
        ?>
        <h1><a href="professor_ver_turma.php?codigo_turma=<?php echo $codigo_turma;?>">
		  <button class="btn btn-success" type="button">Voltar</button></a>  Redações da Turma <img src="../img/icone/menu/titulo/redacao.png" width="30px" height="30px"></h1>     
              
        </div>
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		  <?php
      $codigo_tema = $_GET['codigo_tema'];
      $codigo_turma = $_GET['codigo_turma'];
    $resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' and codigo_turma = '$codigo_turma'") ;
   
    $busca_tema = mysqli_query($conn,"SELECT * FROM correcao where codigo_tema='$codigo_tema' and codigo_turma = '$codigo_turma'") ;
    $busca_sem_corrigir = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' and codigo_turma = '$codigo_turma' and nota = 0 or nota is null ") ;
    $conta_correcao = mysqli_num_rows($busca_tema);
    $conta_redacao = mysqli_num_rows($resultado);
    $redacao_sem_corrigir = mysqli_num_rows($busca_sem_corrigir);

    $redacao = mysqli_fetch_assoc($resultado);
    
    $pesq = mysqli_query($conn,"SELECT * FROM temas_redacao where id='$codigo_tema' ") ;
    $nome_tema = mysqli_fetch_assoc($pesq);

    $busca_turma = mysqli_query($conn,"select * from turma where id = '$codigo_turma' and codigo_professor='".$row['id']."'");
    $pega_turma = mysqli_fetch_assoc($busca_turma);
    if(mysqli_num_rows($busca_turma)>=1){
			?>


      
          <div class="tile">
         <center> <h3 class="tile-title">Redações do tema: <?php echo $nome_tema['nome_tema']?></h3>
         <h3 class="tile-title">Turma: <?php echo $pega_turma['nome_turma']?> - <?php echo$pega_turma['escola_turma']?></h3>
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
           <th>Deletar Redação</th>
                  </tr>
                </thead>
                <tbody>
				   <?php
					$busca = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' and codigo_turma = '$codigo_turma' order by nota desc ") ;
					if(mysqli_num_rows($busca) == 0){
					?>
						<h2 align="center" style="color:red;">Esse tema ainda não tem redações</h2>
					<?php
						}else{
						while($row = mysqli_fetch_assoc($busca)){	
              $busca_aluno = mysqli_query($conn,"SELECT * FROM aluno where id = '".$row['codigo_aluno']."'") ;
              $aluno = mysqli_fetch_assoc($busca_aluno);
              $busca_turma = mysqli_query($conn,"SELECT * FROM turma where id = '".$aluno['codigo_turma']."'") ;
              $turma = mysqli_fetch_assoc($busca_turma);
					?> 
                  <tr>
                    <td><img src="<?php echo $row['foto_aluno']?>" style="border-radius:100%;width:50px;height:50px;cursor:pointer;" data-toggle="modal" data-target="#mostra_aluno_<?php echo $row['codigo_aluno']?>"></td>
					<td><b style="font-size:15px;"><?php echo $row['nome_aluno']?></b></td>
					<td><?php if($row['nota']>0){?>	
					<?php 
						if($row['nota']<=1000 and $row['nota']>=700){echo'<b style="color:green">'.$row['nota'].',00'.' </b> ';}  
						if($row['nota']<700 and $row['nota']>=400){echo'<b style="color:#DAA520">'.$row['nota'].',00'.' </b> ';}
						if($row['nota']<400 and $row['nota']>=0){echo'<b style="color:red">'.$row['nota'].',00'.' </b> ';}
					?>
					
					<?php }else{?>
					<b style="color:red;font-style:italic;">Sem nota</b>

					<?php }?></td>
            <td><a href="professor_ver_redacao_turma.php?codigo_redacao=<?php echo $row['id']?>"><button class="btn btn-success" type="button">Abrir <img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a></td>
            <?php
            $busca_redacao = mysqli_query($conn,"select * from correcao where codigo_redacao = '".$row['id']."'") or die(mysqli_error($conn));
            if(mysqli_num_rows($busca_redacao) > 0){
            ?>

					<td><a href="professor_ver_correcao_turma.php?codigo_correcao=<?php echo $row['id']?>"><button class="btn btn-info" type="button">Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>
            <?php
            }else{
            ?>
          	<td><a href="professor_ver_correcao_turma.php?codigo_correcao=<?php echo $row['id']?>"><button class="btn btn-info" type="button" title="Essa redação ainda não possui correção" disabled>Ver <img src="../img/icone/menu/olho.png" width="16px" height="16px"></button></a></td>

            <?php
            }
            ?>
        	<td><b><?php echo date("d/m/Y \à\s H:i:s", strtotime($row['data_envio'])); ?></b></td>
				 <td><button class="btn" style="color:#FFF;background-color:red;" data-toggle="modal" data-target="#exclui_aluno_<?php echo $row['id'];?>" >Deletar Redação <img src="../img/icone/lixo.png" width="16px" height="16px"></button></td>



            <!--Janela Modal que exclui o aluno-->
								<div class="modal fade" id="exclui_aluno_<?php echo $row['id'];?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h5>Tem certeza que deseja excluir está redação? Se você apagar a redação todos os dados dela como a correção, caso tenha, também serão apagados.</h5><br>
								</div>
								<div class="modal-body" align="center">
								<a href="../php/professor_exclui_redacao_turma.php?codigo_redacao=<?php echo $row['id'];?>&codigo_tema=<?php echo $row['codigo_tema'];?>&codigo_turma=<?php echo $redacao['codigo_turma']?>" ><button class="button-modal" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href=""><button class="button-modal" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


								</div>
								</div>
      
								</div>
                </div>
                

                  <!--Janela Modal que mostra o aluno-->
								<div class="modal fade" id="mostra_aluno_<?php echo $row['codigo_aluno'];?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
                  <br>
               
								<div class="modal-body" align="center">
                <p> <img src="<?php echo $aluno['foto']?>" width="300px" height="300px"></p>
                <center> <h5>Aluno: <?php echo $aluno['nome']?></h5>
                <h5>Turma: <?php echo $turma['nome_turma']?> - <?php echo $turma['escola_turma']?></h5>
              </center>
             <div class="modal-footer">
									<button type="button" class="btn btn-default" style="background-color:red;color:#FFF;" data-dismiss="modal">Fechar</button>
								</div>
              

								</div>
								</div>
      
								</div>
								</div>
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
		<?php
				}else{
			?>
			<center>
			
			<img src="../img/icone/area_restrita.png">
			<h1 style="color:red;font-weight:bold;">Você não tem acesso as redações dessa turma</h1>
			
			</center>
			<?php
				}
			?>
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