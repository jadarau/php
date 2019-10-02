<HTML lang="pt-br">

    <HEAD>
         <meta charset="utf-8"/>
         <title>Cadastro de Pacientes</title>
         <link rel="stylesheet" href="css/cadastro.css">
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </HEAD>
    
    <body>
         
    <div class="container">
        <h2>Listar Pacientes</h2>
        <span id="conteudo"></span>
    </div>

        <?php

            $usuario = $_POST['usu'];
            $senha = $_POST['senha'];

        ?>

        <input type="text" value="<?php echo $usuario ?>"/>
        <input type="text" value="<?php echo $senha ?>"/>

        <script>
        
        $(document).ready(function (){
           $.post('listar_pac.php', function(retorna){
               $("#conteudo").html(retorna);
           });

        });        
        
        </script>
    
    </body>
    
    
    
    </HTML>