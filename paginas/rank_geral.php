<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Rank Geral</title>
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
$resultado = mysqli_query($conn,"SELECT * FROM aluno where email = '$email' and senha = '$senha'") ;
$aluno = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
    <?php
		  $posicao = 1;
		  $codigo_tema = $_GET['codigo_tema'];
		$resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' ") ;
    $redacao = mysqli_fetch_assoc($resultado);
    $buscaTema = mysqli_query($conn,"SELECT * FROM temas_redacao where id='$codigo_tema' ") ;
		$tema = mysqli_fetch_assoc($buscaTema);
			?>
  <div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
          <h1><a href="rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn" style="background-color:green;border-color:green;color:#FFF;">Voltar</button></a> Rank <img src="../img/icone/medalha_rank.png" width="40px" height="40px"></h1>     
     
        </div>
      </div>
	  <div class="clearfix"></div>
	  <center>
        <div class="col-md-8" align="center">
		 
          <div class="tile">
            <h3 class="tile-title">Rank Tema: <?php echo $tema['nome_tema']?></h3>
            <div class="table-responsive">
              <table class="table" id="tabela">
                <thead>
                  <tr>
				   <th>Posição</th>
                    <th>Foto</th>
					<th>Nome</th>
                    <th>Turma<th>
                  </tr>
                </thead>
                <tbody>
				   <?php
         
          $buscarank = mysqli_query($conn,"SELECT * FROM rank where codigo_tema = '$codigo_tema'") ;
          $rank = mysqli_fetch_assoc($buscarank);

					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Nenhum redação com esse tema</h2>
					<?php
						}else{
						

					?> 
  <!--####################################################################################################################################################################################-->

            
          <?php
              $buscaRedacoes = mysqli_query($conn,"select * from redacao where codigo_tema = '".$rank['codigo_tema']."'");
              $buscaRedaçõesTurma = mysqli_query($conn,"select * from redacao where codigo_tema = '".$rank['codigo_tema']."' and codigo_turma = '".$aluno['codigo_turma']."'");

          ?>
  <center><h4><b style="color:blue;">CLASSIFICAÇÃO GERAL<br> </b></h4></center><br>
<a href="rank.php?codigo_tema=<?php echo $tema['id']?>"><button class="btn" style="background-color:#EE7600;color:#FFF;border-color:#EE7600;">Ver na classificação da minha turma</button></a><br><br><br>
          <?php
            while( $pegarank = mysqli_fetch_assoc($buscaRedacoes)){
            $buscaTurma = mysqli_query($conn,"select * from turma where id = '".$pegarank['codigo_turma']."'");
            $pegaTurma = mysqli_fetch_assoc($buscaTurma);

          ?>
             <tr>
            <td style="font-size:18px;font-weight:bold;"><?php echo $posicao?>°</td>
            <td><img src="<?php echo $pegarank['foto_aluno']?>" style="border-radius:100%;width:50px;height:50px;cursor:pointer;" data-toggle="modal" data-target="#<?php echo $pegarank['codigo_aluno']?>"></td>
              <td><?php echo $pegarank['nome_aluno']?></td>
              
                <td><?php echo $pegaTurma['nome_turma']?> - <?php echo $pegaTurma['escola_turma']?></td>

             </tr>
             <?php $posicao++; ?>
                <?php
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
		
<!---#########################################=FIM=##############################################################-->
	  <footer>
	<strong align="center"> Gomess Productions | Criador por: Gabriel Gomes</strong>
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>

	<?php
}
	?>
  </body>
</html>