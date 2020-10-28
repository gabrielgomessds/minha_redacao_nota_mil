<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<link rel="icon" type="icon" href="../img/icone/icone_pagina_inicial.png">
    <title>Minha Redação - Recuperação de senha</title>

    <!-- Codigo bootstrap aqui -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Codigo css para customizar o site -->
	 <link href="../css/style-pages.css" rel="stylesheet">
    <link href="../css/stylish-portfolio.css" rel="stylesheet">
	

    <!-- Customiza as fontes do site -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    
</head>

<body style="background-color:#4682B4;">

    <!-- Campo de login -->
	<section id="login" class="login" >
	
        <div class="container">
            <div class="row">    
				<div class="form-cadastro">
                    <form id="form" action="envia_nova_senha.php" method="POST">
					<center>
				<h3 style="color:green;">Recupeara senha</h3></center>
    <fieldset>
      <input placeholder="Email para a recuperação da sua senha" name="email" type="email" required>
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Enviar email de recuperação</button>
    </fieldset>
    <p>
    <center><b style="color:red;text-decoreiton:none;" align="center">Se quiser fazer login é só clicar <a href="../paginas/login.php">aqui</a></b></center><br>
	  </p>
	
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
