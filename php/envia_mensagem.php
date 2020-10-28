
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
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;

// Se os dados forem inseridos com sucesso
}else{
$caminho_imagem = "" ;
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;




}}elseif($destinatario == "Alunos" ){
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
    $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
    
    // Se os dados forem inseridos com sucesso
    }else{
    $caminho_imagem = "" ;
    $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
   



}}elseif($destinatario == "Professores" ){
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
        $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
        
        // Se os dados forem inseridos com sucesso
        }else{
        $caminho_imagem = "" ;
        $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
        }

       
        

}else{
$pegaEmail = mysqli_query($conn,"SELECT * FROM usuario WHERE email = '$destinatario'");
$numero = mysqli_num_rows($pegaEmail);
$pegaTurma = mysqli_query($conn,"SELECT * FROM turma WHERE codigo_acesso = '$destinatario'");
$numeroTurma = mysqli_num_rows($pegaTurma);
if($numero == 0){
?>
<center><h1>OPS! PARECE QUE ESSE E-MAIL NÃO EXISTE, VERIFIQUE E TENTE NOVAMENTE </h1>
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
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;

// Se os dados forem inseridos com sucesso
}else{
$caminho_imagem = "" ;
$sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;

}}


if($numeroTurma == 0){
    ?>
    <center><h1>OPS! PARECE QUE O CODIGO DIGITADO ESTÁ ERRADO , TENTE NOVAMENTE</h1>
    <h1 style="color:red;">Codigo de Acesso: <?php echo $destinatario?></h1>
    </center>
    <?php
    }else{
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
    $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
    
    // Se os dados forem inseridos com sucesso
    }
    else{
    $caminho_imagem = "" ;
    $sql = mysqli_query($conn,"INSERT INTO mensagem (remetente,titulo,mensagem,imagem,data_envio,destinatario,tipo,comentar) VALUES ('".$remetente."','".$titulo."','".$mensagem."','".$caminho_imagem."','".$data_envio."','".$destinatario."','".$tipo."','".$comentar."')") ;
    
    }
}}
header ("location: ../paginas/sucesso_envio_mensagem.php");
?>