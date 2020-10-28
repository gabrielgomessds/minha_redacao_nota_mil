
<?php
$email = $_SESSION['email'];
  $dataSalva = $_SESSION["ultimoAcesso"];
    $agora = date("Y-m-d H:i:s");
    $tempo_transcorrido = (strtotime($agora)-strtotime($dataSalva));
    setcookie($email);
   
     if($tempo_transcorrido >= 5) {
        header("location: ../php/sair.php?email=$email"); exit;
        ?>
        <?php
    }else {
    $_SESSION["ultimoAcesso"] = $agora;
      
      
   }

