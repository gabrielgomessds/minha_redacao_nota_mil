<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$codigo_tema = $_POST['codigo_tema'];
		$codigo_aluno = $_POST['codigo_aluno'];
		$codigo_turma = $_POST['codigo_turma'];
		$codigo_redacao = $_POST['codigo_redacao'];
		$email_aluno = $_POST['email_aluno'];
		$redacao = $_POST['redacao'];
		$data_envio = $_POST['data_envio'];
		$total = $_POST['total'];
        $codigo_usuario = $_POST['codigo_usuario'];
		$nome_usuario = $_POST['nome_usuario'];
		$email_usuario = $_POST['email_usuario'];
		$foto_usuario = $_POST['foto_usuario'];
		$comentario = $_POST['comentario'];
		$data_comentario = $_POST['data_comentario'];
//--------------------------------------------------------------------------------------//
		$comp1 = $_POST['comp1'];
		$comp2 = $_POST['comp2'];
		$comp3 = $_POST['comp3'];
		$comp4 = $_POST['comp4'];
		$comp5 = $_POST['comp5'];
		$sql = mysqli_query($conn,"insert into correcao (codigo_tema,codigo_aluno,codigo_turma,codigo_redacao,email_aluno,correcao,nota,data_envio)values('".$codigo_tema."','".$codigo_aluno."','".$codigo_turma."','".$codigo_redacao."','".$email_aluno."','".$redacao."','".$total."','".$data_envio."')");
		$inserir = mysqli_query($conn,"insert into competencia(codigo_redacao,codigo_tema,comp1,comp2,comp3,comp4,comp5) values('".$codigo_redacao."','".$codigo_tema."','".$comp1."','".$comp2."','".$comp3."','".$comp4."','".$comp5."')");
		$query = mysqli_query($conn,"update redacao set nota='$total' where id='$codigo_redacao'");
		if(empty($_POST['comentario'])){
		
		}else{
		$comentario = mysqli_query($conn,"insert into feedback_redacao (codigo_redacao,codigo_tema,codigo_usuario,nome_usuario,email_usuario,foto_usuario,data_comentario,comentario)values('".$codigo_redacao."','".$codigo_tema."','".$codigo_usuario."','".$nome_usuario."','".$email_usuario."','".$foto_usuario."','".$data_comentario."','".$comentario."')");
			
		}
		header ("location: ../paginas/professor_redacoes_aluno.php?codigo_tema=".$codigo_tema);

?>