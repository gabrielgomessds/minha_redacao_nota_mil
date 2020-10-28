
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$remetente = $_POST['remetente'];
$titulo = $_POST['titulo'];
$mensagem = $_POST['mensagem'];
$imagem = $_FILES['imagem'];
$data_envio = $_POST['data_envio'];
$comentar = $_POST['comentar'];
$destinatario = $_POST['destinatario'];
$resposta = $_POST['resposta'];
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
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar,resposta) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."','".$resposta."')") ;

// Se os dados forem inseridos com sucesso
}
else{
$caminho_imagem = "" ;
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar,resposta) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."','".$resposta."')") ;

}

header ("location: ../paginas/sucesso_resposta_sugestao.php");
?>