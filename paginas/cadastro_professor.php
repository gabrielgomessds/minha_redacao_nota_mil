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
	</head>

<body style="background-color:#1abc9c;">

    <!-- Campo de login -->
 <!-- Portfolio -->
 <section id="cadastrop" class="cadastro" style="background-color:salmon;">
        <div class="container">
            <div class="row">
                <div class="form-cadastro">
    <form id="form" action="php/cadastro_professor.php" method="post" onsubmit="return verificaprof()" enctype="multipart/form-data">
    <h3 align="center">Cadastro do Professor<img src="img/icone/icone_professor_cadastro.png" width="45px" height="45px"></h3>
    <fieldset>
      <input placeholder="Nome completo" name="nome" type="text"  required >
    </fieldset>
    <fieldset>
      <input placeholder="Endereço de email" name="email" type="email"  required>
    </fieldset>
    <fieldset>
        <input placeholder="Escola ou entidade onde trabalha" name="escola" type="text"  required>
      </fieldset>
	<fieldset>
      <input placeholder="Senha maior de 6 digitos" name="senha" type="password" id="senhaprof"  required>
    </fieldset>
    <fieldset>
        <input placeholder="Digite novamente" type="password" id="confirmaprof" name="confirmaprof" required>
        <center> <p style="font-size:18px;"><font color="red" id="erroprof"></font></p></center>
       </fieldset>
	<fieldset >
        <label>Foto:</label>
     <label class="labelInput">
    <input type="file" accept="image/*"  id="foto" name="foto" onchange="loadFileProfessor(event)"/>
    <span><img src="img/icone/icone_usuario.png" title="Escolha uma imagem" name="foto" id="outputProfessor" style="width:240px;height:190px;cursor:pointer;" ></span>
</label>
    </fieldset>
    <input type="text" value="professor" style="display:none;" name="tipo">
    <fieldset>
      <button name="submit" type="submit" id="contact-submit">Cadastrar</button>
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
