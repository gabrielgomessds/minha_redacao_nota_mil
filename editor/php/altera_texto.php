<?php
    include 'conexao.php';
    $id = $_POST['id'];
    $editor = $_POST['editor'];
    $sql = mysql_query("update campo_texto set texto='$editor' where id='$id'")or die(mysql_error());
    header("location:texto.php?id=".$id);
    
?>