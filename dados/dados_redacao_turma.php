<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Dados da Redação</title>
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
  .dados{
      display:none;
  }
    </style>
     <script type="text/javascript" src="chart.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
      var exelente = Number(document.getElementById("exelente").value);
      var bom = Number(document.getElementById("bom").value);
        var ruim = Number(document.getElementById("ruim").value);
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],
          ['Exelentes (700 - 1000)',  exelente],
          ['Bom (600 - 400)',  bom],
          ['Ruim (Abaixo de 400)',    ruim]
        ]);
        
        var options = {
  // .. outras opcoes
  colors: ['green', 'gold', 'red']
};
        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
     
      }
    </script>
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

  ?>
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	<!---##########################################=INICIO=#############################################################-->
		<div class="tabcontent" id="redacao">
<div class="app-title">
      </div>
	  <div class="clearfix"></div>
        <div class="col-md-12">
		  <?php
          $codigo_tema = $_GET['codigo_tema'];
          $codigo_turma = $_GET['codigo_turma'];
		$resultado = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema='$codigo_tema' and codigo_turma = '$codigo_turma' order by nota desc") ;
		$redacao = mysqli_fetch_assoc($resultado);
			?>
          <div class="tile">
           <center> <h3 class="tile-title">Dados da redação: <?php echo $redacao['tema']?></h3></center>
           <div class="table-responsive">
         
            <center> <div id="piechart" style="width: 900px; height: 500px;"></div></center>
		
			  <?php
				$quant_exe = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' and codigo_turma = '$codigo_turma' and nota >= 700 and nota <= 1000 ");
				$quant_bom = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' and codigo_turma = '$codigo_turma' and nota < 700 and nota >= 400 ");
				$quant_ruim = mysqli_query($conn,"SELECT * FROM redacao where codigo_tema = '$codigo_tema' and codigo_turma = '$codigo_turma' and nota < 400");
				

				$conta_exe = mysqli_num_rows($quant_exe);
				$conta_bom = mysqli_num_rows($quant_bom);
				$conta_ruim = mysqli_num_rows($quant_ruim);
				$total = $conta_exe + $conta_bom + $conta_ruim;
				?>
				<input type="text" value="<?php echo $conta_exe;?>" id="exelente" class="dados" title="Exelente">
				<input type="text" value="<?php echo $conta_bom;?>" id="bom"  class="dados" title="Bom">
				<input type="text" value="<?php echo $conta_ruim;?>" id="ruim"  class="dados" title="Ruim">
                <input type="text" value="<?php echo $total;?>" id="total"  class="dados" title="Total">
                <br><br><br>
            </div>
          </div>
        </div>
		</div>
		
<!---#########################################=FIM=##############################################################-->
	  <footer>
    <strong align="center">&copy; Gomess Productions | Todos os direitos reservados</strong>
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
  </body>
</html>