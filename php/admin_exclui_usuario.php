<html>
<head>
<link rel="shortcut icon" href="../imagens/icone.png" type="image/x-icon" />
<title>Minha redação - Excluir</title>
</head>
<body>
<div class="conteudo">
<center>
<img src="../img/icone/icone_sucesso.png" width="100px" height="100px">
<?php
include 'conexao.php';
$id = $_GET['id'];
$busca_user = mysqli_query($conn,"select * from usuario where id = '$id'");
$user = mysqli_fetch_assoc($busca_user);
if($user['tipo'] == 'aluno'){
    mysqli_query($conn,"DELETE FROM aluno WHERE email = '".$user['email']."'");	
    mysqli_query($conn,"DELETE FROM usuario WHERE id = $id");	
}else if($user['tipo'] == 'professor'){
    mysqli_query($conn,"DELETE FROM professor WHERE email = '".$user['email']."'");
    mysqli_query($conn,"DELETE FROM usuario WHERE id = $id");		
}else{
    mysqli_query($conn,"delete from admin WHERE email_admin = '".$user['email']."'");	
    mysqli_query($conn,"DELETE FROM usuario WHERE id = $id");	
}
header("location:../paginas/sucesso_admin_exlui_usuario.php");
?>
</div>
</body>
</html>