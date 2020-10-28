
    function mostrarSenha(){
     var senhaAluno = document.getElementById("senha");
     var confirmaAluno = document.getElementById("confirma");
     if(senhaAluno.type == 'password'){
       senhaAluno.type = 'text';
       confirmaAluno.type = 'text';
       document.getElementById('icone_ver_aluno').className = "fa fa-eye icon";
     }else{
       senhaAluno.type = 'password';
       confirmaAluno.type = 'password';
       
       document.getElementById('icone_ver_aluno').className = "fa fa-eye-slash icon";
     }
    }
   
       function mostrarSenhaProf(){
        var senhaProf = document.getElementById("senhaprof");
        var confirmaProf = document.getElementById("confirmaprof");
        if(senhaProf.type == 'password'){
         senhaProf.type = 'text';
         confirmaProf.type = 'text';
         document.getElementById('icone_ver_prof').className = "fa fa-eye icon";
        }else{
         senhaProf.type = 'password';
         confirmaProf.type = 'password';
        
         document.getElementById('icone_ver_prof').className = "fa fa-eye-slash icon";
        }
       }
     