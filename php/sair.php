<?php
session_start();
$email = $_GET['email'];
include 'conexao.php';
$sql = mysqli_query($conn,"update usuario set situacao='offline' where email='$email'");
session_unset();
session_destroy();
header("location:../paginas/tchau.php");
?>