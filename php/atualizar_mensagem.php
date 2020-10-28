
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$remetente = $_POST['remetente'];
$titulo = $_POST['titulo'];
$mensagem = $_POST['mensagem'];
$imagem = $_FILES['imagem'];
$data_envio = $_POST['data_envio'];
$destinatario = $_POST['destinatario'];
$codigo_mensagem = $_POST['codigo_mensagem'];
if($destinatario == "Todos" ){
$tipo = "publica";
if (!empty($imagem["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../img_mensagens/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"UPDATE mensagem SET remetente = '$remetente',titulo='$titulo',mensagem='$mensagem',imagem='$caminho_imagem',data_envio='$data_envio',destinatario='$destinatario',tipo='$tipo' where id='$codigo_mensagem'") ;

// Se os dados forem inseridos com sucesso
}
else{
$caminho_imagem = "" ;
$sql = mysqli_query($conn,"UPDATE mensagem SET remetente = '$remetente',titulo='$titulo',mensagem='$mensagem',imagem='$caminho_imagem',data_envio='$data_envio',destinatario='$destinatario',tipo='$tipo' where id='$codigo_mensagem'") ;

}
	
}else{
	$pegaEmail = mysqli_query($conn,"SELECT * FROM usuario WHERE email = '$destinatario'");
$numero = mysqli_num_rows($pegaEmail);
if($numero == 0 ){
?>
<center><h1>OPS! PARECE QUE ESSE E-MAIL NÃO EXISTE, VERIFIQUEO </h1>
<h1 style="color:red;">Email: <?php echo $destinatario?></h1>
</center>
<?php
}else{
	$tipo = "privada";
	if (!empty($imagem["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../img_mensagens/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"UPDATE mensagem SET remetente = '$remetente',titulo='$titulo',mensagem='$mensagem',imagem='$caminho_imagem',data_envio='$data_envio',destinatario='$destinatario',tipo='$tipo' where id='$codigo_mensagem'") ;

// Se os dados forem inseridos com sucesso
}
else{
$caminho_imagem = "" ;
$sql = mysqli_query($conn,"UPDATE mensagem SET remetente = '$remetente',titulo='$titulo',mensagem='$mensagem',imagem='$caminho_imagem',data_envio='$data_envio',destinatario='$destinatario',tipo='$tipo' where id='$codigo_mensagem'") ;

}
}}
header ("location: ../paginas/sucesso_alterar_mensagem.php?codigo_mensagem=".$codigo_mensagem);
?>