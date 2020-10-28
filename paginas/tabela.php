<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Busca com tabela</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style>
.invisivel{
	display:none;
}
        </style>
  
</head>
<?php
include '../php/conexao.php';
require_once '../includes/correcao_caracteres.php';
require '../includes/acesso_negado.php';
  ?>
  

<body>
        <h2>Meus pacientes</h2>
        <label>Filtre: </label>
        <input type="text" name="filtro" id="filtrar-tabela" placeholder="Digite o nome do paciente">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                </tr>
            </thead>
           
           
            <?PHP
				$sql = mysqli_query($conn,"select * from usuario order by situacao desc");
				if(mysqli_num_rows($sql)>0){
				while($usuario = mysqli_fetch_assoc($sql)){
                ?>
                 <tbody id="tabela-pacientes">
                 <?php
				if($usuario['situacao']=='online'){
				?>
                <tr class="paciente" id="primeiro-paciente">
                <td class="info-nome"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $usuario['foto']?>"> <b style="font-size:18px;"><?php echo $usuario['nome']?></b> <i style="color:blue;">(<?php echo $usuario['tipo']?>)</i></td>
                <td><button data-toggle="modal" data-target="#<?php echo $usuario['id']?>" class="btn btn-success">Informações</button></td>
					<td><a href="../php/admin_exclui_usuario.php?id=<?php echo $usuario['id']?>"><button class="btn btn-danger" type="button">Excluir Ususario</button></a></td>
                    </tr>
                    <?php }else{?>
                        <tr class="paciente" id="primeiro-paciente">
					<td class="info-nome"><img class="img-portfolio img-responsive" width="50px" height="50px" style="cursor:pointer;border-radius:100%;" for="modal-1" src="<?php echo $usuario['foto']?>"> <b style="font-size:18px;"><?php echo $usuario['nome']?></b> <i style="color:blue;">(<?php echo $usuario['tipo']?>)</i></td>
                    <td><button data-toggle="modal" data-target="#<?php echo $usuario['id']?>" class="btn btn-success">Informações</button></td>
					<td><a href="../php/admin_exclui_usuario.php?id=<?php echo $usuario['id']?>"><button class="btn btn-danger" type="button">Excluir Ususario</button></a></td>
                    </tr>
                    <?php
                    }
                    ?>
					    
         

                </tbody>
            <?php
                }}
                ?>
           
          
        </table>
       
        <script>


            //pegando valor de um campo de texto
            var campoFiltro = document.querySelector("#filtrar-tabela");
            //o input verifica o que foi digitado
            campoFiltro.addEventListener("input",function(){
                console.log(this.value);
                //aqui pega o tr
                var pacientes = document.querySelectorAll(".paciente");
                
                if(this.value.length > 0){
                    for(var i =0;i<pacientes.length;i++){
                        var paciente = pacientes[i];
                        //buscando dentro do td o nome
                        var tdNome = paciente.querySelector(".info-nome");
                        var nome = tdNome.textContent;  
                        //RegExp expresão regular que busca, usando o i informa que pode ser maiscula ou minuscula
                        var expressao = new RegExp(this.value,"i");
                        if( !expressao.test(nome)){
                            //adiciona a class invisivel
                            paciente.classList.add("invisivel");
                        }else{
                            //remove a class invisivel
                            paciente.classList.remove("invisivel");
                        }
                    }
                }else{
                    for(var i = 0;i < pacientes.length;i++){
                        var paciente = pacientes[i];
                        paciente.classList.remove("invisivel");
                    }
                }
                
            });
                </script>

</body>
</html>