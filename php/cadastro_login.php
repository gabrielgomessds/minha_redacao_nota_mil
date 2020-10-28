<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Minha Redação - LOGIN</title>
</head>
<body>
<?php
	session_start();
	include 'conexao.php';
	$email = $_GET['email'];
	$senha = $_GET['senha'];
		$result = mysqli_query($conn," select * from usuario where email = '$email' and  senha = '$senha'");
		if(mysqli_num_rows($result) > 0){
		$row = mysqli_fetch_assoc($result);
		$_SESSION['email'] = $email;
		$_SESSION['senha'] = $senha;
		$_SESSION['tipo'] = $row['tipo'];
		if($row['tipo'] =='aluno'){
			$sql = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
			header('location:../paginas/aluno.php');
	}elseif($row['tipo'] =='admin'){
		$sql = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
			header ("location: ../paginas/admin.php");
		}elseif($row['tipo'] == 'professor'){
			$sql = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
			header("location:../paginas/professor.php");
		}
		}
	else{
		unset($_SESSION['email']);
		unset($_SESSION['senha']);
		header('location:../paginas/erro_login.php?email='.$email);
		}


?>
</body>
</html>