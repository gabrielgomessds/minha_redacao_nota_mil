<!DOCTYPE html>
<html lang="en">
  <head>
	<title>Minha Redação - Professor ver Tema</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="../editor/main.css">
    <script src="../editor/jquery.js"></script>
    <link href="../editor/summernote-lite.css" rel="stylesheet" type="text/css">
    <script src="../editor/summernote-lite.js"></script>>

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

  </style>
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
        if(value == "TurmasEspecificas"){
            document.getElementById(el).style.display = 'block';
        }else{
            document.getElementById(el).style.display = 'none';
}}
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
    <header class="app-header"><strong class="app-header__logo" >Minha Redação</strong>
    </header>
    <main class="app-content">
    <div class="app-title">
        <div>
        <h1>
          <a href="professor.php"><button class="btn btn-success" type="button">Voltar</button></a> 
          Dados do Tema <img src="../img/icone/icone_escrever.png" width="25px" height="25px">
          </h1>  
        </div>
      </div>
    <?php
    	include '../php/conexao.php'; 
	  	$codigo_tema = $_GET['codigo_tema'];
		$sql = mysqli_query($conn,"select * from temas_redacao where id='$codigo_tema' and codigo_professor= '".$professor['id']."'");
    $tema = mysqli_fetch_assoc($sql);
    if(mysqli_num_rows($sql) >= 1){
			?>
			<center>
						<br><br>
        
            
    <div class="col-md-10">
	    <div class="tile">
    
            <h3 class="tile-title">Dados do Tema: <?php echo $tema['nome_tema']?></h3>
            <div class="tile-body">
              <form method="POST" action="../php/professor_altera_tema.php" enctype="multipart/form-data" style="text-align:left;">
              <div class="form-group">
             
              <input type="text" value="<?php echo $tema['id']?>" name="codigo_tema" style="display:none;">
                  <label class="control-label">Nome tema: </label>
                  <input class="campo-contato2" type="text" name="nome_tema" value="<?php echo $tema['nome_tema']?>" placeholder="Nome do Tema">
                </div>
                <div class="form-group">
                  <label class="control-label">Data de vencimento: </label>
                  <input class="campo-contato2" type="date" name="vencimento" OnKeyUp="mascaraData(this);" maxlength="10" value="<?php echo $tema['vencimento']?>" placeholder="Digite a data">
                </div>
             
                <div class="form-group">
                <label class="control-label">Turma: </label>
                <select class="campo-contato" name="codigo_turma" onchange="Mudarestado('minhaDiv')" id="select">



                  <?php
                    $resultado = mysqli_query($conn,"select * from turma where id = '".$tema['codigo_turma']."'");
                    $pega = mysqli_fetch_assoc($resultado);
                      if($tema['codigo_turma'] == 'TodasTurmas'){
                  ?>
                 <option value="TodasTurmas" selected>Todas minhas turmas</option>
                 <option name="codigo_turma" value="TurmasEspecificas">Escolher turmas especificas</option>
                 
    <?php 

       $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$tema['codigo_professor']."' and id <> '".$tema['codigo_turma']."'");

       while($pegaTurma = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$pegaTurma['id'].'" name="codigo_turma"> '.$pegaTurma['nome_turma'].' - '.$pegaTurma['escola_turma'].' </option>';

       }
	?>
  <?php
  
      }elseif($tema['codigo_turma'] == 'TurmasEspecificas'){
  
  ?>
   <option name="codigo_turma" value="TurmasEspecificas" selected>Escolher turmas especificas</option>
   <option value="TodasTurmas" >Todas minhas turmas</option>
    <?php 

       $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$tema['codigo_professor']."' and id <> '".$tema['codigo_turma']."'");

       while($pegaTurma = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$pegaTurma['id'].'" name="codigo_turma"> '.$pegaTurma['nome_turma'].' - '.$pegaTurma['escola_turma'].' </option>';

       }
	?>
  <?php
                      }else{
  ?>
  <option selected value="<?php echo $pega['id']?>"><?php echo $pega['nome_turma']?> - <?php echo $pega['escola_turma']?></option>
    <?php 

       $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$tema['codigo_professor']."' and id <> '".$tema['codigo_turma']."'");

       while($pegaTurma = mysqli_fetch_assoc($result)) {
        echo '<option value="'.$pegaTurma['id'].'" name="codigo_turma"> '.$pegaTurma['nome_turma'].' - '.$pegaTurma['escola_turma'].' </option>';

       }
	?>
  <option value="TodasTurmas">Todas minhas turmas</option>
  <option name="codigo_turma" value="TurmasEspecificas">Escolher turmas especificas</option>
  <?php
                      }
  ?>
                               
</select>
<?php
 if($tema['codigo_turma'] == 'TurmasEspecificas'){
?>
<div id="minhaDiv" style="display: block;">
<h5 style="font-style:italic;color:blue;">Turmas escolhidas para esse tema: </h5>
<?php
  $buscaTurma = mysqli_query($conn,"select * from turma where codigo_professor = '".$professor['id']."'")or die(mysqli_error($conn));
  while($pegaTurma = mysqli_fetch_assoc($buscaTurma)){
  $buscaTurmaSelecionada = mysqli_query($conn,"select * from turmas_selecionadas where codigo_turma = '".$pegaTurma['id']."' and codigo_tema = '".$tema['id']."'");
  $pegaTurmaSelecionada = mysqli_fetch_assoc($buscaTurmaSelecionada);

?>
       <input type="checkbox" name="marcadas[]" value="<?php echo $pegaTurma['id'];?>" <?php echo $pegaTurmaSelecionada['situacao'];?> > 

       <?php echo  $pegaTurma['nome_turma']?> - <?php echo $pegaTurma['escola_turma']?><br>
 
  <?php
 } }else{
  ?>
<div id="minhaDiv" style="display: none;">
<h5 style="font-style:italic;color:blue;">Escolha suas turmas que receberão este tema: </h5>
<input type="text" value="para_escolher" name="para_escolher" hidden>
<input type="text" value="<?php echo $professor['id']?>" name="codigo_professor" hidden>

<?php
 $result = mysqli_query($conn,"select * from turma where codigo_professor = '".$professor['id']."'");
 while($pegaTurma = mysqli_fetch_assoc($result)) {
?>
  <input type="text"  name="turma_escolhida[]" value="<?php echo $pegaTurma['id'];?>" hidden>
       <input type="checkbox" name="marcadas[]" value="<?php echo $pegaTurma['id']?>" > <?php echo $pegaTurma['nome_turma']?> - <?php echo $pegaTurma['escola_turma']?><br>
 
  <?php
 }}
  ?>
<br><br>
</div>
<?php
                if($tema['maximo_redacao'] == 'uma'){
                ?>
                <input type="checkbox" name="maximo_redacao" checked  value="uma" /> <b style="font-size:16px;color:blue;">Permitir que o aluno envie apenas uma redação deste tema</b>
                <?php
                }else{
                ?>
               <input type="checkbox" name="maximo_redacao"  value="uma" /> <b style="font-size:16px;color:blue;">Permitir que o aluno envie apenas uma redação deste tema</b>
                <?php
                }
                ?>


                </div>
                <label class="control-label">Texto motivacional:</label><textarea id="summernote" name="texto_motivacional"><?php echo $tema['texto_motivacional']?></textarea><br><br>                  
                      
      
      </div>
      <center>
              <input class="btn btn-primary" type="submit" value="Salvar alterações">
              </form>
              <input class="btn btn-danger" type="submit"  value="Excluir Tema" data-toggle="modal" data-target="#excluir-tema">
               </div>
                  
          
            </center>
               </div>
               
        
          
         
  </div>
  <div class="modal fade" id="excluir-tema" role="dialog">
								<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
                  <h3>Tem certeza que deseja excluir este tema?</h3>
								</div>
								<div class="modal-body" align="center">
								<a href="../php/professor_exclui_tema.php?codigo_tema=<?php echo $tema['id']?>&codigo_texto=<?php echo $tema['id']?>" ><button class="button" width="110px" style="background:green;border-color:green;"  type="button">SIM</button></a>
                <a href=""><button class="button" data-dismiss="modal" style="background:red;border-color:red;"  type="button">NÃO</button></a>


								</div>
								</div>
      
								</div>
								</div>

                <?php
				}else{
			?>
			<center>
			
			<img src="../img/icone/area_restrita.png">
			<h1 style="color:red;font-weight:bold;">Você não tem acesso a este tema</h1>
			
			</center>
			<?php
				}
			?>
      </center>
       <br><br>
	  <footer>
	<strong align="center">Gomess Productions | Criador por: Gabriel Gomes</strong>
	</footer>
    </main>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
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