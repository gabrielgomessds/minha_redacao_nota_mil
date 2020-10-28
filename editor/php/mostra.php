<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>without bootstrap</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="summernote-lite.min.css" rel="stylesheet">
    <script src="summernote-lite.js"></script>
        <style>
            .container{
                width: 80%;
             
                
            }
        </style>
  </head>
  <body>
    <a href="../index.html"><button>Voltar</button></a>
    <div class="container" >
        <form name="form01" action="php/inserir.php" method="POST">
    <?php
    include 'conexao.php';
    $busca = mysql_query("select * from campo_texto")or die(mysql_error());
    while($pega = mysql_fetch_assoc($busca)){
    ?>
    <a href="texto.php?id=<?php echo $pega['id']?>"><div style="border:1px solid blue;"><?php echo $pega['texto'];?></div></a>
        <?php
    }
        ?>
</div>

    <script>
      $('#summernote').summernote({
        placeholder: 'Digite o texto motivacional aqui',
        tabsize: 2,
        height: 320,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['insert', ['link', 'picture', 'video']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
  </body>
</html>
