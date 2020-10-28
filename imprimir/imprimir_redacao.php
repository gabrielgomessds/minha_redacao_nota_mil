<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Imprimir Redação</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="estilo/style.css">
	<link rel="icon" href="../img/icone/icone_pagina_inicial.png">
    <script>
    function imprimir(){
    var botao = document.querySelector("botao");
     var conteudo = document.getElementById("redacao");
   window.print();
    }
    </script>
</head>
<body>
    <?php 
    include '../php/conexao.php';
    require_once '../includes/correcao_caracteres.php';

    $codigo_redacao = $_GET['id'];
    $sql = mysqli_query($conn,"select * from redacao where id='".$codigo_redacao."'");
    $lista = mysqli_fetch_assoc($sql);
    ?>
    <br><br>
        <center><input type="button" class="botao" onclick="imprimir()" value="Imprimir Redação"></center>
    
        <div id="printable">
    <header>
        <center><h1>Redação</h1></center>
        <center><b>Tema: <?php echo $lista['tema']?></b></center><br>
        <center><img src="<?php echo $lista['foto_aluno']?>" width="100px" height="100px" title="<?php echo $lista['foto_aluno']?>"></center>
        <center><p style=""> Aluno: <?php echo $lista['nome_aluno']?></p></center>
    </header>
    <main>
            <center><textarea class="notebook" rows="30" cols="100">
                   <?php echo $lista['redacao'];?>
            </textarea></center>
           

    </main>
    </div>
</body>
</html>