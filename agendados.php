<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <link rel="stylesheet" href="css/agendamento.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
         <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
         <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
         <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</HEAD>

<body>

<?php

include_once "conexao.php";

$c = '';
$msg = '';

if(isset($_POST['cod_pes'])){

     //$cod = $_POST['cod'];
     $c = $_POST['cod_pes'];
     //$sus = $_POST['sus'];
     //$nome = $_POST['nome'];
     //$nasc = $_POST['nasc'];
     //$proc = $_POST['cod_proced'];
     //$data = $_POST['data'];
     $msg = 'Agendado com sucesso!';

}

if(isset($_GET["cod2"])){
     $c = $_GET["cod2"];     
}

if(isset($_GET["mais"])){     
     $msg = 'Agendado com sucesso!';
}


$resulte = "SELECT * FROM pessoas where cod='$c'";

$RESULTADO = mysqli_query($conn, $resulte);


    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

<div id="geral">

     <div id="caixa">

          <form method="POST" action="agendar.php">

          <div id="cima">

               <div id="cimaesq">
               
                    <div id="foto"></div>

               </div>

               <div id="cimadir">

                    <div id="cimadiresq">

                         <table id="tb1">                              
                              
                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Pront.</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="cod_pes" value="<?php echo $linhas['cod'] ?>">
                                   </div>
                              </td></tr>

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">SUS</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="sus" value="<?php echo $linhas['sus'] ?>">
                                   </div>
                              </td></tr>

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Nome</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="nome" value="<?php echo $linhas['nome'] ?>">
                                   </div>
                              </td></tr>                              

                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Idade</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="nasc" value="<?php echo $linhas['nasc'] ?>">
                                   </div>
                              </td></tr>
                              
                              <tr><td>
                                   <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                             <span id="span" class="input-group-text">Sexo</span>
                                        </div>
                                             <input type="text" id="campo" class="form-control" readonly="true" name="sexo" value="<?php echo 'Masculino' ?>">
                                   </div>
                              </td></tr>                              
                              
                         </table>


                    </div>
               
               </div>
          
          </div>

          <div id="meio">

               <div class="btn-group btn-group-toggle" id="tamanhoaba" data-toggle="buttons">
                    <label class="btn btn-info btn-sm active" onclick="muda('1')" id="option1">
                        <input type="radio" name="options" autocomplete="off"> Agendamento
                    </label>
                    <label class="btn btn-info btn-sm" onclick="muda('2')" id="option1">
                        <input type="radio" name="options" autocomplete="off" checked> Agendados
                    </label>                    
               </div>

          </div>

          
          <div id="baixo">

               <div id="historico"> 
                    
                    
          
               </div>
          
          </div>

          </form>

     </div>

</div>

<?php
    }
?>

</body>



</HTML>