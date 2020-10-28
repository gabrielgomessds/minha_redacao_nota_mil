
<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
$nome_turma = $_POST['nome_turma'];
$escola_turma = $_POST['escola_turma'];
$codigo_acesso = $_POST['codigo_acesso'];
$codigo_professor = $_POST['codigo_professor'];
$simbolo = $_FILES['simbolo'];
$data_criacao = $_POST['data_criacao'];
$descricao = $_POST['descricao'];

$pesquisa = mysqli_query($conn,"select * from turma where codigo_acesso = '".$codigo_acesso."'");
if(mysqli_num_rows($pesquisa)>=1){

    if (!empty($foto["name"])) {
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $simbolo["name"], $ext);
         
                 // Gera um nome único para a imagem
                 $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
         
                 // Caminho de onde ficará a imagem
                 $caminho_imagem = "../simbolos_turma/".$nome_imagem;
         
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($simbolo["tmp_name"], $caminho_imagem);
     
    header ("location: ../paginas/codigo_acesso_repetido.php?nome_turma=".$nome_turma."&escola_turma=".$escola_turma."&codigo_acesso=".$codigo_acesso."&codigo_professor=".$codigo_professor."&simbolo=".$caminho_imagem."&data_criacao=".$data_criacao."&descricao=".$descricao);
    }else{
        $caminho_imagem = "../img/icone/imagem_turma.png" ;
        header ("location: ../paginas/codigo_acesso_repetido.php?nome_turma=".$nome_turma."&escola_turma=".$escola_turma."&codigo_acesso=".$codigo_acesso."&codigo_professor=".$codigo_professor."&simbolo=".$caminho_imagem."&data_criacao=".$data_criacao."&descricao=".$descricao);
        
        }
}else{

if (!empty($simbolo["name"])) {
preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $simbolo["name"], $ext);
 
         // Gera um nome único para a imagem
         $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
         // Caminho de onde ficará a imagem
         $caminho_imagem = "../simbolos_turma/".$nome_imagem;
 
// Faz o upload da imagem para seu respectivo caminho
move_uploaded_file($simbolo["tmp_name"], $caminho_imagem);
// Insere os dados no banco
$sql = mysqli_query($conn,"INSERT INTO turma (nome_turma,escola_turma,codigo_professor,codigo_acesso,descricao,data_criacao,simbolo) VALUES ('".$nome_turma."','".$escola_turma."','".$codigo_professor."','".$codigo_acesso."','".$descricao."','".$data_criacao."','".$caminho_imagem."')") ;

// Se os dados forem inseridos com sucesso
}
else{
$caminho_imagem = "../img/icone/imagem_turma.png" ;
$sql = mysqli_query($conn,"INSERT INTO turma (nome_turma,escola_turma,codigo_professor,codigo_acesso,descricao,data_criacao,simbolo) VALUES ('".$nome_turma."','".$escola_turma."','".$codigo_professor."','".$codigo_acesso."','".$descricao."','".$data_criacao."','".$caminho_imagem."')") ;

}
	
header ("location: ../paginas/sucesso_cadastro_turma.php");
}
?>