<?php
mysql_query("SET NAMES 'utf8'"); 
mysql_query('SET character_set_connection=utf8'); 
mysql_query('SET character_set_client=utf8'); 
mysql_query('SET character_set_results=utf8'); 
$conn = mysql_connect("localhost", "root", "") or die ("Problemas na conexão.");
$db = mysql_select_db("textarea", $conn) or die ("Problemas na conexão");
?>