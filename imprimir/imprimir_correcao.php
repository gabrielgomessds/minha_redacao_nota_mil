<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Imprimir Correção</title>
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
    <br>
        <center><input type="button" class="botao" onclick="imprimir()" value="Imprimir Correção"></center>
        <?php 
			$id = $_GET['id'];
			$pega = mysqli_query($conn,"select * from correcao where codigo_redacao='$id'");
			$linhacorrecao = mysqli_fetch_assoc($pega);
			?>
        <div id="printable">
    <header>
        <center><h1>Correção</h1></center>
        <center><b>Tema: <?php echo $lista['tema']?></b></center><br>
        <center><img src="<?php echo $lista['foto_aluno']?>" width="100px" height="100px" title="<?php echo $lista['foto_aluno']?>"></center>
        <center><p style=""> Aluno: <?php echo $lista['nome_aluno']?> / NOTA: <?php echo $linhacorrecao['nota']?>,00</p></center>
      
			<?php
function get_str_difs($str1, $str2) {
  $first = explode(" ", $str1);
  $second = explode(" ", $str2);
  $arrDif1 = array_diff($first,$second);
  $arrDif2 = array_diff($second,$first);
  $old = '';
  $new = '';
    foreach($first as $word) {
      if(in_array($word,$arrDif1)) {
      $old .= "<span style='color: red; background-color:#dedede;'>" . $word . "</span> ";
      continue;
      }
      $old .= $word . " ";
    }
    foreach($second as $word) {
      if(in_array($word,$arrDif2)) {
      $new .= "<span style='color: green;background-color:#dedede;'> " . $word . " </span>";
      continue;
      }

      $new .= $word . " ";
    }
  return array('old' => $old, 'new' => $new);
  }
$str1 = $lista['redacao'];;
$str2 = $linhacorrecao['correcao'];
  $difs = get_str_difs($str1, $str2);
?>
    </header>
    <main>
            <center>
<div style="
width:100%;
max-width:100%;overflow:auto;
padding: 8px 15px;resize:vertical;
font-size: 13px;
	  line-height: 22px;
	   -webkit-appearance: none;
	  border-radius: 0;
	  background: url(notebook.png);">
<p  style="margin:5px 0;"><span style="color: red; background-color:#dedede;">Texto original</span>; <span style="color: green;background-color:#dedede;">Texto corrigido</span></p>
  <div style="width: 48%; float:left; border-right:8px solid #dedede; padding-right: 10px; box-sizing: border-box;">
    <h4 style="margin:3px 0;font-size:20px;font-weight:bold;">Redação</h4>
    <p style="font-size:15px;"><?php echo $difs['old']; ?></p>
  </div>
  <div placeholder="Correção" style="width: 48%; float:left;  padding-left: 8px; box-sizing: border-box;">
    <h4 style="margin:3px 0;font-size:20px;font-weight:bold;">Correção</h4>
    <p style="font-size:15px;"><?php  echo $difs['new']; ?></p>
  </div>
</div>
<br><br>
	
			</center>
            
           

    </main>
    </div>
</body>
</html>