<?php
include '../php/conexao.php';
mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');

$email = $_POST['email'];
$senha = $_POST['senha'];
$busca = mysql_query("select * from usuario where email='".$email."'")or die(mysql_error());
$pega = mysql_fetch_assoc($busca);
mysql_query("update usuario set senha = '".$senha."' where email = '".$email."' ")or die(mysql_error());
mysql_query("delete from recuperacao where utilizador = '".$email."' ")or die(mysql_error());
if($pega['tipo'] == 'aluno'){
    mysql_query("update aluno set senha = '".$senha."' where email = '".$email."' ")or die(mysql_error());
}else if($pega['tipo'] == 'professor'){
    mysql_query("update professor set senha = '".$senha."' where email = '".$email."' ")or die(mysql_error());

}else{
    mysql_query("update admin set senha_admin = '".$senha."' where email_admin = '".$email."' ")or die(mysql_error());

}
header('location:sucesso_altera_senha.php');
?>