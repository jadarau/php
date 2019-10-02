<HTML lang="pt-br">

<HEAD>
     <meta charset="utf-8"/>
     <title>Admissão de Pacientes</title>
     <link rel="stylesheet" href="css/agendamento.css">
</HEAD>

<body>

<?php

include_once "conexao.php";

    $cod = $_POST['cod'];
    $cod_pes = $_POST['cod_pes'];
    $sus = $_POST['sus'];
    $nome = $_POST['nome'];
    $nasc = $_POST['nasc'];
    $proc = $_POST['cod_proced'];
    $data = $_POST['data'];


    ?>     

<div id="geral">

     <div id="caixa">

          <form method="POST" action="agendamento.php">

          <div id="cima">

               <div id="cimaesq">
               
                    <div id="foto"></div>

               </div>

               <div id="cimadir">

                    <div id="cimadiresq">

                         <table id="tb1">
                              <input type="hidden" name="cod" value="<?php echo $cod ?>">                       
                              <tr><td id="texto">Pront.:</td><td id="inp"><input id="campo" readonly="true" type="text" name="cod_pes" value="<?php echo $cod_pes ?>" placeholder="Prontuario"></td></tr>
                              <tr><td id="texto">SUS:</td><td id="inp"><input id="campo" readonly="true" name="sus" type="text" value="<?php echo $sus ?>" placeholder="SUS"></td></tr>
                              <tr><td id="texto">Nome:</td><td id="inp"><input id="campo" readonly="true" name="nome" type="text" value="<?php echo $nome ?>" placeholder="Nome"></td></tr>
                              <tr><td id="texto">Idade:</td><td id="inp"><input id="campo" readonly="true" name="nasc" type="text" value="<?php echo $nasc ?>" placeholder="Idade"></td></tr>
                              <tr><td id="texto">Sexo:</td><td id="inp"><input id="campo" readonly="true"  type="text" value="<?php echo 'Masculino' ?>" placeholder="Sexo"></td></tr>
                         </table>


                    </div>
               
               </div>
          
          </div>

          
          <div id="baixo">

               <div id="classifica"> 
                    
                    <div id="d2">Procedimento</div>

                    <div id="d"><select id="proc" name="cod_proced" value="<?php echo $proc ?>">
                    <option value="1">1ª Avaliaçao</option>
                    <option value="2">Instalação de aparelho</option>
                    <option value="3">Manutenção de aparelho</option>
                    </select></div>                    

                    <div id="d2">Data</div>
                    
                    <div id="d"><select id="dt" name="data" value="<?php echo $proc ?>">
                    <option value="15/09/2019">15/09</option>
                    <option value="17/09/2019">17/09</option>
                    <option value="01/10/2019">01/10</option>
                    </select></div>
                    
                    <div id="d1"><input type="reset" value="Cancelar"><input type="submit" name="agendado" value="Alterar"></div>
          
               </div>
               
          
          </div>

          </form>

     </div>

</div>


</body>



</HTML>