<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Cadastro de Turma</title>
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
   .mensagem{
	  font-family: 'Open Sans', Arial, Helvetica, sans-serif;
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
  height: 300px;
  resize: none;
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
  font-size:18px;
  font-weight:bold;
  color:#008B45;
  float:left;
}
.label-form-emblema{
  font-size:18px;
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
	<script>
 var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
  };
</script>
<script>
function mudaImagem(i) {    
document.getElementById("output").src="../img/icone/imagem_turma.png";
		
		}
		</script>
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
     require_once '../includes/correcao_caracteres.php';
     require '../includes/acesso_negado.php';
include '../php/conexao.php';
$resultado = mysqli_query($conn,"SELECT * FROM professor where email = '$email' and senha = '$senha'") ;
$row = mysqli_fetch_assoc($resultado);
if($resultado){
  ?>


    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <main class="app-content">
	
		<div class="tabcontent" id="redacao">
    <div class="app-title">
          <h1><a href="professor.php">
		  <button class="btn btn-success" type="button">Voltar</button></a> Cadastro de turma<img src="../img/icone/menu/titulo/turma.png" width="40px" height="40px"></h1>     
    
	  </div>
      </div>
	  <center>
        <div class="col-md-10">
		<form action="../php/cadastrar_turma.php" method="post" enctype="multipart/form-data">
        <input type="text" name="codigo_tema" value="<?php echo $tema['id']?>" style="display:none;">
          <div class="tile">
          
            <h3 class="tile-title">Preencha os campos com os dados da turma </h3>
            <div class="table-responsive">
             <div id="texto1">
			 <input type="text" name="remetente" value="ADMIN" style="display:none;">
            
       <div class="form-group">
                  <label class="label-form">Nome da Turma: </label>
                  <input class="campo-contato" type="text" name="nome_turma" required placeholder="Nome da Turma. EX: 1° A Manhã">
                </div>      

           <div class="form-group"> 
           <label class="label-form">Nome da Escola: </label>
           <input type="text" name="escola_turma" placeholder="Escola ou curso da turma"  class="campo-contato" required><br>
           </div> 

           <div class="form-group"> 
            <label class="label-form">Código de Acesso: </label><br><br><input type="text"  name="codigo_acesso" style="color:blue;font-weight:bold;" value="<?php echo uniqid() , '';?>" class="campo-contato" required><br>
            <i style="color:red;">Por favor copie este codigo para os alunos acessarem a turma</i> <b style="font-style:italic;margin-left:10px;cursor:pointer;color:seagreen;font-size:16px;" onclick="mostraMensagem()"> <font id="simbolo">+</font>Detalhes</b><br><br>
            <div class="alert alert-primary" role="alert" id="mensagem" style="display:none;">
<p style="font-size:18px;">Esse código é usado para que os alunos acessem essa turma. Quando o aluno vai se cadastrar tem um campo que pede esse código, por isso, pedimos que copie ele ou se achar melhor você mode altera-lo adicionando um codigo que você acha mais fácil.   </p>
</div>
<input type="text"  name="data_criacao"   style="display:none;" value="<?php date_default_timezone_set('America/Fortaleza');echo date('y-m-d');?>" readonly="readonly" required>
<input type="text" name="codigo_professor" value="<?php echo $row['id'];?>"  class="campo" style="display:none;">
</div>
			<label class="label-form">Descrição da Turma: </label><textarea class="mensagem" placeholder="Exemplo: Turma para a criação e correção de redações on-line | Não é obrigatório preencher esse campo" name="descricao" rows="20" cols="100"></textarea>
			 </div>
			 	 <label class="label-form-emblema">Simbolo da turma: </label>
			 <div id="imagem1">
		
			 <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="simbolo" onchange="loadFile(event)"/>
    <span><img src="../img/icone/imagem_turma.png" title="Escolha uma imagem" name="simbolo" id="output" style="width:200px;height:200px;cursor:pointer;" ></span>

	</label>
            </div>
            
			<input type="submit" value="Cadastrar Turma" class="btn btn-success">
			</form>
            </div>
          </div>
			

		</center>
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
	<?php
}
	?>
  </body>
</html>