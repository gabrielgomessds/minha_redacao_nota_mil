<!DOCTYPE html>
<html lang="en">

<head>
	<title>Minha Redação - Rascunho</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
	<!-- Main CSS-->
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<link rel="stylesheet" type="text/css" href="../css/style-pages.css">
	<style>
		.app-content {
			margin-left: 0;
		}

		/*  body{

cursor: url('../img/icone/canetaa.cur'), default;

} */
		textarea.notebook {
			font-family: 'Open Sans', Arial, Helvetica, sans-serif;
			width: 70%;
			padding: 5px 0px;
			margin-bottom: 20px;
			resize: vertical;
			font-size: 13px;
			line-height: 30px;
			border-bottom: 2px solid;
			-webkit-appearance: none;
			border-radius: 0;
			background: url(notebook.png);
			height: 900px;
			resize: none;
		}

		textarea.notebook:focus {
			box-shadow: 0 0 0 0;
			outline: 0;
		}

		.motivacional-texto {
			background-color: #FFF;
			width: 860px;
			text-align: left;
		}

		@media screen and (max-width: 850px) {
			textarea.notebook {
				width: 105%;
				overflow: scroll;
				padding: 5px 0px;
			}

			.motivacional-texto {
				width: 440px;
				text-align: left;
			}

		}
	</style>
	<script type="text/javascript" language="javascript">
		function Mudarestado(el) {
			var display = document.getElementById(el).style.display;
			if (display == "none") {
				document.getElementById(el).style.display = 'block';
				document.getElementById('esconde').style.display = 'block'
			} else {
				document.getElementById(el).style.display = 'none';
			}
		}
	</script>
</head>
<?php
session_start();
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
?>
<?php
include '../php/conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$resultado = mysqli_query($conn, "SELECT * FROM aluno where email = '$email' and senha = '$senha'");
$aluno = mysqli_fetch_assoc($resultado);
if ($resultado) {
?>

	<body class="app sidebar-mini rtl">
		<!-- Navbar-->
		<header class="app-header"><strong class="app-header__logo">Minha Redação</strong>
			<!-- Navbar Right Menu-->
		</header>
		<!-- Sidebar menu-->
		<main class="app-content">
			<div class="app-title">
				<h1><a href="aluno.php">
						<button class="btn btn-success" type="button">
							Voltar</button></a> Rascunho <img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>
			</div>
			<?php
			$codigo_rascunho = $_GET['codigo_rascunho'];
			include '../php/conexao.php';
			$sql = mysqli_query($conn, "select * from rascunho where id='$codigo_rascunho' and codigo_aluno = '" . $aluno['id'] . "'");
			$row = mysqli_fetch_assoc($sql);
			if (mysqli_num_rows($sql) > 0) {
			?>
				<center>
				<?php
					$busca_redacao = mysqli_query($conn, "SELECT * FROM redacao where codigo_aluno = '" . $aluno['id'] . "' and tema='" . $row['tema_redacao'] . "'");
					$redacao = mysqli_fetch_assoc($busca_redacao);
					if (mysqli_num_rows($busca_redacao) > 0) {
					?>
						
						
						<div class="alert alert-warning" role="alert" style="width:60%;background:#F0E68C">
					<img src="../img/icone/icone_atencao_2.png"><br>
						<p style="font-size:20px;"><b>Você já fez uma redação com esse tema, confira clicando aqui -> <a href="ver_redacao.php?id=<?php echo $redacao['id']?>">Redação</a></b></p>
						</div>
						<br><br>
					<?php } else { ?>
						<b style="color:#8B0000;"></b>
					<?php } ?>

					<h3>Tema: <?php echo $row['tema_redacao'] ?></h3><br>
					


					<button align="center" type="button" class="btn btn-info" onclick="Mudarestado('minhaDiv')">Mostrar Texto Motivacional</button>
					<br><br>
					<div id="minhaDiv" style="display:none;" align="center">
						<p align="center"><b style="text-decoration:underline;">Texto motivacional:</b>

							<?php
							$codigo_rascunho = $_GET['codigo_rascunho'];
							include '../php/conexao.php';
							$busca = mysqli_query($conn, "select * from rascunho where id='$codigo_rascunho'");
							$codigo = mysqli_fetch_assoc($busca);
							$buscaTema = mysqli_query($conn, "select * from temas_redacao where id='" . $codigo['codigo_tema'] . "'");
							if (mysqli_num_rows($buscaTema) > 0) {
								$texto = mysqli_fetch_assoc($buscaTema);
							?>
								<div class="motivacional-texto">
									<p><?php echo $texto['texto_motivacional'] ?></p>
								</div>
							<?php
							} else {
							?>
								<p style="color:red;font-weight:bold;">Esse tema não possui texto motivacional</p><br>

							<?php
							}
							?>
							<button type="button" class="btn btn-info" id="esconde" style="display:none;" align="center" onClick="document.getElementById('minhaDiv').style.display = 'none'">Não Mostrar Texto</button>
							<br><br>
					</div>

					<form method="post" name="form">
						<input type="text" name="codigo_tema" value="<?php echo $row['codigo_tema']; ?>" style="display:none;">
						<input type="text" name="tema" value="<?php echo $codigo['tema_redacao']; ?>" style="display:none;">
						<?php
						$sql = mysqli_query($conn, "select * from aluno where id = '" . $aluno['id'] . "'");
						while ($linha = mysqli_fetch_assoc($sql)) {
						?>
							<input type="text" name="nome_aluno" value="<?php echo $aluno['nome'] ?>" style="display:none;">
							<input type="text" name="email_aluno" value="<?php echo $aluno['email'] ?>" style="display:none;">
							<input type="text" name="codigo_aluno" value="<?php echo $aluno['id']; ?>" style="display:none;">
							<input type="text" name="codigo_turma" value="<?php echo $aluno['codigo_turma']; ?>" style="display:none;">
							<input type="text" name="foto_aluno" value="<?php echo $aluno['foto'] ?>" style="display:none;"><input type="text" name="codigo_aluno" value="<?php echo $linha['id'] ?>" style="display:none;">
							<input type="text" style="display:none;" name="data_modificacao" value="<?php date_default_timezone_set('America/Fortaleza');
																									echo date('y-m-d H:i:s'); ?>">
							<input type="text" style="display:none;" name="data_envio" value="<?php date_default_timezone_set('America/Fortaleza');
																								echo date('y-m-d H:i:s'); ?>">

						<?php
						}
						?>
						<?php
						$codigo_rascunho = $_GET['codigo_rascunho'];
						$query = mysqli_query($conn, "select * from rascunho where id='$codigo_rascunho' and codigo_aluno='" . $aluno['id'] . "'");
						if (mysqli_num_rows($query) > 0) {
							$row = mysqli_fetch_assoc($query);
							$pegaTema = mysqli_query($conn, "select * from temas_redacao where id='" . $row['codigo_tema'] . "'") or die(mysqli_error($conn));
							$tema = mysqli_fetch_assoc($pegaTema);
							$dataFuturo = $tema['vencimento'];
							$dataAtual = date("Y/m/d");
							$date_time  = new DateTime($dataAtual);
							$diff  = $date_time->diff(new DateTime($dataFuturo));
							$date = DateTime::createFromFormat('Y-m-d', $tema['vencimento']);

							$dt_atual		= date("Y-m-d"); // data atual
							$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix

							$dt_expira		= $tema['vencimento']; // data de expiração do anúncio
							$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix


							if ($tema['maximo_redacao'] == 'uma') {
								$verRedacao = mysqli_query($conn, "SELECT * FROM redacao where codigo_tema='" . $tema['id'] . "' and codigo_aluno = '".$aluno['id']."'");
								$contaRedacao = mysqli_num_rows($verRedacao);
							} else {
								$contaRedacao = 0;
							}

							if($timestamp_dt_atual > $timestamp_dt_expira or $contaRedacao >= 1){
						?>
								<textarea class="notebook" name="redacao" rows="40" cols="100"><?php echo $row['rascunho'] ?></textarea>
							<br>
							<button class="btn btn-success" onclick="GuardaRascunho();" name="envia_rascunho" >Modificar Rascunho</button> <button class="btn btn-success" name="envia_redacao" onclick="GuardaRedacao();" disabled title="Você não pode mais enviar está redação.">Enviar  Redação</button><br><br>
							<div class="alert alert-danger" role="alert" style="font-size:18px;width:70%;">O botão de enviar encontra-se bloqueado porquê esse tema permite o envio de apenas um redação e você já enviou ou o prazo para enviar a redação com esse tema acabou</div>
							<?php
							}else{
							if ($texto['maximo_redacao'] == 'uma') {

							?>
								<div class="alert alert-danger" role="alert" style="width:80%;background-color:#F08080;">
					<img src="../img/icone/icone_atencao.png"><br>
					  <h3 class="alert-heading">ATENÇÃO ALUNO</h3>
					  <hr>
					  <p class="p_danger"><b>Você só pode enviar uma redação com esse tema,por isso, aconselhamos que antes de enviar verifique se está tudo correto.<br>
					Você ainda pode salvar como rascunho para depois alterar e enviar.</b>
					</p>  					
					</div>
					<br>
								<textarea class="notebook" name="redacao" rows="40" cols="100"><?php echo $row['rascunho'] ?></textarea><br>
								<button class="btn btn-success" onclick="GuardaRascunho();" name="envia_rascunho">Modificar Rascunho</button> <button class="btn btn-success" name="envia_redacao" onclick="GuardaRedacao();">Enviar Redação</button>

							<?php
							} else {

							?>
								<textarea class="notebook" name="redacao" rows="40" cols="100"><?php echo $row['rascunho'] ?></textarea><br>
								<button class="btn btn-success" onclick="GuardaRascunho();" name="envia_rascunho">Modificar Rascunho</button> <button class="btn btn-success" name="envia_redacao" onclick="GuardaRedacao();">Enviar Redação</button>

						<?php
							}}}
						
						?>
						<br>
					</form>
					<script language="javascript">
						function GuardaRascunho() {
							document.form.action = "../php/modifica_rascunho.php?id=<?php echo $row['id'] ?>";
						}

						function GuardaRedacao() {
							document.form.action = "../php/envia_redacao.php";
						}
					</script>
				</center>
			<?php
			} else {
			?>
				<center>

					<img src="../img/icone/area_restrita.png">
					<h1 style="color:red;font-weight:bold;">Você não tem acesso a este rascunho</h1>

				</center>
			<?php
			}
			?>
			<footer>
				<strong align="center"> Gomess Productions | Todos os direitos reservados</strong>
			</footer>
		</main>

		<!-- Essential javascripts for application to work-->
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/popper.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/main.js"></script>
		<script type="text/javascript" src="js/plugins/chart.js"></script>
	</body>
<?php
}
?>

</html>