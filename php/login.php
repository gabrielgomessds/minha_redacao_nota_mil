	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="shortcut icon" href="../img/icone/icone_pagina_inicial.png" type="image/x-icon" />
	<title>Minha Redação - LOGIN</title>
	</head>
	<body>
	<?php
		session_start();
		include 'conexao.php';
		$email = $_POST['email-login'];
		$senha = $_POST['senha-login'];
		echo "email: " . $email . "<br>senha: " . $senha . "<br>";
		$result = mysqli_query($conn,"select * from usuario where email = '$email' and senha = '$senha'");
		if(mysqli_num_rows($result) > 0){
			
			$row = mysqli_fetch_assoc($result);
			$_SESSION['email'] = $email;
			$_SESSION['senha'] = $row['senha'];
			$_SESSION['tipo'] = $row['tipo'];
			$dataSalva = $_SESSION["ultimoAcesso"]= date("Y-m-d H:i:s");
			if($row['tipo'] =='aluno'){
				$sql1 = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
				header('location:../paginas/aluno.php');
			}if($row['tipo'] =='admin'){
				$sql2 = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
				header ("location: ../paginas/admin.php");
			}if($row['tipo'] == 'professor'){
				$sql3 = mysqli_query($conn,"update usuario set situacao='online' where email='$email'");
				header("location:../paginas/professor.php");
			}
			
			}
		else{
			unset($_SESSION['email-login']);
			unset($_SESSION['senha-login']);
			header('location:../paginas/erro_login.php?email='.$email);
			}

	?>
	</body>
	</html>