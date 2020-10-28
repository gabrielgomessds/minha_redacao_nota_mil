<?php
include_once '../php/conexao.php';
header('Content-Type: text/html; charset=utf-8');
mysqli_query($conn,"SET NAMES 'utf8'"); 
mysqli_query($conn,'SET character_set_connection=utf8');
mysqli_query($conn,'SET character_set_client=utf8');
mysqli_query($conn,'SET character_set_results=utf8');
?>