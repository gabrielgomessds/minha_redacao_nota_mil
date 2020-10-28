<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="icon" href="../img/icone/icone_pagina_inicial.png">
    <style>
  .ghost-button {
  display: inline-block;
  width: 200px;
  padding: 8px;
  color: #FFF;
  border: 1px solid #1abc9c;
  text-align: center;
  outline: none;
  text-decoration: none;
  background-color:#1abc9c;
  font-size:16px;
}
.ghost-button:hover {
  background-color: #fff;
  text-decoration:none;
  color: #000;
}
.footer{
    color:#FFF;
    font-size:16px;
}

.icon {
  padding: 10px;
  color: black;
  min-width: 25px;
  text-align: center;
  cursor: pointer;
  position: absolute;
  left: 87%;
}
        </style>
    <title>Minha Redação - Cadastro de Aluno</title>

    <!-- Codigo bootstrap aqui -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Codigo css para customizar o site -->
	 <link href="../css/style-pages.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	

    <!-- Customiza as fontes do site -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
<script>
		function verificaaluno(){
		if(document.getElementById('senha').value != document.getElementById('confirma').value){
		erro.innerHTML = '<b>Sehas diferentes!<b>';
		return false;
		}else{
		erro.innerHTML = '';
		return true;
		}
		}

        </script>

        <script>
            function verificaprof(){
            if(document.getElementById('senhaprof').value != document.getElementById('confirmaprof').value){
            erroprof.innerHTML = '<b>Sehas diferentes!<b>';
            return false;
            }else{
            erro.innerHTML = '';
            return true;
            }
            }
    
            </script>
	<script>
 var loadFileAluno = function(event) {
    var output1 = document.getElementById('outputAluno');
    output1.src = URL.createObjectURL(event.target.files[0]);
  };
</script>

        <script>

            var loadFileProfessor = function(event) {
               var output2 = document.getElementById('outputProfessor');
               output2.src = URL.createObjectURL(event.target.files[0]);
             };
           </script>
              <script>
             function mostrarSenha(){
              var senhaAluno = document.getElementById("senha");
              if(senhaAluno.type == 'password'){
                senhaAluno.type = 'text';
                document.getElementById('icone_ver_aluno').className = "fa fa-eye icon";
              }else{
                senhaAluno.type = 'password';
                
                document.getElementById('icone_ver_aluno').className = "fa fa-eye-slash icon";
              }
             }
             </script>
	</head>

<body>

<?php
    include '../php/conexao.php';
    $codigo_turma = $_GET['codigo_turma'];
    $busca_turma = mysqli_query($conn,"select * from turma where id='".$codigo_turma."'");
    $pegaTurma = mysqli_fetch_assoc($busca_turma);

?>

<section id="cadastroa" class="cadastro" style="background-color:#1abc9c;">
        <div class="container">
            <div class="row">
                <div class="form-cadastro">
    <form id="form" action="../php/admin_cadastra_aluno.php" method="post" onsubmit="return verificaaluno()" enctype="multipart/form-data">
    <h3 align="center">Cadastro do Aluno<img src="../img/icone/icone_aluno.png" width="45px" height="45px"></h3>
    <fieldset>
      <input placeholder="Nome completo" name="nome" type="text"  required >
    </fieldset>
    <fieldset>
      <input placeholder="Endereço de email" name="email" type="email"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Código turma" name="codigo_acesso" value="<?php echo $pegaTurma['codigo_acesso']?>" type="text"   readonly=“true”  required>
    </fieldset>
	<fieldset class="container-senha">
    <i class="fa fa-eye-slash icon" id="icone_ver_aluno" title="Mostrar Senha" onclick="mostrarSenha();"></i>
      <input placeholder="A senha tem que ser maior que 6 digitos" name="senha" type="password" id="senha" class="senha" required>
    </fieldset>
   <fieldset>
     <input placeholder="Digite a senha novamente" type="password" id="confirma" name="confirma" required>
     <center> <p style="font-size:18px;"><font color="red" id="erro"></font></p></center>
    </fieldset>
	<fieldset >
        <label>Simbolo da Turma:</label>
     <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFileAluno(event)"/>
    <span><img src="../img/icone/icone_usuario.png" title="Escolha uma imagem" name="foto" id="outputAluno" style="width:240px;height:190px;cursor:pointer;" ></span>
</label>
    </fieldset>
    <input type="text" value="aluno" style="display:none;" name="tipo">
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Cadastrar</button>
    </fieldset>
  </form>
					
                </div>
				 			
  

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->


        <footer>
	<center><strong align="center" class="footer">&copy; Gomess Productions | Todos os direitos reservados</strong></center>
	</footer>
    </section>

  

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script>
    // Closes the sidebar menu
    $("#menu-close").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Opens the sidebar menu
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#sidebar-wrapper").toggleClass("active");
    });

    // Scrolls to the selected menu item on the page
    $(function() {
        $('a[href*=#]:not([href=#])').click(function() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
        });
    });
    </script>

</body>

</html>
