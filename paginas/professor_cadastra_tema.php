<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Cadastro de Tema</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../editor/main.css">
    <script src="../editor/jquery.js"></script>
    <link href="../editor/summernote-lite.css" rel="stylesheet" type="text/css">
    <script src="../editor/summernote-lite.js"></script>
	<style>
	.app-content {
    margin-left: 0;
  }
 
.texto-motivacional{
	font-size:16px;
	
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
.campo-contato2 {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #FFF;
  border: 1px solid #CDC5BF;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 40px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
}
.campo-contato {
  width: 100%;
  color: #292929;
  font-size: 18px;
  background-color: #E9E9E9;
  border: 1px solid #E9E9E9;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  height: 40px;
  margin-bottom: 20px;
  border-bottom: 1px solid #ccc;
  border-left: 1px solid #ccc;
  text-indent: 20px;
}
.label-form{
  font-size:16px;
  font-weight:bold;
  color:#008B45;
}
  </style>
   <script>

function mostraMensagem(){
  var mensagem = document.getElementById('mensagem');
  var simbolo = document.getElementById('simbolo');
   simbolo.textContent = '+';

  if(mensagem.style.display == 'none'){
    mensagem.style.display = 'block';
    simbolo.innerHTML = '-';
   
  }else{
    mensagem.style.display = 'none';
    simbolo.innerHTML = '+';
    
  }
}
</script>
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

<script type="text/javascript" language="javascript">
function Mudarestado(el) {
	var display = document.getElementById(el).style.display;
	var select = document.getElementById('select');
	var value = select.options[select.selectedIndex].value;
	console.log(value);
	
	if(value === 'TurmasEspecificas') {
		document.getElementById(el).style.display = 'block';
		document.getElementById("campo_turma").disabled = false;
	} else {
		document.getElementById(el).style.display = 'none';
    document.getElementById("campo_turma").disabled = true;
	}
}
</script>
  </head>
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
$professor = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><strong class="app-header__logo" >Minha Redação</strong>
      <!-- Navbar Right Menu-->
    </header>
    <!-- Sidebar menu-->
    <main class="app-content">
      <div class="app-title">
          <h1><a href="professor.php">
		  <button class="btn btn-success" type="button">Voltar</button></a> Cadastro de tema<img src="../img/icone/icone_escrever.png" width="25px" height="25px"></h1>     
         
	  </div>
    <?php
$buscaTurma = mysqli_query($conn,"select * from turma where codigo_professor='".$professor['id']."'")or die(mysqli_error($conn));
if(mysqli_num_rows($buscaTurma)< 1){
?>
<center><div class="alert alert-primary" role="alert" style="background:#FFC125;border-color:FFF0F5;width:80%;-webkit-box-shadow: 9px 7px 5px rgba(50, 50, 50, 0.77);-moz-box-shadow:9px 7px 5px rgba(50, 50, 50, 0.77);box-shadow:9px 7px 5px rgba(50, 50, 50, 0.77);">
<h5 style="color: blue;">Parece que você ainda não tem turmas cadastradas clique aqui para cadastrar uma -><b><a href="professor_cadastro_turma.php" style="color: red;"> Cadastrar nova turma</a></b> </h5>
</div></center><br>

<?php
}
?>
        
                        <center> 
    <div class="col-md-10">
	    <div class="tile">
    
            <h3 class="tile-title">Cadastro de Tema</h3>
            <div class="tile-body">
              <form method="POST" action="../php/professor_envia_tema.php" enctype="multipart/form-data" style="text-align:left;">
              <div class="form-group">
                  <label class="label-form">Nome do tema: </label>
                  <input class="campo-contato2" type="text" name="nome_tema" required placeholder="Nome do Tema">
                </div>
                <div class="form-group">
                  <label class="label-form">Prazo para encerrar o envio: </label>
                  <input class="campo-contato2" type="date" name="vencimento" required OnKeyUp="mascaraData(this);" maxlength="10"  placeholder="Digite a data">
                </div>
             
                <div class="form-group">
                <label class="label-form">Escolher Turma:</label>
	 <select class="campo-contato" name="codigo_turma" onchange="Mudarestado('minhaDiv')" id="select">
  <option name="codigo_turma" value="TodasTurmas">Todas minhas turmas</option>
  <option name="codigo_turma" value="TurmasEspecificas" >Escolher turmas especificas</option>
    <?php 

       $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$professor['id']."'");

       while($pegaTurma = mysqli_fetch_assoc($result)) {
		echo '<option value="'.$pegaTurma['id'].'" name="codigo_turma"> '.$pegaTurma['nome_turma'].' - '.$pegaTurma['escola_turma'].' </option>';

       }
	?>

</select>
<div id="minhaDiv" style="display: none;">
<h5 style="font-style:italic;color:blue;">Escolha suas turmas que receberão este tema: </h5>
<input type="text" id="campo_turma" value="TurmasEspecificas" name="escolha" hidden>
<?php
 $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$professor['id']."'");
 while($pegaTurma = mysqli_fetch_assoc($result)) {
?>
      
      <input type="text"  name="turma_escolhida[]" value="<?php echo $pegaTurma['id'];?>" hidden>

      <input type="checkbox" name="marcadas[]" value="<?php echo $pegaTurma['id'];?>"> <?php echo $pegaTurma['nome_turma']?> - <?php echo $pegaTurma['escola_turma']?><br>
  
  <?php
 } 
  ?>
<br><br>
</div>
<input type="checkbox" name="maximo_redacao"  value="uma" /> <b style="font-size:16px;color:blue;">Permitir que o aluno envie apenas uma redação</b><b style="font-style:italic;margin-left:10px;cursor:pointer;color:seagreen;font-size:16px;" onclick="mostraMensagem()"> <font id="simbolo">+</font>Detalhes</b><br><br>
<div class="alert alert-primary" role="alert" id="mensagem" style="display:none;">
<p style="font-size:18px;">Quando você marca essa opção o aluno poderá enviar apenas uma redações com esse tema após o envio ele será impossibilitado de enviar outra com o mesmo tema.</p>
</div>
<input type="text" value="<?php echo $professor['id']?>" name="codigo_professor" style="display:none;">
<input type="text" name="data_envio" style="display:none;" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d H:i:s:m');?>">

<label class="label-form">Texto motivacional:</label><textarea id="summernote" name="texto_motivacional"></textarea><br><br>
<center><button type="submit" class="btn btn-sucess" style="background-color:green;color:#FFF;border-color:green;"> Cadastrar tema</button>  </center>

  </form>
               

                </div>

			

		
      </center>
       <br><br>
	  <footer>
	<strong align="center">Gomess Productions | Todos os direitos reservados</strong>
	</footer>
    </main>
    <script type="text/javascript" language="javascript">
      $('#summernote').summernote({
        placeholder: 'Digite o texto motivacional aqui',
        tabsize: 2,
        height: 320,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>

  </body>
  <?php
}
  ?>
</html>