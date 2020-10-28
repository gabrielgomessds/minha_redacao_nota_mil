<?php
    include 'conexao.php';
    $editor = $_POST['editor'];
    $sql = mysql_query("insert into campo_texto(texto)values('".$editor."')")or die(mysql_error());
    header("location:mostra.php");
    
?>