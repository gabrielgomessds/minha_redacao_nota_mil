<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Perfil da Turma</title>
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
  .button {
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
    <header class="app-header">
    <a href="#" data-toggle="sidebar" aria-label="Hide Sidebar"><strong class="app-header__logo" >Minha Redação</strong></a>
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
      <center>
	  <div class="clearfix"></div>
        <div class="col-md-10">
		  <?php
		  $codigo_turma = $_GET['codigo_turma'];
		$resultado = mysqli_query($conn,"SELECT * FROM turma where id='$codigo_turma'") ;
		$turma = mysqli_fetch_assoc($resultado);
			?>
          <div class="tile">
           <h3 ><img src="<?php echo $turma['simbolo']?>" width="80px" heigh="90px"><br>  <br> <?php echo $turma['nome_turma']?> - <?php echo $turma['escola_turma']?> | Criada: <?php echo date('d/m/y',strtotime($turma['data_criacao']))?></h3>
         
           <a onclick="muda('alterar')" class="app-menu"><button class="btn btn-info" style="background:green;border-color:green;" type="button">Alterar</button></a> 
          <a href="perfil_turma.php?codigo_turma=<?php echo $turma['id']?>" data-toggle="modal" data-target="#excluir"><button class="btn btn-info" style="background:red;border-color:red;"  type="button">Excluir Turma</button></a>
          <a onclick="muda('estatisticas')" ><button class="btn btn-info" style="background:orange;border-color:orange;" type="button">Estatísticas Gerais</button></a>
          <a onclick="muda('alunos')" ><button class="btn btn-info" style="background:#4682B4;border-color:#4682B4;" type="button">Alunos cadastrados na turma</button></a>
		   <a onclick="muda('temas')" ><button class="btn btn-info" style="background:#B03060;border-color:#B03060;" type="button">Temas propostos pela turma</button></a>

          <br><br>
  </center>
          
            </div>
          </div>
        </div>
		</div>
    <!---#########################################=ALTERAR DADOS DA TURMA=##############################################################-->
   <center>
    <div class="tabcontent" id="alterar" style="display:none;">
	  <?php

  include '../php/conexao.php';
  $codigo_turma = $_GET['codigo_turma'];
	$resultado = mysqli_query($conn,"SELECT * FROM turma where id = '$codigo_turma'") ;
	$turma = mysqli_fetch_assoc($resultado);
	if($resultado){
    ?>
    <div class="col-md-10">
	    <div class="tile">
            <h3 class="tile-title">Dados da turma</h3>
            <div class="tile-body">
              <form action="../php/alterar_professor.php" method="POST" enctype="multipart/form-data" style="text-align:left;">
                <div class="form-group">
				<input type="text" name="id" value="<?php echo $turma['id']?>" style="display:none;">
                  <label class="control-label">Nome: </label>
                  <input class="form-control" type="text" name="nome_turma" value="<?php echo $turma['nome_turma']?>" placeholder="Nome da Turma">
                </div>
                <div class="form-group">
                  <label class="control-label">Escola: </label>
                  <input class="form-control" type="text" name="escola_turma" value="<?php echo $turma['escola_turma']?>" placeholder="Escola Turma">
                </div>
                <div class="form-group">
                  <label class="control-label">Código Acesso: </label>
                  <input class="form-control" name="escola" type="text" value="<?php echo $turma['codigo_acesso']?>" placeholder="Código de Acesso">
                </div>
				<div class="form-group">
                  <label class="control-label">Descrição: </label>
                  <textarea class="campo-contato-mensagem" name="descricao" placeholder="Deixe sua mensagem aqui" ><?php echo $turma['descricao']?></textarea>  
                </div>
				<div class="form-group">
                  <label class="control-label">Foto: </label>
                  <label class="labelInput" >
					<input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFile(event)"/>
					<span><img src="<?php echo $turma['simbolo']?>" title="Escolha uma imagem" name="foto" id="output" style="width:240px;height:190px;cursor:pointer;" ></span>
					</label>
                </div>
          
            </div>
            <div class="tile-footer">
              <input class="btn btn-primary" type="submit" value="Alterar">
            </div>
			    </form>
          </div>
  </div>
  </div>
		  <?php 
			}
      ?>
      </center>
 <!---#########################################=MODAL EXCLUIR=##############################################################-->
      <div class="modal fade" id="excluir" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h3><b>Tem certeza que deseja excluir a turma do <?php echo $turma['nome_turma']?>?</b></h3>
								</div>
								<div class="modal-body" align="center">
                <a href="../index.html" ><button class="button" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href="perfil_turma.php?codigo_turma=<?php echo $turma['id']?>"><button class="button" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>

								</div>
								
								</div>
      
								</div>
                </div>
<!---#########################################=ESTATISTICAS=##############################################################-->
<center>
<div class="tabcontent" id="estatisticas" style="display:none;">
	  
	  <div class="clearfix"></div>
        <div class="col-md-10">
          <div class="tile">
            <center><h3 class="tile-title">Estatísticas da Turma<br><br></h3></center>
            <div class="table-responsive">
<table class="table" >
			   
         <thead>
           <tr>
            <th>Quant. Alunos</th>
             <th>Quant. Temas</th>
              <th>Redações Feitas</th>
           </tr>
         </thead>
         <?php
         $conta_alunos = mysqli_query($conn,"select COUNT(codigo_turma) from aluno where codigo_turma = '".$turma['id']."';");
         $quant_alunos = mysqli_fetch_assoc($conta_alunos);
         $conta_temas = mysqli_query($conn,"select COUNT(codigo_turma) from temas_redacao where codigo_turma = '".$turma['id']."';");
         $quant_temas = mysqli_fetch_assoc($conta_temas);
         $conta_redacoes = mysqli_query($conn,"select COUNT(codigo_turma) from redacao where codigo_turma = '".$turma['id']."';");
         $quant_redacoes = mysqli_fetch_assoc($conta_redacoes);
         ?>
         <tbody>
           <tr>
 
   <td><?php echo $quant_alunos['COUNT(codigo_turma)']?></td>
         
   <td><?php echo $quant_temas['COUNT(codigo_turma)']?></td>
   
   <td><?php echo $quant_redacoes['COUNT(codigo_turma)']?></td>

  </tr>
         </tbody>
 
 </table>

<div>
    </div>
            </div>
          </div>
    </div>	 
	
    <center>




            </div>
          </div>
	<div class="tabcontent" id="temas" style="diplay:none">
        <div class="col-md-10" >
          <div class="tile">
            <h3 class="tile-title">Temas propostos pelo professor </h3>
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
                  </tr>
                </thead>
				 <?php
					include '../php/conexao.php';
					$resultado = mysqli_query($conn,"select * from temas_redacao where codigo_turma = '".$turma['id']."'") ;
					if(mysqli_num_rows($resultado) > 0){
					while($row = mysqli_fetch_assoc($resultado)){
				?>
                <tbody>
                  <tr>
                
                    <td><?php echo $row['nome_tema']?></td>
                    <td>
					<?php
							
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $row['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				?>
					<a href="professor_redacoes_aluno.php?codigo_tema=<?php echo $row['id']?>"><button class="btn btn-success" type="button">Ver Redações<img src="../img/icone/menu/folha.png" width="16px" height="16px"></button></a>
					</td></a>
					<td><a href="professor_rank.php?codigo_tema=<?php echo $row['id']?>"><button class="btn btn-info" type="button">Rank<img src="../img/icone/icone_rank.png" width="16px" height="16px"></button></a></td>

					<td><a href="../dados/dados_redacao.php?codigo_tema=<?php echo $row['id']?>"><button class="btn btn-info" style="background:orange;border-color:orange;" type="button">Estatisticas</button></a></td>
					
					
					<td><?php $data = $row['vencimento']?>
					<?php echo date('d/m/y',strtotime($data))?>
					</td>
					<td style="color:green;font-style:italic;font-weight:bold;">
					<?php
					$dataFuturo = $row['vencimento'];
					$dataAtual = date("Y/m/d");
					$date_time  = new DateTime($dataAtual);
					$diff  = $date_time->diff( new DateTime($dataFuturo));
					$date = DateTime::createFromFormat('Y-m-d' , $row['vencimento']);					
					
				$dt_atual		= date("Y-m-d"); // data atual
				$timestamp_dt_atual 	= strtotime($dt_atual); // converte para timestamp Unix
 
				$dt_expira		= $row['vencimento']; // data de expiração do anúncio
				$timestamp_dt_expira	= strtotime($dt_expira); // converte para timestamp Unix
 
				// data atual é maior que a data de expiração
				if ($timestamp_dt_atual > $timestamp_dt_expira){
				?>
					<b style="color:red;font-style:italic;">Encerrado</b>
					
					<?php
				}else{
					echo $diff->format('%m mês(s), %d dia(s)');
				}
					?>
					</td>
					
					
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
	<center>
    <div class="col-md-10" id="alunos" style="display:none;">
          <div class="tile">
            <h3 class="tile-title" align="center">Alunos matriculados nesta Turma</h3>
            <div class="table-responsive" >
              <table class="table">
			  
         <?PHP
				$sql = mysqli_query($conn,"select * from aluno where codigo_turma='".$turma['id']."'");
				if(mysqli_num_rows($sql)>0){
				while($usuario = mysqli_fetch_assoc($sql)){
				?>
                <tbody >
                  <tr>
					<td><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $usuario['foto']?>"> <b style="font-size:18px;"><?php echo $usuario['nome']?></b></td>
                    <td><button data-toggle="modal" data-target="#<?php echo $usuario['id']?>" class="btn btn-success">Informações</button></td>
                    <td><button data-toggle="modal" data-target="#<?php echo $usuario['id']?>" class="btn btn-danger">Excluir ALuno da turma</button></td>

                    <!--Janela Modal-->
								<div class="modal fade" id="<?php echo $usuario['id']?>" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
								</div>
								<div class="modal-body" align="center">
									<center><img src="<?php echo $usuario['foto']?>" style="width:200px;height:300px;"><br></center>
									<strong>Nome: <?php echo $usuario['nome'];?></strong><br>
									<strong>Email: <?php echo $usuario['email'];?></strong><br>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
								</div>
								</div>
      
								</div>
								</div>

				 </tr>
				 
                </tbody>
             
		
							
					
				<?php }}else{?>
		<center><h1 style="color:red;">Nenhum aluno cadastrado</h1></center>
		<?php } ?>
     </table>
     </center>
        </div>
        </div>
		</div>
    
    
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
function muda(alterar){
  var display = document.getElementById(alterar).style.display;
        if(display == "none")
            document.getElementById(alterar).style.display = 'block';
        else
            document.getElementById(alterar).style.display = 'none';
}
function muda(estatisticas){
  var display = document.getElementById(estatisticas).style.display;
        if(display == "none")
            document.getElementById(estatisticas).style.display = 'block';
        else
            document.getElementById(estatisticas).style.display = 'none';
}
function muda(alunos){
  var display = document.getElementById(alunos).style.display;
        if(display == "none")
            document.getElementById(alunos).style.display = 'block';
        else
            document.getElementById(alunos).style.display = 'none';
}
function muda(temas){
  var display = document.getElementById(alunos).style.display;
        if(display == "none")
            document.getElementById(alunos).style.display = 'block';
        else
            document.getElementById(alunos).style.display = 'none';
}
</script>
  </body>
</html>