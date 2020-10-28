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
	</head>

<body style="background-color:gold;">

    <!-- Campo de login -->
	<section id="login" class="login" style="background-color:gold;">
        <div class="container">
      
            <div class="row">
          
				<div class="form-cadastro">
                    <form id="form" action="../php/login.php" method="post">
                    <center><p style="color: red;font-size:18px;"><b>ATENÇÃO:</b> Para ter acesso a está pagina você precisa estar logado</p>
    <h3>Fazer Login<img src="../img/icone/icone_login.png" width="30px" height="30px"></h3></center>
    <fieldset>
      <input placeholder="Endereço de email" name="email-login" type="email"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Senha" name="senha-login" type="password"  required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">LOGIN</button>
	  <p>

	  <center><b style="color:blue;text-decoreiton:none;" align="center"><a href="../index.html">Voltar</a></b></center>
	  </p>
    </fieldset>
  </form>
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
