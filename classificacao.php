<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Recepção Hospitalar</title>
     <link rel="stylesheet" href="css/classifica.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

if(isset($_POST["cod2"])){

  $cod=$_POST["cod2"];
  $botao=$_POST["botao"];
  $queixa=$_POST["queixa"];

  if($botao=='class'){

    $insere = "INSERT INTO classifica (cod_pes,cod_prof,data_inicio,data_fim,queixa,tipo_entrada,classificacao,estatus)VALUES('$cod',null,now(),null,'$queixa',0,0,0)";
    //$execute=mysqli_query($conn,$insere
    if(mysqli_query($conn,$insere)){

    ?>
    <div id="msg"><?php
    echo "Paciente encaminhado para Classificação!";
          ?>
          <button type="button" onclick="window.close()" class="btn btn-success" name="fechar">OK</button>
    </div>
    <?php
    }else{

          ?>
          <div id="msg"><?php
            echo "Erro ao encaminhar Paciente!";
          ?>
           <button type="button" onclick="window.close()" class="btn btn-success" name="fechar">OK</button>
          </div>
          <?php

          }

  }
  if($botao=='psico'){

    ?>
    <div id="msg"><?php
    echo "Psicóloga!";
          ?>
          <button type="button" onclick="window.close()" class="btn btn-dark" name="fechar">OK</button>
    </div>
    <?php

  }
  if($botao=='medico'){

    $especialidade=$_POST["especialidade"];

    ?>
    <div id="msg"><?php
    echo "Médico!";
          ?>
          <button type="button" onclick="window.close()" class="btn btn-primary" name="fechar">OK</button>
    </div>
    <?php

  }


}else{

?>
    <div id="msg"><?php
    echo "Erro ao tentar encaminhar paciente!";
          ?>
          <button type="button" onclick="window.close()" class="btn btn-primary" name="fechar">OK</button>
    </div>
    <?php
}

?>


</body>

</HTML>