<?php
include 'conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
		$nome_tema = $_POST['nome_tema'];
        $vencimento = $_POST['vencimento'];
        $codigo_turma = $_POST['codigo_turma'];
        $codigo_professor = $_POST['codigo_professor'];
        $texto_motivacional = $_POST['texto_motivacional'];
        $data_envio = $_POST['data_envio'];
        $maximo_redacao = $_POST['maximo_redacao'];
        $data = implode("-", array_reverse(explode("/", $vencimento)));
        $turma_escolhida = $_POST['turma_escolhida'];
        $marcadas = $_POST['marcadas'];
		$sql = mysqli_query($conn,"insert into temas_redacao (nome_tema,codigo_professor,codigo_turma,data_envio,vencimento,maximo_redacao,texto_motivacional)values('".$nome_tema."','".$codigo_professor."','".$codigo_turma."','".$data_envio."','".$data."','".$maximo_redacao."','".$texto_motivacional."')");
        $codigo_tema = mysqli_insert_id($conn);
        $escolhidas_turmas[] =  $turma_escolhida;
        $escolha = $_POST['escolha'];
        echo $escolha;

        if($codigo_turma == 'TurmasEspecificas'){


        if($escolha != null){
   
        foreach ($turma_escolhida as $escolhidas_turmas) {
           
            $sql = mysqli_query($conn,"insert into turmas_selecionadas (codigo_tema,codigo_turma,codigo_professor)values('".$codigo_tema."','".$escolhidas_turmas."','".$codigo_professor."')");

        }
      
        foreach ($marcadas  as $turmas_marcadas) {
            $sql = mysqli_query($conn,"update turmas_selecionadas set situacao = 'checked' where codigo_turma='$turmas_marcadas' and codigo_tema ='$codigo_tema'");
        }
    }else{

    }
}else{
    
}

        header("location:../paginas/sucesso_tema.php");
?>