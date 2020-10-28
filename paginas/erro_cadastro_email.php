<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="icon" href="../img/icone/icone_pagina_inicial.png">
    <title>Minha Redação</title>

    <!-- Codigo bootstrap aqui -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Codigo css para customizar o site -->
	 <link href="../css/style-pages.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	

    <!-- Customiza as fontes do site -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
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
	</head>

<body style="background-color:#1abc9c;">

    <!-- Campo de login -->
	<?php
	include '../php/conexao.php';
	$nome = $_GET['nome'];
	$email = $_GET['email'];
    $senha = $_GET['senha'];
    $codigo_acesso = $_GET['codigo_acesso'];
    $foto = $_GET["foto"];
    $sexo = $_GET['sexo'];
	
    ?>
    <?php
    $buscaTurma = mysqli_query($conn,"select * from turma where codigo_acesso='$codigo_acesso'");
    $pegaTurma = mysqli_fetch_assoc($buscaTurma);
    ?>
	<section id="cadastro" class="cadastro" >
        <div class="container">
            <div class="row">
                <div class="form-cadastro">
    <form id="form" action="../php/cadastro_erro_email.php" method="post"enctype="multipart/form-data">
	<center>
    <img src="../img/icone/alerta.png" width="70px" height="70px">
    <p style="font-size:20px;"> O email <b style="font-style:italic;color:red;"><?php echo $email?></b> já possui uma conta, por favor tente outro</p>
	</center>
	<fieldset>
      <input placeholder="Nome completo" name="nome" type="text" value="<?php echo $nome?>" style="display:none;"  required >
    </fieldset>
    <fieldset>
      <input placeholder="Digite um novo endereço de email" name="email" type="email"  required>
    </fieldset>
	<fieldset>
      <input type="text" name="codigo_turma" style="display:none;" value="<?php echo $pegaTurma['id']?>">
	<fieldset>
    <fieldset>
      <input type="text" name="sexo" style="display:none;" value="<?php echo $sexo?>">
	<fieldset>
      <input placeholder="Senha maior de 6 digitos" name="senha" style="display:none;" type="password" value="<?php echo $senha?>"  required>
    </fieldset>
	<fieldset >
    <input type="text"  id="foto" name="foto" style="display:none;" value="<?php echo $foto?>"/>
    </fieldset>
    <input type="text" value="aluno" style="display:none;" name="tipo">
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Finalizar Cadastro</button>
    </fieldset>
	<p>
	<center><b style="color:red;text-decoretion:none;">Se já tiver uma conta faça o login clicando <a href="login.php">aqui</a></b></center>
	</p>
  </form>
					
                </div>
				 			
  

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
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
