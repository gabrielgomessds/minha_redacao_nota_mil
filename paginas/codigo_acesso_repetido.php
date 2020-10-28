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
	$nome_turma = $_GET['nome_turma'];
$escola_turma = $_GET['escola_turma'];
$codigo_professor = $_GET['codigo_professor'];
$simbolo = $_GET['simbolo'];
$data_criacao = $_GET['data_criacao'];
$descricao = $_GET['descricao'];
	
	?>
	<section id="cadastro" class="cadastro" >
        <div class="container">
            <div class="row">
                <div class="form-cadastro">
    <form id="form" action="../php/cadastro_erro_codigo_acesso.php" method="post"enctype="multipart/form-data">
	<center>
    <img src="../img/icone/alerta.png" width="70px" height="70px">
    <p style="font-size:17px;"><b style="font-style:italic;color:red;"> Parece que este código já está sendo usado, por favor tente outro</b></p>
	</center>
	<fieldset>
      <input placeholder="Nome turma" name="nome_turma" type="text" value="<?php echo $nome_turma?>" style="display:none;"  required >
    </fieldset>
    <fieldset>
      <input placeholder="Esola" name="escola_turma" type="text" style="display:none;" value="<?php echo $escola_turma?>"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Codigo professor" name="codigo_professor" type="text" style="display:none;" value="<?php echo $codigo_professor?>"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Novo codigo de Acesso" type="text" name="codigo_acesso"  required>
    </fieldset>
	<fieldset>
      <input type="text" name="simbolo" style="display:none;" value="<?php echo $simbolo?>">
	<fieldset >
    <input type="text"  name="data_criacao" style="display:none;" value="<?php echo $data_criacao?>"/>
    </fieldset>
    <fieldset >
    <input type="text"  name="descricao" style="display:none;" value="<?php echo $descricao?>"/>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Tentar novo código de acesso</button>
    </fieldset>
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
