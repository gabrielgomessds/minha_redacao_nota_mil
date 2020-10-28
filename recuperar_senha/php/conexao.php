<?php
$conn = mysql_connect("localhost", "root", "") or die ("Problemas na conexão.");
$db = mysql_select_db("senha", $conn) or die ("Problemas na conexão");
?>