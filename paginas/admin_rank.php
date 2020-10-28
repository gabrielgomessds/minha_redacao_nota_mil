<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Rank</title>
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
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="redacao">
<div class="app-title">
        <div>
       Redações. <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
     
        </div>
      </div>
	  <div class="clearfix"></div>
      <center>
        <div class="col-md-8" align="center">
		  <?php
		  $posicao = 1;
		  $codigo_tema = $_GET['codigo_tema'];
		$resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' ") ;
		$redacao = mysqli_fetch_assoc($resultado);
			?>
          <div class="tile">
            <h3 class="tile-title">Rank Tema: <?php echo $redacao['tema']?></h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
				  <th>Posição</th>
                    <th>Foto</th>
					<th>Nome</th>
					<th>Nota</th>
                  </tr>
                </thead>
                <tbody>
				   <?php
					$resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' order by nota desc") ;
					if(mysqli_num_rows($resultado) == 0){
					?>
						<h2 align="center" style="color:red;">Nenhum redação com esse tema</h2>
					<?php
						}else{
						while($row = mysqli_fetch_assoc($resultado)){	
					?> 
                  <tr>
		
				  					<?php
									 
if($posicao == 1){
?>
<td><img src="../img/icone/primeiro.png" width="40px" height="40px"></td> 
<?php
}
?>
<?php
if($posicao == 2){
?>
<td><img src="../img/icone/segundo.png" width="40px" height="40px"></td> 
<?php
}
?>
<?php
if($posicao == 3){
?>
<td><img src="../img/icone/terceiro.png" width="40px" height="40px"></td> 
<?php
}
?>
<?php
if($posicao != 1 and $posicao !=2 and $posicao !=3){
?>
<td style="font-size:18px;font-weight:bold;"><?php echo $posicao?>°</td>
<?php
}
?>
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
<?php $posicao++; ?>
				
					

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
		</center>
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