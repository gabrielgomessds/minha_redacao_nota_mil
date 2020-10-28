<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Tempos Acabando</title>
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
  </head>
  <body class="app sidebar-mini rtl">

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
		 
           
          </div>
        </div>
		</div>
		
<!---#########################################=FIM=##############################################################-->
	  <footer>
	<strong align="center">&copy; Gomess Productions | Todos os direitos reservados</strong>
	</footer>
    </main>

 
  </body>
</html>