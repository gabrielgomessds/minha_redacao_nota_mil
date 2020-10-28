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
		function verifica(){
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
	<section id="cadastro" class="cadastro" >
        <div class="container">
            <div class="row">
                <div class="form-cadastro">
    <form id="form" action="../php/cadastro.php" method="post" onsubmit="return verifica()" enctype="multipart/form-data">
    <h3>Cadastro<img src="../img/icone/cadastro.png" width="30px" height="30px"></h3>
    <fieldset>
      <input placeholder="Nome completo" name="nome" type="text"  required >
    </fieldset>
    <fieldset>
      <input placeholder="Endereço de email" name="email" type="email"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Esola" name="escola" type="text"  required>
    </fieldset>
    <fieldset>
      <input placeholder="Série" type="text" name="serie"  required>
    </fieldset>
	<fieldset>
      <select placeholder="Turno" name="turno" class="select">
	  <option name="turno não escolhido">Escolha um turno</option>
	  <option name="Manhã">Manhã</option>
	   <option name="Tarde">Tarde</option>
	    <option name="Noite" >Noite </option>
		 <option name="Integral">Integral</option>
	  </select>
    </fieldset>
	<fieldset>
      <input placeholder="Senha maior de 6 digitos" name="senha" type="password" id="senha"  required>
    </fieldset>
	<fieldset>
      <input placeholder="Digite novamente" type="password" id="confirma" name="confirma" required>
	  <p><font color="red" id="erro"></font></p>
    </fieldset>
	<fieldset >
     <label class="labelInput" >
    <input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFile(event)"/>
    <span><img src="../img/icone/icone_usuario.png" title="Escolha uma imagem" name="foto" id="output" style="width:240px;height:190px;cursor:pointer;" ></span>

	</label>
    </fieldset>
    <input type="text" value="aluno" style="display:none;" name="tipo">
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Cadastrar</button>
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
