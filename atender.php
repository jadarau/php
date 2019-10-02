<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <link rel="stylesheet" href="css/admissao.css">
</HEAD>

<body>

<?php

include_once "conexao.php";

$c = '';

if(isset($_GET["cod2"])){
     $c = $_GET["cod2"];
}

$resulte = "SELECT * FROM pessoas where cod='$c'";

$RESULTADO = mysqli_query($conn, $resulte);


    while($linhas = mysqli_fetch_assoc($RESULTADO)){

?>

<div id="geral">

     <div id="caixa">

          <div id="cima">

               <div id="cimaesq">
               
                    <div id="foto"></div>

               </div>

               <div id="cimadir">

                    <div id="cimadiresq">

                         <table id="tb1">
                              <tr><td id="texto">Pront.:</td><td id="inp"><input id="campo" readonly="true" type="text" value="<?php echo $linhas['cod'] ?>" placeholder="Prontuario"></td></tr>
                              <tr><td id="texto">SUS:</td><td id="inp"><input id="campo" readonly="true" type="text" value="<?php echo $linhas['sus'] ?>" placeholder="SUS"></td></tr>
                              <tr><td id="texto">Nome:</td><td id="inp"><input id="campo" readonly="true" type="text" value="<?php echo $linhas['nome'] ?>" placeholder="Nome"></td></tr>
                              <tr><td id="texto">Idade:</td><td id="inp"><input id="campo" readonly="true" type="text" value="<?php echo $linhas['nasc'] ?>" placeholder="Idade"></td></tr>
                              <tr><td id="texto">Sexo:</td><td id="inp"><input id="campo" readonly="true" type="text" value="<?php echo 'Masculino' ?>" placeholder="Sexo"></td></tr>
                         </table>


                    </div>

                    <div id="cimadirdir">

                         <table id="tb2">

                              <tr><td id="l1tb2"><input id="btatender" type="buttom" value="Encaminhar Classificação" onclick="atendimento2()"></td></tr>
                              <tr><td id="l2tb2"><input id="btatender" type="buttom" value="Encaminhar Procedimentos" onclick="atendimento()"></td></tr>
                         
                         </table>

                    </div>                    
                     
               
               </div>
          
          </div>

          <script>

               function atendimento(){

                    document.getElementById('classifica').style.display="none";
                    document.getElementById('encaminha').style.display="block";

               }

               function atendimento2(){

                    document.getElementById('classifica').style.display="block";
                    document.getElementById('encaminha').style.display="none";

               }
               
          </script>


          <div id="baixo">

               <div id="classifica"> 
                    
                    <div id="d1">Tipo de entrada</div>
                    <div id="d1">Procedimento urgencia</div>
                    <div id="d1">Queixa</div>
                    <div id="d1">Botoes</div>
          
               </div>

               <div id="encaminha"> 
                    
                    <div id="d1">Especialidade</div>
                    <div id="d1">Profissional</div>
                    <div id="d1">Observações</div>
                    <div id="d1">Botoes</div>
          
               </div>
          
          </div>

     </div>

</div>

<?php
    }
?>

</body>



</HTML>